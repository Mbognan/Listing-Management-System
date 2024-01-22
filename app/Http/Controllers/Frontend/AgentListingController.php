<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\AgentListingDataTable;
use App\Http\Controllers\Controller;

use App\Http\Requests\Frontend\AgentListingStoreRequest;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingAmenity;
use App\Models\Location;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

class AgentListingController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(AgentListingDataTable $datatable):View | JsonResponse
    {
        return $datatable->render('frontend.dashboard.listing.index') ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $categories = Category::all();

        $locations = Location::all();
        $amenities = Amenity::all();
        return view('frontend.dashboard.listing.create',compact('locations', 'amenities','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentListingStoreRequest $request)
    {
        $imagePath = $this->uploadImage($request,'image');
        $thumbnail_path = $this->uploadImage($request, 'thumbnail_image');
        $attachment_path = $this->uploadImage($request,'attachment');

        $listing = new Listing();
        $listing->user_id = Auth::user()->id;
        $listing->package_id = 0;
        $listing->image = $imagePath;
        $listing->thumbnail_image = $thumbnail_path;
        $listing->title = $request->title;
        $listing->slug = Str::slug($request->title);
        $listing->category_id = $request->category;
        $listing->location_id = $request->location;
        $listing->address = $request->address;
        $listing->phone = $request->phone;
        $listing->email = $request->email;
        $listing->website = $request->website;
        $listing->fb_link = $request->fb_link;
        $listing->insta_link = $request->insta_link;
        $listing->x_link = $request->x_link;
        $listing->git_link = $request->git_link;
        $listing->file = $attachment_path;
        $listing->description = $request->description;
        $listing->google_map_embed_code = $request->google_map_embed;
        $listing->seo_title = $request->seo_title;
        $listing->seo_description = $request->seo_description;
        $listing->status = $request->status;
        $listing->is_featured = $request->is_featured;
        $listing->is_verified = $request->is_verified;
        $listing->expired_date = date('Y-m-d');
        $listing->save();

        foreach ($request->amenities as $amenityId) {
            $amenity = new ListingAmenity();
            $amenity->listing_id = $listing->id;
            $amenity->amenity_id = $amenityId;
            $amenity->save();

        }

        toastr()->success('Listing added successfully!');

        return to_route('user.listing.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $listing = Listing::findOrFail($id);

        if(Auth::user()->id !== $listing->user_id){
           return abort(403);
        }
        $listingAmenities = ListingAmenity::where('listing_id', $listing->id)->pluck('amenity_id')->toArray();
        $categories = Category::all();
        $locations = Location::all();
        $amenities = Amenity::all();

        return view('frontend.dashboard..listing.edit',compact('categories', 'locations', 'amenities','listing','listingAmenities'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $imagePath = $this->uploadImage($request,'image',$request->old_image);
        $thumbnail_path = $this->uploadImage($request, 'thumbnail_image',$request->old_thumbnail);
        $attachment_path = $this->uploadImage($request,'attachment',$request->old_attachment);

        $listing = Listing::findOrFail($id);

        $listing->package_id = 0;
        $listing->image = !empty($imagePath) ? $imagePath :$request->old_image;
        $listing->thumbnail_image = !empty($thumbnail_path) ? $thumbnail_path :$request->old_thumbnail;
        $listing->title = $request->title;
        $listing->slug = Str::slug($request->title);
        $listing->category_id = $request->category;
        $listing->location_id = $request->location;
        $listing->address = $request->address;
        $listing->phone = $request->phone;
        $listing->email = $request->email;
        $listing->website = $request->website;
        $listing->fb_link = $request->fb_link;
        $listing->insta_link = $request->insta_link;
        $listing->x_link = $request->x_link;
        $listing->git_link = $request->git_link;
        $listing->file = !empty($attachment_path) ? $attachment_path :$request->old_attachment;
        $listing->description = $request->description;
        $listing->google_map_embed_code = $request->google_map_embed;
        $listing->seo_title = $request->seo_title;
        $listing->seo_description = $request->seo_description;
        $listing->status = $request->status;
        $listing->is_featured = $request->is_featured;
        $listing->is_verified = $request->is_verified;
        $listing->expired_date = date('Y-m-d');
        $listing->is_approved = 1;
        $listing->save();


        ListingAmenity::where('listing_id', $listing->id)->delete();

        foreach ($request->amenities as $amenityId) {
            $amenity = new ListingAmenity();
            $amenity->listing_id = $listing->id;
            $amenity->amenity_id = $amenityId;
            $amenity->save();

        }

        toastr()->success('Listing Updated successfully!');

        return to_route('user.listing.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Listing::findOrFail($id)->delete();

            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        }catch(\Exception $e){
            logger($e);
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
