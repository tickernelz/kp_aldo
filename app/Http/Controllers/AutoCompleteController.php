<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    public function Buku(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Buku::where('judul', 'LIKE', '%'.$query.'%')->pluck('judul');

        return response()->json($filterResult);
    }
}
