@extends('themes.default.ICD10.layouts.master')
@section('content')
<div class="container xl:max-w-7xl mx-auto px-4 py-8">
    @foreach ($child as $record)

    <li><a class="hover:text-blue-600 hover:underline" href="{{ route('icd10.code.index',[
        'releaseYear'=> $record->releaseYear,
        'code' => $record->code
        ]) }}">
        @if (!empty($record->code))
            {{ $record->code }}
        @endif 
        {{ $record->title ?? ""}} 
    </a></li>
    @endforeach
</div>
@endsection