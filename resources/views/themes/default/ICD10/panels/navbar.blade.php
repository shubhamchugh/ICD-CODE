<div class="bg-blue-700 w-full">
    <div x-data="{ open: false }" class=" flex flex-col max-w-screen-xl p-5 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class=" flex flex-row items-center justify-between lg:justify-start">
            <a href="{{ route('home.index') }}" class="text-lg font-bold tracking-tighter text-white transition duration-500 ease-in-out transform tracking-relaxed lg:pr-8">ICD CODES </a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" style="display: none"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col items-center flex-grow hidden pb-4 border-slate-100 md:pb-0 md:flex md:justify-end md:flex-row lg:border-l-2 lg:pl-2">
            <a class="px-4 py-2 mt-2 text-sm text-slate-50 md:mt-0 hover:text-slate-200 focus:outline-none focus:shadow-outline" href="#">About</a>
            <a class="px-4 py-2 mt-2 text-sm text-slate-50 md:mt-0 hover:text-slate-200 focus:outline-none focus:shadow-outline" href="#">Contact</a>
          
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm text-left text-slate-50 md:w-auto md:inline md:mt-0 hover:text-slate-50 focus:outline-none focus:shadow-outline">
                    <span>{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform rotate-0 md:-mt-1">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-30 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48" style="display: none">
                    <div class="px-2 py-2 bg-white rounded-md shadow">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a rel="alternate" hreflang="{{ $localeCode }}" class="block px-4 py-2 mt-2 text-sm text-gray-500 md:mt-0 hover:text-blue-600 focus:outline-none focus:shadow-outline" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">  {{ $properties['native'] }} </a>
                    @endforeach
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<div>
    <div class="p-5 overflow-y-auto whitespace-nowrap scroll-hidden bg-gray-400">
        <ul class="inline-flex items-center list-none">
            <li>
                <a href="{{ route('year.home.index',['releaseYear' => '2023']) }}" class="px-4 py-1 mr-1 text-base text-gray-900 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-blue-600">2023</a>
            </li>
            <li>
                <a href="{{ route('year.home.index',['releaseYear' => '2022']) }}" class="px-4 py-1 mr-1 text-base text-gray-900 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-blue-600">2022</a>
            </li>
            <li>
                <a href="{{ route('year.home.index',['releaseYear' => '2021']) }}" class="px-4 py-1 mr-1 text-base text-gray-900 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-blue-600">2021</a>
            </li>
            <li>
                <a href="{{ route('year.home.index',['releaseYear' => '2020']) }}" class="px-4 py-1 mr-1 text-base text-gray-900 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-blue-600">2020</a>
            </li>
            <li>
                <a href="{{ route('year.home.index',['releaseYear' => '2019']) }}" class="px-4 py-1 mr-1 text-base text-gray-900 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-blue-600">2019</a>
            </li>
            <li>
                <a href="{{ route('year.home.index',['releaseYear' => '2018']) }}" class="px-4 py-1 mr-1 text-base text-gray-900 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-blue-600">2018</a>
            </li>
            <li>
                <a href="{{ route('year.home.index',['releaseYear' => '2017']) }}" class="px-4 py-1 mr-1 text-base text-gray-900 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-blue-600">2017</a>
            </li>
            <li>
                <a href="{{ route('year.home.index',['releaseYear' => '2016']) }}" class="px-4 py-1 mr-1 text-base text-gray-900 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-blue-600">2016</a>
            </li>
            <li>
                <a href="{{ route('year.home.index',['releaseYear' => '2015']) }}" class="px-4 py-1 mr-1 text-base text-gray-900 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-blue-600">2015</a>
            </li>
            <li>
                <a href="{{ route('year.home.index',['releaseYear' => '2014']) }}" class="px-4 py-1 mr-1 text-base text-gray-900 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-blue-600">2014</a>
            </li>
            <li>
                <a href="{{ route('year.home.index',['releaseYear' => '2010']) }}" class="px-4 py-1 mr-1 text-base text-gray-900 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-blue-600">2010</a>
            </li>
            <li>
                <a href="{{ route('year.home.index',['releaseYear' => '2008']) }}" class="px-4 py-1 mr-1 text-base text-gray-900 transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-blue-600">2008</a>
            </li>

        </ul>
    </div>
</div>


