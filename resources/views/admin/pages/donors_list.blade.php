
<?php
use Illuminate\Support\Facades\Session;

?>
@extends('layouts.dashboard')

@section('content')

         
            
<section id="main-content">
    <section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-user-md"></i>Reports</h3>
      @if(count($donors) > 0)
      <a class="pull-right btn btn-success" href="{{route('donors.list.report',$subcounty)}}"> Export to PDF</a>
      @endif
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
            <li><i class="fa fa-plus"></i>Donors List</li>
        <li><i class="fa fa-user-md"></i></li>
        </ol>
        </div>
    </div>

    <div id="edit-profile" class="tab-pane">
        <section class="panel">
          <div class="panel-body bio-graph-info">

            <h1>Donors List in {{$subcounty}} Sub-county</h1>
            <v-simple-table dense>
                <template v-slot:default>
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Sub-county</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Blood Group</th>
                    </tr>
                  </thead>
                  <tbody>
                   

                    @if (count($donors)> 0)
                        @foreach ($donors as $donor)
                        <tr>
                          <td>{{$donor->name}}</td>
                          <td>{{$donor->email}}</td>
                          <td>{{$donor->subcounty}}</td>
                          <td>{{$donor->address}}</td>
                          <td>{{$donor->phone}}</td>
                          <td>{{$donor->blood_type}}</td>
                         
                          </tr>
                        @endforeach
                    @else
                          <p>No Donors found in {{$subcounty}} Sub-county</p>
                    @endif
                  </tbody>
                </template>
              </v-simple-table>
           
          </div>
        </section>
  </div>


          </section>
        </section>
        <!--main content end-->
        
  @endsection
  