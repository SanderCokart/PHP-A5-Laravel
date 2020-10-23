<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @import "app.css";
    @import "app.js";
</head>
<body style = "background-color: #1b4b72">
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: skyblue">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="col justify-content-center">
                    <div class="card-body" style="display:grid; ">
                        @foreach($bands as $band)
                            <div class="card" style ="margin: 10px; width:80%;">
                                <div class="card-header">{{$band->name}}</div>
                                <div class="card-body">{{$band->bandBio->bio}}</div>
                            </div>
                        @endforeach
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
    </body>
</html>
