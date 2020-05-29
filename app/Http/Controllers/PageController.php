<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Config;
use App\Page;
use App\Menu;
use Session;
use Storage;
use Image;
use App\PageContent;
use App\PageContentImage;
use App\Pdf;

class PageController extends Controller
{
    

     /**
     * Global Directory Name
     * Where All Images will upload
     */
    public $uploadDir;
    /**
     * Global Directory Name
     * Where All Business Images will upload
     */
    public $uploadLogoDir;
    /**
     * Global Directory Name
     * Where All Business thumb Images will upload
     */
    public $uploadThumbDir;
    
    public $imageName;
    public $thumbWidth;
    public $thumbHeight;
    
    
    
    public function __construct() {
       $this->middleware('auth');
       $this->uploadDir=config('global.PRODUCT_DIR');
       $this->uploadLogoDir=config('global.PRODUCT_IMG_DIR');
       $this->uploadThumbDir=config('global.PRODUCT_THUMB_DIR');
       

       $this->Width=config('global.PRODUCT_IMG_WIDTH');
       $this->Height=config('global.PRODUCT_IMG_HEIGHT');

       $this->thumbHeight=config('global.PRODUCT_THUMB_IMG_HEIGHT');
       $this->thumbWidth=config('global.PRODUCT_THUMB_IMG_WIDTH');
       $this->imageName=NULL;
       //$this->uploadDir.DIRECTORY_SEPARATOR.Auth::user()->id;
       //$this->uploadDir.DIRECTORY_SEPARATOR.Auth::user()->id.DIRECTORY_SEPARATOR.'thumb';
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function allPageList()
    {
        $pageList = Page::with('ParentMenu','ChildMenu')->Paginate(15);
        // dd($pageList);
        return view('Page/PageList',array('pageList'=>$pageList));
    }

    public function blank(Request $request){
        return view('blank');
    }


    public function copyPageContent(Request $request,$id){
        $pageId = $id;
        try{
            $page = Page::with('PageContent')->find($pageId);
            $newPage = $page->replicate();
            $newPage->title = $page->title.' -Copy Data';
            $newPage->save();


            // duplicate questions
            foreach($page->PageContent()->get() as $q)
            {
                
                $pageContent = PageContent::with('PageContentImage')->find($q->id);
                // dd($pageContent);
                $newPageContent = $pageContent->replicate();
                $newPageContent->page_id = $newPage->id;
                $newPageContent->save();

                    // duplicate choices
                //dd($pageContent->PageContentImage()->get());
                //echo count($pageContent->PageContentImage()->get());
                //echo "++++++++++++++++";
                foreach($pageContent->PageContentImage()->get() as $c)
                {

                    if($c->count()>0){
                        $pageContentImage = PageContentImage::find($c->id);
                        $newPageContentImage = $pageContentImage->replicate();
                        $newPageContentImage->page_content_id = $newPageContent->id;
                        $newPageContentImage->save();
                    }else{
                        echo "Dine"; die;
                    }
                }
                    
                
             }

                //$page->save();
                Session::flash('message', ' Duplicate page created.');
            }catch(Exception $e){
                Session::flash('message', 'Duplicate Page not created!');
            }
            return redirect()->route('allpages');



    }


    public function addPageContent(Request $request,$id){

        if($request->isMethod('post')){
            
            $title = $request->get('title');
            $body = $request->get('body');
            $status = $request->get('status');
            $image_alt = $request->get('image_alt');
            $image_title = $request->get('image_title');
            $logo = $request->get('logo');
            $content_name = $request->get('content_name');
            $url = $request->get('url');

            $field_1 = $request->get('field_1');
            $field_2 = $request->get('field_2');
            $field_3 = $request->get('field_3');
            $field_4 = $request->get('field_4');
            $field_5 = $request->get('field_5');

            $order_no = $request->get('order_no');

            //Get All the Meta Tags
            $meta_title = $request->get('meta_title');
            $meta_description = $request->get('meta_description');
            $meta_keywords = $request->get('meta_keywords');
            $robots = $request->get('robots');
            $revisit_after = $request->get('revisit_after');
            $og_local = $request->get('og_local');
            $og_type = $request->get('og_type');
            $og_image = $request->get('og_image');
            $og_title = $request->get('og_title');
            $og_url = $request->get('og_url');
            $og_description = $request->get('og_description');
            $og_site_name = $request->get('og_site_name');
            $author = $request->get('author');
            $canonical = $request->get('canonical');
            $geo_region = $request->get('geo_region');
            $geo_place_name = $request->get('geo_place_name');
            $geo_position = $request->get('geo_position');
            $icbm = $request->get('icbm');

            //dd($image_alt);
            $pageContent = [];
            $pageContent['url'] = $url;

            $pageContent['field_1'] = $field_1;
            $pageContent['field_2'] = $field_2;
            $pageContent['field_3'] = $field_3;
            $pageContent['field_4'] = $field_4;
            $pageContent['field_5'] = $field_5;

            $pageContent['content_name'] = $content_name;
            $pageContent['page_id'] = $id;
            $pageContent['title'] = $title;
            $pageContent['description'] = $body;
            $pageContent['status'] = $status;
            $pageContent['order_no'] = $order_no;

            $pageContent['meta_title']=$meta_title;
            $pageContent['meta_description']=$meta_description;
            $pageContent['meta_keywords']=$meta_keywords;
            $pageContent['robots']=$robots;
            $pageContent['revisit_after']=$revisit_after;
            $pageContent['og_local']=$og_local;
            $pageContent['og_type']=$og_type;
            $pageContent['og_image']=$og_image;
            $pageContent['og_title']=$og_title;
            $pageContent['og_url']=$og_url;
            $pageContent['og_description']=$og_description;
            $pageContent['og_site_name']=$og_site_name;
            $pageContent['author']=$author;
            $pageContent['canonical']=$canonical;
            $pageContent['geo_region']=$geo_region;
            $pageContent['geo_place_name']=$geo_place_name;
            $pageContent['geo_position']=$geo_position;
            $pageContent['icbm']=$icbm;

            //$pageContent['image_alt'] = $image_alt[0];
            //$pageContent['image_title'] = $image_title[0];
            //dd($pageContent);
            $lastId = PageContent::create($pageContent)->id;
            if($lastId>0){
                //save All the Images If Present
                if(!empty($request->file('logo'))){
                    foreach ($request->file('logo') as $imageArr) {
                        $this->imageName=$this->saveMultipleImage($request,$imageArr);
                        $default_images[] =$this->imageName;
                        $default_thumbnail[] =$this->imageName;
                    }
                    $dataImage = [];
                    for($i=0;$i<count($default_images);$i++){
                        $dataImage['default_images']=$default_images[$i];
                        $dataImage['default_thumbnail']=$default_thumbnail[$i];
                        $dataImage['image_alt']=$image_alt[$i];
                        $dataImage['image_title']=$image_title[$i];
                        $dataImage['status']=1;
                        $dataImage['page_content_id']=$lastId;
                        PageContentImage::create($dataImage);
                    }
                    //Store All the Images
                }
                //dd($request->all());
                Session::flash('message', 'Page Content added successfully!');
                return redirect()->route('contentlist',array('id'=>$id));
                //echo "dasd";die;
                 
            }

        }
        $page = Page::find($id)->toArray();
        //dd($page);
        return view('Page/addPageContent',array('Page'=>$page,'id'=>$id));
    }

    public function editPageContent(Request $request,$id){

        if($request->isMethod('post')){
            
            $title = $request->get('title');
            $body = $request->get('body');
            $status = $request->get('status');
            $image_alt = $request->get('image_alt');
            $image_title = $request->get('image_title');
            $logo = $request->get('logo');
            $content_name = $request->get('content_name');
            $url = $request->get('url');

            $field_1 = $request->get('field_1');
            $field_2 = $request->get('field_2');
            $field_3 = $request->get('field_3');
            $field_4 = $request->get('field_4');
            $field_5 = $request->get('field_5');

            $order_no = $request->get('order_no');

             //Get All the Meta Tags
            $meta_title = $request->get('meta_title');
            $meta_description = $request->get('meta_description');
            $meta_keywords = $request->get('meta_keywords');
            $robots = $request->get('robots');
            $revisit_after = $request->get('revisit_after');
            $og_local = $request->get('og_local');
            $og_type = $request->get('og_type');
            $og_image = $request->get('og_image');
            $og_title = $request->get('og_title');
            $og_url = $request->get('og_url');
            $og_description = $request->get('og_description');
            $og_site_name = $request->get('og_site_name');
            $author = $request->get('author');
            $canonical = $request->get('canonical');
            $geo_region = $request->get('geo_region');
            $geo_place_name = $request->get('geo_place_name');
            $geo_position = $request->get('geo_position');
            $icbm = $request->get('icbm');

            
            


            //dd($image_alt);
            $pageContent = PageContent::with('Page','PageContentImage')->find($id);
            $pageContent->title = $title;
            $pageContent->description = $body;
            $pageContent->status = $status;
            $pageContent->url = $url;

            $pageContent->field_1 = $field_1;
            $pageContent->field_2 = $field_2;
            $pageContent->field_3 = $field_3;
            $pageContent->field_4 = $field_4;
            $pageContent->field_5 = $field_5;


            $pageContent->content_name = $content_name;
            $pageContent->order_no = $order_no;

            $pageContent->meta_title=$meta_title;
            $pageContent->meta_description=$meta_description;
            $pageContent->meta_keywords=$meta_keywords;
            $pageContent->robots=$robots;
            $pageContent->revisit_after=$revisit_after;
            $pageContent->og_local=$og_local;
            $pageContent->og_type=$og_type;
            $pageContent->og_image=$og_image;
            $pageContent->og_title=$og_title;
            $pageContent->og_url=$og_url;
            $pageContent->og_description=$og_description;
            $pageContent->og_site_name=$og_site_name;
            $pageContent->author=$author;
            $pageContent->canonical=$canonical;
            $pageContent->geo_region=$geo_region;
            $pageContent->geo_place_name=$geo_place_name;
            $pageContent->geo_position=$geo_position;
            $pageContent->icbm=$icbm;
            $lastId = $pageContent->id;



            if($pageContent->save()){
                //save All the Images If Present
                if(!empty($request->file('logo'))){
                    foreach ($request->file('logo') as $imageArr) {
                        $this->imageName=$this->saveMultipleImage($request,$imageArr);
                        $default_images[] =$this->imageName;
                        $default_thumbnail[] =$this->imageName;
                    }
                    $dataImage = [];
                    for($i=0;$i<count($default_images);$i++){
                        $dataImage['default_images']=$default_images[$i];
                        $dataImage['default_thumbnail']=$default_thumbnail[$i];
                        $dataImage['image_alt']=$image_alt[$i];
                        $dataImage['image_title']=$image_title[$i];
                        $dataImage['status']=1;
                        $dataImage['page_content_id']=$lastId;
                        PageContentImage::create($dataImage);
                    }
                    //Store All the Images
                }
                //dd($request->all());
                Session::flash('message', 'Page Content added successfully!');
                $id = $pageContent['Page']['id'];
                return redirect()->route('contentlist',array('id'=>$id));
                //echo "dasd";die;
                 
            }

        }
        $page = PageContent::with('Page','PageContentImage')->find($id)->toArray();
        return view('Page/editPageContent',array('Page'=>$page,'id'=>$id));
    }

    //Save All The Multiple Images
    function saveMultipleImage($request,$imageArr){
          $image      = $imageArr;
          $fileName   = md5(time()) . '.' . $image->getClientOriginalExtension();
          $imgArr=explode(".",$fileName);
          $ext=strtolower(end($imgArr));
          if(in_array($ext,config('global.IMG_EXT'))){
          $img = Image::make($image->getRealPath());
          $directoryName = 'banner';
          $thubmName = $this->thumbWidth.'X'.$this->thumbHeight;
          $img->resize($this->thumbWidth, $this->thumbHeight,  function ($constraint) {
              $constraint->upsize();                 
          });
          $img->stream(); // <-- Key point
          $res = Storage::disk('public')->put('uploads/'.$directoryName.'/'.$thubmName.'/'.$fileName, $img, 'public');

          //600X600
          $thubmName = $this->Width.'X'.$this->Height;
          $img->resize($this->Width,$this->Height, function ($constraint) {
              $constraint->upsize();                 
          });
          $img->stream(); // <-- Key point
          $res = Storage::disk('public')->put('uploads/'.$directoryName.'/'.$thubmName.'/'.$fileName, $img, 'public');
          return $fileName;
          }else{
            Session::flash('message', 'Invalid File Extension!');
            //return null;
            return Redirect::back()->with('msg', 'Invalid File Extension!');
          }
    }


    /*****Delete Page Content**************/
    public function deletePageContent(Request $request, $id){
        $pageContent = PageContent::find($id);
        if($pageContent->delete()){
            Session::flash('message', 'Page Content deleted successfully!');
            return Redirect::back()->with('msg', 'Page Content deleted successfully!'); 
        }else{
            Session::flash('message', 'Page Content not deleted!');
            return Redirect::back()->with('msg', 'Page Content not deleted!');   
        }

    } 

    public function deletePageContentImage(Request $request, $id){
        $pageContent = PageContentImage::find($id);
        if($pageContent->delete()){
            Session::flash('message', 'Page Content Image deleted successfully!');
            return Redirect::back()->with('msg', 'Page Content Image deleted successfully!'); 
        }else{
            Session::flash('message', 'Page Content Image not deleted!');
            return Redirect::back()->with('msg', 'Page Content Image not deleted!');   
        }

    }






     public function pageContentList(Request $request,$id){

        $pageList = PageContent::with('Page','PageContentImage')
        ->where('page_id','=',$id)
        ->orderBy('page_contents.order_no', 'asc')
        ->Paginate($id);
        //dd($pageList);
        return view('Page/PageContentList',array('pageList'=>$pageList,'id'=>$id));
    }

    public function createpage(Request $request){
        $menu = Menu::where('status','=',1)->where('parent_id','=',0)->get();
        if ($request->isMethod('post')) {
            $title = $request->get('title');
            $slug = $request->get('slug');
            $page_url = $request->get('page_url');
            $body = $request->get('body');
            $menu = $request->get('menu');
            $menu_id = $request->get('menu_id');
            $status = $request->get('status');


            $meta_title = $request->get('meta_title');
            $meta_description = $request->get('meta_description');
            $meta_keywords = $request->get('meta_keywords');
            $robots = $request->get('robots');
            $revisit_after = $request->get('revisit_after');
            $og_local = $request->get('og_local');
            $og_type = $request->get('og_type');
            $og_image = $request->get('og_image');
            $og_title = $request->get('og_title');
            $og_url = $request->get('og_url');
            $og_description = $request->get('og_description');
            $og_site_name = $request->get('og_site_name');
            $author = $request->get('author');
            $canonical = $request->get('canonical');
            $geo_region = $request->get('geo_region');
            $geo_place_name = $request->get('geo_place_name');
            $geo_position = $request->get('geo_position');
            $icbm = $request->get('icbm');
            $image_alt = $request->get('image_alt');
            $image_title = $request->get('image_title');

            $page = new Page();
            

        

            $page['slug']=$slug;
            $page['title']=$title;
            $page['page_url']=$page_url;
            $page['description']=$body;
            $page['status']=$status;
            $page['parent_menu_id']=$menu;
            $page['menu_id']=$menu_id;

            $page['meta_title']=$meta_title;
            $page['meta_description']=$meta_description;
            $page['meta_keywords']=$meta_keywords;
            $page['robots']=$robots;
            $page['revisit_after']=$revisit_after;
            $page['og_local']=$og_local;
            $page['og_type']=$og_type;
            $page['og_image']=$og_image;
            $page['og_title']=$og_title;
            $page['og_url']=$og_url;
            $page['og_description']=$og_description;
            $page['og_site_name']=$og_site_name;
            $page['author']=$author;
            $page['canonical']=$canonical;
            $page['geo_region']=$geo_region;
            $page['geo_place_name']=$geo_place_name;
            $page['geo_position']=$geo_position;
            $page['icbm']=$icbm;
            $page['image_alt']=$image_alt;
            $page['image_title']=$image_title;

            $page['created_at']=date('Y-m-d H:i:s');

            //Upload the image
            if(!empty($request->file('logo'))){
                $this->imageName=$this->saveImage($request);
                $page->default_images =$this->imageName;
                $page->default_thumbnail =$this->imageName;
            }

            try{
                $page->save();
                Session::flash('message', $title,' page created.');
            }catch(Exception $e){
                Session::flash('message', 'Page not created!');
            }
            return redirect()->route('allpages');
        }
        return view('Page.createPage',array('menu'=>$menu));
    }




    public function editpage(Request $request,$id){

        $menu = Menu::where('status','=',1)->where('parent_id','=',0)->get();
        $id= $id;
        $page =Page::find($id);


        $parent_id = $page['parent_menu_id'];
        $selected_menu_id = $page['menu_id'];
        if($parent_id>0){
            $menuList = Menu::with('children')->where('parent_id','=',$parent_id)->get();
            $str = "";
            foreach($menuList as $parentItem){
                $str.="<optgroup label=".$parentItem['title'].">";
                foreach($parentItem['children'] as $item){
                    $str.="<option value='".$item['id']."'>".$item['title']."</option>";
                }
            }
        }else{
            $str="<option value='0'>Choose Menu</option>";
        }

        if ($request->isMethod('post')) {
            $title = $request->get('title');
            $slug = $request->get('slug');
            $page_url = $request->get('page_url');
            $body = $request->get('body');
            $status = $request->get('status');
            $menu = $request->get('menu');
            $menu_id = $request->get('menu_id');

            $meta_title = $request->get('meta_title');
            $meta_description = $request->get('meta_description');
            $meta_keywords = $request->get('meta_keywords');
            $robots = $request->get('robots');
            $revisit_after = $request->get('revisit_after');
            $og_local = $request->get('og_local');
            $og_type = $request->get('og_type');
            $og_image = $request->get('og_image');
            $og_title = $request->get('og_title');
            $og_url = $request->get('og_url');
            $og_description = $request->get('og_description');
            $og_site_name = $request->get('og_site_name');
            $author = $request->get('author');
            $canonical = $request->get('canonical');
            $geo_region = $request->get('geo_region');
            $geo_place_name = $request->get('geo_place_name');
            $geo_position = $request->get('geo_position');
            $icbm = $request->get('icbm');
            $image_alt = $request->get('image_alt');
            $image_title = $request->get('image_title');

            $page['slug']=$slug;
            $page['title']=$title;
            $page['page_url']=$page_url;
            $page['description']=$body;
            $page['parent_menu_id']=$menu;
            $page['menu_id']=$menu_id;

            $page['meta_title']=$meta_title;
            $page['meta_description']=$meta_description;
            $page['meta_keywords']=$meta_keywords;
            $page['robots']=$robots;
            $page['revisit_after']=$revisit_after;
            $page['og_local']=$og_local;
            $page['og_type']=$og_type;
            $page['og_image']=$og_image;
            $page['og_title']=$og_title;
            $page['og_url']=$og_url;
            $page['og_description']=$og_description;
            $page['og_site_name']=$og_site_name;
            $page['author']=$author;
            $page['canonical']=$canonical;
            $page['geo_region']=$geo_region;
            $page['geo_place_name']=$geo_place_name;
            $page['geo_position']=$geo_position;
            $page['icbm']=$icbm;
            $page['image_alt']=$image_alt;
            $page['image_title']=$image_title;

            $page['status']=$status;
            $page['updated_at']=date('Y-m-d H:i:s');
            $this->default_images = $page['default_images'];
            $this->default_thumbnail = $page['default_thumbnail'];
             //Upload the image
            $image      = $request->file('logo');
            if(!empty($image)){
                $this->imageName=$this->saveImage($request);
                if($this->imageName!=''){
                    $page->default_images =$this->imageName;
                    $page->default_thumbnail =$this->imageName;
                }
            }
            try{
                $page->save();
                Session::flash('message', $title." page updated");
            }catch(Exception $e){
                Session::flash('message', 'Page not created!');
            }
            return redirect()->route('allpages');
        }
        return view('Page.editPage',array('page'=>$page,'menu'=>$menu,'str'=>$str,'menuId'=>$parent_id,'selected_menu_id'=>$selected_menu_id));

    }



    public function deletepage(Request $request,$id){
        $page = Page::find($id);
        $title = $page['title']." page deleted.";
        if(!empty($page)){
            
            try{
                $page->delete();
                Session::flash('message',$title);
            }catch(Exception $e){
                Session::flash('message', 'Page not deleted!');
            }
            return Redirect::back()->with('msg', 'Page Content not deleted!');   
        }


    }



    public function getSubMenu(Request $request,$id){
        $id = $id;
        $menuList = Menu::with('children')->where('parent_id','=',$id)->get();
        //dd( $menuList);
        $str = "<select name='menu_id' class='form-control'>";
            $str.="<option value='0'>Choose Sub Menu</option>";
            foreach($menuList as $item){
                $str.="<option value='".$item['id']."'>".$item['title']."</option>";
            }
        
         $str.= "</select>";
        //return array('status'=>'success')
        echo $str;die;
    }



       public function getSubMenuEdit(Request $request,$id,$selected){
        $id = $id;
        $menuList = Menu::with('children')->where('parent_id','=',$id)->get();
        $str = "<select name='menu_id' class='form-control'>";
        foreach($menuList as $parentItem){
            $str.="<optgroup label=".$parentItem['title'].">";
            foreach($parentItem['children'] as $item){
                if($item['id']==$selected){
                    $sel ="selected='selected'";
                }else{
                    $sel ="";
                }
                $str.="<option value='".$item['id']."' ".$sel.">".$item['title']."</option>";
            }
        }
         $str.= "</select>";
        //return array('status'=>'success')
        echo $str;die;
    }



    public function allMenuList(Request $request){
        $menuList = Menu::with('children')->Paginate(15);

        $categories = Menu::where('parent_id', '=', 0)->get();
        $allCategories = Menu::pluck('title','id')->all();
        //return view('categoryTreeview',compact('categories','allCategories'));
        return view('Menu.menuList',compact('categories','allCategories','menuList'));

    }



    public function allMenuListManage(Request $request){
        $menuList = Menu::with('children')->Paginate(15);
        return view('Menu.MenuListManage',compact('menuList'));
    }



    function saveImage($request){
          $image      = $request->file('logo');
          $fileName   = md5(time()) . '.' . $image->getClientOriginalExtension();
          $imgArr=explode(".",$fileName);
          $ext=strtolower(end($imgArr));
          if(in_array($ext,config('global.IMG_EXT'))){
          $img = Image::make($image->getRealPath());
          $directoryName = 'banner';
          $thubmName = $this->thumbWidth.'X'.$this->thumbHeight;
          $img->resize($this->thumbWidth, $this->thumbHeight,  function ($constraint) {
              $constraint->upsize();                 
          });
          $img->stream(); // <-- Key point
          $res = Storage::disk('public')->put('uploads/'.$directoryName.'/'.$thubmName.'/'.$fileName, $img, 'public');

          //600X600
          $thubmName = $this->Width.'X'.$this->Height;
          $img->resize($this->Width,$this->Height, function ($constraint) {
              $constraint->upsize();                 
          });
          $img->stream(); // <-- Key point
          $res = Storage::disk('public')->put('uploads/'.$directoryName.'/'.$thubmName.'/'.$fileName, $img, 'public');
          return $fileName;
          }else{
            Session::flash('message', 'Invalid File Extension!');
            //return null;
            return Redirect::back()->with('msg', 'Invalid File Extension!');
          }
    }




    public function addMenu(Request $request){
        $menu = Menu::all();
        if($request->isMethod('post')) {
            $menu = new Menu();
            $menu['title'] = $request->get('title');
            if($request->get('parent_id')==''){
                $menu['parent_id'] = 0;
            }else{
                $menu['parent_id'] = $request->get('parent_id');
            }
            
            if($menu->save()){
                Session::flash('message', 'Menu added successfully!');
               // return Redirect::back()->with('msg', 'Menu added successfully!');
                return redirect()->route('allmenu');
            }
        }
        return view('Menu.addmenu',array('menu'=>$menu));
    }



     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageCategory()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::pluck('title','id')->all();
        return view('categoryTreeview',compact('categories','allCategories'));
    }




