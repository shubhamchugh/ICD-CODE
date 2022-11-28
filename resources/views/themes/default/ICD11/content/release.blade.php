@extends('themes.default.ICD11.layouts.master')
@section('content')
<div class="container xl:max-w-7xl mx-auto px-4 py-8">
    @foreach ($availableRecords as $record)
    <li><a href="{{ route('code.index',['slug' => $record->slug]) }}">{{ $record->title }}</a></li>
    @endforeach
</div>
@endsection