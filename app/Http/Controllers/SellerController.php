<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\Order;
use Session;
//use PDF;


class SellerController extends Controller
{

    public static $dirName ='sellers';
    //
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    private static function getViewDir($name){
      return self::$dirName.'.'.$name;
    }



    public function index(Request $request){
      
      $sellerList = Seller::orderBy('id','DESC')->paginate(10);
      return view(self::getViewDir('index'),array(
        'dataList'=>$sellerList
      ));
    }


    //Update Status Of the Seller
    public function updateSellerStatus(Request $request,$seller_id,$status){
      if($seller_id!='' && $status!=''){
          $sellerList = Seller::find($seller_id);
          $type = '';
          if($status==0){
            $sellerList->status = 1;
            $type = 'Active';
          }
          if($status==1){
            $sellerList->status = 0;
            $type = 'InActive';
          }
          if($sellerList->save()){
            Session::flash('success', 'Seller "'.$sellerList->business_name.'"" is updated with "'.$type.'" status'); 
            return redirect()->back();
          }
      }
    }







    public function show(Request $request,$id){
      $id= $id;
      $sellerList = Seller::find($id)->toArray();

      //Get All Order Details
      $order = Order::with('Payment','User')->where('seller_id','=',$id)->paginate(15);
      //Get Total Payment
      // dd($order);
      $orderPayment = Order::with('Payment')->groupBy('seller_id')->where('seller_id','=',$id)->sum('totalAmount');

     //Get All Inventory List 

      // dd($orderPayment);
      return view(self::getViewDir('dashboard'),array(
        'data'=>$sellerList,
        'totalOrder'=>$order->total(),
        'orderPayment'=>$orderPayment,
        'orderList'=>$order
      ));
    }


    public function orderList(Request $request,$id){
      $id= $id;
      $sellerList = Seller::find($id)->toArray();

      //Get All Order Details
      $order = Order::with('Payment','User')->where('seller_id','=',$id)->paginate(25);
      //Get Total Payment
      $orderPayment = Order::with('Payment')->groupBy('seller_id')->where('seller_id','=',$id)->sum('totalAmount');
      // dd($orderPayment);
      return view(self::getViewDir('orderList'),array(
        'data'=>$sellerList,
        'totalOrder'=>$order->total(),
        'orderPayment'=>$orderPayment,
        'orderList'=>$order
      ));

    }

    public function edit(Request $request){
      $sellerList = Seller::all();
      //dd($sellerList);
      return view(self::getViewDir('index'),array(
        'data'=>$sellerList
      ));
    }



    public function orderInvoice(Request $request,$orderId){
      // dd($orderId);
      $orderList = Order::with(['Seller','OrderDetail','User','DeliveryAddress','Payment','PaymentMode'])->where('orderId','=',$orderId)->first()->toArray();
      //dd($orderList);
      //$pdf = PDF::loadView(self::getViewDir('invoice'),['data' => $orderList]);
      //return $pdf->stream('result.pdf', array('Attachment'=>0));
      return view(self::getViewDir('invoice'),array(
        'data'=>$orderList
      ));
    }
}
