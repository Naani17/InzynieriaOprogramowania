<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;


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

     /**
     * Edycja danych przez administratora
     */

    public function edit($id)
        {
             $user = $this->users->findOrFail($id);

            if(Auth::id()==1)
                {
                   return view('pages.edit_users')->with('user',$user);  
                }
                else
                {
                    Session::flash('not_admin','Nie jestes administratorem !');
                    return redirect('videos');
                }
        }


     /**
     * Aktualizacja danych oferty mieszkania
     */

    public function zaktualizuj($id, CreateUserRequest $request)
    {
        $users = $this->users->findOrFail($id);
        $users->update($request->all());
        Session::flash('user_updated','Dane uzytkownika zostały zaktualizowane!');
        return redirect('users');
    }

    /**
         * Usuwanie uzytkownikow przez Admina
         */


    public function delete($id)
        {
            $users = $this->users->findOrFail($id);

            $users->delete($id);
            Session::flash('user_deleted','Uzytkownik został usunięty !');
            return redirect('users');
        }
}
