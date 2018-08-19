<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
use App\Order;

class Order extends Model
{
    protected $guarded = [];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
    	return $this->beLongsTo(Address::class);
    }

    public function scopeGetDayMn()
    {
        return Order::where('status', 1)
            ->whereDate('created_at', Carbon::today())
            ->groupBy('status')->sum('amount');
    }

    public function scopeGetMonthMn()
    {
        return Order::where('status', 1)
            ->whereMonth('created_at', Carbon::today()->month)
            ->groupBy('status')->sum('amount');
    }

    public function scopeGetLastMonthMn()
    {
        return Order::where('status', 1)
            ->whereMonth('created_at', Carbon::today()->subMonth()->month)
            ->groupBy('status')->sum('amount');
    }

    public function scopeGetTotalMn()
    {
        return Order::where('status', 1)
            ->groupBy('status')->sum('amount');
    }
}
