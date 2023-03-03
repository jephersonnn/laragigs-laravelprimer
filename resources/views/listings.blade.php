@extends('layout') {{-- this blade template extends layout.blade --}}

@section('content')
    {{-- this content section will be yielded as coded at layout.blade --}}
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        {{-- <h1>{{ $heading }}</h1> --}}

        {{-- @if (count($listings) == 0)
    <p>No listings found</p>
@endif --}}


        @unless(count($listings) == 0)
            {{-- if count(x) is not 0 --}}

            @foreach ($listings as $listing)
                {{-- <a href="/listings/{{ $listing['id'] }}">{{ $listing['title'] }}</a>
                <p>{{ $listing['description'] }}</p> --}}
                <div class="bg-gray-50 border border-gray-200 rounded p-6">
                    <div class="flex">
                        <img
                            class="hidden w-48 mr-6 md:block"
                            src=" "
                            alt=""
                        />
                        <div>
                            <h3 class="text-2xl">
                                <a href="show.html">{{$listing['title']}}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{$listing['company']}}</div>
                            <ul class="flex">
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                    <a href="#">Laravel</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                    <a href="#">API</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                    <a href="#">Backend</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                    <a href="#">Vue</a>
                                </li>
                            </ul>
                            <div class="text-lg mt-4">
                                <i class="fa-solid fa-location-dot"></i> {{$listing['location']}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            {{-- else (when count is 0 --}}
            <p>No listings found</p>
        @endunless

    </div>

@endsection

{{-- ----------------------------- --}}
{{-- below was the code if was not a blade template. observe the code structure above for blade templating}}
{{-- <h1><?php echo $heading; ?></h1>
<?php foreach ($listings as $listing) : ?>
<h2><?php echo $listing['title']; ?> </h2>
<p><?php echo $listing['description']; ?></p>
<?php endforeach; ?> --}}
{{-- ----------------------------- --}}
