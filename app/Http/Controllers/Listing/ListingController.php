<?php

namespace App\Http\Controllers\Listing;

use App\{Area,Category,Listing};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Area $area, Category $category)
    {
    	$listings = Listing::with(['user','area'])->isLive()->inArea($area)->FromCategory($category)->LatestFirst()->get();
    	return view('listings.index',compact('listings','category'));
    }

    public function show(Request $request,Area $area, Listing $listing)
    {
    	if(!$listing->live())
    	{
    		abort(404);
    	}
    	return view('listings.show', compact('listing'));
    }
}
