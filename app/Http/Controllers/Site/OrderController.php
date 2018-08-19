<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\OrderDetail;

class OrderController extends Controller
{
    public function add(OrderRequest $request)
    {
        foreach (Cart::instance(Auth::user()->id)->content() as $key => $value) {
            Cart::instance("error" . Auth::user()->id)->destroy();
            if (Product::find($value->id) == null) {
                Cart::instance("error" . Auth::user()->id)->add(
                    [
                        'id' => $value->id, 
                        'name' => $value->name, 
                        'qty' => 1, 
                        'price' => $value->price,
                        'options' => [
                            'avatar' => $value->options->avatar
                        ]
                    ]
                );
                Cart::instance(Auth::user()->id)->remove($value->rowId);
            }
        }
        if(Cart::instance("error" . Auth::user()->id)->count() > 0) {
            return redirect()->route('site.cart.view')->with('message1', __('Đơn đặt hàng không thành công'));
        }
        $amount = Cart::instance(Auth::user()->id)->subtotal();
        $value = $request->all();
        $value['amount'] = floatval(str_replace(',', '', $amount));
        $value['user_id'] = Auth::user()->id;
        $order = Order::create($value);
    	foreach (Cart::instance(Auth::user()->id)->content() as $key => $value) {
    		$listOrderDetail = array(
    			'product_id' => $value->id,
    			'quantity' => $value->qty
    		);
    		$order->orderDetails()->create($listOrderDetail);
    	}
    	Cart::instance(Auth::user()->id)->destroy();
        Cart::instance("error" . Auth::user()->id)->destroy();
    	
    	return redirect()->route('site.home.index')->with('success', __('Cám ơn bạn đã mua hàng'));
    }

    public function checkOrder()
    {
        $count = Cart::instance(Auth::user()->id)->count();

        return response()->json($count);
    }
}
