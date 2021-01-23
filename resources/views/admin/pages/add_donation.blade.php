<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.dashboard')

@section('content')

         
            
      <section id="main-content">
          <section class="wrapper">
            <div class="row">
              <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-user-md"></i>Blood Bank</h3>
                <ol class="breadcrumb">
                  <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                  <li><i class="fa fa-plus"></i>Add Blood Bank</li>
                <li><i class="fa fa-user-md"></i></li>
                </ol>
              </div>
            </div>


            <!-- edit-profile -->
  <div id="edit-profile" class="tab-pane">
    <section class="panel">
      <div class="panel-body bio-graph-info">
        @if (session()->has('errors'))
        @foreach ($errors as $error)
            {{$error}}
        @endforeach
    @endif
  @if(\Session::has('message'))

  <p class="alert
  {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('message') }}</p>
  
  @endif
        <h1> Donation  Info</h1>
     
       <form action="{{ route('donation.create') }}" method="post">
        @csrf

      <div class="form-row">
    
          <div class="col-md-6 form-group">
            <label for="donor_id">Select Donor</label>
            <select name="donor_id"  class="form-control">
                @if (count($donors) > 0)
                    @foreach($donors as $donor)
                        <option value="{{$donor->id}}">{{$donor->name}} {{$donor->blood_type}}</option>
                    @endforeach
                @endif
           
    
               </select>
          
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 form-group">
              <label for="email">Blood Group</label>
           <select name="blood_type"  class="form-control">
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>

           </select>
          </div>
        </div>
 
     
      <div class="text-center"><input class="btn btn-success" value="Register Donation" type="submit"/></div>
{{-- 
      <div class="mb-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your message has been sent. Thank you!</div>
        </div> --}}
    </form>
      </div>
    </section>
  </div>


          </section>
        </section>
        <!--main content end-->
        
  @endsection
  
  
  
  
  
  
  
  
  
  
  
  
  