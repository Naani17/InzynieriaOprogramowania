<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }


    public function contact()
    {
    	return view('pages.contact');
    }

    public function about()
    {
    	return view('pages.about');
    }

    /**
     * Funkcja odpowiadajaca za widok zarzadzania uzytkownikami
     */

    public function manage()
    {
    	
    	$users = $this->users->all();

    	if(Auth::check())
        {	
        	if(Auth::id()==1)
        	{
        		return view('pages.users')->with('users',$users);
        	}
        	else
        	{
        		Session::flash('not_admin','Nie jestes administratorem !');
            	return redirect('videos');
        	}
        }
        else
        {
        	Session::flash('admin_logged','Nie jestes zalogowany !');
            return redirect('videos');
        }
    }


     /**
     * Funckja opdowiadajaca za wyswietlanie wszystkich Twoich ofert
     */

    public function yours()
    {
      
        $user = Auth::user()->id;

       $videos = DB::table('videos')->where('user_id',$user)->latest()->get();
            if(Auth::check())
            {
                return view('pages.yours')->with('videos',$videos);
            }
            {
                Session::flash('admin_logged','Nie jestes zalogowany !');
                return redirect('videos');
            }

        
        
    }
}
