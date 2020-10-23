@extends('layouts.app')
@section('content')
    <div class="jumbotron mb-0">
        <h1 class="display-2">Welcome {{auth()->user()->name}} !</h1>
        <p class="lead display-3">It is {{date('l \t\h\e d-M-Y')}}, We hope you are having a wonderful day!</p>
        <hr class="mb-4">
        <p class="lead">Take a look below to see all the bands you manage!</p>
    </div>


    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @if(count(auth()->user()->bands) === 0)
                <h2 class="text-center">You have no bands in your management.</h2>
            @else
                @foreach(auth()->user()->bands as $band)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <h2 class="position-absolute text-center text-light mt-5 text-capitalize font-weight-bold display-4"
                            style="left:0; right: 0;">{{$band->name}}</h2>
                        <img src="https://picsum.photos/id/{{rand(1,100)}}/1000/300" class="d-block w-100"
                             alt="Banner photo of {{$band->name}}.">
                        <button
                            class="btn btn-primary position-absolute custom-center w-25 h-25 font-weight-bold text-uppercase rounded-pill"
                            style="font-size: 2rem">More Info
                        </button>
                        <h2></h2>
                    </div>
                @endforeach
            @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 50px; height: 50px;"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="width: 50px; height: 50px;"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endsection
