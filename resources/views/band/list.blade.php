@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header lead font-weight-bold d-flex justify-content-between align-items-baseline">
                <div>Band List</div>
                <div>
                    <form action="{{ route('band.index') }}" method="get">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input class="form-control" type="search" placeholder="Search" name="search"
                                   value="{{ $search }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="list-group">
                    @foreach($bands as $band)
                        <a href="{{route('band.show', $band->id)}}"
                           class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between align-items-baseline">
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
