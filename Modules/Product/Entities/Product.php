<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Merchant\Entities\Merchant;

class Product extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
    */
    protected $primaryKey = 'product_id';

    /**
     * The model's default values for attributes.
     *
     * @var array
    */
    protected $fillable = [
        'name',
        'merchant_id',
        'price',
        'product_status',
    ];

    public function relatedMerchant(){
        return $this->belongsTo(Merchant::class, 'merchant_id', 'merchant_id');
    }

}
