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
                  <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                  <li><i class="fa fa-plus"></i> Patients</li>
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
        <h1> Profile Info</h1>
        <form action="{{route('new.user')}}" method="POST">
       @csrf
          <v-container fluid>
              <v-row>
                  <v-col cols="6">
                      <v-text-field
                          name="name"
                          label="Patient Name"
                          required
                      ></v-text-field>
                      <v-text-field
                          name="email"
                          label="Patient Email"
                          required
                      ></v-text-field>
                      <v-text-field
                          name="phone"
                          label="Patient Phone"
                          required
                      ></v-text-field>
                      <v-html>
                      <select name="blood_type">
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
                          label="Patient's Password"
                          type="password"
                          required
                      ></v-text-field>
                      <v-btn style="color: #00aced"
                          depressed
                          color="success"
                          class="mr-4 btn btn-success"
                          type="submit"
                      >
                          Register Patient
                      </v-btn>
                  </v-col>
                  <v-col cols="6">
                      <v-text-field
                          name="address"
                          label="Patient's Address"
                          required
                      ></v-text-field>
                      <v-text-field
                          name="dob"
                          label="Patient's Date of Birth"
                          required
                      ></v-text-field>
                      <v-text-field
                          name="gender"
                          label="Patient's Gender"
                          required
                      ></v-text-field>
                      <v-html>
                       <select name="subcounty">
                         @if (count($sub_counties)>0)
                         @foreach ($sub_counties as $item)
                         <option value="{{$item->name}}">{{$item->name}}</option>
                         @endforeach
                         @endif
                       </select>
                      </v-html>
                      <v-text-field
                      name="is_patient"
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
  
  
  
  
  
  
  
  
  
  
  
  
  