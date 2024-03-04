<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Mail;
use App\User;
use App\State;
use Validator;
use App\Country;
use App\Models\Job;
use App\Models\Store;
use App\Models\AboutUs;
use App\Models\Connect;
use App\Models\Marquee;
use App\Models\Service;
use App\Models\Category;
use App\Models\DProduct;
use App\Models\PVariant;
use App\Models\RProduct;
use App\Models\SubCategory;
use App\Models\AboutContent;
use Illuminate\Http\Request;
use App\Models\Retailerorder;
use App\Models\Distributororder;
use App\Models\Retailerorderinfo;
use App\Models\Distributororderinfo;
use App\Models\Retailerordershipping;
use Illuminate\Support\Facades\Input;
use App\Models\Distributorordershipping;

class UserController extends Controller
{
    
    public function stores()
    {
        
        $stores = null;
        $countries = Country::all();
    
        $states=State::orderBy('name')->get();
        // echo "<pre>";
        // var_dump($states);
      
        // echo "</pre>";   
        $connects = Connect::first();  
        
        return view('frontend/stores/stores', compact('stores','countries','states','connects'));
    }
    public function search_store(Request $request)
    {
         
        if ($request->country == null && $request->state == null && $request->city == null && $request->zip_code == null )
        {
            
            return redirect()->route('stores')->with('msg','Please select atleast one field');
        }
        elseif ($request->country != null && $request->state != null && $request->city != null && $request->zip_code != null )
        {
            
            $country = $request->country;
            $state = $request->state;
            $city = $request->city;
            $zip_code = $request->zip_code;
        
             $stores = Store::with('devlivery_days.days')->where('country', $country)
                        ->where('city', $city)
                 
                        ->where('state', $state  )
                        ->where('zip_code', $zip_code)->get();
            $countries = Country::all();
            
            $states=State::orderBy('name')->get();
            if(empty($stores[0]))
           {
               return redirect()->back()->with('msg','Sorry Delivery Locations not available');
           }
            return view('frontend/stores/stores', compact('stores','countries','states'));

        }
        elseif ($request->country != null && $request->state != null)
        {
            //  dd("3rd if");  
            // dd($request->all());
            $country = $request->country;
            $state = $request->state;
            
            $stores = Store::where('country', $country)->where('state', $state)->get();
            $countries = Country::all();
            $states = State::orderBy('name')->get()->all();
            
            if(empty($stores[0]))
           {
               return redirect()->back()->with('msg','Sorry  No Delivery Locations Found ');
           }
            return view('frontend/stores/stores', compact('stores','countries','states'));
        }
        // if ($request->state != null )
        // {
        //     // dd($request->all());
        //     $state = $request->state;
        //     $stores = Store::where('state', $state)->get();
        //     $countries = Country::all();
        //     $states = State::all();
        //     return view('frontend/stores/stores', compact('stores','countries','states'));
        // }
        elseif ($request->city != null )
        {
            
            // dd($request->all());
            $city = $request->city;
            $stores = Store::where('city', $city)->get();
            $countries = Country::all();
            $states = State::all();
            return view('frontend/stores/stores', compact('stores','countries','states'));
        }
        elseif ($request->zip_code != null )
        {
            
            // dd($request->all());
            $zip_code = $request->zip_code;
            $stores = Store::where('zip_code', $zip_code)->get();
            $countries = Country::all();
            $states = State::all();
            return view('frontend/stores/stores', compact('stores','countries','states'));
        }
        else
        {
            return redirect()->route('stores')->with('msg','Please select Country');
        }
    }
    
    public function SupportNumber()
    {
        $user = User::findOrFail(1);
        $number = $user->site_number;
       return view('superadmin.number.number', compact('number'));
    }
    
    public function SupportStoreNumber(Request $request)
    {
        $user = User::findOrFail(1);
        $user->site_number = $request->site_number;
        $user->update();
        return redirect()->back()->with('status','Number has been Updated');
    }
    
