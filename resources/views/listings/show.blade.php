@extends('layouts.app')

@section('content')
	<div class="container">
	 	<div class="row">
	 	@if(Auth::check())
	 		<div class="col-md-3">
	 			 <div class="panel panel-default">
	 			 	<div class="panel-body">
	 			 		<div class="nav nav-stacked">
	 			 			<li><a href="">Email to Friend</a></li>

	 			 			<li><a href="#" onclick="event.preventDefault(); document.getElementById('listing-favourit-form').submit();">Add to Favourites</a>
							<form action="{{ route('listings.favourites.store', [$area, $listing]) }}" method="post" id="listing-favourit-form" class="hidden">
								{{ csrf_field() }}
							</form>
	 			 			</li>
 	 			 		</div>
	 			 	</div>
	 			 </div>	
	 		</div>
	 		@endif
	 		<div class="{{ Auth::check() ? 'col-md-9' : 'col-md-12' }}">
	 			<div class="panel panel-default">
	 				<div class="panel-heading">
	 					<h4>{{ $listing->title }} in <span class="text-muted">{{ $listing->area->name }}</span></h4>
	 				</div>

	 				<div class="panel-body">
	 					{!! nl2br(e($listing->body)) !!}
	 					<hr>
	 					<p>Viewed (X) Time</p>

	 				</div>
	 			</div>
	 				<div class="panel panel-default">
	 				<div class="panel-heading">
	 					Contact {{ $listing->user->name }}
	 				</div>
					@if(Auth::guest())
					<p><a href="/register">Sign up</a>for an account or <a href="/login">Signin</a> to contact listing owner </p>
					@else
	 				<div class="panel-body">
 						<form action="" method="POST">
 							<div class="form-group">
 								<label for="message">Message</label>
 								<textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
 							</div>
 							<div class="form-group">
 								<button type="submit" class="btn btn-default">Send</button>
 								<span class="help-block">
 									This will email {{ $listing->user->name }} and they'll able to reply derectly to you by email.
 								</span>
 							</div>
 							{{ csrf_field() }}
 						</form>
 					 @endif
 	 				</div>
	 			</div>
	 		</div>
	 	</div>

	</div>
@endsection
