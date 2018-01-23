<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Requests\CreateVideoRequest;
use App\Http\Controllers\Controller;


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
      return view('videos.index');
    	
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





}
