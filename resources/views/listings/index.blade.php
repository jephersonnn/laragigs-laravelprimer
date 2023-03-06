<x-layout>
    @include('partials._hero') {{-- includes the partial _hero --}}
    @include('partials._search')
    {{-- this content section will be yielded as coded at layout.blade --}}
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        {{-- <h1>{{ $heading }}</h1> --}}

        {{-- @if (count($listings) == 0)
        <p>No listings found</p>
        @endif --}}


        @unless(count($listings) == 0)
            {{-- if count(x) is not 0 --}}

            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
                {{-- if you want to pass a variable as a prop to a blade component, put a colon on the prop --}}
            @endforeach
        @else
            {{-- else (when count is 0 --}}
            <p>No listings found</p>
        @endunless

    </div>

    <div class="mt-6 p-4">{{$listings->links()}}</div>

</x-layout>

{{-- ----------------------------- --}}
{{-- below was the code if was not a blade template. observe the code structure above for blade templating}}
{{-- <h1><?php echo $heading; ?></h1>
<?php foreach ($listings as $listing) : ?>
<h2><?php echo $listing['title']; ?> </h2>
<p><?php echo $listing['description']; ?></p>
<?php endforeach; ?> --}}
{{-- ----------------------------- --}}
