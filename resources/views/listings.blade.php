
{{$heading}}

@unless(count($listings) == 0)

@foreach ($listings as $listing)

<h1>{{$listing['id']}}</h1>
<a href="/listings/{{$listing['id']}}"><h5>{{$listing['title']}}</h5></a>
<p>{{$listing['description']}}</p>

@endforeach

@else
    <h1>No Listing Found</h1>

@endunless