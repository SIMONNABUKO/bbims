
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
      @if(count($blood_banks) > 0)
      <a class="pull-right btn btn-success" href="{{route('banks.list.report',$subcounty)}}"> Export to PDF</a>
      @endif
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
            <li><i class="fa fa-plus"></i>Blood Banks List</li>
        <li><i class="fa fa-user-md"></i></li>
        </ol>
        </div>
    </div>

    <div id="edit-profile" class="tab-pane">
        <section class="panel">
          <div class="panel-body bio-graph-info">

            <h1>Blood Banks List in {{$subcounty}} Sub-county</h1>
            <v-simple-table dense>
                <template v-slot:default>
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Sub-county</th>
                      <th>Email</th>
                      <th>Address</th>
                    </tr>
                  </thead>
                  <tbody>
                   

                    @if (count($blood_banks)> 0)
                        @foreach ($blood_banks as $blood_bank)
                        <tr>
                          <td>{{$blood_bank->name}}</td>
                          <td>{{$blood_bank->email}}</td>
                          <td>{{$blood_bank->subcounty}}</td>
                          <td>{{$blood_bank->address}}</td>
                         
                          </tr>
                        @endforeach
                    @else
                          <p>No Blood banks found in {{$subcounty}} Sub-county</p>
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
  