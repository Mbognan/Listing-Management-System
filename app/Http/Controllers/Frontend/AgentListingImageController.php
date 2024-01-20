<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingImageGallery;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AgentListingImageController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $images = ListingImageGallery::where('listing_id', $request->id,)->get();
        $listingTitle = Listing::select('title')->where('id', $request->id)->first();

        return view('frontend.dashboard.listing.image-gallery.index',compact('images','listingTitle'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'images' => ['required'],
            'images.*' => ['image','max:3000'],
            'listing_id' =>['required']
        ],
        [
            'image.*.image' => 'One or More Selected Files are not Valid Images',
            'image.*.max' => 'One or More Images exceed Maximum files size (3MB)'
        ]);
       $imagePaths = $this->uploadImageMultiple($request,'images');

       foreach ($imagePaths as $path){
        $image = new ListingImageGallery();
        $image->listing_id = $request->listing_id;
        $image->image = $path;
        $image->save();
       }

       toastr()->success('Uploaded  successfully');
       return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try{
            $image =  ListingImageGallery::findOrFail($id);
           $this->deleteFile($image);
           $image->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        }catch(\Exception $e){
            logger($e);
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
