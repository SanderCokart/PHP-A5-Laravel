@extends('layouts.app')
@section('content')
    <div class="container">
        {{--BAND CREATE FORM START--}}
        {{--ENCODING TYPE CHANGED TO ALLOW FOR IMAGES--}}
        <form action="{{ route('bands.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    {{--HEADER--}}
                    <div class="row">
                        <h1>Create band</h1>
                    </div>
                    {{--BAND NAME START--}}
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label ">Name *</label>


                        <input id="name"
                               type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name"
                               required
                               value="{{ old('name')}}"
                               autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{--BAND NAME END--}}

                    {{--BAND BIOGRAPHY START--}}
                    <div class="form-group row">
                        <label for="bio" class="col-md-4 col-form-label ">Bio</label>
                        <textarea id="bio"
                                  type="text"
                                  class="form-control @error('bio') is-invalid @enderror"
                                  name="bio"
                                  autocomplete="bio"
                                  autofocus>{{ old('bio')}}</textarea>

                        @error('bio')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{--BAND BIOGRAPHY END--}}

                    {{--BAND LINK_1 START--}}
                    <div class="form-group row">
                        <label for="link_1" class="col-md-4 col-form-label ">Link 1</label>


                        <input id="link_1"
                               type="text"
                               value="{{ old('link_1')}}"
                               class="form-control @error('link_1') is-invalid @enderror"
                               name="link_1"
                               autocomplete="link_1" autofocus>

                        @error('link_1')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{--BAND LINK_1 END--}}

                    {{--BAND LINK_2 START--}}
                    <div class="form-group row">
                        <label for="link_2" class="col-md-4 col-form-label ">Link 2</label>


                        <input id="link_2"
                               type="text"
                               value="{{ old('link_2')}}"
                               class="form-control @error('link_2') is-invalid @enderror"
                               name="link_2"
                               autocomplete="description" autofocus>

                        @error('link_2')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{--BAND LINK_2 END--}}

                    {{--BAND LINK_3 START--}}
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label ">Link 3</label>

                        <input id="link_3"
                               type="text"
                               value="{{ old('link_3')}}"
                               class="form-control @error('link_3') is-invalid @enderror"
                               name="link_3"

                               autocomplete="link_3" autofocus>

                        @error('link_3')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{--BAND LINK_3 END--}}

                    {{--BG_COLOR START--}}
                    <div class="form-group row">
                        <label for="bg_color" class="col-md-4 col-form-label ">Background Color</label>
                        <div class="input-group">
                            <input id="bg_color"
                                   type="text"
                                   class="form-control @error('bg_color') is-invalid @enderror"
                                   name="bg_color"
                                   value="{{ old('bg_color') ?? '#333333'}}"
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
                    {{--BG_COLOR END--}}

                    {{--TEXT_COLOR START--}}
                    <div class="form-group row">
                        <label for="text_color" class="col-md-4 col-form-label ">Text Color</label>
                        <div class="input-group">
                            <input id="text_color"
                                   type="text"
                                   class="form-control @error('text_color') is-invalid @enderror"
                                   name="text_color"
                                   value="{{ old('text_color') ?? '#333333'}}"
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
                    {{--TEXT_COLOR END--}}

                    {{--BAND BANNER IMAGE START--}}
                    <div class=" form-group row">
                        <label for="image" class="col-md-4 col-form-label ">Band Banner Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        @error('image')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{--BAND BANNER IMAGE END--}}

                    {{--SUBMIT--}}
                    <div class="row pt-4">
                        <button class="btn btn-primary">Save Profile</button>
                    </div>
                </div>
            </div>
        </form>
        {{--BAND CREATE FORM START--}}
    </div>
@endsection
