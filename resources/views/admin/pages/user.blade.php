@extends('layouts.dashboard')

@section('content')
          <!--main content start-->
              
          
    <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-users"></i>Users</li>
              <li><i class="fa fa-user-md"></i>{{$user->name}}</li>
              </ol>
            </div>
          </div>

          
          <div class="row">
            <!-- profile-widget -->
            <div class="col-lg-12">
              <div class="profile-widget profile-widget-info">
                <div class="panel-body">
                  <div class="col-lg-2 col-sm-2">
                  <h4>{{$user->name}}</h4>
                    <div class="follow-ava">
                      <img alt="" height="70" width="70" src="{{asset('images/individual.png')}}">
                    </div>
                  
                  </div>
                  <div class="col-lg-4 col-sm-4 follow-info">
                    <p>You have no bio yet</p>
                  <p>{{$user->email}}</p>
                  <p><i class="fa fa-twitter">{{$user->name}}</i></p>
                    <h6>
                    <span><i class="icon_clock_alt"></i>You joined {{$user->created_at->diffforhumans()}}</span>
                                     
                                  </h6>
                  </div>
                  <div class="col-lg-2 col-sm-6 follow-info weather-category">
                    <ul>
                      <li class="active">
  
                        <i class="fa fa-comments fa-2x"> </i><br>You have no messages yet
                      </li>
  
                    </ul>
                  </div>
                  <div class="col-lg-2 col-sm-6 follow-info weather-category">
                    <ul>
                      <li class="active">
  
                        <i class="fa fa-bell fa-2x"> </i><br> You have no notifications yet
                      </li>
  
                    </ul>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
          <!-- page start-->
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading tab-bg-info">
                  <ul class="nav nav-tabs">
                    <li class="active">
                      <a data-toggle="tab" href="#recent-activity">
                                            <i class="icon-home"></i>
                                            Daily Activity
                                        </a>
                    </li>
                    <li>
                      <a data-toggle="tab" href="#profile">
                                            <i class="icon-user"></i>
                                            Profile
                                        </a>
                    </li>
                    <li class="">
                      <a data-toggle="tab" href="#edit-profile">
                                            <i class="icon-envelope"></i>
                                            Edit Profile
                                        </a>
                    </li>
                  </ul>
                </header>
                <div class="panel-body">
                  <div class="tab-content">
                    <div id="recent-activity" class="tab-pane active">
                      <div class="profile-activity">
                      </div>
                    </div>
                    <!-- profile -->
                    <div id="profile" class="tab-pane">
                      <section class="panel">
                        <div class="bio-graph-heading">
                         User's Bio Not added
                        </div>
                        <div class="panel-body bio-graph-info">
                          <h1>User Information</h1>
                          <div class="row">
                            <div class="bio-row">
                              <p><span>Name </span>: {{$user->name}} </p>
                            </div>
                           
                            <div class="bio-row">
                            <p><span>Added:</span>: {{$user->created_at->diffforhumans()}}</p>
                            </div>
                            <div class="bio-row">
                            <p><span>mail: </span>: {{$user->email}}</p>
                            </div>
                          </div>
                        </div>
                      </section>
                      <section>
                        <div class="row">
                        </div>
                      </section>
                    </div>
                    <!-- edit-profile -->
                    <div id="edit-profile" class="tab-pane">
                      <section class="panel">
                        <div class="panel-body bio-graph-info">
                          <h1> Profile Info</h1>
                          <form action="{{route('new.user')}}" method="POST">
                            @csrf
                               <v-container fluid>
                                   <v-row>
                                       <v-col cols="6">
                                           <v-text-field
                                               name="name"
                                               label=" Name"
                                               required
                                           ></v-text-field>
                                           <v-text-field
                                               name="email"
                                               label=" Email"
                                               required
                                           ></v-text-field>
                                           <v-text-field
                                               name="phone"
                                               label=" Phone"
                                               required
                                           ></v-text-field>
                                           <v-text-field
                                               name="blood_type"
                                               label=" Blood Type"
                                               required
                                           ></v-text-field>
                     
                                           <v-text-field
                                               name="password"
                                               label=" Password"
                                               type="password"
                                               required
                                           ></v-text-field>
                                           <v-btn
                                               depressed
                                               color="success"
                                               class="mr-4 btn btn-success"
                                               type="submit"
                                           >
                                               Register 
                                           </v-btn>
                                       </v-col>
                                       <v-col cols="6">
                                           <v-text-field
                                               name="address"
                                               label=" Address"
                                               required
                                           ></v-text-field>
                                           <v-text-field
                                               name="dob"
                                               label=" Date of Birth"
                                               required
                                           ></v-text-field>
                                           <v-text-field
                                               name="gender"
                                               label=" Gender"
                                               required
                                           ></v-text-field>
                                           <v-text-field
                                               name="subcounty"
                                               label=" Sub-Country"
                                               required
                                           ></v-text-field>
                                       </v-col>
                                   </v-row>
                               </v-container>
                           </form>
                        </div>
                      </section>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
  
          <!-- page end-->
        </section>
      </section>
      <!--main content end-->
    
@endsection