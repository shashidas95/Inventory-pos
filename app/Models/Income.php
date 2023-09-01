<?php

namespace App\Models;

use App\Models\User;
use App\Models\IncomeCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'description', 'date', 'income_category_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incomeCategory()
    {
        return $this->belongsTo(IncomeCategory::class);
    }
}
