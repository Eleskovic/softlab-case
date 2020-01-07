<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FsApi;

class FourSquareController extends Controller
{
    public function categories(Request $request) {
        $api = new FsApi();
        $categories = $api->categories();
        return response()->json($categories);
    }

    public function explore(Request $request) {
        $api = new FsApi();
        //in a bigger project i would use validation here for sure. (for $request->category parameter)
        $venues = $api->explore($request->category);
        return response()->json($venues);
    }

    public function view(Request $request) {
        $api = new FsApi();
        $categories = $api->categories();
        return view('categories', ['categories' => $categories]);
    }
}
