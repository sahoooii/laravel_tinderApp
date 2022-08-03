@extends('layouts.app')
@section('content')
<style>
    .tbg {
        height: 1280px;
    }

    /* .card {
        height: 850px;
    } */
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <input type="file" name="image" accept="image/jpeg, image/jpg, image/png" class="col-md-8 col-form-label text-md-end mx-auto  @error('image') is-invalid @enderror" required style="font-size: 8px;">
                            @error('image')
                                <span class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control mt-2" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="row mb-3">
                                <label for="age" class="col-md-5 col-form-label text-md-end fs-6">{{ __('Age') }}</label>

                                <div class="col-md-7 pl-0">
                                    <input id="age" type="number" class="form-control text-center @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age">

                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 ml-1">
                                <label for="height" class="col-md-5 col-form-label text-md-end fs-6">{{ __('height') }}</label>

                                <div class="col-md-7 pl-0">
                                    <input id="height" type="number" step="0.1" class="form-control text-center @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" required autocomplete="height">

                                    @error('height')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-check form-check-inline d-sm-flex justify-content-evenly mb-3">
                            <label for="male" class="form-check-label">{{ __('Male') }}</label>
                            <input id="male" type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" value="0" {{ old('gender') == '0' ? 'checked' : '' }} required autocomplete="gender">
                            <label for="female" class="form-check-label">{{ __('Female') }}</label>
                            <input id="female" type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" value="1"  {{ old('gender') == '1' ? 'checked' : '' }} required autocomplete="gender">
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-check form-check-inline d-sm-flex mb-3">
                            <select class="form-select @error('search_gender') is-invalid @enderror" aria-label="Default select example" name="search_gender" id="search_gender">
                                <option value="">What you want to date?</option>
                                @foreach (\App\Models\User::$search_genders as $key => $gender)
                                    <option value="{{ $key }}" @if (old('search_gender') === $key) selected @endif>{{ $gender }}</option>
                                @endforeach
                            </select>
                            @error('search_gender')
                                <span class="invalid-feedback ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-check form-check-inline d-sm-flex mb-3">
                            <select class="form-select @error('search_status') is-invalid @enderror" aria-label="Default select example" name="search_status" id="search_status">
                                <option value="">What you looking for?</option>
                                @foreach (\App\Models\User::$search_statuses as $key => $status)
                                    <option value="{{ $key }}" @if (old('search_status') === $key) selected @endif>{{ $status }}</option>
                                @endforeach
                            </select>
                            @error('search_status')
                                <span class="invalid-feedback ml-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="occupation" class="col-md-4 col-form-label text-md-end pr-0">{{ __('Occupation') }}</label>

                            <div class="col-md-8">
                                <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}" autocomplete="occupation">

                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="message" class="col-md-4 col-form-label text-md-end">{{ __('Message') }}</label>
                            <div class="col-md-8">
                                <textarea rows="6" id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" placeholder="Tell us about yourself." autocomplete="message">{{ old('message') }}</textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-7 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg mt-2">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
