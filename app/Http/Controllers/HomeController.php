<?php

namespace App\Http\Controllers;

use Modules\Merchant\Entities\Merchant;
use Modules\Product\Entities\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product    = Product::all()->count();
        $merchant   = Merchant::all()->count();

        return view('home', compact('product', 'merchant'));
    }

}
