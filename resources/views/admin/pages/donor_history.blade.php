@extends('layouts.dashboard')

@section('content')
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">

              <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
              {{-- <span><a class="btn btn-success pull-right" href="{{route('donations.report')}}">Export to PDF</a></span> --}}
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                <li><i class="fa fa-donations"></i>Donation History</li>
              </ol>
            </div>
          </div>

          <div class="row">

            <div class="col-lg-12 col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2><i class="fa fa-flag-o red"></i><strong>My donation history</strong></h2>
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
                         
                          <th>My Blood Group</th>
                          <th>Donation Status</th>
                          <th>Donation Date</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                       

                        @if (count($donations)> 0)
                            @foreach ($donations as $donation)
                            <tr>
                              <td>{{$donation->blood_type}}</td>
                              @if($donation->status == 0)
                              <td>Not yet used</td>
                              @else
                              <td>Blood used</td>
                              @endif
                              <td>{{$donation->created_at->diffForHumans()}}</td>
                              </tr>
                            @endforeach
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