<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;

class AdminPriceController extends Controller
{
    public function index()
    {
        $prices = Price::orderBy('target_group')->orderBy('period')->get();
        return view('admin.prices.index', compact('prices'));
    }

    public function create()
    {
        return view('admin.prices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'target_group' => 'required|in:kinderen,dames,volwassenen',
            'period' => 'required|in:maandelijks,trimestrieel,semestrieel,jaarlijks',
            'subscription_price' => 'required|numeric|min:0',
            'insurance_price' => 'required|numeric|min:0',
            'card_price' => 'required|numeric|min:0',
        ]);

        Price::create($validated);

        return redirect()->route('admin.prices.index')
            ->with('success', 'Tarief toegevoegd.');
    }

    public function edit(Price $price)
    {
        return view('admin.prices.edit', compact('price'));
    }

    public function update(Request $request, Price $price)
    {
        $validated = $request->validate([
            'target_group' => 'required|in:kinderen,dames,volwassenen',
            'period' => 'required|in:maandelijks,trimestrieel,semestrieel,jaarlijks',
            'subscription_price' => 'required|numeric|min:0',
            'insurance_price' => 'required|numeric|min:0',
            'card_price' => 'required|numeric|min:0',
        ]);

        $price->update($validated);

        return redirect()->route('admin.prices.index')
            ->with('success', 'Tarief bijgewerkt.');
    }

    public function destroy(Price $price)
    {
        $price->delete();

        return redirect()->route('admin.prices.index')
            ->with('success', 'Tarief verwijderd.');
    }
}

