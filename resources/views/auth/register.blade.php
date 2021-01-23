<?php
$subcounties = App\Models\SubCounty::all();

?>

@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-row">
                           
                            <div class="col-md-12 form-group">
                              <label for="email">Registering as:</label>
                              <select name="identity" id="" class="form-control">
                                <option value="1">Patient</option>
                                <option value="2">Donor</option>
                              
                            </select>
                            </div>
                          </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                              <label for="name">Your Name</label>
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            
                            </div>
                            <div class="col-md-6 form-group">
                              <label for="email">Your Email Address</label>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
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

                          <div class="form-row">
                            <div class="col-md-6 form-group">
                              <label for="name">Your Password</label>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                              <label for="password-confirm">Confirm Password</label>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                          </div>
                    


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
