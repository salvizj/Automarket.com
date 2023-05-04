<?php

namespace App\Http\Controllers;

use App\Models\CarListing;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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
        'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        'engine' => 'required|string|max:255',
        'transmission' => 'required|string|max:255',
        'cylinders' => 'required|integer|min:0',
        'drive' => 'required|string|max:255',
        'distance' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'comments' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $carListing = new CarListing();
    $carListing->make = $validatedData['make'];
    $carListing->model = $validatedData['model'];
    $carListing->year = $validatedData['year'];
    $carListing->engine = $validatedData['engine'];
    $carListing->transmission = $validatedData['transmission'];
    $carListing->cylinders = $validatedData['cylinders'];
    $carListing->drive = $validatedData['drive'];
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


    return redirect()->route('cars.myshow', $carListing->id)->with('success', 'Car Listing created successfully!');
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
    // Find the CarListing model instance by ID
    $car = CarListing::findOrFail($carlisting);

    // Increment the view count and save the model
    $car->view_count++;
    $car->save();

    // Load the user relationship
    $car->load('user');

    // Return the view with the car data
    return view('cars.view', compact('car'));
}


    public function filter(Request $request)
{
    $listings = CarListing::query();

    // add filters to the query
    if ($request->filled('make')) {
        $listings->where('make', $request->make);
    }
    if ($request->filled('model')) {
        $listings->where('model', $request->model);
    }
        if ($request->filled('from_year')) {
        $listings->where('year','>=', $request->from_year);
    }
    if ($request->filled('till_year')) {
        $listings->where('year','<=', $request->till_year);
    }
    if ($request->filled('engine')) {
        $listings->where('engine', $request->engine);
    }
        if ($request->filled('transmission')) {
        $listings->where('transmission', $request->transmission);
    }
            if ($request->filled('cylinders')) {
        $listings->where('cylinders', $request->cylinders);
    }
            if ($request->filled('drive')) {
        $listings->where('drive', $request->drive);
    }
    if ($request->filled('price_min')) {
        $listings->where('price', '>=', (float) $request->price_min);
    }
    if ($request->filled('price_max')) {
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