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
        <h1> Blood Bank  Info</h1>
        <form action="{{route('new.user')}}" method="POST">
       @csrf
       <v-container fluid>
        <v-row>
            <v-col cols="6">
                <v-text-field
                    name="name"
                    label="Blood Bank Name"
                    required
                ></v-text-field>
                <v-text-field
                    name="email"
                    label="Email"
                    required
                ></v-text-field>

                <v-text-field
                name="password"
                label="Password"
                type="password"
                required
            ></v-text-field>

            <input
            hidden
            type="number"
            name="is_blood_bank"
            value='1'
        />

                <v-btn style="color: #00aced"
                    depressed
                    color="primary"
                    class="mr-4"
                    type="submit"
                >
                    Register Blood Bank
                </v-btn>
            </v-col>
            <v-col cols="6">
                <v-text-field
                    name="address"
                    label="Blood Bank's Address"
                    required
                ></v-text-field>
               <v-html>
                 <v-text-field></v-text-field>
                <select name="subcounty">
                  @if (count($sub_counties)>0)
                  @foreach ($sub_counties as $item)
                  <option value="{{$item->name}}">{{$item->name}}</option>
                  @endforeach
              @endif
                </select>
               </v-html>
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
  
  
  
  
  
  
  
  
  
  
  
  
  