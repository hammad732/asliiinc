<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use Mail;
use App\State;
use App\Country;
use App\Models\Connect;
use Illuminate\Http\Request;
use App\Models\Retailerorder;
use App\Models\Distributororder;
use App\Models\Retailerorderinfo;
use App\Models\Distributororderinfo;
use App\Models\Retailerordershipping;
use App\Models\Distributorordershipping;

class OrderController extends Controller
{
    public function order_store(Request $request)
    {
        // dd($request->all());
        if (\Cart::getTotal() >= 1)
        {
            $user = Auth::user();
            $user_id = $user->id;
            $roleName = $user->getRoleNames();
            
                $order = new Retailerorder;
                $order->grand_total = \Cart::getTotal();
                $order->total_qty = \Cart::getTotalQuantity();
                $order->payment_type = $request->payment_type;
                $order->order_status = 'Pending';
                $order->user_id = $user_id;
                // dd($order);
                $order->save();
                $order_id = $order->id;

                //=== make unique ID
                $country = Country::findOrFail($request->country);
                $state = State::findOrFail($request->state);
                $order_id_count = strlen((string) $order_id);
                $user_id_count = strlen((string) $user_id);
              
                if($order_id_count == 1 && $user_id_count == 1)
                {
                    $rinvoice_id = '000'.$user_id.ucfirst($user->fname[0]).ucfirst($user->lname[0]).$state->iso2.'-'.'I000'.$order_id;
                }
                if($order_id_count > 1 && $user_id_count == 1)
                {
                    $rinvoice_id = '000'.$user_id.ucfirst($user->fname[0]).ucfirst($user->lname[0]).$state->iso2.'-'.'I00'.$order_id;
                }
                if($order_id_count == 1 && $user_id_count > 1)
                {
                    $rinvoice_id = '00'.$user_id.ucfirst($user->fname[0]).ucfirst($user->lname[0]).$state->iso2.'-'.'I000'.$order_id;
                }
                if($order_id_count > 1 && $user_id_count > 1)
                { 
                  
                    $rinvoice_id = '00'.$user_id.ucfirst($user->fname[0]).ucfirst($user->lname[0]).$state->iso2.'-'.'I00'.$order_id;
                }
                $order = Retailerorder::findOrFail($order_id);
                $order->rinvoice_id = $rinvoice_id;
                $order->save();
                
                $ordershipping = new Retailerordershipping;
                $ordershipping->email = $request->email;
                $ordershipping->fname = $request->fname;
                $ordershipping->lname = $request->lname;
                $ordershipping->address = $request->address;
                $ordershipping->country = $request->country;
                $ordershipping->state = $request->state;
                $ordershipping->city = $request->city;
                $ordershipping->zip_code = $request->zip_code;
                $ordershipping->phone_no = $request->phone_no;
                $ordershipping->retailerorders_id = $order_id;
                $ordershipping->save();
                
                $cartCollection = \Cart::getContent();
                // dd($cartCollection);
                foreach ($cartCollection as $cart)
                {
                    $orderinfo = new Retailerorderinfo;
                    $orderinfo->retailerorders_id = $order_id;
                    $orderinfo->rproduct_id =  $cart->attributes->product_id;
                    $orderinfo->r_varient_id = $cart->attributes->variant_id;
                    // $orderinfo->rproduct_pirce = \Cart::get($cart->id)->getPriceSum();
                    $orderinfo->rproduct_pirce = $cart->price;
                    $orderinfo->rproduct_qty = $cart->quantity;
                    // dd($orderinfo);
                    $orderinfo->save();
                }
               
                return redirect()->route('payment.methods', ['order_id' => $order_id]);
          

            if ($roleName[0] == 'Distributor')
            {
                // dd('Distributor');
                $order = new Distributororder;
                $order->grand_total = \Cart::getTotal();
                $order->total_qty = \Cart::getTotalQuantity();
                $order->payment_type = $request->payment_type;
                $order->order_status = 'Pending';
                $order->user_id = $user_id;
                $order->save();
                $order_id = $order->id;
                
                //=== make unique ID
                $country = Country::findOrFail($request->country);
                $state = State::findOrFail($request->state);
                $order_id_count = strlen((string) $order_id);
                $user_id_count = strlen((string) $user_id);
                
                if($order_id_count == 1 && $user_id_count == 1)
                {
                    $dinvoice_id = '000'.$user_id.ucfirst($user->fname[0]).ucfirst($user->lname[0]).$state->iso2.'-'.'I000'.$order_id;
                }
                if($order_id_count > 1 && $user_id_count == 1)
                {
                    $dinvoice_id = '000'.$user_id.ucfirst($user->fname[0]).ucfirst($user->lname[0]).$state->iso2.'-'.'I00'.$order_id;
                }
                if($order_id_count == 1 && $user_id_count > 1)
                {
                    $dinvoice_id = '00'.$user_id.ucfirst($user->fname[0]).ucfirst($user->lname[0]).$state->iso2.'-'.'I000'.$order_id;
                }
                if($order_id_count > 1 && $user_id_count > 1)
                {
                    $dinvoice_id = '00'.$user_id.ucfirst($user->fname[0]).ucfirst($user->lname[0]).$state->iso2.'-'.'I00'.$order_id;
                }
                $order = Distributororder::findOrFail($order_id);
                $order->dinvoice_id = $dinvoice_id;
                $order->save();

                $ordershipping = new Distributorordershipping;
                $ordershipping->email = $request->email;
                $ordershipping->fname = $request->fname;
                $ordershipping->lname = $request->lname;
                $ordershipping->address = $request->address;
                $ordershipping->country = $request->country;
                $ordershipping->state = $request->state;
                $ordershipping->city = $request->city;
                $ordershipping->zip_code = $request->zip_code;
                $ordershipping->phone_no = $request->phone_no;
                $ordershipping->distributororders_id = $order_id;
                $ordershipping->save();

                $cartCollection = \Cart::getContent();
                foreach ($cartCollection as $cart)
                {
                    $orderinfo = new Distributororderinfo;
                    $orderinfo->distributororders_id = $order_id;
                    $orderinfo->dproduct_id = $cart->id;
                    $orderinfo->dproduct_pirce = \Cart::get($cart->id)->getPriceSum();
                    $orderinfo->dproduct_qty = $cart->quantity;
                    $orderinfo->save();
                }
                return redirect()->route('payment.methods', ['order_id' => $order_id]);
            }
        }
        else
        {
            $msg = "Cart is empty!";
            return back()->with(['msg' => $msg]);
        }
    }

