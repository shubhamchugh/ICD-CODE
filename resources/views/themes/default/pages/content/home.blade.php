@extends('themes.default.pages.layouts.master')

@section('content')
<div class="container xl:max-w-7xl mx-auto px-4 py-8">
<!--SEARCH BAR -->
 <p class="text-xl p-2">Find ICD-10 codes by name, description or synonym.</p>
    <form>
        <div class="flex">
            <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
            <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">All categories <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(897px, 5637px, 0px);">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                <li>
                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>
                </li>
                <li>
                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>
                </li>
                <li>
                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>
                </li>
                <li>
                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>
                </li>
                </ul>
            </div>
            <div class="relative w-full">
                <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates..." required>
                <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
        </div>
    </form>
    <hr class="my-4 mx-auto h-1 bg-gray-400 rounded border-0 lg:my-8 dark:bg-gray-700">
    <h1 class="text-3xl">ICD-11 FREE MEDICAL CODING REFERENCE 2022 - 2023</h1>
    
    <p class="py-2">ICD List is a reference website of ICD-10-CM and ICD-10-PCS codes, related medical coding guidelines and billing information. Our ICD-10 data is updated with the latest 96,400+ ICD-10-CM codes and the 79,300+ ICD-10 procedure codes from the Centers for Medicare and Medicaid Services (CMS).</p>

<p class="py-2">ICD-10 information is easily accessible with our powerful search tools, code converters, browsable indexes, tables and medical coding guides.</p>

<p class="py-2">Our knowledge graph includes helpful medical coding information like Code Edits, Code first, with, or also, Inclusion and Exclusion terms, Diagnostic Related Groups (DRG), Present on Admission Exempt (POA), Synonyms, Table of Drugs, Table of Neoplasms, Quality Payment Program Measures and Information for Patients.</p>

<hr class="my-4 mx-auto h-1 bg-gray-400 rounded border-0 lg:my-8 dark:bg-gray-700">

@if ($icd_11_availableRelease)
<span class="text-xl font-bold">Browse ICD-11-CM Codes List</span>
@foreach ($icd_11_availableRelease['book'] as $key => $icd_11_availableRelease_data)
@foreach ($icd_11_availableRelease_data as $icd_11_availableRelease_data_get)
          <li class=""><a href="{{  route('icd11.code.index',['releaseYear' => $icd_11_availableRelease_data_get->releaseYear]) }}">{{ $icd_11_availableRelease_data_get->title }} | Release:{{ $icd_11_availableRelease_data_get->releaseId }} | Version: {{ $icd_11_availableRelease['releaseType'][$key] }}</a></li>
@endforeach
@endforeach
@endif


@if ($icd_10_availableRelease)
<span class="text-xl font-bold">Browse ICD-10-CM Codes List</span>
@foreach ($icd_10_availableRelease['book'] as $key => $icd_10_availableRelease_data)
@foreach ($icd_10_availableRelease_data as $icd_10_availableRelease_data_get)
          <li class=""><a href="{{  route('icd10.code.index',['releaseYear' => $icd_10_availableRelease_data_get->releaseYear]) }}">{{ $icd_10_availableRelease_data_get->title }} | Release:{{ $icd_10_availableRelease_data_get->releaseId }} | Version: {{ $icd_10_availableRelease['releaseType'][$key] }}</a></li>
@endforeach
@endforeach  
@endif


@if ($icd_10_xml_availableRelease)
<span class="text-xl font-bold">Browse ICD-10-CM Codes List</span>
@foreach ($icd_10_xml_availableRelease['book'] as $key => $icd_10_xml_availableRelease_data)
<li><a href="{{ route('icd10xml.code.index',['releaseYear' => $icd_10_xml_availableRelease_data->releaseYear]) }}">{{ $icd_10_xml_availableRelease_data->title }}</a> Release Year: {{ $icd_10_xml_availableRelease_data->releaseYear }} Language: {{ $icd_10_xml_availableRelease_data->lang }}</li>
@endforeach  
@endif



<!-- FAQ Section: Simple -->
<div class="bg-white">
    <div class="space-y-16 container xl:max-w-7xl mx-auto px-4 py-16 lg:px-8 lg:py-32">
      <!-- Heading -->
      <div class="text-center">
        <div class="text-sm uppercase font-bold tracking-wider mb-1 text-blue-700">
        We Answer
        </div>
        <h2 class="text-3xl md:text-4xl font-extrabold mb-4">
          Frequently Asked Questions
        </h2>
      </div>
      <!-- END Heading -->
  
      <!-- FAQ -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
        <div class="prose prose-indigo">
          <h4>
            What features are included?
          </h4>
          <p>
            Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque.
          </p>
        </div>
        <div class="prose prose-indigo">
          <h4>
            Can I use PayPal to pay you?
          </h4>
          <p>
            Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque.
          </p>
        </div>
        <div class="prose prose-indigo">
          <h4>
            Do I get access to the community?
          </h4>
          <p>
            Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque.
          </p>
        </div>
        <div class="prose prose-indigo">
          <h4>
            Can I get a refund just in case?
          </h4>
          <p>
            Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque.
          </p>
        </div>
        <div class="prose prose-indigo">
          <h4>
            Do you offer email support?
          </h4>
          <p>
            Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque.
          </p>
        </div>
        <div class="prose prose-indigo">
          <h4>
            Are the updates free for life?
          </h4>
          <p>
            Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque.
          </p>
        </div>
      </div>
      <!-- END FAQ -->
    </div>
  </div>
  <!-- END FAQ Section: Simple -->
</div>
@endsection