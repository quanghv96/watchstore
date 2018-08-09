<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use willvincent\Rateable\Rateable;
use DB;

class Product extends Model
{
    use SoftDeletes, Rateable;
    
    protected $guarded = [];

    // lấy ra catalog của 1 product
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    // lấy ra các comment của product
    public function comments() {
        return $this->hasMany(Comment::class);
    } 

    // lấy ra các order chứa product
    public function orders() {
        return $this->belongsToMany(Orders::class, 'orders');
    }

    // lấy ra configuration của product
    public function configuration() {
        return $this->hasOne(Configuration::class);
    }

    // lấy ra các image của product
    public function images() {
        return $this->hasMany(Image::class);
    }

    // lấy ra orderDetail
    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }

    public function scopeGetProductDis($query)
    {
        return $query->where('discount', '>', 0);
    }

    public function scopeGetProductView($query)
    {
        return $query->latest('view');
    }

    public function scopeSeggest($query, $key, $name)
    {
        return $query->where('name', 'like', '%' . $key . '%')->pluck($name);
    }

    public function scopeSearch($query, $key)
    {
        return $query->where('name', 'like', '%' . $key . '%');
    }

    public function scopeGetProductNew($query)
    {
        return $query->latest();
    }

    public function scopeGetTopSell()
    {
        $listId = DB::table('products')->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->selectRaw('products.id, count(quantity) as total')
            ->where('orders.status', 1)
            ->whereNull('products.deleted_at')
            ->groupBy('products.id')
            ->latest('total')->get();
        $product = array();
        foreach ($listId as $key => $value) {
            $product[] = Product::findOrFail($value->id);
        }

        return $product;    
    }
}
