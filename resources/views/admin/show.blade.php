@extends('layouts.admin')

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
                  <img src="{{ $user->img_url }}" title="tphoto" alt="Tinder Photo">
                  <div class="card-img-overlay d-flex flex-row">
                      <h2 class="text-white text-left pl-4">{{ $user->name }}</h2>
                      <h2 class="text-white text-left pl-4">{{ $user->age }}</h2>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <h5 class="card-title">User ID: {{ $user->id }}</h5>
                    @if ($countLikedUsers > 0)
                    {{-- Liked count --}}
                      <h5 class="card-title"><i class="fa-solid fa-heart ml-2 text-danger"></i> {{ $countLikedUsers }}</h5>
                    @endif
                    @if ( $countMatchedUsers > 0)
                    {{-- matching count --}}
                      <h5 class="card-title"><i class="fa-solid fa-people-arrows ml-2 text-danger"></i> {{ $countMatchedUsers }}</h5>
                    @endif
                  </div>
                        <p class="card-text">
                          {{ $user->message }}
                        </p>
                        <button type="button" class="btn btn-outline-secondary text-black mr-2" disabled><i class="fas fa-venus-mars pr-1"></i>{{ $gender }}</button>
                        <button type="button" class="btn btn-outline-secondary text-black" disabled><i class="fas fa-ruler pr-1"></i>{{ $user->height }}<span>cm</span></button>
                        <div class="d-flex justify-content-start">
                            <button type="button" class="btn btn-outline-secondary text-black mt-2 mr-2 d-block" disabled><i class="fa-solid fa-magnifying-glass pr-1"></i>{{ $search_status }}</button>
                            <button type="button" class="btn btn-outline-secondary text-black mt-2 d-block" disabled><i class="fas fa-briefcase pr-1"></i>{{ $user->occupation }}</button>
                        </div>
                </div>
            </div>
            {{-- Unmatch Button --}}
            <form method="POST" action="{{ route('admin.destroy', ['id' =>  $user->id]) }}" id="delete_{{ $user->id }}">
                @csrf

                <div class="d-grid mt-4">
                    <button type="button" data-id="{{ $user->id }}" onclick="deleteAccount(this)" class="btn btn-lg btn-outline-danger focus:outline-none rounded text-lg">DELETE</button>
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
