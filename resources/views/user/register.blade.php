@extends('layouts.app')
@section('content')
<title>Register User</title>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div>
                <h1 style="text-align: center">Register User</h1>
            <div>
            <br>
            <body>
                <form method="post" action="/registeruser">
                @csrf     
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </body>
        </div>
    </div>
</div>
@endsection