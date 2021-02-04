@extends('layouts.app')
@section('content')  
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div style="text-align: center;">
                <h2 style="text-decoration: underline;">List User</h2>
            </div>
            <br>
            <table class="table">
                <thead>
                    <tr>
                    <td scope="col">Roll</td>
                    <td scope="col">Total</td>
                    </tr>
                </thead>
                <tbody>
                @if($users) 
                @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->total }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection