<?php

namespace App\Http\Controllers;

use Auth;
use App\State;
use App\Country;
use App\Models\DProduct;
use App\Models\PVariant;
use App\Models\RProduct;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart_display()
    {

        $cartCollection = \Cart::getContent();
        // dd($cartCollection);

        $cartCollection = $cartCollection->sort();
        return view('frontend.cart.cart', compact('cartCollection'));
    }

    public function add_cart(Request $request, $id)
    {
        // dd($request->all());
        // dd($request->all(), $id);
        $id = request()->id;
        //    dd($id);

        if ($request->variantid == null) {

            $id = $id;
            $Product = RProduct::findOrFail($id);

            if (request()->ajax()) {
                \Cart::add(array(

                    'id' => $id,
                    'name' => $Product->name,
                    'unit' => $id,
                    'price' =>  $request->price != null ? $request->price : $Product->r_price,
                    'quantity' => 1,
                    'attributes' => array(
                        'r_weight' =>  $request->r_weight != null ? $request->r_weight : $Product->r_weight,
                        'product_id' => $Product->id,
                        'variant_id' => null
                    )
                ));
                $cart_count = \Cart::getContent()->count();
                $cart_items = \Cart::getContent();
                // dd($cart_items);

                return response()->json(array('cart_items' => $cart_items, 'cart_count' => $cart_count));
            } else {
                \Cart::add(array(
                    'id' => $Product->id,
                    'name' => $Product->name,
                    // 'price' => $Product->r_price,
                    'price' =>  $request->price != null ? $request->price : $Product->r_price,
                    'quantity' => 1,
                    'attributes' => array(
                        'r_weight' => $request->r_weight != null ? $request->r_weight : $Product->r_weight,
                        'product_id' => $Product->id,
                        'variant_id' => null
                    )
                ));
                $cart_items = \Cart::getContent()->count();
                return back();
            }
        } else {
            $id = $request->variantid;
            $Product = PVariant::findOrFail($id);
            $product_details = RProduct::findOrFail(request()->id);
            // dd($Product,$product_details);

            if (request()->ajax()) {
                \Cart::add(array(

                    'id' => $id,
                    'name' => $product_details->name,
                    'unit' => $Product->unit,

                    'price' =>  $Product->price,
                    'quantity' => 1,
                    'attributes' => array(
                        'r_weight' =>  $request->r_weight != null ? $request->r_weight : $Product->r_weight,
                        'product_id' => $Product->r_product_id,
                        'variant_id' => $id
                    )
                ));
                $cart_count = \Cart::getContent()->count();
                $cart_items = \Cart::getContent();
                // dd($cart_items);

                return response()->json(array('cart_items' => $cart_items, 'cart_count' => $cart_count));
            } else {
                \Cart::add(array(
                    'id' => $Product->id,
                    'name' => $product_details->name,
                    // 'price' => $Product->r_price,
                    'price' =>   $Product->price,
                    'quantity' => 1,
                    'attributes' => array(
                        'r_weight' => $request->r_weight != null ? $request->r_weight : $Product->r_weight,
                        'product_id' => $Product->r_product_id,
                        'variant_id' => $id
                    )
                ));
                $cart_items = \Cart::getContent()->count();
                return back();
            }
        }
    }

    //     public function add_cart(Request $request, $id)
    // {
    //     dd($request->all(), $id);
    //     $id = request()->id;
    //     $Product = RProduct::findOrFail($id);

    //     if (request()->ajax()) {
    //         \Cart::add([
    //             'id' => $request->variantid ?? $Product->id,
    //             'name' => $Product->name,
    //             'unit' => $id,
    //             'price' => $request->price ?? $Product->r_price,
    //             'quantity' => 1,
    //             'attributes' => [
    //                 'r_weight' => $request->r_weight ?? $Product->r_weight,
    //                 // 'product_id' => $request->variantid ?? null,
    //                 'product_id' => $id,
    //             ],
    //         ]);

    //         $cart_count = \Cart::getContent()->count();
    //         $cart_items = \Cart::getContent();
    //         return response()->json([
    //             'cart_items' => $cart_items,
    //             'cart_count' => $cart_count,
    //         ]);
    //     } else {
    //         \Cart::add([
    //             'id' => $Product->id, // Use the default product ID when adding to cart
    //             'name' => $Product->name,
    //             'price' => $request->price ?? $Product->r_price,
    //             'quantity' => 1,
    //             'attributes' => [
    //                 'r_weight' => $request->r_weight ?? $Product->r_weight,
    //                 'variant_id' => $request->variantid ?? null,
    //             ],
    //         ]);
    //         $cart_items = \Cart::getContent()->count();
    //         return back();
    //     }
    // }

    public function d_add_cart(Request $request, $id)
    {

        $id = request()->id;
        $Product = DProduct::findOrFail($id);

        if (request()->ajax()) {
            \Cart::add(array(
                'id' => $Product->id,
                'name' => $Product->name,
                'price' => $Product->d_price,
                'quantity' => 1,
                'attributes' => array(
                    'd_weight' => $Product->d_weight,
                )
            ));
            $cart_count = \Cart::getContent()->count();
            $cart_items = \Cart::getContent();

            return response()->json(array('cart_items' => $cart_items, 'cart_count' => $cart_count));
        } else {
            \Cart::add(array(
                'id' => $Product->id,
                'name' => $Product->name,
                'price' => $Product->d_price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'd_weight' => $Product->d_weight,
                )
            ));
            $cart_items = \Cart::getContent()->count();
            return back();
        }
    }

    public function destroy($id)
    {
        \Cart::remove($id);
        return back();
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $id = $request->cart_id;
        \Cart::update($id, [
            'quantity' => array(
                'relative' => false,
                'value' => $request->new_quantity
            ),
        ]);
        $cart_items = \Cart::getContent()->count();
        $sub_total = number_format(\Cart::getSubTotal(), 2);
        $total_cost = number_format(\Cart::getTotal(), 2);
        $items = \Cart::getContent();
        $items = $items->sort();

        $table = '';
        $table .= '<table class="table text-center">';

        $table .= '<thead>';
        $table .= '<tr>';
        $table .= '<th>Product</th>';
        $table .= '<th class=" text-center">Quantity</th>';
        $table .= '<th class=" text-center">Price</th>';
        $table .= '<th class=" text-center">Total</th>';
        $table .= '<th class=" text-center">Action</th>';
        $table .= '</tr>';
        $table .= '</thead>';
        $table .= '<tbody class="new-data">';

        $cartCollection = \Cart::getContent();
        $cartCollection = $cartCollection->sort();

        foreach ($cartCollection as $item) {
            $url = 'route("cart.destroy", ' . $item->id . ')';
            $table .= '<tr>';
            $table .= '<td class="text-left cart-table-td-2">';
            if ($item->attributes->r_weight != 0) {
                $a = $item->attributes->r_weight;
                $r_weight = preg_replace('/[^0-9.]+/', '', $a);

                $check_unit = $item->attributes->r_weight;
                $check_unit = preg_replace('/[^a-z]/i', '', $check_unit);
                if ($check_unit == 'oz') {
                    $table .= '<span class="read-less">' . $item->name . ' (' . $r_weight * $item->quantity . 'oz)</span>';
                } elseif ($check_unit == 'lb') {
                    $table .= '<span class="read-less">' . $item->name . ' (' . $r_weight * $item->quantity . 'lb)</span>';
                } else {
                    $table .= '<span class="read-less">' . $item->name . ' (' . $r_weight * $item->quantity . ')</span>';
                }
            }
            if ($item->attributes->d_weight != 0) {
                $table .= '<span class="read-less">' . $item->name . ' (' . $item->attributes->d_weight . 'oz / Unit)</span>';
            }
            $table .= '<td class="cart-table-td-5 ">';
            $table .= '<i class="fa fa-minus-circle" id="dec-btn-id-cart" value="' . $item->id . '" onClick="decrement_quantity(' . $item->id . ')" aria-hidden="true"></i>';
            $table .= '<input id="input-quantity-' . $item->id . '" value="' . $item->quantity . '" class="form-control qty-id-cart my-2" type="text"  name="quantity" readonly>';
            $table .= '<i class="fa fa-plus-circle" id="inc-btn-id-cart" value="' . $item->id . '" onClick="increment_quantity(' . $item->id . ')" aria-hidden="true"></i>';
            $table .= '</td>';
            $table .= '<td class="pro-price cart-table-td-4">$ ';
            $table .=  number_format($item->price, 2) . '</td>';
            $table .= '<td class="pro-price cart-table-td-4">$ ';
            $table .=  number_format(\Cart::get($item->id)->getPriceSum(), 2);
            $table .= '</td>';
            $table .= '<td class="pro-price cart-table-td-4"> ';
            $table .= '<p><small>';
            $table .= '<a href=/cart-destroy/' . $item->id . ' style="color: #ff5c00"data-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i>';
            $table .= 'Remove</a></small></p></td>';
            $table .= '</td>';

            $table .= '</tr>';
        }
        $table .= '</tbody>';
        $table .= ' </table>';

        return response()->json(array('table' => $table, 'items' => $items, 'total_cost' => $total_cost, 'sub_total' => $sub_total, 'sub_total' => $sub_total));
    }

    public function checkout(Request $request)
    {
        $cartCollection = \Cart::getContent();
        // dd($cartCollection);
        $countries = Country::all();
        $states = State::all();
        $user = Auth::user();
        return view('frontend.cart.checkout', compact('cartCollection', 'user', 'countries', 'states'));
    }
}
