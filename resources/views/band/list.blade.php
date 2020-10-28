@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header lead font-weight-bold">
                Band List
            </div>
            <div class="card-body">
                <div class="list-group">
                    @foreach($bands as $band)
                        <a href="{{route('band.show', $band->id)}}"
                           class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5>{{ $band->name }}</h5>
                                <small>Founded on: {{ substr($band->created_at,0,11) }}</small>
                            </div>
                            @if($band->bandBio->bio)
                                <hr class="my-1">
                                <p class="custom-text-overflow lines-3">{{ $band->bandBio->bio }}</p>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
