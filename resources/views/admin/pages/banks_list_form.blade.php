
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
        <h1>New Blood appeal</h1>
        <form method="POST" action="{{ route('banks.list') }}">
            @csrf
            <div class="form-row">
                <div class="col-md-6 form-group">
                  <label for="blood_type">Select Sub-county</label>
                  <select name="subcounty" class="form-control">
                    @if(count($subcounties) > 0)
                        @foreach($subcounties as $subcounty)
                        <option value="{{$subcounty->name}}">{{$subcounty->name}}</option>
                        @endforeach
                    @endif
                    
                  </select>
                </div>
              </div><br>
        
        
        
        
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-success">
                        {{ __('Fetch Blood Banks') }}
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
  