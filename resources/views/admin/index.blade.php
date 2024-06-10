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
        {{-- {{$user->name}} --}}
			</div>

      {{-- Paginate --}}
			<div class="d-flex justify-content-center mt-3">
				{{-- {{ $matchedUsers->links() }} --}}
			</div>

		</div>
    @endauth
	</div>
</div>
@endsection
