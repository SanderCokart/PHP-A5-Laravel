@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('band.update', $band->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Edit Bands </h1>
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
                        <label for="description" class="col-md-4 col-form-label ">Bio</label>


                        <input id="bio"
                               type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="bio"
                               value="{{ old('bio') ?? $band->bandBio->bio }}"
                               autocomplete="description" autofocus>

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
                               class="form-control @error('name') is-invalid @enderror"
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
                               class="form-control @error('name') is-invalid @enderror"
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
                               class="form-control @error('name') is-invalid @enderror"
                               name="link_3"

                               autocomplete="link_3" autofocus>

                        @error('link_3')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="bg_color" class="col-md-4 col-form-label ">BG_color</label>

                        <input id="bg_color"
                               type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="bg_color"

                               autocomplete="bg_color" autofocus>

                        @error('bg_color')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="text_color" class="col-md-4 col-form-label ">Text_color</label>

                        <input id="text_color"
                               type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="text_color"

                               autocomplete="text_color" autofocus>

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
                </div>
            </div>
        </form>
    </div>
@endsection
