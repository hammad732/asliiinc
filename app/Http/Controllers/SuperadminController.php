<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use Hash;
use Image;
use App\User;
use App\State;
use App\Country;
use App\Models\Job;
use App\Models\Days;
use App\Models\ServiceType;
use App\Models\Store;
use App\Models\AboutUs;
use App\Models\Connect;

use App\Models\Marquee;
use App\Models\Service;
use App\Models\Category;
use App\Models\DProduct;
use App\Models\PVariant;
use App\Models\RProduct;
use App\Models\Services;
use App\Models\WProduct;
use App\Models\SubCategory;
use App\Models\AboutContent;

use App\Models\DeliveryDays;
use Illuminate\Http\Request;
use App\Models\Retailerorder;
use App\Imports\ProductImport;
use App\Models\Distributororder;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;


// use Darryldecode\Cart\Facades\CartFacade as Cart;

class SuperadminController extends Controller
{
    public function dashboard()
    {
        return view('superadmin/dashboard');
    }

    //=== stores ===
    public function stores_view()
    {
        $countries = Country::all();
        $states = State::all();
        // $stores = Store::all();
        $stores = Store::with('devlivery_days.days')->get();

        //Days
        $days = Days::all();


        return view('superadmin/stores/stores', compact('stores', 'countries', 'states', 'days'));
    }
    public function store_save(Request $request)
    {

        $day_id = $request->oday;
        $store = new Store($request->except('_token', 'oday'));
        $store->save();

        // dd($store);
        if ($day_id != null) {
            foreach ($day_id as $day_id) {
                $delivery_days = new DeliveryDays();
                $delivery_days->days_id = $day_id;
                $delivery_days->store_id = $store->id;
                $delivery_days->save();
            }
        }

        $countries = Country::all();
        $states = State::all();
        $stores = Store::with('devlivery_days.days')->get();
        $days = Days::all();
        // return back()->with('status','Store has been Added successfully');
        return redirect()->route('sa.stores.view', compact('stores', 'countries', 'states', 'days'))->with('status', 'Store has been Added successfully');
    }
    public function get_edit_store_data(Request $request)
    {
        // dd($request->all());
        // $store = Store::findOrFail($request->id);
        $store = Store::findorfail($request->id);

        $days = Days::get();
        $oday_drop = '';


        foreach ($days as $day) {
            $deldays =  DeliveryDays::where('store_id', $request->id)->where('days_id', $day->id)->first();

            if ($deldays != null) {
                if ($deldays->days_id == $day->id) {
                    $oday_drop .= '<li style="list-style-type:none;">';
                    $oday_drop .= '<input type="checkbox" value="' . $day->id . '" name="oday[]" checked> ' . $day->days . '';
                    $oday_drop .= '</li>';
                }
            } else {

                $oday_drop .= '<li style="list-style-type:none;">';
                $oday_drop .= '<input type="checkbox" value="' . $day->id . '" name="oday[]"> ' . $day->days . '';
                $oday_drop .= '</li>';
            }
        }


        // $cday_drop = '';
        // $cday_drop .= '<select class="form-control" name="cday" id="">';
        // $cday_drop .= '<option value="">-- Select --</option>';

        // $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        // foreach($days as $day)
        // {
        //     $select =  $store->cday == $day ? 'selected' : '';
        //     $cday_drop .= '<option value="'.$day.'" '.$select.'>';

        //     $cday_drop .= $day;

        //     $cday_drop .= '</option>';
        // }
        // $cday_drop .= '</select>';


        $cinterval = '+60 minutes';
        $ccurrent = strtotime('00:00');
        $cend = strtotime('23:59');

        // $ctime_drop = '';
        // $ctime_drop .= '<select name="ctime" id="" class="form-control">';
        // $ctime_drop .= '<option value="">-- Select --</option>';
        // while ($ccurrent <= $cend)
        // {
        //     $time = date('h:i A', $ccurrent);
        //     $sel = ($time == $store->ctime) ? ' selected' : '';

        //     $ctime_drop .= "<option value=\"{$time}\"{$sel}>" . date('h:i A', $ccurrent) .'</option>';
        //     $ccurrent = strtotime($cinterval, $ccurrent);
        // }
        // $ctime_drop .= '</select>';


        $ointerval = '+60 minutes';
        $ocurrent = strtotime('00:00');
        $oend = strtotime('23:59');

        // $otime_drop = '';
        // $otime_drop .= '<select name="otime" id="" class="form-control">';
        // $otime_drop .= '<option value="">-- Select --</option>';
        // while ($ocurrent <= $oend)
        // {
        //     $time = date('h:i A', $ocurrent);
        //     $sel = ($time == $store->otime) ? ' selected' : '';

        //     $otime_drop .= "<option value=\"{$time}\"{$sel}>" . date('h:i A', $ocurrent) .'</option>';
        //     $ocurrent = strtotime($ointerval, $ocurrent);
        // }
        // $otime_drop .= '</select>';


        $country_drop = '';
        $country_drop .= '<select name="country" id="country-id" class="form-control">';
        $country_drop .= '<option value="">-- SELECT --</option>';

        $countries = Country::all();
        foreach ($countries as $country) {
            $select = old('country', $store->country) == $country->id ? 'selected' : '';
            $country_drop .= '<option value="' . $country->id . '" ' . $select . '>';

            $country_drop .= $country->name;

            $country_drop .= '</option>';
        }
        $country_drop .= '</select>';


        $state_drop = '';
        $state_drop .= '<select name="state" id="states-id" class="form-control">';
        $state_drop .= '<option value="">-- SELECT --</option>';
        $states = State::all();
        foreach ($states as $state) {
            $select = old('state', $store->state) == $state->id ? 'selected' : '';
            $state_drop .= '<option value="' . $state->id . '" ' . $select . '>';

            $state_drop .= $state->name;

            $state_drop .= '</option>';
        }
        $state_drop .= '</select>';

        return response()->json([
            'store' => $store,
            'country_drop' => $country_drop,
            'state_drop' => $state_drop,
            'oday_drop' => $oday_drop,
            // 'cday_drop' => $cday_drop,
            // 'ctime_drop' => $ctime_drop,
            // 'otime_drop' => $otime_drop
        ]);
    }
    public function states_store_edit(Request $request)
    {
        // dd($request->country);
        $states = State::where('country_id', $request->country)->get();
        $state_drop = '';
        $state_drop .= '<select name="state" id="states-id" class="form-control">';
        $state_drop .= '<option value="">Select State</option>';
        foreach ($states as $state) {
            $state_drop .= '<option value="' . $state->id . '">' . $state->name . '</option>';
        }
        $state_drop .= '</select>';
        return response()->json(array('state_drop' => $state_drop));
    }
    public function store_update(Request $request)
    {
        // dd($request->all());
        $day_id = $request->oday;
        $store = Store::findOrFail($request->id);
        $store->update($request->except('_token', 'oday'));
        $days =  Days::get();

        //delete old saved record in deliveryDays table
        $deldays =  DeliveryDays::where('store_id', $request->id)->get();
        if (count($deldays) > 0) {
            foreach ($deldays as $delrecord) {
                if ($delrecord != null) {
                    $delrecord->delete();
                }
            }
        }
        // new Available days
        if ($day_id != null) {
            foreach ($day_id as $day_ID) {

                $delivery_days = new DeliveryDays();
                $delivery_days->days_id = $day_ID;
                $delivery_days->store_id = $store->id;
                $delivery_days->save();
            }
        }


        return redirect()->route('sa.stores.view')->with('status', 'Store has been Updated successfully');
    }
    public function stock($id)
    {
        $product =  RProduct::findOrFail($id);
        if ($product->out_of_stock == 1) {
            $product->out_of_stock = 0;
        } else {
            $product->out_of_stock = 1;
        }
        $product->update();
        return redirect()->back();
    }
    public function store_delete(Request $request)
    {
        // dd($request->all());
        //=== delete store

        $store = Store::findOrFail($request->id);
        $store->delete();
        // $store = Store::all();
        return back()->with('status', 'store has been Deleted successfully');
        //   return redirect()->route('sa.stores.view', compact('store'))->with('status','store has been Deleted successfully');
    }

