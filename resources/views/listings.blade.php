<h1>{{ $heading }}</h1>

{{-- @if (count($listings) == 0)
    <p>No listings found</p>
@endif --}}

@unless(count($listings) == 0) 
{{-- if count(x) is not 0 --}}

@foreach ($listings as $listing)
<a href="/listings/{{$listing['id']}}">{{ $listing['title']}}</a>
    <p>{{ $listing['desc']}}</p>
@endforeach

@else
{{-- else (when count is 0 --}}
    <p>No listings found</p>
@endunless

{{-- below was the code if was not a blade template. observe the code structure above for blade templating}}
{{-- <h1><?php echo $heading; ?></h1>
<?php foreach ($listings as $listing) : ?>
    <h2><?php echo $listing['title']; ?> </h2>
    <p><?php echo $listing['desc']; ?></p>
<?php endforeach; ?> --}} 