    public function user_view_order($id)
    {
        // dd($id);
        $order_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $roleName = $user->getRoleNames();
        // if ($roleName[0] == 'Retailer')
        // {
            $order = Retailerorder::with('get_rinfo.get_rproducts','get_user','get_rshipping')->findOrFail($order_id);
            $countries = Country::all();
            $states = State::all();
            foreach ($countries as $country)
            {
                if ($country->id == $order->get_rshipping->first()->country)
                {
                    $country = $country->name;
                    break;
                }
            }
            foreach ($states as $state)
            {
                if ($state->id == $order->get_rshipping->first()->state)
                {
                    $state = $state->name;
                    break;
                }
            }
            return view('frontend/retailer/order-view', compact('order'));
        // }
        if ($roleName[0] == 'Distributor')
        {
            $order = Distributororder::with('get_dinfo.get_dproducts','get_user','get_dshipping')->findOrFail($order_id);
            $countries = Country::all();
            $states = State::all();
            foreach ($countries as $country)
            {
                if ($country->id == $order->get_dshipping->first()->country)
                {
                    $country = $country->name;
                    break;
                }
            }
            foreach ($states as $state)
            {
                if ($state->id == $order->get_dshipping->first()->state)
                {
                    $state = $state->name;
                    break;
                }
            }
            return view('frontend/distributor/order-view', compact('order','state','country'));
        }
    }
    
    public function connect()
    {
        $connect = Connect::all();
        return view('frontend/connect/connect', compact('connect'));
    }
     public function connect_create()
    {
        return view('superadmin/connect/add');
    }
    
    public function connect_email(Request $request)
    {
        // dd($request->all());
        // $name = $request->name;
        // $email = $request->email;
        // $subject = $request->Subject;
        // $resume = $request->Resume;
        // $msg = $request->Message;

        
        //  try
        //  {
        //      Mail::send('frontend/email/connect', [
        //         'name' => $name,
        //         'msg'  => $msg,
        //         'resume' => $resume
        //      ], function ($mail) use ($email,$subject,$name,$resume) {
        //      $mail->from($email, $name);
        //      $mail->to('accounting@asliimall.com')->subject($subject);
        //      });

        $name = $request->name;
$email = $request->email;
$subject = $request->Subject;
$msg = $request->Message;

// Get the file from the request - assuming 'Resume' is the file input name
$resume = $request->file('Resume');

try {
    Mail::send('frontend/email/connect', [
        'name' => $name,
        'msg' => $msg,
        'resume' => $resume,

    ], function ($mail) use ($email, $subject, $name, $resume) {
        $mail->from($email, $name);
        $mail->to('accounting@asliimall.com')->subject($subject);

        if ($resume) {
            $mail->attach($resume->getRealPath(), [
                'as' => $resume->getClientOriginalName(),
                'mime' => $resume->getClientMimeType(),
            ]);
        }
    });
    
            return redirect()->route('connect')->with('status', 'Email has been sent successfully');
         }
         catch (\Throwable $th)
         {
             dd($th);
            return redirect()->route('connect')->with('msg', 'Email is not sent, Try again');
             //throw $th;
         }
    }

