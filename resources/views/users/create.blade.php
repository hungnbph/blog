@extends('admin-layout.master')

@section('title', 'Edit student')

@section('ten', "Edit student ")
@section('content')

<form method="POST" action="{{route('users.store')}}" >
            @csrf
            <div class="row">
                <div class="col-lg-6 col-12 mx-auto">
                    <div class="statbox widget box box-shadow">
                        <div class="row">
                            <div class="col">
                            <div class="col-lg-6 col-12 mx-auto">
                    <div class="statbox widget box box-shadow">
                            <div class="form-group">
                            <label class="text-primary">name</label>
                            <input type="text" name="name" placeholder="name" class="form-control">
                                @if($errors->has('name'))
                                {{$errors->first('name')}}
                                @endif
                        </div>
                        </div>
                        </div>
                        <div class="col-lg-6 col-12 mx-auto">
                    <div class="statbox widget box box-shadow">
                        <div class="form-group">
                            <label class="text-primary">Email</label>
                            <input type="email" name="email" placeholder="Your email.." class="form-control">
                            @if($errors->has('email'))
                            {{$errors->first('email')}}
                            @endif
                        </div>
                        </div>
                        </div>
                        <div class="col-lg-6 col-12 mx-auto">
                    <div class="statbox widget box box-shadow">
                        <div class="form-group">
                            <label class="text-primary">Password</label>
                            <input type="password" name="password" placeholder="Your Password..." class="form-control">
                            @if($errors->has('password'))
                               {{$errors->first('password')}}
                             @endif
                        </div>
                        </div>
                        </div>
                        <div class="col-lg-6 col-12 mx-auto">
                    <div class="statbox widget box box-shadow">
                        <div class="form-group">
                            <label class="text-primary">Confirm Password</label>
                            <input type="password" name="confirm_password" placeholder="Confirm Your Password..." class="form-control">
                            @if($errors->has('confirm_password'))
                            {{$errors->first('confirm_password')}}
                            @endif
                        </div>
                    </div>
                </div>                       
                <div class="col-lg-6 col-12 mx-auto">
                    <div class="statbox widget box box-shadow">
                        <div class="form-group">
                            <label class="text-primary">Address</label>
                            <input type="text" name="address" placeholder="Your Address..." class="form-control">
                            @if($errors->has('address'))
                            {{$errors->first('address')}}
                            @endif
                        </div>
                        
                        </div>
                        <input type="submit" name="pass" class="mt-4 btn btn-primary text-right" value="Create">
                        <a href="#" class="mt-4 btn btn-danger text-right">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    
@endsection

