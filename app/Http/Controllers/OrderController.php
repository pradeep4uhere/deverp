<?php
namespace App\Http\Controllers;
date_default_timezone_set('Asia/Kolkata');
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Seller;
use App\Order;
use App\OrderDetail;
use Log;

class OrderController extends Controller
{
    
    public static $dirName ='Order';

    private static function getViewDir($name){
      return self::$dirName.'.'.$name;
    }

    public function allOrderList(Request $request){
    	$sellerList = Seller::all();
    	// dd($sellerList);
      //Get All Order Details
      if($request->isMethod('post')){
      	/*
      	 "_token" => "YDMSIq18EQmAemflVVLvCHn6haecWQMG9FWCijAZ"
		  "orderId" => "ODR2019040825"
		  "mobileNo" => "9015443322"
		  "orderDate" => null
		  "submit" => "Search"
  		*/
      }
      $order = Order::with('Payment','PaymentMode','User','Seller');
      $orderId = '';
      $payment_status = '';
      $seller_id = '';
      $order_status = '';
      if($request->get('orderId')){

      	$orderId =trim($request->get('orderId'));
      	if($orderId!=''){

      		$order = $order->orwhere('orderID','=',$orderId);
      	}
      } 
      if($request->get('payment_status')){
      	$payment_status =trim($request->get('payment_status'));
      	if($payment_status!=''){

      		$order->where('payment_status','=',$payment_status);
      	}
      }
      if($request->get('seller_id')){
      	$seller_id =trim($request->get('seller_id'));
      	if($seller_id>0){


      		$order->orwhere('seller_id','=',$seller_id);
      	}
      }
      if($request->get('order_status')){
      	$order_status =trim($request->get('order_status'));
      	if($order_status!=''){
      		// echo "dd"; die;
      		$order->orwhere('order_status','=',$order_status);
      	}
      }
      $order = $order->orderBy('id','DESC')->paginate(20);
      // dd($order);
      return view(self::getViewDir('orderList'),array(
        'orderList'=>$order,
        'orderId'=>$orderId,
        'payment_status'=>$payment_status,
        'sellerList'=>$sellerList,
        'seller_id'=>$seller_id,
        'order_status'=>$order_status
      ));
    }
}
