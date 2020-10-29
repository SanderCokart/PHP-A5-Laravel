@extends('layouts.app')
@section('content')
    <div class="jumbotron position-relative rounded-0 mb-0 position-relative"
         style="background-image: url(https://picsum.photos/id/{{rand(1,100)}}/1000/500); background-position: center; background-size: cover">
        <h1 style="color: {{$band->bandBio->text_color}}">{{$band->name}}</h1>
        <p style="color: {{$band->bandBio->text_color}}" class="lead">{{$band->bandBio->bio}}</p>
        {{--        TODO policy--}}
        <a href="{{ route('band.edit', $band->id) }}">
            <button class="btn position-absolute"
                    style="top:20px;right: 20px;background-color: {{ $band->bandBio->bg_color ? $band->bandBio->bg_color : '#ddd' }}; color: {{ $band->bandBio->text_color }}">
                Edit Band
            </button>
        </a>
    </div>
    <div class="card-header rounded-0"
         style="background-color:{{ $band->bandBio->bg_color ? $band->bandBio->bg_color : '#ddd' }};color:{{ $band->bandBio->text_color }}">
        <div>Video's</div>
    </div>
    <div style="display: grid; grid-template-columns: 100px 1fr 1fr 1fr 100px; grid-gap: 10px;" class="pt-5">

        <div class="card flex-grow-1" style="grid-column-start: 2">
            <div class="card-body"
                 style="background-color: {{ $band->bandBio->bg_color ? $band->bandBio->bg_color : '#ddd' }}">
                <iframe width="100%" height="400px" src="https://www.youtube.com/embed/ImtZ5yENzgE" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>
        <div class="card flex-grow-1">
            <div class="card-body"
                 style="background-color: {{ $band->bandBio->bg_color ? $band->bandBio->bg_color : '#ddd' }}">
                <iframe width="100%" height="400px" src="https://www.youtube.com/embed/ImtZ5yENzgE" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>
        <div class="card flex-grow-1">
            <div class="card-body"
                 style="background-color: {{ $band->bandBio->bg_color ? $band->bandBio->bg_color : '#ddd' }}">
                <iframe width="100%" height="400px" src="https://www.youtube.com/embed/ImtZ5yENzgE" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection
