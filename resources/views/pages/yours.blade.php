@extends('master')
@section('content')
<div class="videos-header card">
    <h2>Wszystkie wystawione przez Ciebie oferty :</h2>

</div>
<div class="row">

	@if(count($videos) == 0)
		<div class="alert alert-warning card">
				<h3>Nie posiadasz zadnych wystawionych przez siebie ofert. </h3>
		</div>
	@endif
	@foreach($videos as $video)
	    <!-- Single video -->
	    <div class="col-xs-12 col-md-6 col-lg-4 single-video">
	        <div class="card">
	        
	            <div class="embed-responsive embed-responsive-16by9">
	                <iframe class="embed-responsive-item" src="{{ $video->url }}?showinfo=0" frameborder="0" allowfullscreen></iframe>
	            </div>
	            <div class="card-content">
	                <a href="{{ url('/video',$video->id) }}">
	                    <h4>{{ $video->title }}</h4>
	                </a>
	                <p>{{ str_limit ($video->description,$limit=80) }}</p>
	            </div>
	            
	        </div>
	    </div>
	@endforeach


	
	

</div>

@stop