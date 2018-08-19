<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\User;
use App\Category;
use Excel;

class OrderController extends Controller
{
    public function index()
    {
    	$order = Order::all();

    	return view('admin.order.index', compact('order'));
    }

    public function detail(Request $request)
    {
    	$order = Order::findOrFail($request->id);
    	$user = User::withTrashed()->find($order->user_id);
    	$orderDetails = $order->orderDetails; 
    	$listId = array();
    	foreach ($orderDetails as $key => $value) {
    		$listId[] = $value->product_id;
    	}
    	$product = Product::withTrashed()->find($listId);

    	return view('admin.order.detail', compact('order', 'orderDetails', 'user', 'product'));
    }

    public function delete(Request $request)
    {
    	try {
    		$listId = $request->allVals;
    		foreach ($listId as $key => $value) {
                $order = Order::findOrFail($value);
                $order->orderDetails()->delete();
                $order->delete();
            }
            return response()->json('ok');
    	} catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }

    public function deleteOrderDetail(Request $request)
    {
    	try {
    		$listId = $request->allVals;
    		$orderId = OrderDetail::findOrFail($listId[0])->order_id;
			$order = Order::findOrFail($orderId);
			$amount = $order->amount;
			foreach ($listId as $key => $value) {
				$orderDetail = OrderDetail::findOrFail($value);
				$price = $orderDetail->product->price - $orderDetail->product->discount;
				$amount -= $price * $orderDetail->quantity;
			}
			OrderDetail::destroy($listId);
			if (OrderDetail::count() == 0) {
				$order->delete();
			}
    		
            return response()->json('ok');
        } catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }

    public function confirmOrder(Request $request)
    {
    	try {
	    	$order = Order::findOrFail($request->id_order);
	    	$order->update(array('status' => 1));

	    	return redirect()->route('order.index')->with('success', __('Xác nhận đơn hàng thành công'));
    	} catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    public function exportToExcel()
    {
    	$orders = Order::all();
    	if (count($orders) > 0){
    		$orderArray = []; 
	        $orderArray[] = [
	        	'Tên khách hàng',
	        	'Số điện thoại',
	        	'Email',
	        	'Địa chỉ',
	            'Mã số đơn hàng', 
	            'Trạng thái',
	            'Số tiền',
	            'Ngày đặt hàng'
	        ];
	        foreach ($orders as $order) {
	        	$user = User::withTrashed()->find($order->user_id);
	        	$status = $order->status == 1 ? "Thành công" : "Chờ xác nhận";
	            $temp = array(
	                $user->name,
	                $user->phone,
	                $user->email,
	                $user->address->address,
	                $order->id,
	                $status,
	                number_format($order->amount) . ' đ',
	                $order->created_at,
	            );
	            $orderArray[] = $temp;
	        }
	        $myFile = Excel::create('orders', function($excel) use ($orderArray) {
	            $excel->setTitle('Orders');
	            $excel->setCreator('Quang Ha')->setCompany('Framgia Inc.');
	            $excel->setDescription('Order file');
	            $excel->sheet('sheet1', function($sheet) use ($orderArray) {
	            $sheet->fromArray($orderArray, null, 'A1', false, false);
	            });

	        });//->download('xlsx');
	        $myFile = $myFile->string('xlsx');
	        $response =  array(
	            'name' => "Orders",
	            'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile)
	        );
	        return response()->json($response);
    	}

    	return response()->json(null);
    }
}
