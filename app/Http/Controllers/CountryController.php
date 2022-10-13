<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function index()
    {
        return view('country.index', [
            'countries' => Country::orderBy('updated_at', 'desc')->get(),
           ]);
    }

    public function create()
    {
        return view('country.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:30',
            'season' => 'required|min:3|max:20',
        ],
        [
            'name.required' => 'Please enter country name',
            'name.max' => 'Country name is too long',
            'name.min' => 'Country name is too short',

            'season.required' => 'Please enter season',
            'season.max' => 'Season is too long',
            'season.min' => 'Season is too short',
        ]);
        Country::create([
            'name' => $request->name,
            'season' => $request->season
        ]);

        return redirect()->route('c_index');
    }


    public function show(Country $country)
    {
        return view('country.show', [
            'country' => $country,
        ]);
    }


    public function edit(Country $country)
    {
        return view('country.edit', [
            'country' => $country
            ]);
    }


    public function update(Request $request, Country $country)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:30',
            'season' => 'required|min:3|max:20',
        ],
        [
            'name.required' => 'Please enter country name',
            'name.max' => 'Country name is too long',
            'name.min' => 'Country name is too short',

            'season.required' => 'Please enter season',
            'season.max' => 'Season is too long',
            'season.min' => 'Season is too short',
        ]);
        $country->update([
            'name' => $request->name,
            'season' => $request->season
        ]);

        return redirect()->route('c_index');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('c_index');
    }
}
