<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retailerorder;
use Auth;

class RetailerController extends Controller
{
    public function dashboard()
    {
        return view('frontend/retailer/dashboard');
    }
    public function orders()
    {
        $user_id = Auth::user()->id;
        $orders = Retailerorder::with('get_rinfo.get_rproducts','get_user','get_rshipping')->where('user_id', $user_id)->get();
        return view('frontend/retailer/orders', compact('orders'));
    }
}
