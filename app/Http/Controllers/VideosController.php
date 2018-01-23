<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Requests\CreateVideoRequest;
use App\Http\Controllers\Controller;
use App\Video;
use Auth;
use Session;

class VideosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    /**
     * Pobieramy liste filmow
     */
    public function index()
    {
        

        $videos = Video::latest()->get();
        return view('videos.index')->with('videos', $videos);
    }

    /**
     * Jeden film
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);

        return view('videos.show')->with('video', $video);
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
