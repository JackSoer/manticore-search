<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function autocomplete(Request $request)
    {
        $query = $request->query('query');

        $countries = DB::connection('manticore')
            ->table('countries')
            ->select('id', 'name')
            ->where('name', 'like', $query . '%')
            ->limit(10)
            ->get();

        $results = $countries->map(function ($country) {
            return ['id' => $country->id, 'name' => $country->name];
        });

        return response()->json($results);
    }
}
