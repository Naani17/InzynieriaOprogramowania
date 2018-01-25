@extends('master')
@section('content')
<h2>To jest strona na ktorej bedziesz mogl zarzadzac uzytkownikami</h2>

@if(Session::has('user_deleted'))
	<div class="alert alert-success card">
		{{ Session::get('user_deleted') }}
	</div>
@endif

@if(Session::has('user_updated'))
	<div class="alert alert-success card">
		{{ Session::get('user_updated') }}
	</div>
@endif

	@foreach($users as $user)
	    <!-- Single video -->
	    <div class="col-xs-12 col-md-6 col-lg-4 single-video">
	        <div class="card">
	            <div class="card-content">
		            <h3>Informacje o uzytkowniku :</h3>

		            <h5>Login :</h5>
	                <p>{{$user->name}}</p>

	                <h5>E-mail :</h5>
	                <p>{{$user->email}}</p>

	                <div class="edit-button">
	                 	<a href="{{action('PagesController@edit', $user->id)}}" class="btn btn-primary btn-md">
	                        Edytuj Uzytkownika
	                    </a>
	                    <a style="margin-left:25px;" href="{{action('PagesController@delete', $user->id)}}" class="btn btn-primary btn-md">
	                        Usuń Uzytkownika
	                    </a>
	                </div>
	

	            </div>
	            
	        </div>
	    </div>
	@endforeach
@stop