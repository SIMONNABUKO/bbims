@extends('layouts.client')

@section('content')
  <div class=" mt-5 mb-5">
   <div class="row">
   <div class="col-lg-10 offset-lg-1">
        <form action="{{ route('register') }}" method="post">
          @csrf
        <div class="form-row">
          <div class="col-md-6 form-group">
            <label for="name">Your Name</label>
            <input type="text" name="name" class="form-control"  />
          
          </div>
          <div class="col-md-6 form-row">
            <label for="email">Your Email</label>
            <input type="email" class="form-control" name="email"  />
          
          </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="name">Your Phone Number</label>
              <input type="text" name="phone" class="form-control" />
            
            </div>
            <div class="col-md-6 form-group">
              <label for="email">Your Address</label>
              <input type="text" class="form-control" name="address"/>
            
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
                <label for="email">Your Gender</label>
             <select name="gender" id="" class="form-control">
                 <option value="male">Male</option>
                 <option value="female">Female</option>
             </select>
            </div>
            <div class="col-md-6 form-group">
              <label for="email">Your Date of Birth</label>
              <input type="text" class="form-control" name="dob"/>
            
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="name">Your Blood Group</label>
              <input type="text" name="blood_type" class="form-control" />
            
            </div>
            <div class="col-md-6 form-group">
              <label for="email">Your sub-county</label>
              <select name="subcounty" id="" class="form-control">
                @if (count($subcounties) > 0)
                    @foreach ($subcounties as $item)
                    <option value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                @endif
            </select>
            </div>
          </div>
          <div class="form-group col-md-6 ">
              <label for="password">Your Password</label>
              <input type="password" class="form-control" name="password">
              <input type="number" class="form-control" name="is_donor" value="1" hidden>
          </div>
       
        <div class="text-center"><button class="btn btn-success" type="submit">Register as Donor</button></div>
{{-- 
        <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div> --}}
      </form>
   </div>
   </div>
  </div>

     
@endsection