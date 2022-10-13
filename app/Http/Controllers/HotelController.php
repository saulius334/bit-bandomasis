<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{

    public function index()
    {
        return view('hotel.index', [
            'hotels' => Hotel::orderBy('price', 'asc')->get(),
           ]);
    }

    public function create()
    {
        return view('hotel.create', [
            'countries' => Country::all()
        ]);
    }

    public function store(Request $request, Country $country)
    {
        $validated = $request->validate([
            'hotelName' => 'required|min:3|max:30',
            'price' => 'required|numeric|min:1|max:1000',
            'photo.*' => 'sometimes|required|mimes:jpg|max:10000'
        ],
        [
            'hotelName.required' => 'Please enter hotel name',
            'hotelName.max' => 'Hotel name is too long',
            'hotelName.min' => 'Hotel name is too short',

            'price.required' => 'Please enter price',
            'price.numeric' => 'Please enter only numbers',
            'price.max' => 'Please enter only numbers'
        ]);
        $photo = $request->file('photo')->store('public/images');
        Hotel::create([
            'country_id' => $request->country_id,
            'hotelName' => $request->hotelName,
            'price' => $request->price,
            'durationStart' => $request->durationStart,
            'durationEnd' => $request->durationEnd,
            'photo' => $photo,
        ]);

        return redirect()->route('h_index');
    }


    public function show(Hotel $hotel)
    {
        return view('hotel.show', [
            'hotel' => $hotel
        ]);
    }
 
    public function edit(Hotel $hotel)
    {
        return view('hotel.edit', [
            'hotel' => $hotel
        ]);
    }

    public function update(Request $request, Hotel $hotel)
    {
        $validated = $request->validate([
            'hotelName' => 'required|min:3|max:30',
            'price' => 'required|numeric|min:1|max:1000',
            'photo.*' => 'sometimes|required|mimes:jpg|max:10000'
        ],
        [
            'hotelName.required' => 'Please enter hotel name',
            'hotelName.max' => 'Hotel name is too long',
            'hotelName.min' => 'Hotel name is too short',

            'price.required' => 'Please enter price',
            'price.numeric' => 'Please enter only numbers',
            'price.max' => 'Please enter only numbers'
        ]);
        $photo = $hotel->photo;

        if($request->hasFile('photo')) {
            Storage::delete($hotel->photo);
            $photo = $request->file('photo')->store('public/images');
        }

        $hotel->update([
            'hotelName' => $request->hotelName,
            'price' => $request->price,
            'duration' => $request->duration,
            'photo' => $photo,
        ]);
        return redirect()->route('h_index');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('h_index');
    }
}
