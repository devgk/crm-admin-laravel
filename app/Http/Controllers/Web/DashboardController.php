<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     */
    public function index(Request $request){
        // Get  the user details from the request
        $user = $request->user();

        $products = Product::all()->take(20);

        return view('pages.index', [
            'name' => $user->username,
            'products' => $products
        ]);
    }
}
