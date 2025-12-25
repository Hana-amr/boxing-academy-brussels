<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Price;
class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();
        return view('prices', compact('prices'));
    }
}
