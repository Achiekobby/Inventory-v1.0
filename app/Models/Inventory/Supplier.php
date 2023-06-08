<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

//* Models
use App\Models\Inventory\Address;
use App\Models\Inventory\Product;


class Supplier extends Model
{
    use HasFactory, HasUuids, Notifiable, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'organization',
        'role',
        'status'
    ];

    public function address(){
        return $this->hasOne(Address::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
