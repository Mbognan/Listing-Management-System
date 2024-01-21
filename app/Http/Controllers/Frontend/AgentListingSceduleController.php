<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\AgentListingScheduleDataTable;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingSchedule;
use Auth;
use Http;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\View\View;
use Response;

class AgentListingSceduleController extends Controller
{
    public function index(AgentListingScheduleDataTable $dataTable, string $listingId  ):View | JsonResponse
    {
        $listing = Listing::select('id','title','user_id')->where('id', $listingId)->first();
        if($listing->user_id !== Auth::user()->id){
            abort(403);
        }
        $listingTitle = $listing;
        $dataTable->with('listingId',$listingId);


        return $dataTable->render('frontend.dashboard.listing.schedule.index',compact('listingId','listingTitle'));
    }

    public function create(Request $request, string $listingId):View
    {
        $listing = Listing::select('id','title','user_id')->where('id', $listingId)->first();
        if($listing->user_id !== Auth::user()->id){
            abort(403);
        }
        $listingTitle = $listing;
        return view('frontend.dashboard.listing.schedule.create',compact('listingId'));
    }
    public function store(Request $request , string $listingId): RedirectResponse{

        $listing = Listing::select('id','title','user_id')->where('id', $listingId)->first();
        if($listing->user_id !== Auth::user()->id){
            abort(403);
        }

        $listing_schedule = new ListingSchedule();

        $listing_schedule->listing_id = $listingId;
        $listing_schedule->day = $request->day;
        $listing_schedule->start_time = $request->start_time;
        $listing_schedule->end_time = $request->end_time;
        $listing_schedule->status = $request->status;
        $listing_schedule->save();

        toastr()->success('Schedule Set Successfully!');
        return to_route('user.listing-scedule.index',  $listingId);

    }

    function edit(string $id):View{
        $scedule = ListingSchedule::findOrFail($id);
        $listing = Listing::select('id','title','user_id')->where('id', $scedule->listing_id)->first();
        if($listing->user_id !== Auth::user()->id){
            abort(403);
        }
        return view('frontend.dashboard.listing.schedule.edit',compact('scedule'));
    }
    public  function update(Request $request , string $id):RedirectResponse{

        $schedule = ListingSchedule::findOrFail($id);
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->status = $request->status;
        $schedule->save();
        toastr()->success('Schedule Updated Successfully!');
        return to_route('user.listing-scedule.index', $schedule->listing_id);

    }

    public function destroy(string $id): HttpResponse{
        try{
            ListingSchedule::findOrFail($id)->delete();

            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        }catch(\Exception $e){
            logger($e);
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
