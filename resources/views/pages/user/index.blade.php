@extends('layouts.app')

@section('content')
<style>
    .card-img-overlay {
      padding: 0;
      top: calc(88% - 0.5rem);
      font-weight: bold;
  }
</style>

<div class="p-user-index">
  @if (is_null($notSwipeUser))
  <p class="text-center">There's no user around you<i class="fa-solid fa-magnifying-glass ml-2" style="color: blue;"></i></p>
  @endif

  @if (!is_null($notSwipeUser))
  <div class="tphoto">
      <img src="{{ $notSwipeUser->img_url }}" title="tphoto" alt="Tinder Photo" />
      <div class="card-img-overlay d-flex flex-row">
          <h2 class="text-white text-left pl-4">{{ $notSwipeUser->name }}</h2>
          <h2 class="text-white text-left pl-4">{{ $notSwipeUser->age }}</h2>
      </div>
  </div>

  <div class="tcontrols">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <form action="{{ route('swipes.store') }}" method="POST">
            @csrf
            {{--Nope ver.  --}}
            <input type="hidden" name="to_user_id" value="{{ $notSwipeUser->id }}">
            <input type="hidden" name="is_like" value="0">
            <button class="tno" type="submit">
              <i class="fa fa-times" aria-hidden="true"></i>
            </button>
          </form>
        </div>

        <div class="col-6">
          <form action="{{ route('swipes.store') }}" method="POST">
            @csrf
            {{--Like ver.  --}}
            <input type="hidden" name="to_user_id" value="{{ $notSwipeUser->id }}">
            <input type="hidden" name="is_like" value="1">
            <button class="tyes" type="submit">
              <i class="fa fa-heart" aria-hidden="true"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
@endsection
