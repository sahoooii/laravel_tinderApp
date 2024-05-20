@props(['status' =>'info'])

@php
$bgColor = '';
if (session('status') === 'info'){ $bgColor = 'bg-primary';}
if (session('status') === 'alert'){ $bgColor = 'bg-danger';}
@endphp

@if (session('flash_message'))
    <div class="{{ $bgColor }} text-center text-white py-3 my-0">
        {{ session('flash_message') }}
    </div>
@endif
