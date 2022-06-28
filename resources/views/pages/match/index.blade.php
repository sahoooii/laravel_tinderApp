@extends('layouts.app')

@section('content')
<div class="p-match-index">
	<div class="container">
		<div class="col-md-12 mb-3 mt-2">
			<p class="fs-5">Your Match</p>
		</div>
		<div class="row">
			@foreach ($matchedUsers as $matchedUser)
			{{-- @php
					dd($matchedUser->toUser);
			@endphp --}}
				<div class="col-md-12 mb-3">
					<img src="{{ $matchedUser->toUser->img_url }}" alt="img" class="rounded-circle" style="height: 70px; width: 70px; object-fit:cover;">
					<a href="{{route('matches.show', ['id' =>  $matchedUser->toUser->id]) }}" class="streched-link ml-3" style="font-size: 16px;">
						{{ $matchedUser->toUser->name }}
					</a>
				</div>
			@endforeach
		</div>
	</div>
</div>

@endsection
