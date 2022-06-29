@extends('layouts.app')

@section('content')
{{-- <div class="p-match-index"> --}}
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card mb-3">
						<div class="card-header">Your Match</div>
				</div>

				<div class="row">
					@foreach ($matchedUsers as $matchedUser)
					{{-- @php
							dd($matchedUser->toUser);
					@endphp --}}
						<div class="col-md-12 mb-3 ml-2">
							<img src="{{ $matchedUser->toUser->img_url }}" alt="img" class="rounded-circle" style="height: 70px; width: 70px; object-fit:cover;">
							<a href="{{route('matches.show', ['id' =>  $matchedUser->toUser->id]) }}" class="streched-link ml-4 text-decoration-none" style="font-size: 18px;">
								{{ $matchedUser->toUser->name }}
							</a>
						</div>
					@endforeach
				</div>
		</div>
	</div>
{{-- </div> --}}

@endsection