    //=== Users ===
    public function users_view()
    {
        $users = User::all();
        $countries = Country::all();
        $states = State::all();
        return view('superadmin/users/users', compact('users', 'countries', 'states'));
    }
    public function user_save(Request $request)
    {
        // dd($request->all());

        $users = User::where('email', $request->email)->count();
        if ($users > '0') {
            return back()->with('msg', '*User Email is already exists');
        } else {
            $user = new user($request->except('_token', 'decrypt'));
            $user->save();
            $user_id = $user->id;
            $user = user::findOrFail($user_id);

            $decrypt = $request->password;
            $user->decrypt = $decrypt;
            $password = Hash::make($request->password);
            $user->password = $password;
            $user->assignrole($request->userrole);
            $user->update();

            $users = user::all();
            return redirect()->route('sa.users.view', compact('users'))->with('status', 'User has been Added successfully');
        }
    }
    public function get_edit_user_data(Request $request)
    {
        // dd($request->all());
        $user = user::findOrFail($request->id);
        $user_country_code = $user->country;

        $role = $roleName = $user->getRoleNames();
        $roles = $roleName = $user->getRoleNames();
        if ($roleName[0] == 'Retailer') {
            $role = 'User';
        } else {
            $role = $roleName = $user->getRoleNames();
        }
        $country_drop = '';
        $country_drop .= '<select name="country" id="country-id" class="form-control">';
        $country_drop .= '<option value="">-- SELECT --</option>';

        $countries = Country::all();
        foreach ($countries as $country) {
            $select = old('country', $user->country) == $country->id ? 'selected' : '';
            $country_drop .= '<option value="' . $country->id . '" ' . $select . '>';

            $country_drop .= $country->name;

            $country_drop .= '</option>';
        }
        $country_drop .= '</select>';


        $state_drop = '';
        $state_drop .= '<select name="state" id="states-id" class="form-control">';
        $state_drop .= '<option value="">-- SELECT --</option>';
        $states = State::where('country_id', $user_country_code)->get();
        foreach ($states as $state) {
            $select = old('state', $user->state) == $state->id ? 'selected' : '';
            $state_drop .= '<option value="' . $state->id . '" ' . $select . '>';

            $state_drop .= $state->name;

            $state_drop .= '</option>';
        }
        $state_drop .= '</select>';
        return response()->json(array('user' => $user, 'role' => $role, 'country_drop' => $country_drop, 'state_drop' => $state_drop));
    }
    public function states_user_edit(Request $request)
    {
        // dd($request->country);
        $states = State::where('country_id', $request->country)->get();
        $state_drop = '';
        $state_drop .= '<select name="state" id="states-id" class="form-control">';
        $state_drop .= '<option value="">Select State</option>';
        foreach ($states as $state) {
            $state_drop .= '<option value="' . $state->id . '">' . $state->name . '</option>';
        }
        $state_drop .= '</select>';
        return response()->json(array('state_drop' => $state_drop));
    }
    public function user_update(Request $request)
    {
        // dd($request->all());
        $user = User::findOrFail($request->id);
        $user->update($request->except('_token'));

        $user = User::findOrFail($request->id);
        $password = Hash::make($request->decrypt);
        $user->password = $password;
        $user->update();

        if ($request->userrole != 'null' && $request->userrole != null) {
            $roles = $user->getRoleNames();
            $user->roles()->detach();
            // $user->removeRole($request->current_role);
            $user->assignRole($request->userrole);
        }
        // $status = 'User has been Updated successfully';
        // return back()->with(['status' => $status]);
        return redirect()->route('sa.users.view')->with('status', 'User has been Updated successfully');
    }
    public function user_block(Request $request)
    {
        // dd($request->all());
        $user = user::findOrFail($request->id);
        if ($user->status == '1') {
            $user->status = '0';
            $user->save();
            return redirect(route('sa.users.view'))->with('status', 'User is BLOCKED Successfully');
        }
        if ($user->status == '0') {
            $user->status = '1';
            $user->save();
            return redirect(route('sa.users.view'))->with('status', 'User is Un-BLOCKED Successfully');
        }
    }

