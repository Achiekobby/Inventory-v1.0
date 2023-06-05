<?php

namespace App\Models\Inventory;
use App\Models\Inventory\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Concerns\HasUuids;
use Illuminate\Support\Facades\SoftDeletes;

class Product extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'category_id',
        'brand',
        'name',
        'code',
        'image',
        'quantity',
        'unit_price',
        'total_quantity',
        'status',
        'unit_price',
        'total_price',
        'quantity'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
