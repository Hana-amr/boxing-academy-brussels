<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Price;
class PriceController extends Controller
{public function index()
{
    $prices = Price::orderBy('period')
        ->get()
        ->groupBy('target_group');

    return view('prices', compact('prices'));
}
}
