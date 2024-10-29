<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'email',
        'rating',
        'review',
    ];

    // Define relationship with Product if needed
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
