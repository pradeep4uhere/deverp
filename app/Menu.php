<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Menu extends Model
{
    //
    protected $table ='menu';

    public function parent(){
		return $this->hasOne( 'App\Menu', 'id', 'parent_id' );
	}

	public function children() { 
        return $this->hasMany('App\Menu', 'parent_id', 'id')->with('childpage'); 
    }

    public function childs() { 
        return $this->hasMany('App\Menu', 'parent_id', 'id'); 
    }

    public function page() { 
        return $this->hasOne('App\Page', 'parent_menu_id', 'id'); 
    }


    public function childpage() { 
        return $this->hasOne('App\Page', 'menu_id', 'id'); 
    }
    
}
