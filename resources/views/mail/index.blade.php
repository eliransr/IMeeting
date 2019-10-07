@extends('layouts.app')

<div>
<a class="nav-link" href="{{ route('home') }}">DashBoard</a>
</form>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <h2><div class="card-header bg-primary text-white" style="text-align:center;"> Invitation Mail</div><br></h2>
                    <div class="card-body"> 
                        <form method="POST" action="{{url('send/email')}}">
                        @if(Session::has("Successfull"))
                                <div class="alert alert-success">
                                    <b>Successfull, your email sent.</b> <a class="nav-link" href="{{ route('home') }}">DashBoard</a>

                                </div>
                            @endif
                            @csrf
                            <div class="form-group row">
                                <label for="subject" class="col-sm-4 col-form-label text-md-left">Your Name is: </label>
                                <div class="col-md-6">
                                    <input id="subject" type="text" class="form-control{{$errors->has('subject') ? ' is-invalid' : '' }}" name="subject" value="{{ auth()->user()->name }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-left">To Email: </label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{$errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" required autofocus>
                                </div>
                            </div>

                           

                            <div class="form-group row">
                                <label for="message" class="col-sm-4 col-form-label text-md-left">Message: </label>
                                <div>
                                    <textarea class="form-control {{$errors->has('message') ? ' is-invalid' : '' }}" name="message" id="message" cols="100" rows="10">
{{ auth()->user()->name }} would like to invite you to our Meeting-App!
For the registration you will need to fill the organization number, yours is number: " {{ auth()->user()->organization_id }} ".

Link to login and register: http://matanch.myweb.jce.ac.il/Meeting/public/
</textarea>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary"> Send </button>
                                </div>

                            </div>
                        </div>

                        
                    </div>
                
            </div> 
        </div> 
    </div>
</div>
@include('layouts.footers.auth')















































<!-- 

<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
a:link, a:visited {
  background-color: #1a53ff;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style> -->