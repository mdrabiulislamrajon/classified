 
 <div class="media">
 	<div class="media-body">
 		<h5> <strong><a href="{{ route('listing.show', [$area, $listing]) }}">{{ $listing->title }}</a></strong>
			@if($area->children->count())
				in {{ $listing->area->name }}
			@endif
 		</h5>

 		<ul class="list list-inline">
 			<li><time>{{ $listing->created_at->diffForHumans() }}</time> </li>
 			<li>{{ $listing->user->name }}</li>
 		</ul>
 	</div>
 </div>
@yield('link')