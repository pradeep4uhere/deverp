<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use App\UserProduct;


class UserProductController extends Controller
{

    public static $dirName ='products';
    private static function getViewDir($name){
      return self::$dirName.'.'.$name;
    }
    
    /******************* All Products List On Market Place************************/
    public function allProductList(Request $request){
            $productList =    UserProduct::with('Product')->paginate(15);
            // dd($productList);
            return view(self::getViewDir('productList'),array('itemList'=>$productList));
    }
}