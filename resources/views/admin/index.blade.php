@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row justify-content-center">
    @auth('admin')

		<div class="col-md-12">
			<div class="card mb-4 mt-3">
					<div class="card-header">All Users</div>
			</div>

      <div class="row">
        @if (count($allUsers) === 0)
					<p class="text-center">We don't have any user<i class="fa-solid fa-heart-crack ml-2 text-danger"></i></p>
				@endif

        @foreach ($allUsers as $user)
					<div class="d-flex justify-content-between align-items-center mb-3 pr-4 pl-4">
						<img src="{{ $user->img_url }}" alt="img" class="rounded-circle img_icon">
						<a href="{{route('admin.show', ['id' =>  $user->id]) }}" class="streched-link text-secondary link-body-emphasis link-underline-opacity-25 link-underline-opacity-75-hover h5">
							{{ $user->name }}
						</a>

            <form method="POST" action="{{ route('admin.destroy', ['id' =>  $user->id]) }}" id="delete_{{ $user->id }}">
                @csrf
              <div>
                  <button type="button" data-id="{{ $user->id }}" onclick="deleteAccount(this)" class="btn btn-sm btn-outline-dark focus:outline-none rounded text-lg">Delete
                  </button>
              </div>
            </form>

					</div>
				@endforeach
			</div>

      {{-- Paginate --}}
			<div class="d-flex justify-content-center mt-3">
				{{ $allUsers->links() }}
			</div>
		</div>
    @endauth
	</div>
</div>

<script>
    'use strict';
    function deleteAccount(e) {
        if (confirm('Are you sure you want to delete this account?')) {
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>

@endsection
