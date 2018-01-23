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

@if(Session::has('video_created'))
	<div class="alert alert-success card">
		{{ Session::get('video_created') }}
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

<div class="row">

    @foreach($videos as $video)

	    <!-- Single video -->
	    <div class="col-xs-12 col-md-6 col-lg-4 single-video">
	        <div class="card">
	        
	            <div class="embed-responsive embed-responsive-16by9">
	                <iframe class="embed-responsive-item" src="{{ $video->url }}?showinfo=0" frameborder="0" allowfullscreen></iframe>
	            </div>
	            <div class="card-content">
	                <a href="{{ url('videos', $video->id) }}">
	                    <h4>{{ $video->title }}</h4>
	                </a>
	                <p>{{ str_limit($video->description, $limit=80) }}</p>
	                <span class="upper-label">Dodał</span>
	                <span class="video-author">{{ $video->user->name }}</span>
	            </div>
	            
	        </div>
	    </div>

    @endforeach
</div>

@stop