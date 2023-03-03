@extends('layout')

@section('content')
<a href="/"><-Back</a>
<h2>{{ $listing['title']}}</h2>
<p>{{ $listing['description']}}</p>
<p>{{ $listing['tags']}}</p>
<p>from {{$listing['location']}}</p>
@endsection