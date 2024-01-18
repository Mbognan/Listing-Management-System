<?php

namespace App\Http\Controllers\Admin;


use App\DataTables\ListingScheduleDataTable;
use App\Http\Controllers\Controller;
use App\Models\ListingSchedule;
use App\Models\Scedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\View\View;
use Response;

class ListingScheduleController extends Controller
{
    public function index(ListingScheduleDataTable $dataTable  ):View|JsonResponse
    {

        return $dataTable->render('admin.listing.listing-scedule.index');
    }

    public function create(Request $request, string $listingId):View
    {

        return view('admin.listing.listing-scedule.create',compact('listingId'));
    }
    public function store(Request $request , string $listingId){

        $listing_schedule = new ListingSchedule();

        $listing_schedule->listing_id = $listingId;
        $listing_schedule->day = $request->day;
        $listing_schedule->start_time = $request->start_time;
        $listing_schedule->end_time = $request->end_time;
        $listing_schedule->status = $request->status;
        $listing_schedule->save();

        toastr()->success('Schedule Set Successfully!');
        return to_route('admin.listing-scedule.index', ['id' => $listingId]);

    }

    function edit(string $id):View{
        $scedule = ListingSchedule::findOrFail($id);
        return view('admin.listing.listing-scedule.edit',compact('scedule'));
    }
    public  function update(Request $request , string $id):RedirectResponse{

        $schedule = ListingSchedule::findOrFail($id);
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->status = $request->status;
        $schedule->save();
        toastr()->success('Schedule Updated Successfully!');
        return to_route('admin.listing-scedule.index',['id' => $schedule->id]);

    }

    public function destroy(string $id):HttpResponse{
        try{
            ListingSchedule::findOrFail($id)->delete();

            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        }catch(\Exception $e){
            logger($e);
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
