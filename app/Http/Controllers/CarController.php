<?php

namespace App\Http\Controllers;

use App\Models\CarListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CarController extends Controller
{
    public function create(): View
    {
        return view('car.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'transmission' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y')+1),
            'distance' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'comments' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $carListing = new CarListing();
        $carListing->make = $validatedData['make'];
        $carListing->model = $validatedData['model'];
        $carListing->transmission = $validatedData['transmission'];
        $carListing->year = $validatedData['year'];
        $carListing->distance = $validatedData['distance'];
        $carListing->price = $validatedData['price'];
        $carListing->comments = $validatedData['comments'];
        $carListing->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/car_images');
            $carListing->image = $imagePath;
        }

        $carListing->save();

        return redirect()->route('home')->with('success', 'Car Listing created successfully!');
    }
}
