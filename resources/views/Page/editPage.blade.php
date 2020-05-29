@extends('layouts.addpage')
@section('content')
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Page 
        <small>Update Page</small>
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('allpages') }}">All Page List</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <!-- right column -->
        <div class="col-md-10">
          <!-- Horizontal Form -->
            <div class="box-header with-border">
              <h3 class="box-title">Enter Page Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('editpage',['id'=>$page['id']])}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Menu</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="menu" onchange="getAjaxCallSingle(this.value)">
                      <option value="0">Choose Parent Menu</option>
                      <?php foreach($menu as $item){ ?>
                      <option value="{{$item['id']}}" <?php if($page['parent_menu_id']==$item['id']){ ?> selected="selected" <?php  }?>>{{$item['title']}}</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sub Menu</label>

                  <div class="col-sm-10" id="sub_category_id">
                    <select class="form-control" name="menu_id" id="menu_idmenu_id">
                      {{$str}}
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Page Tite</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Page Title" name="title" value="{{$page['title']}}">
                  </div>
                </div>
                 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" name="slug">Slug Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Page Slug" name="slug"  value="{{$page['slug']}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Page Slug</label>
                  <div class="col-sm-4" style="font-size:16px; font-weight: bold;">
                    {{env('APP_URL')}}/
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="pageUrl" placeholder="Page URL" name="page_url" value="{{$page['page_url']}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword" class="col-sm-2 control-label">Banner</label>
                  <div class="col-sm-8">
                      <input  type="file" class="form-control1" id="logo"  name="logo">
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Image ALT Text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="image_alt" placeholder="Enter Image Alt Text" name="image_alt" value="{{$page['image_alt']}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Image Title Text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="image_title" placeholder="Enter Image Title Text" name="image_title" value="{{$page['image_title']}}">
                  </div>
                </div>

                 @if(!empty($page['default_images']))
                   <div class="form-group">
                      <label for="inputPassword" class="col-sm-2 control-label">@lang('BAnner Preview')</label>
                      <div class="col-sm-2">
                      
                      <?php $bannerPath = config('global.PAGE_IMG_BANNER').'/'.config('global.PAGE_THUMB_IMG_WIDTH').'X'.config('global.PAGE_THUMB_IMG_HEIGHT').'/'.$page['default_images'];?>
                      <!-- {{asset($bannerPath)}} -->
                      <img src="{{asset($bannerPath)}}" />
                      </div>
                      <div class="col-sm-6 jlkdfj1">
                          <p id="msg" class="help-block" style="color: red"></p>
                      </div>
                  </div>
                    @endif
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Meta Details</label>
                  <hr>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Meta Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="metaTitle" placeholder="Meta Title" name="meta_title" value="{{$page['meta_title']}}">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Meta Description</label>

                  <div class="col-sm-10">
                    <textarea id="meta_description" name="meta_description" rows="2" cols="96">
                      {{$page['meta_description']}}
                    </textarea>
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Meta Keywords</label>

                  <div class="col-sm-10">
                    <textarea id="meta_keywords" name="meta_keywords" rows="2" cols="96">
                      {{$page['meta_keywords']}}
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Robots</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="robots" placeholder="Robots" name="robots" value="{{$page['robots']}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Revisit After</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="revisit_after" placeholder="Revisit After" name="revisit_after" value="{{$page['revisit_after']}}">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Og Locale</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="og_local" placeholder="Og Local" name="og_local" value="{{$page['og_local']}}">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Og Type</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="og_type" placeholder="Og Type" name="og_type" value="{{$page['og_type']}}">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Og Image</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="og_image" placeholder="Og Image" name="og_image" value="{{$page['og_image']}}">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Og Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="og_title" placeholder="Og Title" name="og_title" value="{{$page['og_title']}}">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Og Url</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="og_url" placeholder="Enter Og URL" name="og_url" value="{{$page['og_url']}}">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Og Description</label>

                  <div class="col-sm-10">
                    <textarea id="og_description" name="og_description" rows="2" cols="96">
                      {{$page['og_description']}}
                    </textarea>
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Og Site Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="og_site_name" placeholder="Enter Og Site Name" name="og_site_name" value="{{$page['og_site_name']}}">
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Author</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="author" placeholder="Enter Author Name" name="author" value="{{$page['author']}}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Canonical</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="canonical" placeholder="Enter Canonical" name="canonical" value="{{$page['canonical']}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Geo Region</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="geo_region" placeholder="Enter Geo Region" name="geo_region" value="{{$page['geo_region']}}">
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Geo Place Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="geo_place_name" placeholder="Enter Geo Place Name" name="geo_place_name" value="{{$page['geo_place_name']}}">
                  </div>
                </div>
                   <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Geo Position</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="geo_position" placeholder="Enter Geo Position" name="geo_position" value="{{$page['geo_position']}}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">ICBM</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="icbm" placeholder="Enter ICBM" name="icbm" value="{{$page['icbm']}}">
                  </div>
                </div>
                


                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Page Body</label>

                  <div class="col-sm-10">
                     <!-- Main content -->
                    <textarea id="editor1" name="body" rows="10" cols="80">
                      {{ $page['description'] }}
                    </textarea>
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Page Status</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="status">
                      <option value="1" <?php if($page['status']==1){ ?> selected
selected="selected" <?php } ?> >Active</option>
                      <option value="0" <?php if($page['status']==0){ ?> selected
selected="selected" <?php } ?>>InActive</option>
                    </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
          <!-- /.box -->
         
        </div>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          
         
          <!-- /.box -->
        </div>
       

        <!-- /.col -->
      </div>

     
      <!-- /.row -->

      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- ./wrapper -->
<script type="text/javascript"> 
$(document).ready(function(){
  var menuId = "<?php echo $menuId; ?>";
  var selmenuId = "<?php echo $selected_menu_id; ?>";
  
getAjaxCall(menuId,selmenuId);
});


function getAjaxCallSingle(id){
    var postJson = "";
    $.ajax({
        type:'get',
        url:"{{env('APP_URL')}}public/index.php/getsubmenu/"+id,       
        success:function(res){
          $('#sub_category_id').html(res);
        }
  });
}


function getAjaxCall(id,selmenuId){
  var selmenuId = "<?php echo $selected_menu_id; ?>";
  //alert(id);
    var postJson = "";
    $.ajax({
        type:'get',
        url:"{{env('APP_URL')}}public/index.php/getsubmenuedit/"+id+"/"+selmenuId,       
        success:function(res){
          $('#sub_category_id').html(res);
          setTimeout(function(){
            //alert(selmenuId);
            $('#menu_id').val(selmenuId);
          },2000);        }
    });
};
</script>
@endsection
