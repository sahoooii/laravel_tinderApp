@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card mb-4">
					<div class="card-header">Your Match</div>
			</div>

			<div class="row">
				@if (count($matchedUsers) === 0)
					<p class="text-center">No matched user yet<i class="fa-solid fa-heart-crack ml-2" style="color: red;"></i></p>
				@endif

				@foreach ($matchedUsers as $matchedUser)
				{{-- <p>{{$matchedUser->to_user_id}}</p> --}}
					<div class="col-md-12 mb-3 ml-2">
						<img src="{{ $matchedUser->toUser->img_url }}" alt="img" class="rounded-circle" style="height: 70px; width: 70px; object-fit:cover;">
						<a href="{{route('matches.show', ['id' =>  $matchedUser->toUser->id]) }}" class="streched-link ml-4 text-decoration-none" style="font-size: 18px;">
							{{ $matchedUser->toUser->name }}
						</a>
					</div>
				@endforeach
			</div>

			<div class="d-flex justify-content-center mt-3">
				{{ $matchedUsers->links() }}
			</div>

		</div>
	</div>
</div>
@endsection
