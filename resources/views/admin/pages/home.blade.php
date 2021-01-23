@extends('layouts.dashboard')

@section('content')
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
          <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
              @if(auth()->user()->is_blood_bank)
              <span><a class="btn btn-danger pull-right" href="{{route('bank.appeal.form')}}">Make Blood Appeal</a></span>
              @endif

              @if(auth()->user()->is_patient)
              <span><a class="btn btn-danger pull-right" href="{{route('client.new.appeal')}}">Make Blood Appeal</a></span>
              @endif
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-laptop"></i>Dashboard</li>
              </ol>
            </div>
          </div>

          <div class="flash-message">
            @if(\Session::has('message'))

            <p class="alert
            {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('message') }}</p>
            @endif
          </div> <!-- end .flash-message -->
            @if(auth()->user()->is_blood_bank)
            <h2 class="text-center">{{auth()->user()->name}} Blood Bags Count</h2>
            @endif
          <div class="row">
            
            <!--Only admins will see this-->
              @if(auth()->user()->is_admin)
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box blue-bg">
                    <i class="fa fa-cloud-download"></i>
                    <div class="count">{{$total_bb}}</div>
                    <div class="title">Total Blood Bags</div>
                  </div>
                  <!--/.info-box-->
                </div>
                <!--/.col-->
    
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box brown-bg">
                    <i class="fa fa-users"></i>
                  <div class="count">{{count($users)}}</div>
                    <div class="title">Users</div>
                  </div>
                  <!--/.info-box-->
                </div>
                <!--/.col-->
      
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box red-bg">
                    <i class="fa fa-users"></i>
                    <div class="count">{{count($patients)}}</div>
                    <div class="title">Total Patients</div>
                  </div>
                  <!--/.info-box-->
                </div> 
                <!--/.col-->

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box magenta-bg">
                    <i class="fa fa-users"></i>
                    <div class="count">{{count($donors)}}</div>
                    <div class="title">Total Donors</div>
                  </div>
                  <!--/.info-box-->
                </div> 
                <!--/.col-->

                
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box brown-bg">
                    <i class="fa fa-university"></i>
                    <div class="count">{{count($blood_banks)}}</div>
                    <div class="title">Total Blood Banks</div>
                  </div>
                  <!--/.info-box-->
                </div> 
                <!--/.col-->
      
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box green-bg">
                    <i class="fa fa-users"></i>
                    <div class="count">{{count($admins)}}</div>
                    <div class="title">Total Admins</div>
                  </div>
                  <!--/.info-box-->
                </div> 
                <!--/.col-->

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box pink-bg">
                    <i class="fa fa-users"></i>
                    <div class="count">{{count($patient_appeals)}}</div>
                    <div class="title">Total Patient Appeals</div>
                  </div>
                  <!--/.info-box-->
                </div> 
                <!--/.col-->

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box yellow-bg">
                    <i class="fa fa-users"></i>
                    <div class="count">{{count($blood_appeals)}}</div>
                    <div class="title">Total Blood Bank Appeals</div>
                  </div>
                  <!--/.info-box-->
                </div> 
                <!--/.col-->
{{-- 
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box yellow-bg">
                    <i class="fa fa-users"></i>
                    <div class="count">{{count(auth()->user()->notifications)}}</div>
                    <div class="title">Total Notifications</div>
                  </div>
                  <!--/.info-box-->
                </div> 
                <!--/.col--> --}}


                
    {{-- <div id="edit-profile" class="tab-pane">
      <section class="panel">
        <div class="panel-body bio-graph-info">

          <h1>Donors List in {{$subcounty}} Sub-county</h1>
     
         
        </div>
      </section>
</div> --}}

