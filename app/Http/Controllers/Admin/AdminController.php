<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\DashboardService;

class AdminController extends Controller
{
    public function __construct(private DashboardService $dashboardService)
    {
    }

    public function index(Request $request)
    {
        $sortBy = $request->input('sortBy') ?? 'likes';
        $topLikesComments = $this->dashboardService->getTopLikeComment($sortBy);
        return view('admin.index', compact('topLikesComments'));
    }
}
