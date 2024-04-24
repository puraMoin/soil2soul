<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class DashboardsController extends BaseController
{
    public function index()
    {
        $parentMenu = '';
        $pageTitle = 'Dashboard';
        return view('dashboards.index',compact('parentMenu','pageTitle'));
    }
}
