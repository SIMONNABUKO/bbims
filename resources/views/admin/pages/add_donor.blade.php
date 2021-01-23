<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.dashboard')

@section('content')

         
            
      <section id="main-content">
          <section class="wrapper">
            <div class="row">
              <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-user-md"></i> Add</h3>
                <ol class="breadcrumb">
                  <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                  <li><i class="fa fa-plus"></i>Donors</li>
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
        <h1> Donors  Info</h1>
        <form action="{{route('new.user')}}" method="POST">
       @csrf
       <v-container fluid>
        <v-row>
            <v-col cols="6">
                <v-text-field
                    name="name"
                    label="Donor Name"
                    required
                ></v-text-field>
                <v-text-field
                    name="email"
                    label="Donor Email"
                    required
                ></v-text-field>
                <v-text-field
                    name="phone"
                    label="Donor Phone"
                    required
                ></v-text-field>
                
                <v-html>
                    <select name="blood_type">
                        <option value="A+">Click to select blood group</option>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                    </select>
                   </v-html>
                   
                <v-text-field
                    name="password"
                    label="Donor's Password'"
                    required
                ></v-text-field>
                <v-btn style="color: #00aced"
                    depressed
                    color="success"
                    class="mr-4"
                    type="submit"
                >
                    Register Donor
                </v-btn>
            </v-col>
            <v-col cols="6">
                <v-text-field
                    name="address"
                    label="Donor's Address"
                    required
                ></v-text-field>
                <v-text-field
                    name="dob"
                    label="Donor's Date of Birth"
                    required
                ></v-text-field>
                <v-text-field
                    name="gender"
                    label="Donor's Gender"
                    required
                ></v-text-field>
                <v-html>
                   <select name="subcounty">
                    <option value="#">Click to select sub-county</option>
                     @if (count($sub_counties)>0)
                     @foreach ($sub_counties as $item)
                     <option value="{{$item->name}}">{{$item->name}}</option>
                     @endforeach
                 @endif
                   </select>
                  </v-html>
                <v-text-field
                    name="is_donor"
                    required
                    hidden
                    value="1"
                ></v-text-field>
            </v-col>
        </v-row>
    </v-container>
      </form>
      </div>
    </section>
  </div>


          </section>
        </section>
        <!--main content end-->
        
  @endsection
  
  
  
  
  
  
  
  
  
  
  
  
  