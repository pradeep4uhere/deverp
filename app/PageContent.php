<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Page;

class PageContent extends Model
{
    //
    protected $table ='page_contents';
    protected $fillable = [
    	'title',
    	'description',
    	'status',
    	'image_alt',
    	'image_title',
    	'page_id',
    	'content_name',
		'url',
        'field_1',
        'field_2',
        'field_3',
        'field_4',
        'field_5',
		'order_no',
        'meta_title',
        'meta_description',
        'og_description',
        'meta_keywords',
        'robots',
        'revisit_after',
        'og_local',
        'og_type',
        'og_image',
        'og_title',
        'og_url',
        'og_site_name',
        'canonical',
        'geo_region',
        'geo_place_name',
        'geo_position',
        'icbm',
        'author'
	];

    public function Page() { 
        return $this->hasOne('App\Page', 'id', 'page_id'); 
    }

     public function PageContentImage() { 
        return $this->hasMany('App\PageContentImage', 'page_content_id','id'); 
    }

   
}
