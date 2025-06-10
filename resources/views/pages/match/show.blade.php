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
                  <img src="{{ $userToShow->img_url }}" title="tphoto" alt="Tinder Photo">
                  <div class="card-img-overlay d-flex flex-row">
                      <h2 class="text-white text-left pl-4">{{ $userToShow->name }}</h2>
                      <h2 class="text-white text-left pl-4">{{ $userToShow->age }}</h2>
                  </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">About Me</h5>
                        <p class="card-text">
                          {{ $userToShow->message }}
                        </p>
                        <button type="button" class="btn btn-outline-secondary text-black mr-2" disabled><i class="fas fa-venus-mars pr-1"></i>{{ $gender }}</button>
                        <button type="button" class="btn btn-outline-secondary text-black" disabled><i class="fas fa-ruler pr-1"></i>{{ $userToShow->height }}<span>cm</span></button>
                        <div class="d-flex justify-content-start">
                            <button type="button" class="btn btn-outline-secondary text-black mt-2 mr-2 d-block" disabled><i class="fa-solid fa-magnifying-glass pr-1"></i>{{ $search_status }}</button>
                            @if ($userToShow->occupation !== null)
                                <button type="button" class="btn btn-outline-secondary text-black mt-2 d-block" disabled><i class="fas fa-briefcase pr-1"></i>{{ $userToShow->occupation }}</button>
                            @endif
                        </div>
                </div>
            </div>
            {{-- Unmatch Button --}}
            <form method="POST" action="{{ route('matches.destroy', ['id' =>  $userToShow->id]) }}" id="delete_{{ $userToShow->id }}">
                @csrf

                <div class="d-grid mt-4">
                    <button type="button" data-id="{{ $userToShow->id }}" onclick="deleteAccount(this)" class="btn btn-lg btn-outline-danger focus:outline-none rounded text-lg">Unmatched</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    'use strict';
    function deleteAccount(e) {
        if (confirm('Would you like to unmatch this user?')) {
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>

@endsection
