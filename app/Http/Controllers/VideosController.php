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

    	return view('videos.show');
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



}
