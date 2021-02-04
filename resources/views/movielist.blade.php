@extends('layouts.app')
@section('content')  
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div style="text-align: center;">
                <h2 style="text-decoration: underline;">List of Movies</h2>
            </div>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <td>Title</td>
                        <td>ImdbID</td>
                        <td>Type</td>
                        <td>Year of release</td>
                        <td>Save</td>
                    </tr>
                </thead>
                <tbody>
                @if($movies) 
                @foreach ($movies['Search'] as $k=>$v)
                        <tr>
                            <td>{{ $v['Title'] }}</td>
                            <td>{{ $v['imdbID'] }}</td>
                            <td>{{ $v['Type'] }}</td>
                            <td>{{ $v['Year'] }}</td>
                            <td>
                                <a href="favmark/{{ $v['imdbID'] }}" class="btn btn-primary">Favourite</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection