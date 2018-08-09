<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // lấy ra product được comment
    public function product() 
    {
        return $this->belongsTo(Product::class);
    }

    //
    public function user() 
    {
        return $this->belongsTo(Product::class);
    }
    //
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
