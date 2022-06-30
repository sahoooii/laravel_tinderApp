@extends('layouts.app')

@section('content')
<div class="p-user-index">

  @if (is_null($notSwipeUser))
  <p class="text-center">There's no user around you...</p>
  @endif

  @if (!is_null($notSwipeUser))
  <div class="tphoto">
      <img src="{{ $notSwipeUser->img_url }}" title="tphoto" alt="Tinder Photo" />
      {{-- <div class="tname">{{ $notSwipeUser->name }}</div> --}}
  </div>

  <div class="tcontrols">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-1">
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

        <div class="col-md-6 mb-1">
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
