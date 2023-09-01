<?php

namespace App\Models;

use App\Models\User;
use App\Models\Customer;
use App\Models\InvoiceProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable =['total', 'discount', 'vat', 'payable', 'customer_id', 'user_id'];
    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function customer()
    {
       return $this->belongsTo(Customer::class);
    }
    public function invoiceProducts()
    {
       return $this->hasMany(InvoiceProduct::class);
    }
}
