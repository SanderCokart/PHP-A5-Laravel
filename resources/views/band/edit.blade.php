@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12 col-lg-7">
                <form action="{{ route('band.update', $band->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <h1 class="text-capitalize">{{ $band->name }}</h1>
                    </div>
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

                    <div class="form-group row">
                        <label for="bio" class="col-md-4 col-form-label ">Bio</label>
                        <textarea id="bio"
                                  type="text"
                                  class="form-control @error('bio') is-invalid @enderror"
                                  name="bio"
                                  autocomplete="bio"
                                  autofocus>{{ old('bio') ?? $band->bandBio->bio }}</textarea>

                        @error('bio')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="link_1" class="col-md-4 col-form-label ">Link 1</label>


                        <input id="link_1"
                               type="text"
                               value="{{ old('link_1') ?? $band->bandBio->link_1}}"
                               class="form-control @error('link_1') is-invalid @enderror"
                               name="link_1"
                               autocomplete="link_1" autofocus>

                        @error('link_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="link_2" class="col-md-4 col-form-label ">Link 2</label>


                        <input id="link_2"
                               type="text"
                               value="{{ old('link_2') ?? $band->bandBio->link_2}}"
                               class="form-control @error('link_2') is-invalid @enderror"
                               name="link_2"
                               autocomplete="description" autofocus>

                        @error('link_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label ">Link 3</label>

                        <input id="link_3"
                               type="text"
                               value="{{ old('link_3') ?? $band->bandBio->link_3}}"
                               class="form-control @error('link_3') is-invalid @enderror"
                               name="link_3"

                               autocomplete="link_3" autofocus>

                        @error('link_3')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

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
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

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
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class=" form-group row">
                        <label for="image" class="col-md-4 col-form-label ">Profile Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        @error('image')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Save Profile</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-4 offset-0 offset-lg-1">
                <div class="row">
                    <h1>Moderators</h1>
                </div>
                <form action="">
                    @csrf
                    @method('PATCH')

                    <div class="form-group row">
                        <label for="moderator" class="col-md-12 col-form-label">Invite moderator</label>
                        <input type="text" id="moderator" class="form-control @error('name') is-invalid @enderror"
                               name="moderator" autocomplete="moderator" required type="email"
                               placeholder="username@email.com"
                               value="{{ old('moderator') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
