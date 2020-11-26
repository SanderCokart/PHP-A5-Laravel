@extends('layouts.app')
@section('content')
    <div class="container">

        {{--CARD--}}
        <div class="card">

            {{--HEADER--}}
            <div class="card-header lead font-weight-bold d-flex justify-content-between align-items-baseline">
                <div>Band List</div>

                {{--SEARCH--}}
                <div>
                    {{--SEARCH FORM--}}
                    <form action="{{ route('bands.index') }}" method="get">
                        <div class="d-flex flex-column">
                            @error('search')
                            <span class="invalid-feedback d-block" role="alert">
                                <small><small><strong>{{ $message }}</strong></small></small>
                            </span>
                            @enderror
                            <div class="input-group input-group-sm ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input class="form-control @error('search') is-invalid @enderror" type="search"
                                       placeholder="Search" name="search"
                                       value="{{ $search }}">
                                {{--SUBMIT--}}
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{--SEARCH END--}}
            </div>

            {{--HEADER END--}}
            <div class="card-body">
                <div class="list-group">
                    {{--IF THE BANDS VAR IS EMPTY--}}
                    @if(count($bands) === 0 && $search === null)
                        <h2 class="lead font-weight-bold text-center">There are no bands created yet.</h2>
                    @endif

                    @if(count($bands) === 0 && $search !== null)
                        <h2 class="lead font-weight-bold text-center">There are no bands found with the current search
                            term.</h2>
                    @endif
                    {{--END OF IFS'--}}

                    {{--LOOP THROUGH BANDS--}}
                    @foreach($bands as $band)
                        <a href="{{route('bands.show', $band->id)}}"
                           class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="row">
                                <div class="col-3">
                                    <img class="w-100" src="{{ $band->bandBio->image() }}" alt="">
                                </div>
                                <div class="col-9">
                                    <div class="d-flex w-100 justify-content-between align-items-baseline">
                                        <h5 class="flex-grow-1">{{ $band->name }}</h5>
                                        <small>Founded on: {{ substr($band->created_at,0,11) }}</small>
                                    </div>

                                    {{--SHOW ONLY IF BAND HAS A BIO--}}
                                    @if($band->bandBio->bio)
                                        <hr class="my-1">
                                        <p class="custom-text-overflow lines-2">{{ $band->bandBio->bio }}</p>
                                    @endif
                                </div>
                            </div>

                        </a>
                    @endforeach
                    {{--LOOP END--}}

                </div>
            </div>
        </div>
        {{--CARD END--}}
    </div>

@endsection
