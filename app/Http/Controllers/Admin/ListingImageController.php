<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingImageGallery;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ListingImageController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $images = ListingImageGallery::where('listing_id', $request->id,)->get();
        $listingTitle = Listing::select('title')->where('id', $request->id)->first();

        return view('admin.listing.listing-image-gallery.index',compact('images','listingTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

    public function destroy(string $id):Response
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
