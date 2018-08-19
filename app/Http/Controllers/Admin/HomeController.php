<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Product;
use App\Category;
use App\Comment;
use App\Contact;
use App\Order;
use Carbon\Carbon;

class HomeController extends Controller
{
    //
	public function index()
	{
		$data = array(
			'total_user' => User::role(0)->count(),
			'total_product' => Product::all()->count(),
			'total_category' => Category::all()->count(),
			'total_comment' => Comment::getComment()->count(),
			'total_contact' => Contact::all()->count(),
			'total_order' => Order::all()->count()
		);
		$money = array(
			'total_mn' => Order::getTotalMn(),
			'month_mn' => Order::getMonthMn(),
			'last_month_mn' => Order::getLastMonthMn(),
			'day_mn' => Order::getDayMn()
		);
		
		return view('admin.home.index', compact('data', 'money'));
	}
}