    //=== CATEGORIES ===
    public function categories_view()
    {
        $categories = Category::all();
        return view('superadmin/categories/categories', compact('categories'));
    }
    public function category_save(Request $request)
    {
        // dd($request->all());
        $categories = Category::where('name', $request->name)->count();
        if ($categories > '0') {
            return back()->with('msg', 'Category is already exists');
        } else {

            $category = new Category($request->except('_token'));
            // if ($file = $request->file('pic'))
            // {
            //     $name = $file->getClientOriginalName();
            //     $destinationPath = public_path('/docs/pics');
            //     $file->move($destinationPath, $name);
            //     $category->pic = $name;
            // }

            $category->save();
            $categories = Category::all();
            return redirect()->route('sa.categories.view', compact('categories'))->with('status', 'Category has been Added successfully');
        }
    }
    public function get_edit_category_data(Request $request)
    {
        // dd($request->all());
        $category = Category::findOrFail($request->id);
        // $old_pic = '';
        // $old_pic .= '<img src="{{ asset(/docs/pics/'.$Category->pic.') }}" id="old-pic" width="50px" />';
        // $old_pic .= '<img src="/docs/pics/'.$category->pic.'" id="old-pic" width="50px" />';
        // return response()->json(array('category' => $category, 'old_pic' => $old_pic));
        return response()->json(array('category' => $category));
    }
    public function category_update(Request $request)
    {
        // dd($request->all());
        $category = Category::findOrFail($request->id);
        $category->update($request->except('_token'));
        // if ($file = $request->file('pic'))
        // {
        //     //delete old pic
        //     $old_path = public_path('/docs/pics/'.$category->pic);
        //     unlink($old_path);
        //     //save new pic
        //     $name = $file->getClientOriginalName();
        //     $destinationPath = public_path('/docs/pics');
        //     $file->move($destinationPath, $name);
        //     $category->pic = $name;
        //     $category->save();
        // }
        $categories = Category::all();
        return redirect()->route('sa.categories.view', compact('categories'))->with('status', 'Category has been Updated successfully');
    }
    public function category_delete(Request $request)
    {
        // dd($request->all());
        $subcategories = SubCategory::where('category_id', $request->id)->get();

        //=== delete products
        foreach ($subcategories as $subcategory) {
            $products = RProduct::where('sub_category_id', $subcategory->id)->get();
            foreach ($products as $product) {
                $product->delete();
            }
        }

        //=== delete sub-categories
        foreach ($subcategories as $subcategory) {
            $subcategory->delete();
        }

        //=== delete category
        $category = Category::findOrFail($request->id);
        $category->delete();

        $categories = Category::all();
        return redirect()->route('sa.categories.view', compact('categories'))->with('status', 'Category has been Deleted successfully');
    }


    //=== SUB-CATEGORIES ===
    public function sub_categories_view()
    {
        $categories = Category::all();
        $sub_categories = SubCategory::with('getCat')->get();
        return view('superadmin.subcategories.subcategories', compact('sub_categories', 'categories'));
    }
    public function sub_category_save(Request $request)
    {
        // dd($request->all());
        $sub_categories = SubCategory::where('name', $request->name)->count();
        if ($sub_categories > '0') {
            return back()->with('msg', 'Sub-Category is already exists');
        } else {
            $category_id = Category::where('name', $request->category)->get('id');
            $subcategory = new SubCategory($request->except('_token', 'category'));
            // if ($file = $request->file('pic'))
            // {
            //     $name = $file->getClientOriginalName();
            //     $destinationPath = public_path('/docs/pics');
            //     $file->move($destinationPath, $name);
            //     $subcategory->pic = $name;
            // }

            $subcategory->save();
            $subcategory->category_id = $category_id->first()->id;
            $subcategory->save();

            return redirect()->route('sa.sub.categories.view', compact('sub_categories'))->with('status', 'Sub-Category has been Added successfully');
        }
    }
    public function get_edit_sub_category_data(Request $request)
    {
        // dd($request->all());
        $subcategory = SubCategory::findOrFail($request->id);
        $category_id = $subcategory->category_id;

        $maincat_drop = '';
        $maincat_drop .= '<select name="category_id" id="main-category-id" class="form-control">';
        $maincat_drop .= '<option value="">-- SELECT --</option>';

        $categories = Category::all();
        foreach ($categories as $category) {
            $select = old('id', $category_id) == $category->id ? 'selected' : '';
            $maincat_drop .= '<option value="' . $category->id . '" ' . $select . '>';

            $maincat_drop .= $category->name;

            $maincat_drop .= '</option>';
        }
        $maincat_drop .= '</select>';

        // $old_pic = '';
        // $old_pic .= '<img src="{{ asset(/docs/pics/'.$subcategory->pic.') }}" id="old-pic" width="50px" />';
        // $old_pic .= '<img src="/docs/pics/'.$subcategory->pic.'" id="old-pic" width="50px" />';
        // return response()->json(array('subcategory' => $subcategory, 'old_pic' => $old_pic));
        return response()->json(array('subcategory' => $subcategory, 'maincat_drop' => $maincat_drop));
    }
    public function sub_category_update(Request $request)
    {
        //  dd($request->all());
        $subcategory = SubCategory::findOrFail($request->id);
        $subcategory->update($request->except('_token'));
        // if ($file = $request->file('pic'))
        // {
        //     //delete old pic
        //     $old_path = public_path('/docs/pics/'.$subcategory->first()->pic);
        //     unlink($old_path);
        //     //save new pic
        //     $name = $file->getClientOriginalName();
        //     $destinationPath = public_path('/docs/pics');
        //     $file->move($destinationPath, $name);
        //     $subcategory->pic = $name;
        //     $subcategory->save();
        // }
        $sub_categories = SubCategory::all();
        return redirect()->route('sa.sub.categories.view', compact('sub_categories'))->with('status', 'Sub-Category has been Updated successfully');
    }
    public function sub_category_delete(Request $request)
    {
        // dd($request->all());
        //=== delete products
        $products = RProduct::where('sub_category_id', $request->id)->get();
        foreach ($products as $product) {
            $product->delete();
        }
        $dproduct = DProduct::where('sub_category_id', $request->id)->get();
        foreach ($dproduct as $product) {
            $product->delete();
        }

        $subcategory = SubCategory::findOrFail($request->id);
        $subcategory->delete();
        $sub_categories = SubCategory::all();
        return redirect()->route('sa.sub.categories.view', compact('sub_categories'))->with('status', 'Sub-Category has been Deleted successfully');
    }

