@extends('layouts.app')

@section('content')
<style>
    .tbg {
        height: 1280px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Your Profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="row mb-3">
                            <input type="file" name="image" accept="image/jpeg, image/jpg, image/png" class="col-md-8 col-form-label text-md-end mx-auto @error('image') is-invalid @enderror" style="font-size: 8px;">
                            <div class="text-center mt-2 mb-2">
                                <img src="{{ $user->img_url }}" alt="img" class="rounded-circle" style="height: 120px; width: 120px; object-fit:cover;">
                                {{-- <img src="{{ asset($user->img_url) }}" alt="img" class="rounded-circle" style="height: 120px; width: 120px; object-fit:cover;"> --}}
                            </div>
                            <x-auth-validation-errors class="invalid-feedback" role="alert" :errors="$errors" />
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- 追記 age height gender occupation message --}}
                        <div class="d-flex justify-content-between">
                            <div class="row mb-3">
                                <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>

                                <div class="col-md-7">
                                    <input id="age" type="number" class="form-control text-center @error('age') is-invalid @enderror" name="age" value="{{ $user->age }}" required autocomplete="age">

                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="height" class="col-md-5 col-form-label text-md-end">{{ __('Height') }}</label>

                                <div class="col-md-7">
                                    <input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ $user->height }}" required autocomplete="height">

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
                            <input id="male" type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" value="0" @if ( $user->gender == '0') { checked } @endif required autocomplete="gender">
                            <label for="female" class="form-check-label">{{ __('Female') }}</label>
                            <input id="female" type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" value="1"   @if ( $user->gender == '1') { checked } @endif required autocomplete="gender">
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
                                    <option value="{{ $key }}" @if ($user->search_gender === $key) selected @endif>{{ $gender }}</option>
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
                                    <option value="{{ $key }}" @if ($user->search_status === $key) selected @endif>{{ $status }}</option>
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
                                <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ ($user->occupation) }}" autocomplete="occupation">

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
                                <textarea rows="6" id="message" type="text" class="form-control  @error('Message') is-invalid @enderror" name="message" placeholder="Tell us yourself." autocomplete="message">{{ $user->message }}</textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="p-2 mb-4 d-flex justify-content-around">
                            <button type="button" onclick="location.href='{{ route('users.index') }}'" class="btn btn-outline-secondary focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
							<button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <form method="POST" action="{{ route('users.destroy', ['id' =>  $user->id]) }}" id="delete_{{ $user->id }}">
                @csrf

                <div class="d-grid gap-2 mt-2">
                    <button type="button" data-id="{{ $user->id }}" onclick="deleteAccount(this)" class="btn btn-outline-light btn-lg focus:outline-none hover:bg-gray-400 rounded text-lg">Delete Account</button>
                    {{-- <a href="#" data-id="{{ $user->id }}" onclick="deletePost(this)" class="btn btn-outline-light btn-lg focus:outline-none hover:bg-gray-400 rounded text-lg">Delete Account</a> --}}
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    'use strict';
    function deleteAccount(e) {
        if (confirm('Are you sure you want to delete your account?')) {
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>

@endsection
