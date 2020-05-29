<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PageContent;

class PageContentImage extends Model
{
    //
    protected $table ='page_content_images';
    protected $fillable = ['default_images','default_thumbnail','status','image_alt','image_title','page_content_id'];

    public function PageContent() { 
        return $this->hasOne('App\PageContent', 'id', 'page_content_id'); 
    }

   
}
