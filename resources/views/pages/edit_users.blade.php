@extends('master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="panel-body">
            <!-- Formularz -->
            @include('pages.form_errors2')
            	{!! Form::model($user,['method'=>'POST','class'=>'form-horizontal','action'=>['PagesController@zaktualizuj',$user->id]]) !!}
            		
            		@include('pages.user_form',['buttonText'=>'Zaktualizuj'])

            	{!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop