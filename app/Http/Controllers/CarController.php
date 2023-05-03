<?php

namespace App\Http\Controllers;

use App\Models\CarListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    public function create(): View
    {
        return view('cars.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'transmission' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
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
        }
        $carListing->save();

        return redirect()->route('cars.myshow')->with('success', 'Car Listing created successfully!');
    }
    public function show()
    {
        $listings = CarListing::all();

        return view('cars.show', ['listings' => $listings]);
    }

    public function myshow()
    {
        if (auth()->check()) {
            $listings = CarListing::where('user_id', auth()->user()->id)->get();
        } else {
            $listings = null;
        }

        return view('cars.myshow', ['listings' => $listings]);
    }



    public function view($carlisting)
    {
        $car = CarListing::with('user')->find($carlisting);
        return view('cars.view', compact('car'));
    }

    public function filter(Request $request)
    {
        $listings = CarListing::query();

        // add filters to the query
        if ($request->has('make')) {
            $listings->where('make', $request->make);
        }
        if ($request->has('model')) {
            $listings->where('model', $request->model);
        }
        if ($request->has('transmission')) {
            $listings->where('transmission', $request->transmission);
        }
        if ($request->has('year')) {
            $listings->where('year', $request->year);
        }
        if ($request->has('price_min')) {
            $listings->where('price', '>=', (float) $request->price_min);
        }
        if ($request->has('price_max')) {
            $listings->where('price', '<=', (float) $request->price_max);
        }

        // exclude user's own listings if user is logged in
        if (auth()->check()) {
            $listings->where('user_id', '<>', auth()->id());
        }

        // get filtered listings
        $listings = $listings->get();

        return view('cars.show', compact('listings'));
    }
    public function update(Request $request, $id)
    {
        $car = CarListing::findOrFail($id);
        $car->price = $request->input('price');
        $car->distance = $request->input('distance');
        $car->comments = $request->input('comments');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public', $filename);
            $car->image = $filename;
        }

        $car->save();

        return redirect()->route('cars.view', $car->id);
    }
    public function listingdestroy($id)
    {
        $listing = CarListing::find($id);

        // Check if user is authorized to delete listing
        if (!auth()->check() || auth()->id() !== $listing->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $listing->delete();

        return redirect()->route('cars.myshow')->with('success', 'Listing deleted successfully');
    }



}