    //=== PRODUCTS ===
    public function add_product_form()
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('superadmin.products.products', compact('sub_categories', 'categories'));
    }
    public function get_subcat_json(Request $request)
    {
        // dd($request->cat_id);
        $sub_categories = SubCategory::where('category_id', $request->cat_id)->get();

        $subcat_drop = '';
        $subcat_drop .= '<select class="form-control" name="sub_category_id" id="sub-category-id" required>';
        $subcat_drop .= '<option value="">--- Select Sub-Category ---</option>';

        foreach ($sub_categories as $category) {
            $subcat_drop .= '<option value="' . $category->id . '">' . $category->name . '</option>';
        }
        $subcat_drop .= '</select>';
        return response()->json(array('subcat_drop' => $subcat_drop));
    }






    public function product_save(Request $request)
    {
        // dd($request->all());
        $rproducts = RProduct::where('item_id', $request->item_id)->count();

        if ($rproducts > '0') {
            return back()->with('msg', 'Product is already exists with this BAR CODE');
        } else {
            $this->validate($request, [
                // 'sub_category_id' => 'required',
            ]);
            // ===saving retailer product
            $sub_category_id = SubCategory::where('name', $request->sub_category_id)->get('id');
            $rproduct = new RProduct();
            if ($file = $request->file('pic')) {
                //=== compress image
                $image = $request->file('pic');
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/docs/pics');
                $img = Image::make($image->getRealPath())->resize(300, 300)->save($destinationPath . '/' . $input['imagename']);

                $rproduct->pic = $input['imagename'];
            }
            if ($request->r_weight_oz != null) {

                $string = $request->r_weight_oz;
                $string .= "oz";
                $rproduct->r_weight =  $string;
            }
            if ($request->r_weight_pl != null) {

                $string = $request->r_weight_pl;
                $string .= "lb";
                $rproduct->r_weight =  $string;
            }
             if ($request->r_weight_kg != null) {

                $string = $request->r_weight_kg;
                $string .= "kg";
                $rproduct->r_weight =  $string;
            }
            // dd($rproduct);
            $rproduct->item_id = $request->item_id;
            $rproduct->name = $request->name;
            $rproduct->sub_category_id = $request->sub_category_id;
            $rproduct->r_price = $request->r_price;
            $rproduct->t_price = $request->t_price;
            $rproduct->price_unit = $request->price_unit;
            $rproduct->r_weight = $string;
            $rproduct->t_weight = $request->t_weight;
            $rproduct->desc = $request->desc;

            //////////////////////////////////new Added////////////
            // $rproduct->featured = $request->featured;
            ////////////////////////////////////////////////

            $rproduct->save();
            return redirect()->back()->with('status', 'Product has been Added successfully');

            // $rprod_id = RProduct::where('id', $rproduct->id)->first();
            // $count =  count($request->variant_price);

            // for ($i = 0; $i < $count; $i++) {
            //     $price = $request->variant_price[$i];
            //     $weight = $request->variant_weight[$i];
            //     $unit = $request->variant_unit[$i];


            //     $variants = new PVariant();
            //     $variants->price = $price;
            //     $variants->weight = $weight;
            //     $variants->unit = $unit;
            //     $variants->r_product_id = $rprod_id->id;

            //     $image = isset($request->variant_image[$i]) ? $request->variant_image[$i] : null;

            //     if ($image != null) {
            //         //=== compress image
            //         $input['imagename'] = time() . $i . '.' . $image->getClientOriginalExtension();
            //         $destinationPath = public_path('/docs/pics');
            //         $img = Image::make($image->getRealPath())->resize(300, 300)->save($destinationPath . '/' . $input['imagename']);
            //         $variants->image  = $input['imagename'];
            //     }


            //     // $variants->save();

                 }
            }



            // else if($request->d_product == 'on' && $request->r_product == 'on')
            // {
            //     $this->validate($request, [
            //         'no_of_cases' => 'required',
            //         'no_of_units' => 'required',
            //         'unit' => 'required',
            //         'd_price' => 'required',
            //         'r_weight' => 'required',
            //         'd_weight' => 'required',
            //         'r_price' => 'required',
            //         'sub_category_id' => 'required',
            //     ]);

            //===saving distributor product
            // $sub_category_id = SubCategory::where('name', $request->sub_category_id)->get('id');
            // $dproduct = new DProduct($request->except('_token','pic','category','d_product','r_product','r_weight','r_price','unit'));
            // if ($file = $request->file('pic'))
            // {
            //     //=== compress image
            //     $image = $request->file('pic');
            //     $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            //     $destinationPath = public_path('/docs/pics');
            // $img = Image::make($image->getRealPath());
            // $img->resize(300, 300, function ($constraint) {
            //     $constraint->aspectRatio();
            // })->save($destinationPath.'/'.$input['imagename']);
            //     $img = Image::make($image->getRealPath())->resize(300, 300)->save($destinationPath.'/'.$input['imagename']);

            //     $dproduct->pic = $input['imagename'];
            // }
            // $dproduct->save();

            //===saving retailer product
            // $sub_category_id = SubCategory::where('name', $request->sub_category_id)->get('id');
            // $rproduct = new RProduct($request->except('_token','category','d_product','r_product','pic','no_of_cases','no_of_units','d_price','d_weight'));
            // if ($file = $request->file('pic'))
            // {
            //     //=== compress image
            //     $image = $request->file('pic');
            //     $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            //     $destinationPath = public_path('/docs/pics');
            //     // $img = Image::make($image->getRealPath());
            //     // $img->resize(300, 300, function ($constraint) {
            //     //     $constraint->aspectRatio();
            //     // })->save($destinationPath.'/'.$input['imagename']);
            //     $img = Image::make($image->getRealPath())->resize(300, 300)->save($destinationPath.'/'.$input['imagename']);

            //     $rproduct->pic = $input['imagename'];
            // }
            // $rproduct->save();
            // return redirect()->route('sa.add.product.form')->with('status','Both Retailer & Distributor Product has been Added successfully');
            // }
            // else if($request->d_product == null && $request->r_product == null)
            // {
            //     return back()->with('msg','Select one of the checkbox Distributor / Retailer Product');
            // }
            // else
            // {
            //     return back()->with('msg','Select one of the checkbox Distributor / Retailer Product');
            // }
    //     }
    // }

    //=== import_products
    public function import_products(Request $request)
    {
        // dd(request()->all());

        $this->validate($request, [
            'sheet' => 'required|mimes:csv,txt'
        ]);
        Excel::import(new ProductImport(), request()->file('sheet'));
        return redirect()->route('sa.add.product.form')->with('status', 'Sheet has been Added successfully');
    }

    //=== RPRODUCTS ===
    public function rproducts_view()
    {
        $rproducts = RProduct::with('getSubCat')->get();
        // dd($rproducts);
        $sub_categories = SubCategory::all();

        return view('superadmin.rproducts.rproducts', compact('rproducts', 'sub_categories'));
    }
    public function rproduct_save(Request $request)
    {
        //dd($request->all());
        $rproducts = RProduct::where('item_id', $request->item_id)->count();
        if ($rproducts > '0') {
            return back()->with('msg', 'Product is already exists with this BAR CODE');
        } else {
            //=== validation
            // $this->validate($request, [
            //     'pic' => 'required|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100|dimensions:max_width=600,max_height=600',
            // ]);

            //===saving
            $sub_category_id = SubCategory::where('name', $request->sub_category)->get('id');
            $rproduct = new RProduct($request->except('_token', 'sub_category', 'pic'));
            if ($file = $request->file('pic')) {
                //=== compress image
                $image = $request->file('pic');
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/docs/pics');
                // $img = Image::make($image->getRealPath());
                // $img->resize(300, 300, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save($destinationPath.'/'.$input['imagename']);
                $img = Image::make($image->getRealPath())->resize(300, 300)->save($destinationPath . '/' . $input['imagename']);

                $rproduct->pic = $input['imagename'];
            }

            $rproduct->save();
            $rproduct->sub_category_id = $sub_category_id->first()->id;
            $rproduct->save();
            return redirect()->route('sa.rproducts.view', compact('rproducts'))->with('status', 'Product has been Added successfully');
        }
    }
    public function get_edit_rproduct_data(Request $request)
    {
        // dd($request->all());
        $rproduct = RProduct::findOrFail($request->id);
        $subcat = SubCategory::where('id', $rproduct->sub_category_id)->first();
        $maincat = $subcat->category_id;

        $old_pic = '';
        $old_pic .= '<img src="docs/pics/' . $rproduct->pic . '" id="old-pic" width="50px" />';

        $subcat_drop = '';
        $subcat_drop .= '<select name="sub_category_id" id="sub-category-id" class="form-control">';
        $subcat_drop .= '<option value="">-- SELECT --</option>';

        $subcategories = SubCategory::where('category_id', $maincat)->get();

        foreach ($subcategories as $cat) {
            $select = old('category', $rproduct->sub_category_id) == $cat->id ? 'selected' : '';
            $subcat_drop .= '<option value="' . $cat->id . '" ' . $select . '>';

            $subcat_drop .= $cat->name;

            $subcat_drop .= '</option>';
        }
        $subcat_drop .= '</select>';


        $maincat_drop = '';
        $maincat_drop .= '<select name="main_category_id" id="main-category-id" class="form-control">';
        $maincat_drop .= '<option value="">-- SELECT --</option>';

        $categories = Category::all();
        foreach ($categories as $category) {
            $select = old('id', $maincat) == $category->id ? 'selected' : '';
            $maincat_drop .= '<option value="' . $category->id . '" ' . $select . '>';

            $maincat_drop .= $category->name;

            $maincat_drop .= '</option>';
        }
        $maincat_drop .= '</select>';

        return response()->json(array('rproduct' => $rproduct, 'old_pic' => $old_pic, 'subcat_drop' => $subcat_drop, 'maincat_drop' => $maincat_drop));
    }
    public function rproduct_update(Request $request)
    {
        // dd($request->all());

        $rproduct = RProduct::findOrFail($request->id);

        $rproduct->update($request->except('_token', 'pic', 'main_category_id'));


        if ($file = $request->file('pic')) {
            $this->validate($request, [
                'pic' => 'required|mimes:jpeg,png,jpg,gif,svg',
            ]);
            //delete old pic
            // $old_path = public_path('/docs/pics/'.$rproduct->pic);
            // unlink($old_path);
            //save new pic
            //=== compress image
            $image = $request->file('pic');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/docs/pics');
            $img = Image::make($image->getRealPath())->resize(300, 300)->save($destinationPath . '/' . $input['imagename']);

            $rproduct->pic = $input['imagename'];
        }



        $rproduct->update();
        if ($request->featured == null) {
            $rproduct->featured = null;
            $rproduct->update();
        }
        if ($request->sales == null) {
            $rproduct->sales = null;
            $rproduct->update();
        }
        $rproducts = RProduct::all();
        return redirect()->route('sa.rproducts.view', compact('rproducts'))->with('status', 'Product has been Updated successfully');
    }
    public function rproduct_delete(Request $request)
    {
        // dd($request->all());
        $rproduct = RProduct::findOrFail($request->id);
        $rproduct->delete();
        $rproducts = RProduct::all();
        return redirect()->route('sa.rproducts.view', compact('rproducts'))->with('status', 'Product has been Deleted successfully');
    }

    //=== Orders ===
    public function r_orders()
    {
        $orders = Retailerorder::with('get_rinfo.get_rproducts', 'get_user', 'get_rshipping')->get();

        return view('superadmin.orders.rorders', compact('orders'));
    }
    public function sa_view_rorder($id)
    {

        $order = Retailerorder::with('get_rinfo.get_rproducts', 'get_user', 'get_rshipping')->findOrFail($id);
        return view('superadmin/orders/rorder-view', compact('order'));
    }
    public function rorder_pdf(Request $request)
    {
        // dd($request->all());
        $order_id = $request->order_id;
        $order = Retailerorder::with('get_rinfo.get_rproducts', 'get_user', 'get_rshipping')->findOrFail($request->order_id);
        $countries = Country::all();
        $states = State::all();
        foreach ($countries as $country) {
            if ($country->id == $order->get_rshipping->first()->country) {
                $country = $country->name;
                break;
            }
        }
        foreach ($states as $state) {
            if ($state->id == $order->get_rshipping->first()->state) {
                $state = $state->name;
                break;
            }
        }
        ini_set('memory_limit', '512M');
        $pdf = PDF::loadView('frontend/pdf/rinvoice', compact('order', 'state', 'country'));
        return $pdf->stream();
    }


    public function d_orders()
    {
        $orders = Distributororder::with('get_dinfo.get_dproducts', 'get_user', 'get_dshipping')->get();
        return view('superadmin.orders.dorders', compact('orders'));
    }
    public function sa_view_dorder($id)
    {
        $order = Distributororder::with('get_dinfo.get_dproducts', 'get_user', 'get_dshipping')->findOrFail($id);
        return view('superadmin/orders/dorder-view', compact('order'));
    }
    public function dorder_pdf(Request $request)
    {
        // dd($request->all());
        $order_id = $request->order_id;
        $order = Distributororder::with('get_dinfo.get_dproducts', 'get_user', 'get_dshipping')->findOrFail($request->order_id);
        $countries = Country::all();
        $states = State::all();
        foreach ($countries as $country) {
            if ($country->id == $order->get_dshipping->first()->country) {
                $country = $country->name;
                break;
            }
        }
        foreach ($states as $state) {
            if ($state->id == $order->get_dshipping->first()->state) {
                $state = $state->name;
                break;
            }
        }

        ini_set('memory_limit', '512M');
        $pdf = PDF::loadView('frontend/pdf/dinvoice', compact('order', 'state', 'country'));
        return $pdf->stream();
    }

    //=== dproducts ===
    public function dproducts_view()
    {
        $dproducts = DProduct::with('getSubCat')->get();
        $sub_categories = SubCategory::all();
        return view('superadmin.dproducts.dproducts', compact('dproducts', 'sub_categories'));
    }
    public function dproduct_save(Request $request)
    {
        // dd($request->all());
        $dproducts = DProduct::where('item_id', $request->item_id)->count();
        if ($dproducts > '0') {
            return back()->with('msg', 'Product is already exists with this BAR CODE');
        } else {
            //=== validation
            // $this->validate($request, [
            //     'pic' => 'required|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100|dimensions:max_width=600,max_height=600',
            // ]);

            //===saving
            $sub_category_id = SubCategory::where('name', $request->sub_category)->get('id');
            $dproduct = new DProduct($request->except('_token', 'sub_category', 'pic'));
            if ($file = $request->file('pic')) {
                //=== compress image
                $image = $request->file('pic');
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/docs/pics');
                // $img = Image::make($image->getRealPath());
                // $img->resize(300, 300, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save($destinationPath.'/'.$input['imagename']);
                $img = Image::make($image->getRealPath())->resize(300, 300)->save($destinationPath . '/' . $input['imagename']);

                $dproduct->pic = $input['imagename'];
            }

            $dproduct->save();
            $dproduct->sub_category_id = $sub_category_id->first()->id;
            $dproduct->save();
            return redirect()->route('sa.dproducts.view', compact('dproducts'))->with('status', 'Distributor Product has been Added successfully');
        }
    }
    public function get_edit_dproduct_data(Request $request)
    {
        // dd($request->all());
        $dproduct = DProduct::findOrFail($request->id);
        $old_pic = '';
        $old_pic .= '<img src="docs/pics/' . $dproduct->pic . '" id="old-pic" width="50px" />';

        $subcat_drop = '';
        $subcat_drop .= '<select name="sub_category_id" id="sub-category-id" class="form-control">';
        $subcat_drop .= '<option value="">-- SELECT --</option>';

        $subcategories = SubCategory::all();
        foreach ($subcategories as $category) {
            $select = old('category', $dproduct->sub_category_id) == $category->id ? 'selected' : '';
            $subcat_drop .= '<option value="' . $category->id . '" ' . $select . '>';

            $subcat_drop .= $category->name;

            $subcat_drop .= '</option>';
        }
        $subcat_drop .= '</select>';

        return response()->json(array('dproduct' => $dproduct, 'old_pic' => $old_pic, 'subcat_drop' => $subcat_drop));
    }
    public function dproduct_update(Request $request)
    {
        // dd($request->all());
        $dproduct = DProduct::findOrFail($request->id);
        $dproduct->update($request->except('_token', 'pic'));
        if ($file = $request->file('pic')) {
            //delete old pic
            // $old_path = public_path('/docs/pics/'.$dproduct->pic);
            // unlink($old_path);
            //save new pic
            //=== compress image
            $image = $request->file('pic');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/docs/pics');
            // $img = Image::make($image->getRealPath());
            // $img->resize(300, 300, function ($constraint) {
            //     $constraint->aspectRatio();
            // })->save($destinationPath.'/'.$input['imagename']);
            $img = Image::make($image->getRealPath())->resize(300, 300)->save($destinationPath . '/' . $input['imagename']);
            $dproduct->pic = $input['imagename'];
        }
        $dproduct->update();
        if ($request->featured == null) {
            $dproduct->featured = null;
            $dproduct->update();
        }
        if ($request->sales == null) {
            $dproduct->sales = null;
            $dproduct->update();
        }
        $dproducts = DProduct::all();
        return redirect()->route('sa.dproducts.view', compact('dproducts'))->with('status', 'Distributor Product has been Updated successfully');
    }
    public function dproduct_delete(Request $request)
    {
        // dd($request->all());
        $dproduct = DProduct::findOrFail($request->id);
        $dproduct->delete();
        $dproducts = DProduct::all();
        return redirect()->route('sa.dproducts.view', compact('dproducts'))->with('status', 'Distributor Product has been Deleted successfully');
    }

    //=== WPRODUCTS ===
    public function wproducts_view()
    {
        $wproducts = WProduct::with('getSubCat')->get();
        $sub_categories = SubCategory::all();
        return view('superadmin.wproducts.wproducts', compact('wproducts', 'sub_categories'));
    }
    public function wproduct_save(Request $request)
    {
        // dd($request->all());
        $wproducts = WProduct::where('name', $request->name)->count();
        if ($wproducts > '0') {
            return back()->with('msg', 'Whole Product is already exists');
        } else {
            $sub_category_id = SubCategory::where('name', $request->sub_category)->get('id');
            $wproduct = new WProduct($request->except('_token', 'sub_category', 'pic'));
            if ($file = $request->file('pic')) {
                $name = $file->getClientOriginalName();
                $destinationPath = public_path('/docs/pics');
                $file->move($destinationPath, $name);
                $wproduct->pic = $name;
            }

            $wproduct->save();
            $wproduct->sub_category_id = $sub_category_id->first()->id;
            $wproduct->save();
            return redirect()->route('sa.wproducts.view', compact('wproducts'))->with('status', 'Whole Product has been Added successfully');
        }
    }
    public function get_edit_wproduct_data(Request $request)
    {
        // dd($request->all());
        $wproduct = WProduct::findOrFail($request->id);
        $old_pic = '';
        $old_pic .= '<img src="public/docs/pics/' . $wproduct->pic . '" id="old-pic" width="50px" />';
        return response()->json(array('wproduct' => $wproduct, 'old_pic' => $old_pic));
    }
    public function wproduct_update(Request $request)
    {
        // dd($request->all());
        $wproduct = WProduct::findOrFail($request->id);
        $wproduct->update($request->except('_token', 'pic'));
        if ($file = $request->file('pic')) {
            //delete old pic
            // $old_path = public_path('/docs/pics/'.$wproduct->pic);
            // unlink($old_path);
            //save new pic
            $name = $file->getClientOriginalName();
            $destinationPath = public_path('/docs/pics');
            $file->move($destinationPath, $name);
            $wproduct->pic = $name;
            $wproduct->save();
        }
        if ($request->featured == null) {
            $wproduct->featured = null;
            $wproduct->save();
        }
        if ($request->sales == null) {
            $wproduct->sales = null;
            $wproduct->save();
        }
        $wproducts = WProduct::all();
        return redirect()->route('sa.wproducts.view', compact('wproducts'))->with('status', 'Whole Product has been Updated successfully');
    }
    public function wproduct_delete(Request $request)
    {
        // dd($request->all());
        $wproduct = WProduct::findOrFail($request->id);
        $wproduct->delete();
        $wproducts = WProduct::all();
        return redirect()->route('sa.wproducts.view', compact('wproducts'))->with('status', 'Whole Product has been Deleted successfully');
    }

    //=== marquees ===
    public function marquees_view()
    {
        $marquees = Marquee::all();
        return view('superadmin.marquees.marquees', compact('marquees'));
    }
    public function marquee_save(Request $request)
    {
        // dd($request->all());

        //=== validation
        $this->validate($request, [
            'pic' => 'required|mimes:jpeg,png,jpg,gif,svg',
            // 'pic' => 'required|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=1200,min_height=400|dimensions:max_width=2500,max_height=500',
        ]);

        $marquees = new Marquee($request->except('_token', 'pic'));
        if ($file = $request->file('pic')) {
            $name = $file->getClientOriginalName();
            $destinationPath = public_path('/docs/pics');
            $file->move($destinationPath, $name);
            $marquees->pic = $name;
        }
        $marquees->save();
        return redirect()->route('sa.marquees.view', compact('marquees'))->with('status', 'Marquee has been Added successfully');
    }
    public function get_edit_marquee_data(Request $request)
    {
        // dd($request->all());
        $marquee = Marquee::findOrFail($request->id);
        $old_pic = '';
        $old_pic .= '<img src="public/docs/pics/' . $marquee->pic . '" id="old-pic" width="100%" />';
        return response()->json(array('marquee' => $marquee, 'old_pic' => $old_pic));
    }
    public function marquee_update(Request $request)
    {
        // dd($request->all());
        $marquee = Marquee::findOrFail($request->id);
        $marquee->update($request->except('_token', 'pic'));
        if ($file = $request->file('pic')) {
            //delete old pic
            $old_path = public_path('/docs/pics/' . $marquee->pic);
            unlink($old_path);
            //save new pic
            $name = $file->getClientOriginalName();
            $destinationPath = public_path('/docs/pics');
            $file->move($destinationPath, $name);
            $marquee->pic = $name;
            $marquee->save();
        }
        $marquees = Marquee::all();
        return redirect()->route('sa.marquees.view', compact('marquees'))->with('status', 'Marquee has been Updated successfully');
    }
    public function marquee_delete(Request $request)
    {
        // dd($request->all());
        $marquee = Marquee::findOrFail($request->id);
        $marquee->delete();
        $marquees = Marquee::all();
        return redirect()->route('sa.marquees.view', compact('marquees'))->with('status', 'Marquee has been Deleted successfully');
    }

    //=== jobs ===
    public function jobs_view()
    {
        $jobs = Job::all();
        $countries = Country::all();
        $states = State::all();
        return view('superadmin.jobs.jobs', compact('countries', 'states', 'jobs'));
    }
    public function job_save(Request $request)
    {
        // dd($request->all());
        $job = new Job($request->except('_token'));
        $job->save();
        return redirect()->route('sa.jobs.view')->with('status', 'Job has been Added successfully');
    }

    public function get_edit_job_data(Request $request)
    {
        // dd($request->all());

        $job = Job::findOrFail($request->id);
        $country_code = $job->country;

        $types = ['Part Time', 'Full Time'];
        $type_drop = '';
        $type_drop .= '<select name="type" class="form-control" required>';
        $type_drop .= '<option value="">-- SELECT --</option>';

        foreach ($types as $type) {
            $select =  $job->type == $type ? 'selected' : '';
            $type_drop .= '<option value="' . $type . '" ' . $select . '>';
            $type_drop .= $type;
            $type_drop .= '</option>';
        }
        $type_drop .= '</select>';

        $country_drop = '';
        $country_drop .= '<select name="country" id="countryjob-edit" class="form-control">';
        $country_drop .= '<option value="">-- SELECT --</option>';

        $countries = Country::all();
        foreach ($countries as $country) {
            $select = old('country', $job->country) == $country->id ? 'selected' : '';
            $country_drop .= '<option value="' . $country->id . '" ' . $select . '>';

            $country_drop .= $country->name;

            $country_drop .= '</option>';
        }
        $country_drop .= '</select>';


        $state_drop = '';
        $state_drop .= '<select name="state" id="statejob-edit" class="form-control">';
        $state_drop .= '<option value="">-- SELECT --</option>';
        $states = State::where('country_id', $country_code)->get();
        foreach ($states as $state) {
            $select = old('state', $job->state) == $state->id ? 'selected' : '';
            $state_drop .= '<option value="' . $state->id . '" ' . $select . '>';

            $state_drop .= $state->name;

            $state_drop .= '</option>';
        }
        $state_drop .= '</select>';
        return response()->json(array('job' => $job, 'state_drop' => $state_drop, 'country_drop' => $country_drop, 'type_drop' => $type_drop));
    }
    public function job_update(Request $request)
    {
        // dd($request->all());
        $job = Job::findOrFail($request->id);
        $job->update($request->except('_token'));
        return back()->with('status', 'Job has been Updated successfully');
    }
    public function job_delete(Request $request)
    {
        // dd($request->all());
        $job = Job::findOrFail($request->id);
        $job->delete();
        $jobs = Job::all();
        return redirect()->route('sa.jobs.view', compact('jobs'))->with('status', 'Job has been Deleted successfully');
    }

    public function connect()
    {
        $connect = connect::all();
        return view('superadmin/connect/connect', compact('connect'));
    }

       public function connect_create()
    {
        return view('superadmin/connect/add');
    }

