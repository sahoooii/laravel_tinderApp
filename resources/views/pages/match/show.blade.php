@extends('layouts.app')

@section('content')
<style>
    .tbg {
        height: auto;
    }
</style>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- <div class="card mt-2"> --}}
            <div>
                <div class="tphoto">
                  <img src="{{ $matchedUserInfo->img_url }}" title="tphoto" alt="Tinder Photo">
                  <div class="card-img-overlay d-flex flex-row">
                      <h2 class="text-white text-left pl-4">{{ $matchedUserInfo->name }}</h2>
                      <h2 class="text-white text-left pl-4">{{ $matchedUserInfo->age }}</h2>
                  </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">About Me</h5>
                        <p class="card-text">{{ $matchedUserInfo->message }}</p>
                        <button type="button" class="btn btn-outline-secondary text-black mr-2" disabled><i class="fas fa-venus-mars pr-1"></i>{{ $gender }}</button>
                        <button type="button" class="btn btn-outline-secondary text-black" disabled><i class="fas fa-ruler pr-1"></i>{{ $matchedUserInfo->height }}<span>cm</span></button>
                        <div class="d-flex justify-content-start">

                            <button type="button" class="btn btn-outline-secondary text-black mt-2 mr-2 d-block" disabled><i class="fa-solid fa-magnifying-glass pr-1"></i>{{ $search_status }}</button>
                            <button type="button" class="btn btn-outline-secondary text-black mt-2 d-block" disabled><i class="fas fa-briefcase pr-1"></i>{{ $matchedUserInfo->occupation }}</button>
                        </div>
                </div>
            </div>
            <div class="d-grid gap-2 mt-2">
                <button type="button" onclick="location.href='{{ route('matches.index') }}'" class="btn btn-outline-secondary btn-lg focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>
            </div>
        </div>
    </div>
</div>
@endsection