    public function admin_dashboard()
    {
        return view('admin/dashboard');
    }
    public function main()
    {
        // ('created_at', 'desc')->take(15)
        $categories = Category::orderBy('name')->get(); 
        
        $featured = RProduct::where('status', 1)->orderBy('name', 'asc')->take(15)->get();
        // dd($featured);
        $offers = RProduct::where('status', 1)->orderBy('created_at', 'desc')->take(6)->get(); 
        $sales = DProduct::get();
        $marquees = Marquee::all();
        
        $rproduct_variant = PVariant::whereNotNull('r_product_id')->get();
   
        
        return view('frontend.layouts.index', compact('categories','featured','sales','marquees', 'offers','rproduct_variant'));

    }
    public function get_profile_data()
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        return response()->json(array('user' => $user));
    }
    public function profile_update(Request $request)
    {
        // dd($request->all());
        // $validatedData = $request->validate([
        //     'email' => 'unique:users,email',
        //         ]);

        $user = User::findOrFail($request->id);
        $user->update($request->except('_token'));

        $user = User::findOrFail($request->id);
        $password = Hash::make($request->decrypt);
        $user->password = $password;
        $user->update();

        if ($request->userrole != 'null' && $request->userrole != null)
        {
            $user->removeRole($request->current_role);
            $user->assignRole($request->userrole);
            // Auth::logout();
            // return redirect('/login');
        }

        $status = 'Profile has been Updated successfully';
        return back()->with(['status' => $status]);
    }
    public function subcategories_list(Request $request)
    {
        // dd($request->all());
        // return $request->name;
       // exit;
        $main_cat = $request->name;
       $maincat=  Category::where( 'name', $main_cat)->first(); 
    //     $category_id = Category::where('name', $request->name)->get('id');
    //     $sub_categories = SubCategory::where('category_id', $category_id->first()->id)->orderBy('name')->get();
    
    //     return view('frontend/subcategory/subcategory', compact('sub_categories', 'main_cat'));
           if($main_cat != 'Cook food & Catering'){
            $rproducts = [];
             $subcat_id = SubCategory::where('category_id', $maincat->id)->get();
             
              foreach($subcat_id as $sbcat){
                  
                $search_product = RProduct::where('sub_category_id', $sbcat->id)->where('status', 1)->get();
                if($search_product->count() > 0 )
                { 
                 foreach($search_product as $product ){
                   array_push($rproducts, $product);  
                 }
                    
                }
              }
              
               return view('frontend/rproduct/rproduct', compact('rproducts', 'main_cat'));
           }
              else{
                   return redirect()->away('http://tzzaa.com/');
     
              }
       
    }
    public function check_role(Request $request)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            $roleName = $user->getRoleNames();
            if ($roleName[0] == 'Retailer')
            {
                return redirect()->route('rproduct.list', ['name' => $request->name] );
            }
            if ($roleName[0] == 'Distributor')
            {
                return redirect()->route('dproduct.list', ['name' => $request->name]);
            }
            if ($roleName[0] == 'Super Admin')
            {
                return redirect()->route('sa.select.p.type', ['name' => $request->name]);
            }
        }
        else
        {
            return redirect()->route('rproduct.list', ['name' => $request->name] );
        }
    }
    public function select_p_type(Request $request)
    {
        // dd($request->all());
        $name = $request->name;
        return view('frontend/select/ptype', compact('name'));
    }
    public function sa_rproducts(Request $request)
    {
        // dd($request->all());
        return redirect()->route('rproduct.list', ['name' => $request->name] );
    }
    public function sa_dproducts(Request $request)
    {
        // dd($request->all());
        return redirect()->route('dproduct.list', ['name' => $request->name]);
    }
    
    
    public function rproduct_list(Request $request)
    {
        // dd($request->all());
      
        $subcategory_id = SubCategory::where('name', $request->name)->get('id');
        $rproducts = RProduct::where('sub_category_id', $subcategory_id->first()->id)->where('status', 1)->get();
        return view('frontend/rproduct/rproduct', compact('rproducts'));
    }
    public function view_rproduct(Request $request)
    {
        //  dd($request->all());
        
        $rproduct = RProduct::where('id', $request->id)->get();

        $rproduct_variant = PVariant::where('r_product_id', $request->id)->get();
        
        $featured = RProduct::where('featured', 'on')->orwhere('sales', 'on')->get();
        

        return view('frontend/rproduct/rproduct_view', compact('rproduct','featured','rproduct_variant'));
    }
    public function dproduct_list(Request $request)
    {
        // dd($request->all());
        $subcategory_id = SubCategory::where('name', $request->name)->get('id');
        $dproducts = DProduct::where('sub_category_id', $subcategory_id->first()->id)->get();
        return view('frontend/dproduct/dproduct', compact('dproducts'));
    }
    public function view_dproduct(Request $request)
    {
        // dd($request->all());
        $dproduct = DProduct::where('id', $request->id)->get();
        $featured = DProduct::where('featured', 'on')->orwhere('sales', 'on')->get();
        return view('frontend/dproduct/dproduct_view', compact('dproduct','featured'));
    }

    public function change_id()
    {
        return view('frontend/change');
    }

    public function change_page_id()
    {
        $id = 1;
        $admin = User::findOrFail($id);
        if ($admin->change_id == 1)
        {
            $admin->change_id = 0;
            $admin->update();
            return redirect()->route('change.page');
        }
        else
        {
            $admin->change_id = 1;
            $admin->update();
            return redirect()->route('change.page');
        }
    }

    public function states(Request $request)
    {
        // $countryId = $request->input('country');

        $states = State::where('country_id', $request->country)->orderBy('name')->get();
        // $states = State::where('country_id', $countryId)->get();
       
        $data = '';
        $data .= '<option value="">Select State</option>';
        // foreach($states as $state){
        //     $data .= '<option value="'.$state->id.'">'.$state->name.'</option>';
        // }
        foreach ($states as $state){
        $data .=  '<option value="' .$state->id. '">'.$state->name.'</option>';
        }
        return Response()->json($data);
    }

    public function jobs()
    {
        $jobs = Job::all();
        return view('frontend/jobs/jobs', compact('jobs'));
    }
    public function job_detail($id)
    {
        
        $job = Job::findOrFail($id);
        $connects = Connect::first();
        
        return view('frontend/jobs/detail', compact('job', 'connects'));
    }
    public function search_product(Request $request){
        $q = Input::get ('search');
        if($q != null)
        {
          
          $maincat=  Category::where( 'name', 'LIKE', '%' . $q . '%' )->first(); 
          
          $subcat = SubCategory::where('name','LIKE','%'.$q.'%')->first();
          $categories = Category::all();
             $featured = RProduct::where('featured', 'on')->where('status', 1)->get();
             $sales = DProduct::where('sales', 'on')->get();
             $marquees = Marquee::all();
          if($maincat != null)
          {
              $search_products = [];
             $subcat_id = SubCategory::where('category_id', $maincat->id)->get();
             
              foreach($subcat_id as $sbcat){
                  
                $search_product = RProduct::where('sub_category_id', $sbcat->id)->where('status', 1)->get();
                if($search_product->count() > 0 )
                { 
                 foreach($search_product as $product ){
                   array_push($search_products, $product);  
                 }
                    
                }
              }
         return view('frontend/rproduct/search_product', compact('search_products','featured','sales','marquees','categories','q'));
              
          }
          elseif($subcat != null){
            
            $subcategory_id = SubCategory::where('name', $subcat->name)->get('id');
            $search_products = RProduct::where('sub_category_id', $subcategory_id->first()->id)->get();
            return view('frontend/rproduct/search_product', compact('search_products','featured','sales','marquees','categories','q'));
          }
          else{
             $products = RProduct::where( 'name', 'LIKE', '%' . $q . '%' )->where('status', 1)->first();
            $search_products = RProduct::where( 'name', 'LIKE', '%' . $q . '%' )->where('status', 1)->get();
            return view('frontend/rproduct/search_product', compact('search_products','featured','sales','marquees','categories','q'));
          }
        }else{
            return back();
        }
        
    }


public function all_products($id){
$subCategories = SubCategory::where('category_id', $id)->get();

foreach ($subCategories as $subCategory) {
    $featured = RProduct::where('sub_category_id', $subCategory->id)->get();
}

    $rproduct_variant = PVariant::whereNotNull('r_product_id')->get();
    $categories = Category::where('id', $id)->first();
    return view('frontend/layouts/AllProducts', compact('featured', 'rproduct_variant', 'categories'));
}

public function aboutus()

{
    $aboutus = AboutUs::first();
    $contents = AboutContent::all();
    $marquees = Marquee::all();

    return view('frontend/aboutus',compact('aboutus','contents','marquees'));
}
}
