<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Requests\CreateVideoRequest;
use App\Http\Controllers\Controller;
use App\Video;
use App\User;
use Auth;
use Session;
use Illuminate\Support\Facades\Cookie;

class VideosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    /**
     * Pobieramy liste filmow
     */
    public function index(Request $request)
    {
        $recentlyPropertiesCookie = Cookie::get('recent_properties');
        $recentlyProperties = isset($recentlyPropertiesCookie) ? $recentlyPropertiesCookie : [];

        $videos = Video::latest()->get();

        if ((count($videos))>0)
        {
         return view('videos.index', [
        'videos' => $videos,
         'recentlyProperties' => Video::whereIn('id', $recentlyProperties)->orderBy('created_at', 'desc')->get()
      ]); 
        }
        else
        {
           Session::flash('empty','Przepraszamy, ale aktualnie nie mamy zadnych filmow w bazie.');
            return view('videos.index', [
        'videos' => $videos,
         'recentlyProperties' => Video::whereIn('id', $recentlyProperties)->orderBy('created_at', 'desc')->get()
      ]); 
        }
       
        
    }

    /**
     * Jeden film
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);

        $filmy = Video::all();
        $suma_filmow=count($filmy);

        $uzytkownicy = User::all();
        $suma_uzytkownikow = count($uzytkownicy);

        $recentlyPropertiesCookie = Cookie::get('recent_properties');
         $recentlyProperties = isset($recentlyPropertiesCookie) ? $recentlyPropertiesCookie : [];

         if ( !in_array($video->id, $recentlyProperties) )
            $recentlyProperties[] = $video->id;

         if ( count($recentlyProperties) > 3 )
            array_shift($recentlyProperties);

         Cookie::queue('recent_properties', $recentlyProperties, '3');


         return view('videos.show', [
        'video' => $video,
        'filmy'=>$suma_filmow,
        'uzytkownicy'=>$suma_uzytkownikow         
      ]);
    }

    /**
     * Wyswietla formularz dodawania filmu
     */
    public function create()
    {
       
        return view('videos.create');
    }

    /**
     * Zapisujemy film do bazy
     */
    public function store(CreateVideoRequest $request)
    {
        $video = new Video($request->all());
        Auth::user()->videos()->save($video);

        Session::flash('video_created','Twój film został zapisany');
        return redirect('videos');
    }


    /**
     * Formularz edycji filmu
     */
    public function edit($id)
    {
        
        $video = Video::findOrFail($id);
        if(Auth::check())
        {
            if (($video->user->id) == (Auth::user()->id) || ($video->user->id) == ((Auth::user()->id) == 1))
        {
             return view('videos.edit')->with('video',$video);
        }
        else
        {
           Session::flash('video_isnotyour','To ogłoszenie nie jest Twoje ! Nie możesz go edytować.');
           return view('videos.show')->with('video',$video);
        }
    }else
    {
        Session::flash('user_logged','Nie jesteś zalogowanym użytkownikiem ! Nie możesz edytować filmów.');
        return view('videos.show')->with('video',$video);
    }
    }


     /**
     * Aktualizacja filmu
     */
    public function update($id, CreateVideoRequest $request)
    {
        $video = Video::findOrFail($id);
        $video->update($request->all());
        Session::flash('video_updated','Twoje ogłoszenie zostało zaktualizowane !');
        return redirect('videos');
    }

      /**
     * Usuwanie filmu
     */

    public function delete($id)
    {
        $video = Video::findOrFail($id);

        if(Auth::check())
        {
           if (($video->user->email) == (Auth::user()->email) || ($video->user->id) == ((Auth::user()->id) == 1))
        {
            $video->destroy($id);
            Session::flash('video_isyour','Twoje ogłoszenie zostało usunięte !');
            return redirect('videos');
        }else
            {
               Session::flash('video_is_not_your','To ogłoszenie nie jest Twoje ! Nie możesz go usunac.');
               return view('videos.show')->with('video',$video);
            } 
        }else
            {
                Session::flash('user_logged','Nie jesteś zalogowanym użytkownikiem ! Nie możesz usuwać filmów.');
                return view('videos.show')->with('video',$video);
            }   
    }



}
