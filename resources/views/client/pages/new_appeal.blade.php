<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.client')

@section('content')
  <div class=" mt-5 mb-5">
   <div class="row">
   <div class="col-lg-10 offset-lg-1">


        @if (session()->has('errors'))
        @foreach ($errors as $error)
            {{$error}}
        @endforeach
    @endif
  @if(\Session::has('message'))

  <p class="alert
  {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('message') }}</p>
  
  @endif
   <h1>New Blood Transfusion Appeal</h1>
   <p>By clicking the make appeal button, you're giving us permission to notify the blood banks around your area about your urgent need of blood transfusion. 
       You're also authorizing us to share some of your information with them so that
        they can get in touch with you as soon as possible.</p>
    <a class="btn btn-danger btn-lg" href="{{route('client.new.appeal.confirm')}}">Make Appeal</a>
   </div>
   </div>
  </div>

     
@endsection