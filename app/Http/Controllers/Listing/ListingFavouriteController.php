<?php

namespace App\Http\Controllers\Listing;

use App\{Area,Listing};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListingFavouriteController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth']);
	}
    public function store(Request $request, Area $area, Listing $listing)
    {
    	$request->user()->favouriteListings()->syncWithoutDetaching($listing->id);

    	return back();
    }
}
