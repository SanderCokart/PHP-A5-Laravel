{{--THIS IS THE USER'S DASHBOARD--}}
@extends('layouts.app')
@section('content')
    <div class="container">
        {{--GREETING START--}}
        <div class="jumbotron mb-0">
            <h2 class="font-weight-bold">Welcome
                <div class="text-capitalize d-inline">{{auth()->user()->name}}!</div>
            </h2>
            <p class="lead">It is {{date('l \t\h\e d-M-Y')}}, We hope you are having a wonderful day!</p>
            <hr class="mb-4">
            <p>Take a look below to see all the bands you manage!</p>
            <div class="d-flex justify-content-end">
                <a class="btn btn-info btn-sm" href="{{ route('users.edit', auth()->user()->id) }}">
                    Edit Profile
                </a>
            </div>
        </div>
        {{--GREETING END--}}


        {{--BAND COLLECTION START--}}
        <div class="py-5">
            <div class="card">

                {{--CARD HEADER START--}}
                <div class="card-header lead font-weight-bold d-flex justify-content-between align-items-end">
                    <div>Bands under your management</div>
                    <div><a href="{{ route('bands.create') }}" class="btn btn-success btn-sm">Create Band</a></div>
                </div>
                {{--CARD HEADER END--}}
                {{--CARD BODY START--}}
                <div class="card-body">
                    {{--ONLY SHOW THIS ELEMENT IF THE USER HAS BANDS UNDER IT'S MODERATION OR OWNERSHIP--}}
                    @if(count(auth()->user()->bands) > 0 || count(auth()->user()->moderator->bands) > 0)
                        <div class="row">
                            {{--START LOOP OWNED BANDS--}}
                            @foreach(auth()->user()->bands as $band)
                                <div class="col-12 col-lg-6 col-xl-4 pb-2">
                                    <a href="{{ route('bands.show', $band->id) }}">
                                        <div class="position-relative border border-dark rounded">
                                            <img class="w-100 rounded" src="{{ $band->bandBio->image() }}"
                                                 alt="Band banner image">
                                            <h6 class="bg-dark-transparent w-100 m-0 text-light text-center text-capitalize font-weight-bold font-italic"
                                                style="position:absolute; bottom:0; left:0;">{{ $band->name }}</h6>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            {{--END LOOP OWNED BANDS--}}
                            {{--START LOOP MODERATED BANDS--}}
                            @foreach(auth()->user()->moderator->bands as $band)
                                <div class="col-12 col-lg-6 col-xl-4 pb-2">
                                    <a href="{{ route('bands.show', $band->id) }}">
                                        <div class="position-relative border border-dark rounded">
                                            <img class="w-100 rounded" src="{{ $band->bandBio->image() }}" alt="">
                                            <h6 class="bg-dark-transparent w-100 m-0 text-light text-center text-capitalize font-weight-bold font-italic"
                                                style="position:absolute; bottom:0; left:0;">{{ $band->name }}</h6>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            {{--END LOOP MODERATED BANDS--}}
                        </div>
                    @else
                        {{--IF THERE ARE NO BANDS OWNED OR MODERATED; SHOW THIS MESSAGE--}}
                        <p class="text-center">You have no bands under your management!</p>
                    @endif
                </div>
                {{--CARD BODY END--}}
            </div>
        </div>
        {{--BAND COLLECTION END--}}
    </div>
@endsection