<section class="wrapper">
<div id="edit-profile" class="tab-pane">
  <section class="panel">
    <div class="panel-body bio-graph-info">

      <h1>Sum of blood bags in all Blood Banks per Blood Group)</h1>
 
      @if($data)
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box green-bg">
          <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
          <div class="count">{{$data['A_plus']}}</div>
          <div class="title">A+</div>
        </div>
        <!--/.info-box-->
      </div> 
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box dark-bg">
           <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
          <div class="count">{{$data['A_minus']}}</div>
          <div class="title">A-</div>
        </div>
        <!--/.info-box-->
      </div> 
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box red-bg">
           <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
          <div class="count">{{$data['B_plus']}}</div>
          <div class="title">B+</div>
        </div>
        <!--/.info-box-->
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box blue-bg">
           <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
          <div class="count">{{$data['B_minus']}}</div>
          <div class="title">B-</div>
        </div>
        <!--/.info-box-->
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box teal-bg">
           <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
          <div class="count">{{$data['AB_plus']}}</div>
          <div class="title">AB+</div>
        </div>
        <!--/.info-box-->
      </div> 

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box magenta-bg">
           <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
          <div class="count">{{$data['AB_minus']}}</div>
          <div class="title">AB-</div>
        </div>
        <!--/.info-box-->
      </div> 
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box brown-bg">
           <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
          <div class="count">{{$data['O_plus']}}</div>
          <div class="title">O+</div>
        </div>
        <!--/.info-box-->
      </div> 

      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box purple-bg">
          <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
          <div class="count">{{$data['O_minus']}}</div>
          <div class="title">O-</div>
        </div>
        <!--/.info-box-->
      </div> 
      
      @endif
    </div>
  </section>
</div>
</section>



             
              @endif









               <!--Only Blood Banks will see this-->
              @if (auth()->user()->is_blood_bank)
              
                @if($blood_bank)
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box green-bg">
                    <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
                    <div class="count">{{$blood_bank->A_plus}}</div>
                    <div class="title">A+</div>
                  </div>
                  <!--/.info-box-->
                </div> 
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box dark-bg">
                     <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
                    <div class="count">{{$blood_bank->A_minus}}</div>
                    <div class="title">A-</div>
                  </div>
                  <!--/.info-box-->
                </div> 
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box red-bg">
                     <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
                    <div class="count">{{$blood_bank->B_plus}}</div>
                    <div class="title">B+</div>
                  </div>
                  <!--/.info-box-->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box blue-bg">
                     <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
                    <div class="count">{{$blood_bank->B_minus}}</div>
                    <div class="title">B-</div>
                  </div>
                  <!--/.info-box-->
                </div>
  
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box teal-bg">
                     <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
                    <div class="count">{{$blood_bank->AB_plus}}</div>
                    <div class="title">AB+</div>
                  </div>
                  <!--/.info-box-->
                </div> 
  
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box magenta-bg">
                     <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
                    <div class="count">{{$blood_bank->AB_minus}}</div>
                    <div class="title">AB-</div>
                  </div>
                  <!--/.info-box-->
                </div> 
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box brown-bg">
                     <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
                    <div class="count">{{$blood_bank->O_plus}}</div>
                    <div class="title">O+</div>
                  </div>
                  <!--/.info-box-->
                </div> 
  
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box purple-bg">
                    <v-icon x-large style="color: #fff">mdi-blood-bag</v-icon>
                    <div class="count">{{$blood_bank->O_minus}}</div>
                    <div class="title">O-</div>
                  </div>
                  <!--/.info-box-->
                </div> 
                @endif
              @endif
               
















                <!--Only Patients will see this-->
                @if (auth()->user()->is_patient)

                <div class="row">

                  <div class="col-lg-12 col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h2><i class="fa fa-flag-o red"></i><strong>My blood appeals</strong></h2>
                        <div class="panel-actions">
                          <a href="/dashboard/home" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                          <a href="/dashboard/home" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                          <a href="/dashboard/home" class="btn-close"><i class="fa fa-times"></i></a>
                        </div>
                      </div>
                      <div class="panel-body">
                        <v-simple-table dense>
                          <template v-slot:default>
                            <thead>
                              <tr>
                                <th>User</th>
                                <th>Time Sent</th>
                                <th>Blood Group</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                             
      
                              @if (count($logedInUserAppeals)> 0)
                                  @foreach ($logedInUserAppeals as $appeal)
                                  <tr>
                                      <td>{{$appeal->user->name}}</td>
                                      <td>{{$appeal->created_at->diffForHumans()}}</td>
                                      <td>{{$appeal->user->blood_type}}</td>
                                      @if(!$appeal->status)
                                      <td><a href="#" class="btn btn-danger">Pending</a></td>
                                      @else
                                      <td><a href="#" class="btn btn-success">Sorted</a></td>
                                      @endif
                                      {{-- <td><a href="#" class="btn btn-success">Help</a></td> --}}
                                     
                                    </tr>
                                  @endforeach
                              @else
                                    <p>You have not made blood appeals yet</p>
                              @endif
                            </tbody>
                          </template>
                        </v-simple-table>
                      </div>
        
                    </div>
        
                  </div>
                  
                  </div>
                  <!--/col-->
        
                </div>

        
                @endif
  
          </div>
  


        </section>


      </section>
      <!--main content end-->
@endsection