     public function editMenu(Request $request,$id){
        $menuList = Menu::all();
        $menu = Menu::find($id);
        //dd($menu);
        if($request->isMethod('post')) {
            $hiddenId =  $request->get('id');
            //$menu = new Menu();

            $menu = Menu::find($hiddenId);
            $menu['title'] = $request->get('title');
            $menu['parent_id'] = $request->get('menu');
            $menu['status'] = $request->get('status');
            //dd($menu);
            if($menu->save()){
                Session::flash('message', 'Menu updated successfully!');
               // return Redirect::back()->with('msg', 'Menu added successfully!');
                return redirect()->route('allmenumanage');
            }
        }
        return view('Menu.editmenu',array('menu'=>$menu,'menuList'=>$menuList));
    }

    
    public function deleteMenu(Request $request,$id){
        $menu = Menu::find($id);
        if($menu->delete()){
            Session::flash('message', 'Menu deleted successfully!');
            return redirect()->route('allmenumanage');
        }else{
        Session::flash('message', 'Menu not updated !');
            return redirect()->route('allmenumanage');
        }

    }


    public function pdflist(Request $request){
        $pdf = Pdf::all();
        return view('Page.PdfList',array('pageList'=>$pdf));
    }

     public function uploadpdf(Request $request){
        $pdfType = array("1"=>"Terms and Conditons","2"=>"Privacy and Policy");
        return view('Page.uploadpdf',array('pdfType'=>$pdfType));
    }

    public function saveuploadpdf(Request $request){
        $fileName = $request->file('upload_file')->getClientOriginalName();
        //echo $uniqueFileName = uniqid() . $request->file('upload_file')->getClientOriginalName();
        $pdfFilePath = Storage::disk('public')->put('uploads',  $request->file('upload_file'));
        $pdf = new Pdf();
        $pdf['type']= $request->get('pdftype');
        $pdf['filename']= $pdfFilePath;
        $pdf['created_at']=date('Y-m-d H:i:s');
        $pdf['updated_at']=date('Y-m-d H:i:s');
        if($pdf->save()){    
            Session::flash('message', 'File uploaded successfully!');
            return redirect()->route('pdflist');
        }else{
            return redirect()->back()->with('error', 'File not uploaded successfully.');
        }
    }


    public function deletepdf(Request $request,$id){
        $Pdf = Pdf::find($id);
        if($Pdf->delete()){
            Session::flash('message', 'PDf File deleted successfully!');
            return redirect()->route('pdflist');
        }else{
        Session::flash('message', 'PDf File not updated !');
            return redirect()->route('pdflist');
        }

    }


}
