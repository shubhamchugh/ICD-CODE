@extends('themes.default.ICD11.layouts.master')
@section('content')
<div class="container xl:max-w-7xl mx-auto px-4 py-8">
    <div class="m-4">
        <h1 class="text-center text-4xl">@if ($availableRecords->code)
            {{ $availableRecords->code }}
            @endif
            {{ $availableRecords->title }}

            @if ($availableRecords->classKind)
            [ {{ $availableRecords->classKind }} ]
            @endif

            @if ($availableRecords->releaseYear)
            {{ $availableRecords->releaseYear }}
            @endif
        </h1>
    </div>

    <div class="lg:mx-20 my-10 px-10 py-10 mx-auto rounded-xl shadow-lg">

        <strong>{{ $availableRecords->title }}</strong>


        @if ($availableRecords->definition)
        <h2 class="m-4"> <strong class="text-blue-800">Definition:</strong> {{ $availableRecords->definition }}</h2>
        @endif
    
        @if ($availableRecords->longDefinition)
        <div class="m-4"> <strong class="text-blue-900">Long Definition:</strong> {{ $availableRecords->longDefinition }}</div>
        @endif
    
    
        @if ($availableRecords->codingNote)
        <div class="m-4"> <strong class="text-pink-700">Coding Note:</strong> {{ $availableRecords->codingNote }}</div>
        @endif
    
    
        @if ($availableRecords->synonym)
        <div class="m-4"> <strong>Synonym:</strong> {{ $availableRecords->synonym }}</div>
        @endif
    
    
        @if ($availableRecords->narrowerTerm)
        <div class="m-4"> <strong>Narrower Term:</strong> {{ $availableRecords->narrowerTerm }}</div>
        @endif
    
    
    
        @if ($availableRecords->inclusion)
        <div class="m-4"> <strong class="text-green-800">inclusion:</strong>
            @php
            $inclusion = json_decode($availableRecords->inclusion,true);
            @endphp
            @foreach ($inclusion as $inclusion_label)
    
            <li>{{ $inclusion_label['label']['@value'] }}</li>
            @endforeach
    
        </div>
        @endif
    
        @if ($availableRecords->exclusion)
        <div class="m-4"> <strong class="text-red-700">Exclusion:</strong>
            @php
            $exclusion = json_decode($availableRecords->exclusion,true);
            @endphp
            @foreach ($exclusion as $exclusion_label)
    
            <li>{{ $exclusion_label['label']['@value'] }}</li>
            @endforeach
        </div>
        @endif
    
    
    
        @if ($availableRecords->indexTerm)
        <div class="m-4"> <strong class="text-amber-700">Index Term:</strong>
            @php
            $indexTerm = json_decode($availableRecords->indexTerm,true);
            @endphp
            @foreach ($indexTerm as $indexTerm_label)
    
            <li>{{ $indexTerm_label['label']['@value'] }}</li>
            @endforeach
    
        </div>
        @endif
    </div>

    @if (!$child->isEmpty())
    <strong class="text-amber-800">Codes:</strong>
    <div class="m-4">
        @foreach ($child as $record)
        <li><a href="{{ route('icd11.code.index',[
            'releaseYear'=> $record->releaseYear,
            'liner_id' => $record->liner_id
            ]) }}">
                {{ $record->title ?? ""}}
            </a></li>
        @endforeach
    </div>
    @endif

</div>
@endsection