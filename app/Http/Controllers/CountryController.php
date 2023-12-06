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

        $results = DB::connection('manticore')
            ->select("SELECT * FROM countries WHERE MATCH ('*$query*')");

        return response()->json($results);
    }
}
