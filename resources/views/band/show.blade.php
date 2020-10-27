@extends('layouts.app')
@section('content')

    <div>
        {{--        BIOGRAPHY START--}}
        <div class="d-flex flex-column flex-md-row w-100"
             style="background-color: {{ $band->bandBio->bg_color ?? '#333' }};">

            <div class="w-100 ">
                <img class="h-100 w-100" src="{{$band->bandBio->image}}" alt="Band Banner"
                     style="object-fit: cover; object-position: top left">
            </div>


            <div class="w-100">
                <div class="d-flex flex-column p-5">

                    <div class="d-flex justify-content-between align-items-baseline">
                        <div><h2 style="color: {{$band->bandBio->text_color ?? '#eee'}}">{{ $band->name }}</h2></div>
                        <div>
                            <a class="badge px-3 badge-warning text-dark"
                               href="{{route('band.edit', $band->id)}}">
                                Edit
                            </a>
                        </div>
                    </div>


                    <hr class="w-100" style="background-color: {{$band->bandBio->text_color ?? '#eee'}}">


                    <div>
                        <p class=""
                           style="color: {{$band->bandBio->text_color ?? '#eee'}}">{{$band->bandBio->bio}}</p>
                    </div>
                </div>
            </div>

        </div>
        {{--        BIOGRAPHY END--}}


        @if($band->bandBio->link_1 || $band->bandBio->link_2 || $band->bandBio->link_3)
            {{--        VIDEOS START--}}
            <div>
                {{--            HEADER START--}}

                <div class="card-header rounded-0 font-weight-bold"
                     style="background-color: {{ $band->bandBio->bg_color }}; color: {{ $band->bandBio->text_color }}">
                    Videos
                </div>

                {{--            HEADER END--}}

                {{--            LINKS START--}}
                {{--            LINK 1--}}
                @if($band->bandBio->link_1)
                    <div style="display: grid; grid-template-columns: 100px 1fr 1fr 1fr 100px; grid-gap: 10px;"
                         class="pt-5">
                        <div class="card flex-grow-1" style="grid-column-start: 2">
                            <div class="card-body"
                                 style="background-color: {{ $band->bandBio->bg_color ? $band->bandBio->bg_color : '#ddd' }}">
                                <iframe width="100%" height="400px"
                                        src="{{$band->bandBio->link_1 ? $band->bandBio->link_1 : ''}}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                            </div>
                        </div>
                        @endif
                        {{--                LINK 2--}}
                        @if($band->bandBio->link_2)
                            <div class="card flex-grow-1">
                                <div class="card-body"
                                     style="background-color: {{ $band->bandBio->bg_color ? $band->bandBio->bg_color : '#ddd' }}">
                                    <iframe width="100%" height="400px"
                                            src="{{$band->bandBio->link_2 ? $band->bandBio->link_2 : ''}}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                </div>
                            </div>
                        @endif
                        {{--                LINK 3--}}
                        @if($band->bandBio->link_3)
                            <div class="card flex-grow-1">
                                <div class="card-body"
                                     style="background-color: {{ $band->bandBio->bg_color ? $band->bandBio->bg_color : '#ddd' }}">
                                    <iframe width="100%" height="400px"
                                            src="{{$band->bandBio->link_3 ? $band->bandBio->link_3 : ''}}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                </div>
                            </div>
                        @endif
                    </div>
                    {{--            LINKS END--}}
            </div>
            {{--        VIDEOS END--}}
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="bioModel" tabindex="-1" role="dialog" aria-labelledby="bioModelLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bioModelLabel">Biography</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: {{ $band->bandBio->bg_color ?? '#333' }};">
                    <p style="color: {{$band->bandBio->text_color ?? '#eee'}}">{{$band->bandBio->bio}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
