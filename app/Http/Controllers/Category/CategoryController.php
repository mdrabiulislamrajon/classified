<?php

namespace App\Http\Controllers\Category;

use App\{Area, Category};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Area $area)
    {
    	$categories = Category::get()->toTree();
    	return view('categories.index', compact('categories'));
    }
}
