@extends('layouts.app')

@section('content')
<div class="container">
    <h4>{{ $category->parent->name }}&nbsp;>&nbsp;{{ $category->name }}</h4>

    @if($listings->count())
        @foreach($listings as $listing)
            @include('listings.partials._listing',compact('listing'))
        @endforeach
    @else
        <h4>NO LIST HERE</h4>
    @endif

</div>
@endsection