    public function payment_methods(Request $request)
    {
        // dd($request->all());

        $order_id = $request->order_id;
        $user = Auth::user();
        $user_id = $user->id;
        $roleName = $user->getRoleNames();
        
            $order = Retailerorder::with('get_rinfo.get_rproducts','get_user','get_rshipping')->findOrFail($request->order_id);
            return view('frontend/cart/rpayment', compact('order'));
       
        // if ($roleName[0] == 'Distributor')
        // {
        //     $order = Distributororder::with('get_dinfo.get_dproducts','get_user','get_dshipping')->findOrFail($request->order_id);
        //     return view('frontend/cart/dpayment', compact('order'));
        // }
    }

    public function paypal_payment_option(Request $request)
    {
        // dd($request->all());
        $order_id = $request->id;
        $payment_code = $request->payment_code;

        $user = Auth::user();
        $user_id = $user->id;
        $roleName = $user->getRoleNames();
      
            $order = Retailerorder::findOrFail($order_id);
            $order->payment_type = "PayPal";
            $order->payment_code = $payment_code;
            $order->save();
            // === Send Email
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
            $ccemail = $order->get_user->email;
            $toemail = $order->get_rshipping->first()->email;
            try
            {
                Mail::send('frontend/email/rorder', [
                    'order' => $order,
                    'state' => $state,
                    'country' => $country,
                ], function ($mail) use ($ccemail, $toemail) {
                    $mail->from('accounting@asliimall.com', 'Asliimall.com');
                    $mail->to($toemail)->subject('Thank you for your order');
                    $mail->cc($ccemail)->subject('Thank you for your order');
                });
                // dd("email sent");
                return response()->json(array('order_id' => $order_id));
            }
            catch (\Throwable $th)
            {
                // dd($th);
                return response()->json(array('order_id' => $order_id));
                //throw $th;
            }
      
        if ($roleName[0] == 'Distributor')
        {
            $order = Distributororder::findOrFail($order_id);
            $order->payment_type = "PayPal";
            $order->payment_code = $payment_code;
            $order->save();
            
            // === Send Email
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
            $ccemail = $order->get_user->email;
            $toemail = $order->get_dshipping->first()->email;
            try
            {
                Mail::send('frontend/email/dorder', [
                    'order' => $order,
                    'state' => $state,
                    'country' => $country,
                ], function ($mail) use ($ccemail, $toemail) {
                    $mail->from('accounting@asliimall.com', 'Asliimall.com');
                    $mail->to($toemail)->subject('Thank you for your order');
                    $mail->cc($ccemail)->subject('Thank you for your order');
                });
                // dd("email sent");
                return response()->json(array('order_id' => $order_id));
            }
            catch (\Throwable $th)
            {
                // dd($th);
                return response()->json(array('order_id' => $order_id));
                //throw $th;
            }
        }
    }

