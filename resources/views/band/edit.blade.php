@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12 @can('addModerators', $band) col-lg-7 @endcan">

                {{--BAND EDIT FORM START--}}
                {{--ENCODING TYPE CHANGED TO ALLOW FOR IMAGES--}}
                <form action="{{ route('bands.update', $band->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PATCH')

                    {{--HEADER--}}
                    <div class="row">
                        <h1 class="text-capitalize">{{ $band->name }}</h1>
                    </div>

                    {{--BAND NAME--}}
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label ">Name</label>
                        <input id="name"
                               type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name"
                               required
                               value="{{ old('name') ?? $band->name }}"
                               autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{--BAND BIOGRAPHY--}}
                    <div class="form-group row">
                        <label for="bio" class="col-md-4 col-form-label ">Bio</label>
                        <textarea id="bio"
                                  type="text"
                                  class="form-control @error('bio') is-invalid @enderror"
                                  name="bio"
                                  autocomplete="bio"
                                  autofocus>{{ old('bio') ?? $band->bandBio->bio }}</textarea>

                        @error('bio')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{--LINK_1--}}
                    <div class="form-group row">
                        <label for="link_1" class="col-md-4 col-form-label ">Link 1</label>
                        <input id="link_1"
                               type="text"
                               value="{{ old('link_1') ?? $band->bandBio->link_1}}"
                               class="form-control @error('link_1') is-invalid @enderror"
                               name="link_1"
                               autocomplete="link_1" autofocus>

                        @error('link_1')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{--LINK_2--}}
                    <div class="form-group row">
                        <label for="link_2" class="col-md-4 col-form-label ">Link 2</label>
                        <input id="link_2"
                               type="text"
                               value="{{ old('link_2') ?? $band->bandBio->link_2}}"
                               class="form-control @error('link_2') is-invalid @enderror"
                               name="link_2"
                               autocomplete="description" autofocus>

                        @error('link_2')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{--LINK_3--}}
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label ">Link 3</label>

                        <input id="link_3"
                               type="text"
                               value="{{ old('link_3') ?? $band->bandBio->link_3}}"
                               class="form-control @error('link_3') is-invalid @enderror"
                               name="link_3"

                               autocomplete="link_3" autofocus>

                        @error('link_3')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{--BG_COLOR--}}
                    <div class="form-group row">
                        <label for="bg_color" class="col-md-4 col-form-label ">Background Color</label>
                        <div class="input-group">
                            <input id="bg_color"
                                   type="text"
                                   class="form-control @error('bg_color') is-invalid @enderror"
                                   name="bg_color"
                                   value="{{ old('bg_color') ?? $band->bandBio->bg_color}}"
                                   autocomplete="bg_color" autofocus>
                            <div class="input-group-append">
                                <div class="background-color-picker"></div>
                            </div>
                        </div>

                        @error('bg_color')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{--TEXT_COLOR--}}
                    <div class="form-group row">
                        <label for="text_color" class="col-md-4 col-form-label ">Text_color</label>
                        <div class="input-group">
                            <input id="text_color"
                                   type="text"
                                   class="form-control @error('text_color') is-invalid @enderror"
                                   name="text_color"
                                   value="{{ old('text_color') ?? $band->bandBio->text_color}}"
                                   autocomplete="text_color" autofocus>
                            <div class="input-group-append">
                                <div class="text-color-picker"></div>
                            </div>
                        </div>

                        @error('text_color')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{--BANNER IMAGE--}}
                    <div class=" form-group row">
                        <label for="image" class="col-md-4 col-form-label ">Band Banner Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        @error('image')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{--SUBMIT--}}
                    <div class="row pt-4">
                        <button class="btn btn-primary">Save Profile</button>
                    </div>

                </form>
                {{--BAND EDIT FORM END--}}

            </div>
            {{--SHOW ONLY IF THE USER CAN ADD MODERATORS, OWNER--}}
            @can('addModerators', $band)
                <div class="col-12 col-lg-4 offset-0 offset-lg-1">

                    {{--HEADER--}}
                    <div class="row">
                        <h1>Moderators</h1>
                    </div>

                    {{--BAND MODERATOR FORM--}}
                    <form method="POST" action="{{route('moderator.add', $band->id)}}">
                        @csrf

                        {{--USER EMAILS FIELD--}}
                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label">Invite moderator</label>
                            <input type="text" id="email" class="form-control @error('name') is-invalid @enderror"
                                   name="email" autocomplete="email" required type="email"
                                   placeholder="username@email.com"
                                   value="{{ old('email') }}">

                            @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{--SUBMIT--}}
                        <div class="row pt-2">
                            <button class="btn btn-primary" type="submit">invite</button>
                        </div>
                    </form>

                    {{--SHOW ONLY IF THE BAND HAS ANY MODERATORS--}}
                    @if(count($band->moderators) > 0)
                        <div class="row pt-3">

                            {{--CARD--}}
                            <div class="card  w-100">

                                {{--HEADER--}}
                                <div class="card-header">
                                    Active Moderators
                                </div>

                                {{--BODY--}}
                                <div class="card-body p-0">
                                    <ul class="list-group-flush p-0">

                                        {{--LIST OF MODERATOR EMAILS ASSIGNED TO THE BAND WITH A REMOVE BUTTON ON EACH--}}
                                        {{--LOOP AND SHOW ALL MODERATORS OF THE BAND--}}
                                        @foreach($band->moderators as $mod)
                                            <li class="list-group-item d-flex pb-0 justify-content-between">

                                                {{--MODERATOR EMAIL--}}
                                                <div>{{$mod->email}}</div>

                                                {{--REMOVE MODERATOR BUTTON--}}
                                                <form method="post"
                                                      action="{{route('moderator.remove',  [$band->id, $mod->id])}}">
                                                    @method('DELETE')
                                                    @csrf

                                                    {{--SUBMIT--}}
                                                    <button type="submit" class="text-danger btn btn-link p-0">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                {{--BODY END--}}
                            </div>
                            {{--CARD END--}}
                        </div>
                    @endif
                </div>
            @endcan
        </div>
    </div>
@endsection
