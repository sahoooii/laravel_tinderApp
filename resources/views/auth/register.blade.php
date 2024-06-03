@extends('layouts.app')
@section('content')

<style>
  .tbg {
    height: auto !important;
  }
</style>

<div class="container pt-3 pb-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3 mt-2">
                            <input type="file" name="image" accept="image/jpeg, image/jpg, image/png" class="col-8 col-form-label text-md-end mx-auto @error('image') is-invalid @enderror" style="font-size: 8px;">
                            @error('image')
                                <span class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-form-label">{{ __('Name') }}</label>
                            <div class="col-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-form-label">{{ __('Email') }}</label>
                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"   autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>
                            <div class="col-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"   autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                            <div class="col-12">
                                <input id="password-confirm" type="password" class="form-control mt-2" name="password_confirmation" value="{{ old('password_confirmation') }}"   autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-3">
                          <div class="d-flex justify-content-between">
                              <div class="row mr-1">
                                  <label for="age" class="col-form-label fs-6">{{ __('Age') }}</label>
                                  <div>
                                      <input id="age" type="number" class="form-control text-center @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" autocomplete="age">
                                  </div>
                              </div>

                              <div class="row">
                                  <label for="height" class="col-form-label fs-6">{{ __('height') }}</label>
                                  <div>
                                      <input id="height" type="number" step="0.1" class="form-control text-center @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" autocomplete="height">
                                  </div>
                              </div>
                          </div>
                          <div>
                            @error('age')
                                <div class="invalid-feedback d-inline" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                          </div>
                          <div>
                            @error('height')
                                <div class="invalid-feedback d-inline" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                          </div>
                        </div>

                        <div class="mb-4">
                          <div class="d-flex justify-content-around">
                              <div class="form-check form-check-inline is-invalid">
                                  <label for="male" class="form-check-label mr-2">{{ __('Male') }}</label>
                                  <input id="male" type="radio" class="form-check-input form-check-inline border border-dark @error('gender') is-invalid @enderror" name="gender" value="0" {{ old('gender') == '0' ? 'checked' : '' }} autocomplete="gender">
                              </div>
                              <div class="form-check form-check-inline is-invalid">
                                  <label for="female" class="form-check-label mr-2">{{ __('Female') }}</label>
                                  <input id="female" type="radio" class="form-check-input form-check-inline border border-dark @error('gender') is-invalid @enderror" name="gender" value="1"  {{ old('gender') == '1' ? 'checked' : '' }} autocomplete="gender">
                              </div>
                          </div>
                            @error('gender')
                              <div class="invalid-feedback d-inline" role="alert">
                                  <strong>{{ $message }}</strong>
                              </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                          <div class="form-check form-check-inline d-flex">
                              <select class="form-select @error('search_gender') is-invalid @enderror" aria-label="Default select example" name="search_gender" id="search_gender">
                                  <option value="">Who you want to date?</option>
                                  @foreach (\App\Models\User::$search_genders as $key => $gender)
                                      <option value="{{ $key }}" @if (old('search_gender') === "$key") selected @endif>{{ $gender }}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div>
                              @error('search_gender')
                                  <span class="invalid-feedback d-inline" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                          <div class="form-check form-check-inline d-flex">
                              <select class="form-select @error('search_status') is-invalid @enderror" aria-label="Default select example" name="search_status" id="search_status">
                                  <option value="">What do you want from your dates?</option>
                                  @foreach (\App\Models\User::$search_statuses as $key => $status)
                                      <option value="{{ $key }}" @if (old('search_status') === "$key") selected @endif>{{ $status }}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div>
                              @error('search_status')
                                  <span class="invalid-feedback d-inline" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="occupation" class="col-form-label">{{ __('Occupation') }}</label>

                            <div class="col-12">
                                <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}" autocomplete="occupation">

                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="message" class="col-form-label">{{ __('Message') }}</label>
                            <div class="col-md-12">
                                <textarea rows="6" id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" placeholder="Tell us about yourself." autocomplete="message">{{ old('message') }}</textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="d-flex justify-content-center mt-2 mb-2">
                                <button type="submit" class="btn btn-primary btn-block mt-2">
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
