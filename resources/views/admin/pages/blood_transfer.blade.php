
<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.dashboard')

@section('content')

         
            
      <section id="main-content">
          <section class="wrapper">
            <div class="row">
              <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-user-md"></i>Blood Bags Transfer</h3>
                <ol class="breadcrumb">
                  <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                  <li><i class="fa fa-plus"></i>Transfer</li>
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
        <h1>Blood Bags Transfer</h1>
        <form method="POST" action="{{ route('blood.transfer') }}">
            @csrf
        
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <label for="blood_type">Blood Group Requested</label>
                  <input type="text" name="blood_type" value="{{$appeal->blood_type}}" class="form-control" readonly>
                </div>

                <div class="col-md-6 form-group">
                    <label for="email">Blood bank to receive blood</label>
                    <input type="text" name="blood_bank" value="{{$blood_bank->name}}" class="form-control" readonly>
                  </div>
              </div>

              <div class="form-row">
                <div class="col-md-6 form-group">
                  <label for="blood_type">Quantity</label>
                  <input type="number" name="quantity" value="{{$appeal->quantity}}" class="form-control" readonly>
                </div>

                <div class="col-md-6 form-group">
                    <label for="email">Blood bank Id</label>
             
                    <input type="number" name="bank_id" value="{{$blood_bank->user_id}}" class="form-control" readonly>
                  </div>
              </div>
        
        
        
        
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-success">
                        {{ __('Authorize Transfer') }}
                    </button>
                </div>
            </div>
        </form>
      </div>
    </section>
  </div>


          </section>
        </section>
        <!--main content end-->
        
  @endsection
  
  
  
  
  
  
  
  
  
  
  
  
  