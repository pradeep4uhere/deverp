<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    #protected $table = Config::get('db.prefix') . 'products';

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    // protected $fillable = [
    //     'name', 'detail'
    // ];

    
    public function Category() {
         return $this->belongsTo(Category::class);
    }
    
    
    public function SubCategory() {
        //Third Argumanet is from Category Table
        //Second Argument From Product Table [Relationship Table]
         return $this->belongsTo('App\Category', 'sub_category_id', 'id');
    }
    
    public function Brand() {
         return $this->belongsTo(Brand::class);
    }
    
    public function Unit() {
         return $this->belongsTo(Unit::class);
    }

    public function UserProduct(){
        return $this->hasMany(UserProduct::class);   
    }
    
   
}
