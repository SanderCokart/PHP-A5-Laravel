@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron mb-0">
            <h2 class="font-weight-bold">Welcome
                <div class="text-capitalize d-inline">{{auth()->user()->name}}</div>
                !
            </h2>
            <p class="lead">It is {{date('l \t\h\e d-M-Y')}}, We hope you are having a wonderful day!</p>
            <hr class="mb-4">
            <p>Take a look below to see all the bands you manage!</p>
            <div class="d-flex justify-content-end">
                <a class="btn btn-info btn-sm" href="{{ route('user.edit', auth()->user()->id) }}">
                    Edit Profile
                </a>
            </div>

        </div>


        <div class="py-5">
            <div class="card">
                <div class="card-header lead font-weight-bold d-flex justify-content-between align-items-end">
                    <div>Bands under your management</div>
                    <div><a href="{{ route('band.create') }}" class="btn btn-success btn-sm">Create Band</a></div>
                </div>
                <div class="card-body">
                    @if(count(auth()->user()->bands) > 0)
                        <div class="row">
                            @foreach(auth()->user()->bands as $band)
                                <div class="col-12 col-lg-6 col-xl-4 pb-2">
                                    <a href="{{ route('band.show', $band->id) }}">
                                        <div class="position-relative border border-dark rounded">
                                            <img class="w-100 rounded" src="{{ $band->bandBio->image() }}" alt="">
                                            <h6 class="bg-dark-transparent w-100 m-0 text-light text-center text-capitalize font-weight-bold font-italic"
                                                style="position:absolute; bottom:0; left:0;">{{ $band->name }}</h6>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">You have no bands under your management!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
