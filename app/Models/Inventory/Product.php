<?php

namespace App\Models\Inventory;
use App\Models\Inventory\Category;
use App\Models\User;
use App\Models\Inventory\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Concerns\HasUuids;
use Illuminate\Support\Facades\SoftDeletes;

class Product extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'category_id',
        'supplier_id',
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
        'quantity',
        'SKU',
        'desc'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

}
