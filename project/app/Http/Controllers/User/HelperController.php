<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class HelperController extends Controller
{

    public function decryptCart(Request $request)
    {
        $rules = [
            'orderId' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        try {
            $order = Order::findOrfail($request->orderId);
            $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
            $cart = array("items" => $cart->items, "totalQty" => $cart->totalQty, "totalPrice" => $cart->totalPrice);

            return $cart;

        } catch (Exception $e) {
            // throw $th;
            return $e->getMessage();
        }
    }
    public function decryptCartData(Request $request)
    {
        $rules = [
            'cart' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        try {
            $cart = unserialize(bzdecompress(utf8_decode($request->cart)));
            $cart = array("items" => $cart->items, "totalQty" => $cart->totalQty, "totalPrice" => $cart->totalPrice);
            return $cart;

        } catch (Exception $e) {
            // throw $th;
            return $e->getMessage();
        }
    }
    public function encyptCart(Request $request)
    {
        $rules = [
            'cart' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        $cart = $request->cart;
        $cart = new Cart((object) array("items" => $cart["items"], "totalQty" => $cart["totalQty"], "totalPrice" => $cart["totalPrice"]));

        $cart = utf8_encode(bzcompress(serialize($cart)));
        return $cart;

    }

}