    public function thank_you(Request $request)
    {
        // dd($request->all());
        $connects = Connect::first();
        $cartCollection = \Cart::getContent();
        // dd($cartCollection);
        foreach ($cartCollection as $cart)
        {
            \Cart::remove($cart->id);
        }
    //  dd($cartCollection);
        $user = Auth::user();
        $user_id = $user->id;
        $roleName = $user->getRoleNames();
      
            $order = Retailerorder::with('get_rinfo.get_rproducts','get_user','get_rshipping','get_rinfo.get_rproducts.variant')->findOrFail($request->order_id);
            $order->payment_type = $request->payment_type;
            $order->save();

            // === Send Email
            $order = Retailerorder::with('get_rinfo.get_rproducts','get_user','get_rshipping','get_rinfo.get_rproducts.variant')->findOrFail($request->order_id);
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
            $ccemail = $order->get_user->email;
            $toemail = $order->get_rshipping->first()->email;
            try
            {
                Mail::send('frontend/email/rorder', [
                    'order' => $order,
                    'state' => $state,
                    'country' => $country,
                ], function ($mail) use ($ccemail, $toemail) {
                    $mail->from('accounting@asliimall.com', 'Asliimall.com');
                    $mail->to($toemail)->subject('Thank you for your order');
                    $mail->cc($ccemail)->subject('Thank you for your order');
                });
                // dd("email sent");
                
                // dd($connects);
                return view('frontend/thankyou/rthankyou', compact('order','connects'));
            }
            catch (\Throwable $th)
            {
                // dd($th);
                return view('frontend/thankyou/rthankyou', compact('order','connects'));
                //throw $th;
            }
     
        if ($roleName[0] == 'Distributor')
        {
            $order = Distributororder::with('get_dinfo.get_dproducts','get_user','get_dshipping')->findOrFail($request->order_id);
            $order->payment_type = $request->payment_type;
            $order->save();

            // === Send Email
            $order = Distributororder::with('get_dinfo.get_dproducts','get_user','get_dshipping')->findOrFail($request->order_id);
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
            $ccemail = $order->get_user->email;
            $toemail = $order->get_dshipping->first()->email;
            try
            {
                Mail::send('frontend/email/dorder', [
                    'order' => $order,
                    'state' => $state,
                    'country' => $country,
                ], function ($mail) use ($ccemail, $toemail) {
                    $mail->from('accounting@asliimall.com', 'Asliimall.com');
                    $mail->to($toemail)->subject('Thank you for your order');
                    $mail->cc($ccemail)->subject('Thank you for your order');
                });
                // dd("email sent");
                return view('frontend/thankyou/dthankyou', compact('order'));
            }
            catch (\Throwable $th)
            {
                // dd($th);
                return view('frontend/thankyou/dthankyou', compact('order'));
                //throw $th;
            }
        }
    }

    public function rthank_you($id)
    {
        // dd($request->all());
        $cartCollection = \Cart::getContent();
        foreach ($cartCollection as $cart)
        {
            \Cart::remove($cart->id);
        }

        $user = Auth::user();
        $user_id = $user->id;
        $roleName = $user->getRoleNames();
       
            $order = Retailerorder::with('get_rinfo.get_rproducts','get_user','get_rshipping')->findOrFail($id);
            if($order->user_id == $user_id)
            {
                return view('frontend/thankyou/rthankyou', compact('order'));
            }
            else
            {
                return back();
            }
      
    }
    public function dthank_you($id)
    {
        $cartCollection = \Cart::getContent();
        foreach ($cartCollection as $cart)
        {
            \Cart::remove($cart->id);
        }
        $user = Auth::user();
        $user_id = $user->id;
        $roleName = $user->getRoleNames();
        if ($roleName[0] == 'Distributor')
        {
            $order = Distributororder::with('get_dinfo.get_dproducts','get_user','get_dshipping')->findOrFail($id);
            if($order->user_id == $user_id)
            {
                return view('frontend/thankyou/dthankyou', compact('order'));
            }
            else
            {
                return back();
            }
        }
    }

    public function pdf_download(Request $request)
    {
        // dd($request->all());
        // $cart = \Cart::getContent();
        //    dd($cart);
        $order_id = $request->order_id;
        $user = Auth::user();
        $user_id = $user->id;
        $roleName = $user->getRoleNames();
            $order = Retailerorder::with('get_rinfo.get_rproducts','get_rinfo.get_rproducts.variant','get_user','get_rshipping')->findOrFail($request->order_id);
            // dd($order);
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
            ini_set('memory_limit','512M');
            // dd($order);
            $connects = Connect::first();
            $pdf = PDF::loadView('frontend/pdf/rinvoice', compact('order','state','country','connects'));
            return $pdf->stream();
       
        if ($roleName[0] == 'Distributor')
        {
            $order = Distributororder::with('get_dinfo.get_dproducts','get_user','get_dshipping')->findOrFail($request->order_id);
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
            ini_set('memory_limit','512M');
            $pdf = PDF::loadView('frontend/pdf/dinvoice', compact('order','state','country'));
            return $pdf->stream();
        }
    }
}
