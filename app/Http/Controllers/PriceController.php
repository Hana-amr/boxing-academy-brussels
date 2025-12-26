<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Price;
class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all()->groupBy('target_group');
        return view('prices', compact('prices'));
    }
}
