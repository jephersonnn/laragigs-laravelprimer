
<h1>{{ $heading }}</h1>

@if (count($listings) == 0)
    <p>No listings found</p>
@endif


@foreach ($listings as $listing)
    <h2>{{ $listing['title']}}</h2>
    <p>{{ $listing['desc']}}</p>
@endforeach

{{-- below was the code if was not a blade template. observe the code structure above for blade templating}}
{{-- <h1><?php echo $heading; ?></h1>
<?php foreach ($listings as $listing) : ?>
    <h2><?php echo $listing['title']; ?> </h2>
    <p><?php echo $listing['desc']; ?></p>
<?php endforeach; ?> --}} 
