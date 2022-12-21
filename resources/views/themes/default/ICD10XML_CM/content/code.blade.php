@extends('themes.default.ICD10XML_CM.layouts.master')
@section('content')

{{-- {{ dd($codeDetails) }} --}}
<div class="container xl:max-w-7xl mx-auto px-4 py-8">
    <div class="m-4">
        <h1 class="text-center text-4xl">
            {{ $codeDetails->code ?? "" }}  {{ $codeDetails->title ?? ""}} 
        </h1>
    </div>
    <div class="lg:mx-20 my-10 px-10 py-10 mx-auto rounded-xl shadow-lg">
      <h2>  The ICD 10 Code {{ $codeDetails->code ?? "" }} is relevant to :  <strong>{{ $codeDetails->title ?? ""}}  </strong></h2>

        @if (!empty($codeDetails->definition))
        <p class="m-4"> <strong class="text-blue-800">Definition:</strong> {{ $codeDetails->definition }}</p>
        @endif

        @if (!empty($codeDetails->notes))
        <div class="m-4"> <strong class="text-green-800">Notes:</strong>
            @php
            $notes = json_decode($codeDetails->notes,true);
            @endphp
                @if (is_array($notes['note']))
                @foreach ($notes['note'] as $notes_item)
                <li>{{ $notes_item }}</li>
                @endforeach
                @else
                    {{ $notes['note'] }}
                @endif
        </div>
        @endif

        @if (!empty($codeDetails->codingHint))
        <p class="m-4"> <strong class="text-amber-600">Coding Hint:</strong> {{ $codeDetails->codingHint }}</p>
        @endif

        @if (!empty($codeDetails->includes))
        <div class="m-4"> <strong class="text-green-800">includes:</strong>
            @php
            $includes = json_decode($codeDetails->includes,true);
            @endphp
                @if (is_array($includes['note']))
                @foreach ($includes['note'] as $includes_item)
                <li>{{ $includes_item }}</li>
                @endforeach
                @else
                    {{ $includes['note'] }}
                @endif
        </div>
        @endif

        @if (!empty($codeDetails->excludes1))
        <div class="m-4"> <strong class="text-red-800">excludes1:</strong>
            @php
            $excludes1 = json_decode($codeDetails->excludes1,true);
            @endphp
                @if (is_array($excludes1['note']))
                @foreach ($excludes1['note'] as $excludes1_item)
                <li>{{ $excludes1_item }}</li>
                @endforeach
                @else
                    {{ $excludes1['note'] }}
                @endif
        </div>
        @endif

        @if (!empty($codeDetails->excludes2))
        <div class="m-4"> <strong class="text-red-800">excludes2:</strong>
            @php
            $excludes2 = json_decode($codeDetails->excludes2,true);
            @endphp
                @if (is_array($excludes2['note']))
                @foreach ($excludes2['note'] as $excludes2_item)
                <li>{{ $excludes2_item }}</li>
                @endforeach
                @else
                    {{ $excludes2['note'] }}
                @endif
        </div>
        @endif

        @if (!empty($codeDetails->inclusionTerm))
        <div class="m-4"> <strong class="text-red-800">inclusionTerm:</strong>
            @php
            $inclusionTerm = json_decode($codeDetails->inclusionTerm,true);
            @endphp
                @if (is_array($inclusionTerm['note']))
                @foreach ($inclusionTerm['note'] as $inclusionTerm_item)
                <li>{{ $inclusionTerm_item }}</li>
                @endforeach
                @else
                    {{ $inclusionTerm['note'] }}
                @endif
        </div>
        @endif
    </div>
</div>





@if (!empty($chapterAvailable))
<div class="container xl:max-w-7xl mx-auto px-4 py-8">
    <strong class="text-amber-800">Codes:</strong>
    @foreach ($chapterAvailable as $chapter)
    <li><a class="hover:text-blue-900 underline text-blue-600 mr-2" href="{{ route('icd10xml.code.index',[
        'releaseYear'=> $chapter->releaseYear,
        'slug' => $chapter->slug,
        ]) }}">{{ $chapter->code }}</a>{{ $chapter->title ?? ""}}</li>
    @endforeach
</div>
@endif

@if (count($availableRecords))
<div class="container xl:max-w-7xl mx-auto px-4 py-8">
    <strong class="text-amber-800">Codes:</strong>
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

    <div class="container xl:max-w-7xl mx-auto px-4">
       <p> This is the 10th Revision (ICD-10)-WHO Version for {{ $record->releaseYear ?? "" }}
        International Statistical Classification of Diseases and Related Health Problems.</p>
    </div>

    @if (!empty($history_Codes))
    <div class="container xl:max-w-7xl mx-auto px-4 py-8">
        <strong class="text-amber-800">Code History:</strong>
    @foreach ($history_Codes as $h_code)
       <li>{{ $h_code->code }} in <a class="underline text-blue-700 hover:text-blue-900" href="{{ route('icd10xml.code.index',['releaseYear'=> $h_code->releaseYear,'slug' => $h_code->slug ]) }}">{{ $h_code->releaseYear}}</a></li>
    @endforeach
    </div>
    @endif

@endsection