@extends('themes.default.layouts.master')
@section('content')
<div class="container xl:max-w-7xl mx-auto px-4 py-8">
    @foreach ($availableRecords as $record)
    <li><a href="">{{ $record->code }}. {{ $record->title }}</a></li>
    @endforeach
</div>
@endsection