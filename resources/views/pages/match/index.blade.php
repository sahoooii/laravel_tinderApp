@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card mb-4 mt-3">
					<div class="card-header">Your Match</div>
			</div>

			<div class="row">
				@if (count($matchedUsers) === 0)
            <p class="text-center">No matched user yet<i class="fa-solid fa-heart-crack ml-2 text-danger"></i></p>
				@endif

				@foreach ($matchedUsers as $matchedUser)
					<div class="d-flex justify-content-between align-items-center mb-3 pr-2 pl-2">
              <img src="{{ $matchedUser->toUser->img_url }}" alt="img" class="rounded-circle img_icon">
              <a href="{{route('matches.show', ['id' =>  $matchedUser->toUser->id]) }}" class="streched-link text-secondary link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover h5">
                {{ $matchedUser->toUser->name }}
              </a>

              <form method="POST" action="{{ route('matches.destroy', ['id' =>  $matchedUser->toUser->id]) }}" id="delete_{{ $matchedUser->toUser->id }}">
                @csrf
                  <button type="button" data-id="{{  $matchedUser->toUser->id }}" onclick="deleteAccount(this)" class="bg-transparent btn shadow-none">
                    <i class="fa-solid fa-heart-crack fa-lg text-danger"></i>
                  </button>
              </form>
					</div>
				@endforeach
			</div>

      {{-- Paginate --}}
			<div class="d-flex justify-content-center mt-3">
				{{ $matchedUsers->links() }}
			</div>
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
