@extends('layouts.app')
@section('content')
    <div class="list-group">
        @foreach($bands as $band)
            <a href="{{route('band.show', $band->id)}}"
               class="list-group-item list-group-item-action flex-column align-items-start"
               style="background-color: {{ $band->bandBio->bg_color }}; color: {{$band->bandBio->text_color}}">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $band->name }}</h5>
                    <small>Founded on: {{ substr($band->created_at,0,11) }}</small>
                </div>
                @if($band->bandBio->bio)
                    <p>{{ $band->bandBio->bio }}</p>
                @endif
            </a>
        @endforeach
    </div>
@endsection
