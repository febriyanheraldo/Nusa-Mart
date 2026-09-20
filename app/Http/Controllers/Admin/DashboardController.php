<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function toko() {
        return view('admin.toko');
    }

    public function val() {
        return view('admin.val');
    }

    public function resi() {
        return view('admin.resi');
    }
}
