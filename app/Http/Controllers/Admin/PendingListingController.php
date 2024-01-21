<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PendingListingDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PendingListingController extends Controller
{
    public function index(PendingListingDataTable $datatable):View |JsonResponse{
        return $datatable->render('admin.pending-listing.index');
    }
}
