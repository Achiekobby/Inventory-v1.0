<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

//* Models
use App\Models\Inventory\Supplier;



class Address extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'supplier_id',
        'country',
        'country_code',
        'region',
        'city',
        'street',
    ];

}
