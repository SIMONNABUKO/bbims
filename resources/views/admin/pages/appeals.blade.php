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
                          <th>User</th>
                          <th>Time Sent</th>
                          <th>Blood Group</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       

                        @if (count($appeals)> 0)
                            @foreach ($appeals as $appeal)
                            <tr>
                                <td>{{$appeal->user->name}}</td>
                                <td>{{$appeal->created_at->diffForHumans()}}</td>
                                <td>{{$appeal->user->blood_type}}</td>
                                @if(!$appeal->status)
                                <td><a href="#" class="btn btn-danger">Pending</a></td>
                                @else
                                <td><a href="#" class="btn btn-success">Sorted</a></td>
                                @endif
                                <td><a href="#" class="btn btn-success">Help</a></td>
                               
                              </tr>
                            @endforeach
                        @endif
                      </tbody>
                    </template>
                  </v-simple-table>
                  {{ $appeals->links() }}
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