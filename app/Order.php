<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';
	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    public function OrderDetail() {
        return $this->hasMany(OrderDetail::class);
    }
	
	public function User() {
         return $this->belongsTo(User::class);
    }
	
	public function Seller() {
         return $this->belongsTo('App\Seller', 'seller_id', 'id' );
    }

    public function PaymentMode() {
         return $this->belongsTo(PaymentMode::class);
    }

    public function Payment() {
        return $this->hasMany('App\Payment', 'order_id', 'orderID');
    }


    public function DeliveryAddress() {
         return $this->belongsTo(DeliveryAddress::class,'shipping_id','id');
    }


  
}
