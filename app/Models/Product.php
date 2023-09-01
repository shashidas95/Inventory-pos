<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\InvoiceProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'unit', 'img_url', 'category_id', 'user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function invoiceProducts()
    {
        return $this->hasOne(InvoiceProduct::class);
    }
}
