@extends('layouts.dashboard')

@section('content')
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">

              <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
              <span><a class="btn btn-success pull-right" href="{{route('donations.pdf')}}">Download PDF</a></span>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                <li><i class="fa fa-users"></i>Donations</li>
                
              </ol>
            </div>
          </div>

          <div class="row">

            <div class="col-lg-12 col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><i class="fa fa-flag-o red"></i><strong>Blood Donations</strong></h2>
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
                          <th>Donor</th>
                          <th>Status</th>
                          <th>Blood Group</th>
                          <th>QR Code</th>
                          <th>Action</th>
        
                        </tr>
                      </thead>
                      <tbody>
                       

                        @if (count($donations)> 0)
                            @foreach ($donations as $donation)
                            <tr>
                                <td>{{App\Models\User::where('id', $donation->donor_id)->first()->name}}</td>
                                
                                @if (!$donation->status)
                                <td class="text-success">Not yet transfulsed</td>  
                                @else
                                <td class="text-danger">Already transfulsed</td>  
                                @endif
                                <td>{{$donation->blood_type}}</td>
                                <td><img height="100" width="100" src="{{asset('storage/qrcodes/'.$donation->qr_code)}}" alt=""></td>
                                <td><a href="{{route('qrcode.download', $donation->id)}}" class="btn btn-success">Download QRcode</a></td>
                                
                              </tr>
                            @endforeach
                        @endif
                      </tbody>
                    </template>
                  </v-simple-table>
                  {{ $donations->links() }}
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