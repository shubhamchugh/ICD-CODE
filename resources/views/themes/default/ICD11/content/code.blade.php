@extends('themes.default.ICD11.layouts.master')
@section('content')
<div class="container xl:max-w-7xl mx-auto px-4 py-8">
    @foreach ($child as $record)

    <li><a href="{{ route('code.index',[
        'releaseId'=> $record->releaseId,
        'liner_id' => $record->liner_id
        ]) }}">
        @if (!empty($record->code))
            {{ $record->code }} . 
        @endif 
        @if ($record->codeRange)
        <strong>Code Range: {{ $record->codeRange }}</strong> 
        @endif
        {{ $record->title ?? ""}} 
        @if (!empty($record->blockId))
        <strong> [</strong> Block Id:{{  $record->blockId }} <strong> ]</strong>
        @endif
    </a></li>
    @endforeach
</div>
@endsection