public function connect_save(Request $request)
{
    // Validation rules
    $rules = [
        'region'=>'required',
        'type'=>'required',
        'email' => 'required|email',
        'phone_no' => 'required',
        'address' => 'required',
    ];

    // Custom validation messages
    $messages = [
        'region.required'=>'The region field is required.',
        'type.required'=>'The type field is required.',
        'email.required' => 'The email field is required.',
        'email.email' => 'Please provide a valid email address.',
        'phone_no.required' => 'The phone number field is required.',
        'address.required' => 'The address field is required.',
    ];

    // Validate the request
    $validator = Validator::make($request->all(), $rules, $messages);

    // Check if the validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // If validation passes, save the data to the 'connect' table
    $data = $request->all();

    // Create a new Connect instance
    $connect = new Connect();

    // Assign the validated data to the model attributes
    $connect->region=$data['region'];
    $connect->type=$data['type'];
    $connect->email = $data['email'];
    $connect->phone_no = $data['phone_no'];
    $connect->address = $data['address'];

    // Save the data to the database
    $connect->save();

    // Redirect or return a response
    return redirect()->back()->with('success', 'Data added successfully');
}


    public function get_connect_data(Request $request)
    {

        $connect = connect::findorfail($request->id);
        return response()->json(array('connect' => $connect));
    }
    public function connect_update(Request $request)
    {
        $connect = connect::findOrFail($request->id);

        $connect->region = $request->region;
        $connect->type = $request->type;
        $connect->email = $request->email;
        $connect->phone_no = $request->phone_no;
        $connect->address = $request->address;
        $connect->save();
        return redirect()->route('sa.connect')->with('status', 'Connect Info has been Updated successfully');
    }

