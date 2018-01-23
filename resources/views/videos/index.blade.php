@extends('master')
@section('content')
<div class="videos-header card">
    <h2>Najnowsze filmy</h2>
</div>

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