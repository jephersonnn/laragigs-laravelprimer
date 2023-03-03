@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv); //explode('separator', prop)
    
@endphp

<ul class="flex">
    @foreach ($tags as $tag)
        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="/?tag={{$tag}}">{{$tag}}</a> 
            {{-- when a tag is clicked, it will request a listing tag, and it will be handled by ListingController --}}
        </li>
    @endforeach
</ul>
