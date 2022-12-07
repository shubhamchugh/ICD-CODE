@extends('themes.default.ICD10XML_CM.layouts.master')
@section('content')
@if (!empty($chapterAvailable))

<div class="container xl:max-w-7xl mx-auto px-4 py-8">
    @foreach ($chapterAvailable as $chapter)
    <li><a class="hover:text-blue-900 underline text-blue-600 mr-2" href="{{ route('icd10xml.code.index',[
        'releaseYear'=> $chapter->releaseYear,
        'slug' => $chapter->slug,
        ]) }}">{{ $chapter->code }}</a>{{ $chapter->title ?? ""}}</li>
    @endforeach

</div>
@endif

@if (!empty($availableRecords))
<div class="container xl:max-w-7xl mx-auto px-4 py-8">
    @foreach ($availableRecords as $record)
    <li><a class="hover:text-blue-900 underline text-blue-600 mr-2" href="{{ route('icd10xml.code.index',[
        'releaseYear'=> $record->releaseYear,
        'slug' => $record->slug,
        ]) }}">
            @if (!empty($record->code))
            {{ $record->code }}
            @endif
        </a>{{ $record->title ?? ""}}</li>
    @endforeach
</div>
@endif
@endsection