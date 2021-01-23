@extends('layouts.dashboard')

@section('content')
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">

              <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
              <span><a class="btn btn-success pull-right" href="{{route('users.report')}}">Export to PDF</a></span>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                <li><i class="fa fa-users"></i>Users</li>
              </ol>
            </div>
          </div>

          <div class="row">

            <div class="col-lg-12 col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2><i class="fa fa-flag-o red"></i><strong>Registered Users</strong></h2>
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
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Blood Group</th>
                          <th>User Type</th>
                          <th>View</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                       

                        @if (count($users)> 0)
                            @foreach ($users as $user)
                            <tr>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->phone}}</td>
                              <td>{{$user->address}}</td>
                              <td>{{$user->blood_type}}</td>
                              @if($user->is_patient)
                              <td>Patient</td>
                              @endif
                              @if($user->is_donor)
                              <td>Donor</td>
                              @endif
                              @if($user->is_blood_bank)
                              <td>Blood Bank</td>
                              @endif

                              @if(!$user->is_blood_bank && !$user->is_patient&& !$user->is_donor)
                              <td>---</td>
                              @endif
                              
                                <td><a href="{{route('user.profile', $user->id)}}"><v-icon>mdi-eye</v-icon></a></td>
                                <td><a href="#"><v-icon>mdi-account-edit</v-icon></a></td>
                                <td><a href="#" class="text-danger"><v-icon>mdi-delete-forever</v-icon></td>
                               
                              </tr>
                            @endforeach
                        @endif
                      </tbody>
                    </template>
                  </v-simple-table>
                  {{ $users->links() }}
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