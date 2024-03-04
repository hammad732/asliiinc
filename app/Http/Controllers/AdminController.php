<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validate;
use Validator;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\WProduct;
use App\Models\RProduct;
use App\Models\Marquee;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }
}
