@extends('layouts.dashboard')

@section('content')
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">

              <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                <li><i class="fa fa-users"></i>Notifications</li>
              </ol>
            </div>
          </div>

          <div class="row">

            <div class="col-lg-12 col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2><i class="fa fa-flag-o red"></i><strong>My Notifications</strong></h2>
                  <div class="panel-actions">
                    <a href="/dashboard/home" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                    <a href="/dashboard/home" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="/dashboard/home" class="btn-close"><i class="fa fa-times"></i></a>
                  </div>
                </div>
                <div class="panel-body">
                  @if (session()->has('errors'))
                  @foreach ($errors as $error)
                      {{$error}}
                  @endforeach
              @endif
            @if(\Session::has('message'))
          
            <p class="alert
            {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('message') }}</p>
            
            @endif
                  <v-simple-table dense>
                    <template v-slot:default>
                      <thead>
                        <tr>
                          <th>Type</th>
                          <th>Description</th>
                          <th>Mark as Read</th>
                          @if(auth()->user()->is_blood_bank)
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                       

                        @if (count($appeals)> 0 ||count($blood_appeals)> 0 ||count($reminders)> 0 ||count($lb_notis)||count($overstayed))
                            @foreach ($appeals as $notice)
                            <tr>
                                <td>{{$notice->data['appeal_type']}}</td>
                                @if ($notice->data['appeal_type'] == "need_blood")
                                <td>A patient in urgent need of blood</td>
                                @endif
                                
                                <td><a class="btn btn-success" href="{{route('notification.read', $notice->id)}}">Mark as Read</a></td>
                               
                              </tr>
                            @endforeach
                              @if( count($blood_appeals)> 0)
                                @foreach ($blood_appeals as $notice)
                                  <tr>
                                      <td>{{$notice->data['appeal_type']}}</td>
                                      @if ($notice->data['appeal_type'] == "bank_need_blood")
                                      <td>Blood Bank in urgent need of blood</td>
                                      @endif
                                      
                                      <td><a class="btn btn-success" href="{{route('notification.read', $notice->id)}}">Mark as Read</a></td>
                                      @if(auth()->user()->is_blood_bank)
                                      <td><a class="btn btn-success" href="{{route('bank.blood.transfer', $notice->data['appeal_user'])}}">Transfer Blood</a></td>
                                      @endif
                                    </tr>
                                  @endforeach
                              @endif


                              <!-- Blood overstayed notification -->

                              @if( count($overstayed)> 0)
                                @foreach ($overstayed as $notice)
                                  @if(auth()->user()->is_admin)
                                    <tr>
                                        <td>{{$notice->data['appeal_type']}}</td>
                                      
                                        <td>{{$notice->data['message']}}</td>
                                        <td><a class="btn btn-success" href="{{route('notification.read', $notice->id)}}">Mark as Read</a></td>
                                          <td></td>
                                      </tr>
                                  @endif
                                @endforeach
                              @endif

                              <!-- End of blood overstayed notification -->

                              @if( count($reminders)> 0)
                              @foreach ($reminders as $notice)
                                <tr>
                                    <td>{{$notice->data['appeal_type']}}</td>
                                    
                                    <td>{{$notice->data['message']}}</td>
                                   
                                    
                                    <td><a class="btn btn-success" href="{{route('notification.read', $notice->id)}}">Mark as Read</a></td>
                                    @if(auth()->user()->is_blood_bank)
                                    <td><a class="btn btn-success" href="{{route('bank.blood.transfer', $notice->data['appeal_user'])}}">Transfer Blood</a></td>
                                    @endif
                                  </tr>
                                @endforeach
                            @endif


                            @if( count($lb_notis)> 0)
                              @foreach ($lb_notis as $notice)
                              
                               @if(auth()->user()->is_blood_bank)
                               <tr>
                                <td>{{$notice->data['appeal_type']}}</td>
                                
                                <td>{{$notice->data['message']}}</td>
                               
                                
                                <td><a class="btn btn-success" href="{{route('notification.read', $notice->id)}}">Mark as Read</a></td>
                                
                                <td><a class="btn btn-success" href="{{route('bank.appeal.form')}}">Make Appeal</a></td>
                               
                              </tr>

                               @endif
                                  
                                @endforeach
                            @endif

                            
                        @else
                              <p>You have 0 unread notifications</p>
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
  


        </section>


      </section>
      <!--main content end-->
@endsection