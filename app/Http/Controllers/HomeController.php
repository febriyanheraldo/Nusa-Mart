<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $flashSaleProducts = [];
        $recommendations = [];

        return view('home', compact('flashSaleProducts', 'recommendations'));
    }
}
