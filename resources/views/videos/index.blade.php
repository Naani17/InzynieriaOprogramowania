@extends('master')
@section('content')
<div class="videos-header card">
    <h2>Najnowsze filmy</h2>
</div>

@if(Session::has('logout'))
	<div class="alert alert-success card">
		{{ Session::get('logout') }}
	</div>
@endif
@if(Session::has('not_admin'))
	<div class="alert alert-danger card">
		{{ Session::get('not_admin') }}
	</div>
@endif
@if(Session::has('admin_logged'))
	<div class="alert alert-danger card">
		{{ Session::get('admin_logged') }}
		<br/>
		<a href="/login">Zaloguj sie -> !</a>
	</div>
@endif

@if(Auth::check())
	<div class="videos-header card powitanie"> 
		Witaj : {!! Auth::user()->name !!}

	    <a style="float:right;margin-right:50px;margin-top:-10px;"  href="/videos/create" class="btn btn-primary btn-lg">
	        Dodaj nowy film !
	    </a>

	@if(Auth::id()==1)
		<p>Posiadasz uprawnienia Administratora</p>
	@endif
	</div>
@endif
@stop