@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="mt-2 list-unstyled pl-4 fw-bold text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
