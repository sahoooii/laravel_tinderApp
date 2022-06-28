@extends('layouts.app')

@section('content')
<style>
    .tbg {
        height: 820px;
    }

    .card-img-overlay {
        padding: 0;
        top: calc(50% - 0.5rem);
        font-weight: bold;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <img src="{{ $matchedUserInfo->img_url }}" alt="img" class="img-thumbnail img-rounded" style="height:400px; object-fit:cover;">
                <div class="card-img-overlay d-flex flex-row">
                    <h2 class="text-white text-left pl-4">{{ $matchedUserInfo->name }}</h2>
                    <h2 class="text-white text-left pl-4">{{ $matchedUserInfo->age }}</h2>
                </div>

                <div class="card-body">
                    <h5 class="card-title">About Me</h5>
                        <p class="card-text">{{ $matchedUserInfo->message }}</p>
                        <button type="button" class="btn btn-outline-secondary text-black mr-2" disabled><i class="fas fa-venus-mars pr-1"></i>{{ $gender }}</button>
                        <button type="button" class="btn btn-outline-secondary text-black" disabled><i class="fas fa-ruler pr-1"></i>{{ $matchedUserInfo->height }}<span>cm</span></button>
                        <button type="button" class="btn btn-outline-secondary text-black mt-2 d-block" disabled><i class="fas fa-briefcase"></i>{{ $matchedUserInfo->occupation }}</button>
                </div>
                {{-- from here --}}
                <button type="button" onclick="location.href='{{ route('matches.index') }}'" class="btn btn-outline-secondary focus:outline-none hover:bg-gray-400 rounded text-lg">Back</button>

            </div>
        </div>
    </div>
</div>
@endsection
