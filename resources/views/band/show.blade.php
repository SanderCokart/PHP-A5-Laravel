@extends('layouts.app')
@section('content')
    <div style="background-color: {{ $band->bandBio->bg_color ?? '#333'}}">
        <div class="container">

            <div class="position-relative d-flex justify-content-center align-items-center pt-5">
                <img class="w-100 rounded img-thumbnail" src="{{ $band->bandBio->image() }}" alt="Band Banner">
            </div>

            <div class="py-5">
                <h1 class="text-center font-weight-bold text-light">{{ $band->name }}</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div id="biography"
                             class="card-header lead font-weight-bold d-flex justify-content-between align-items-baseline">
                            <div>Biography</div>
                            @can('update', $band)
                                <a href="{{ route('bands.edit', $band->id) }}"
                                   class="btn btn-sm btn-success px-4">Edit</a>
                            @endcan
                        </div>
                        <div class="card-body p-5">
                            <h5 class="card-title font-weight-bold">About us</h5>
                            <p class="card-text"
                               style="white-space:pre-wrap;color:{{ $band->bandBio->text_color ?? '#333' }}">{{ $band->bandBio->bio }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12"></div>
            </div>


            <div class="py-5">
                @if(count($band_links) > 0)
                    <div class="card">
                        <div class="card-header lead font-weight-bold">Related Videos</div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($band_links as $link)
                                    <div class="col-12 col-lg-4">
                                        <iframe width="100%" height="200" src="{{ $link }}" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
