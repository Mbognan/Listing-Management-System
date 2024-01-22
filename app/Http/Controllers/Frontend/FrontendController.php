<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Hero;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function index():View{
        $hero = Hero::first();
        $categories = Category::where('status',1)->get();
        return view('frontend.home.index',compact('hero','categories'));
    }

    public function listings(Request $request):View{
        $listing = Listing::with('category','location')->where(['status'=> 1, 'is_approved' => 1 ,]);
        $listing->when($request->has('category'),function($query) use($request){
             $query->whereHas('category', function($query) use($request){
                $query->where('slug', $request->category);
            });
        });

        $listings = $listing->paginate(6);

        return view('frontend.pages.listings',compact('listings'));
    }
}
