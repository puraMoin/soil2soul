<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class SegmentsController extends BaseController
{
    public function index()
    {
         $pageTitle = 'Segments';
        $parentMenu = 'Segment & Currency Setup';
        return view('segments.index',compact('parentMenu','pageTitle'));
    
    }
}