public function connect_delete($id)
    {

        $connect = connect::findorfail($id);
        $connect->delete();
        return back()->with('msg', 'Data deleted successfully');
    }





    public function rproduct_update_status(Request $request)
    {
        $product = RProduct::findOrFail($request->product_id);

        if ($product->status == 1)
        {
            $product->status = 0;
        } else {
            $product->status = 1;
        }

        $product->save();
        //return response()->json($btnID);
        //dd($product->status);

    }


    public function show_service()
    {
        // $services = Service::all();
        $services = Service::all();
                return view('frontend.services.service', compact('services'));
    }

    public function show_service_index()
    {
        $servicepage = ServiceType::whereIn('status', [1])->get();



        return view('frontend.services.allservices', compact('servicepage'));
    }
    public function show_allservice(Request $request)
    {

        $servicepage = Service::where('type', 'Food Service')->get();
        return view('frontend.services.service_type', compact('servicepage'));
    }
    public function singlefranchise(Request $request)
    {

        $servicepage = Service::where('type', 'Franchise')->get();
        return view('frontend.services.service_type', compact('servicepage'));
    }

    public function singleservices(int $id)
    {

        $singleservice = Service::where('id', $id)->first();
        // dd($singleservice);
        return view('frontend.services.service_detail', compact('singleservice'));
    }

    public function service_create()
    {
        $types=ServiceType::all();
        return view('frontend.services.create-service',compact('types'));
    }
    public function service_type_create()
    {
        return view('frontend.services.create-service-type');
    }

    public function service_save(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=1600,min_height=400|dimensions:max_width=2500,max_height=1400',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/docs/pics/'), $imageName);
        }
        $serviceData = $request->except('_token');

        if (isset($imageName)) {
            $serviceData['image'] = $imageName;
        }
        $status=1;
        $serviceData['status']=$status;
        $service = new Service($serviceData);
        $service->save();
        return redirect('sa/dashboard');
    }
    public function service_type_save(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/docs/pics/services'), $imageName);
        }
        $serviceData = $request->except('_token');

        if (isset($imageName)) {
            $serviceData['image'] = $imageName;
        }
        $status=1;
        $serviceData['status']=$status;
        $service = new ServiceType($serviceData);
        $service->save();
        return redirect('service-create')->with('status', 'Service Type has been Created successfully');
    }

    public function service_edit($id)
    {
        // dd($id);
        $service = Service::findOrFail($id);
        $types = ServiceType::all();
        // dd($service);
        return view('frontend.services.service-edit', compact('service','types'));
    }
    public function service_update(Request $request)
    {
        $service = Service::findOrFail($request->id);
        $service->update($request->except('_token'));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/docs/pics/'), $imageName);
            $service->image = $imageName;
            $service->save();
        }

        return redirect('sa/dashboard');
    }
    public function service_delete(Request $request)
    {
        $service = Service::findOrFail($request->id);
        $service->delete();
        $services = Service::all();
        return redirect()->route('sa.show.service', compact('services'))->with('status', 'Service has been Deleted successfully');
    }

    public function service_view($id){
    $service = Service::findOrFail($id);
    return view('frontend.services.single-service', compact('service'));
    }

    public function show_varient($id)
    {
        $product_id = $id;
        $services = PVariant::where('r_product_id', $id)->get();
        // $varients = PVariant::get();
        // $categories = Category::all();
        // $sub_categories = SubCategory::all();
        // return view('superadmin.varient.varients', compact('categories', 'sub_categories', 'rproducts'));
        return view('superadmin.varient.varients', compact('services','product_id'));
    }
    public function aboutus()
    {
        $service = AboutUs::all();
        $aboutContent = AboutContent::all();
        return view('frontend.aboutus.showabout', compact('service','aboutContent'));
    }


    public function aboutus_edit($id){
        $service = AboutUs::findOrFail($id);
        return view('frontend.aboutus.aboutus-edit', compact('service'));
    }

    public function aboutus_update(Request $request)
    {

        $service = AboutUs::findOrFail($request->id);
        $service->update($request->except('_token'));

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/docs/pics/'), $imageName);
            $service->banner_image = $imageName;
            $service->save();
        }


        return redirect('sa/dashboard');
    }





    public function content_create(){
        return view('frontend.aboutus.create-content');
    }


    public function content_save(Request $request){
        // @dd($request->all());
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/docs/pics/'), $imageName);
        }
        $serviceData = $request->except('created_at','updated_at','_token');

        if (isset($imageName)) {
            $serviceData['image'] = $imageName;
        }

        $service = new AboutContent($serviceData);
        $service->save();
        return redirect('sa/aboutus');
    }

    public function content_edit($id){
        $content = AboutContent::findOrFail($id);
        return view('frontend.aboutus.edit-content', compact('content'));
    }

    public function content_delete($id)
    {
        $content = AboutContent::findOrFail($id);
        $content->delete();
        return redirect('sa/dashboard');
    }
    public function content_update(Request $request)
    {
        $content = AboutContent::findOrFail($request->id);
        $content->update($request->except('_token'));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/docs/pics/'), $imageName);
            $content->image = $imageName;
            $content->save();
        }


        return redirect('sa/dashboard');

    }



                             // varients controller methods

       public function varient_create($id)
      {

          return view('superadmin.varient.create-varient', compact('id'));
      }

      public function varient_save(Request $request)
      {
          // $this->validate($request, [
          //     'image' => 'required|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=1200,min_height=400|dimensions:max_width=2500,max_height=400',
          // ]);
          if ($request->hasFile('image')) {
              $image = $request->file('image');
              $imageName = time() . '.' . $image->getClientOriginalExtension();
              $image->move(public_path('/docs/pics/'), $imageName);
          }
          $serviceData = $request->except('_token');

          if (isset($imageName)) {
              $serviceData['image'] = $imageName;
          }
          $service = new PVariant();
          $service->price = $serviceData['price'];
          $service->unit = $serviceData['unit'];
          $service->weight = $serviceData['weight'];
          $service->image = $serviceData['image'];
          $service->r_product_id = $serviceData['r_product_id'];
          $service->save();
          return redirect('sa/dashboard');
      }


      public function varient_edit($id)
      {
          $service = PVariant::findOrFail($id);
          // dd($service);
          return view('superadmin.varient.varient-edit', compact('service'));
      }


      public function varient_update(Request $request)
      {
          $service = PVariant::findOrFail($request->id);
          $service->update($request->except('_token'));

          if ($request->hasFile('image')) {
              $image = $request->file('image');
              $imageName = time() . '.' . $image->getClientOriginalExtension();
              $image->move(public_path('/docs/pics/'), $imageName);
              $service->image = $imageName;
              $service->save();
          }

          return redirect('sa/dashboard');
      }

      public function varient_delete($id)
      {

          $variant = PVariant::findOrFail($id);
          $product_id = $variant->r_product_id;
          $services = PVariant::where('r_product_id', $product_id)->get();
          $variant->delete();
          return redirect()->route('show.varient', ['id' => $variant->r_product_id])->with('status', 'Variant has been deleted successfully','services');
          //   return redirect()->route('show.varient', compact('services'))->with('status', 'Variant has been Deleted successfully');
      }

}
