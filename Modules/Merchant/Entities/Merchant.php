<?php

namespace Modules\Merchant\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;

class Merchant extends Model
{

    /**
     * The primary key associated with the table.
     *
     * @var string
    */
    protected $primaryKey = 'merchant_id';

    /**
     * The model's default values for attributes.
     *
     * @var array
    */
    protected $fillable = [
        'country_code',
        'merchant_name',
    ];

    public function relatedProduct(){
        return $this->hasMany(Product::class, 'merchant_id', 'merchant_id');
    }

}
