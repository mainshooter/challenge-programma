@extends('layout')

@section('content')

{{-- <style type="text/css">
    .box{
     width:600px;
     margin:0 auto;
     border:1px solid #ccc;
    }
   </style>
<h1>Inloggen</h1>
<div class="container box">

<form method="post" action="">
<div class="form-group">
    <label>Enter Email</label>
    <input type="email" name="email" class="form-control" />
</div>
<div class="form-group">
    <label>Enter Password</label>
    <input type="password" name="password" class="form-control" />
</div>
<div class="form-group">
    <input type="submit" name="login" class="btn btn-primary" value="Login" />
</div>
</form>
</div> --}}

<div class="row">
    <div class="col">
        <h1>Inloggen</h1>
        </div>
        <div class="w-50"></div>

        <div class="col">  
        <form>
            <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


@endsection
