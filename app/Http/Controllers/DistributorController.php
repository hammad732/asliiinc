<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributororder;
use Auth;

class DistributorController extends Controller
{
    public function dashboard()
    {
        return view('frontend/distributor/dashboard');
    }
    public function orders()
    {
        $user_id = Auth::user()->id;
        $orders = Distributororder::with('get_dinfo.get_dproducts','get_user','get_dshipping')->where('user_id', $user_id)->get();
        return view('frontend/distributor/orders', compact('orders'));
    }
}
