@extends('themes.default.layouts.master')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))

@section('content')
<div class="container xl:max-w-7xl mx-auto px-4 py-8">
<li>ICD CODE NOT Valid FOR {{ $release }} and {{ $language }}</li>
</div>
@endsection
