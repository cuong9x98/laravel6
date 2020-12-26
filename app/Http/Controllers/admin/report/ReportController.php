<?php

namespace App\Http\Controllers\admin\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
    	return view('admin.report.index');
    }
}
