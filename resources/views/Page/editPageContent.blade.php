@extends('layouts.addpage')
@section('content')
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add Page Content - {{$Page['title']}}
        <small><a  href="{{ route('allpages')}}">All Page List</a></small>
       
      </h1>
      <ol class="breadcrumb">
        <?php $pageid = $Page['page']['id'];?>
        <li><a  href="{{ route('contentlist',['id'=>$pageid]) }}">Back To {{$Page['page']['title']}}</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif
       @if (Session::has('message'))
      <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>
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
            <form class="form-horizontal" action="{{route('editcontent',['id'=>$id])}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="content_name" placeholder="Enter Page Content Name" name="content_name" value="{{$Page['content_name']}}">
                    <small><i>This Name is Only for Reference, not visible on frontend</i></small>
                  </div>
                </div>
               
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Page Tite</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Page Title" name="title" value="{{$Page['title']}}">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Content URL</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="url" placeholder="Enter Page Content URl" name="url" value="{{$Page['url']}}">
                  </div>
                </div>
                <?php if(count($Page['page_content_image'])>0){ ?>
                <?php foreach($Page['page_content_image'] as $pageImage){ ?>
                <?php $bannerPath = config('global.PAGE_IMG_BANNER').'/'.config('global.PRODUCT_IMG_WIDTH').'X'.config('global.PAGE_IMG_HEIGHT').'/'.$pageImage['default_images'];?>
                        <!-- {{asset($bannerPath)}} -->
                  
                   <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Banner</label>
                    <div class="col-sm-10">
                        <img src="{{asset($bannerPath)}}" width="100%" height="250" alt="{{$pageImage['image_alt']}}" title="{{$pageImage['image_title']}}" />
                    </div>
                    </div>

                   <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Image ALT Text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="image_alt" placeholder="Enter Image Alt Text" name="image_alt[]" value="{{$pageImage['image_alt']}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Image Title Text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="image_title" placeholder="Enter Image Title Text" name="image_title[]" value="{{$pageImage['image_title']}}">
                  </div>
                </div>
                <div class="form-group ">
                  <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-10 pull-right">
                    <a href="{{route('deletecontentimage',['id'=>$pageImage['id']])}}" class="btn btn-danger pull-right">Remove Image</a>
                  </div>
                </div>

                  <?php }} ?>
                   
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Banner</label>
                    <div class="col-sm-8">
                        <input  type="file" class="form-control1" id="logo"  name="logo[]">
                    </div>
                    </div>

               
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Image ALT Text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="image_alt" placeholder="Enter Image Alt Text" name="image_alt[]">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Image Title Text</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="image_title" placeholder="Enter Image Title Text" name="image_title[]">
                  </div>
                </div>
                <div id="addmoreDiv"></div>
                <div class="form-group ">
                  <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-10 pull-right">
                    <a href="javascript:void(0)" class="btn btn-warning pull-right" id="addMore">Add More Image</a>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Page Body</label>

                  <div class="col-sm-10">
                     <!-- Main content -->
                    <textarea id="editor1" name="body" rows="10" cols="80" placeholder="Enter Page Secription">
                      {{$Page['description']}}
                    </textarea>
                  </div>
                </div>

                <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">More Field-1</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="field_1" placeholder="Enter Text " name="field_1" value="{{$Page['field_1']}}">
                </div>
              </div>
               <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">More Field-2</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="field_2" placeholder="Enter Text " name="field_2" value="{{$Page['field_2']}}">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">More Field-3</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="field_3" placeholder="Enter Text " name="field_3" value="{{$Page['field_3']}}">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">More Field-4</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="field_4" placeholder="Enter Text " name="field_4" value="{{$Page['field_4']}}">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">More Field-5</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="field_5" placeholder="Enter Text " name="field_5" value="{{$Page['field_5']}}">
                </div>
              </div>



                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Content Order</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="order_no">
                    <?php for($i=1;$i<50;$i++){ ?>
                      <option value="{{$i}}" <?php if($Page['order_no']==$i){ echo "selected='selected'"; } ?>>{{$i}}</option>
                    <?php } ?>
                    </select>
                </div>
              </div>

               <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Page Status</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">InActive</option>
                    </select>
                </div>
              </div>

              <div class="form-group">
                
              <div class="col-md-12">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Page Meta Description</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
             <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Meta Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="metaTitle" placeholder="Meta Title" name="meta_title" value="{{$Page['meta_title']}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Meta Description</label>

                  <div class="col-sm-10">
                    <textarea id="meta_description" name="meta_description" rows="2" cols="95">
                      {{$Page['meta_description']}}
                    </textarea>
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Meta Keywords</label>

                  <div class="col-sm-10">
                    <textarea id="meta_keywords" name="meta_keywords" rows="2" cols="95">
                      {{$Page['meta_keywords']}}
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Robots</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="robots" placeholder="Robots" name="robots" value="{{$Page['robots']}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Revisit After</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="revisit_after" placeholder="Revisit After" name="revisit_after" value="{{$Page['revisit_after']}}">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Og Locale</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="og_local" placeholder="Og Local" name="og_local" value="{{$Page['og_local']}}">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Og Type</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="og_type" placeholder="Og Type" name="og_type" value="{{$Page['og_type']}}">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Og Image</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="og_image" placeholder="Og Image" name="og_image" value="{{$Page['og_image']}}">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Og Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="og_title" placeholder="Og Title" name="og_title" value="{{$Page['og_title']}}">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Og Url</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="og_url" placeholder="Enter Og URL" name="og_url" value="{{$Page['og_url']}}">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Og Description</label>

                  <div class="col-sm-10">
                    <textarea id="og_description" name="og_description" rows="2" cols="95">
                      {{$Page['og_description']}}
                    </textarea>
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Og Site Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="og_site_name" placeholder="Enter Og Site Name" name="og_site_name" value="{{$Page['og_site_name']}}">
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Author</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="author" placeholder="Enter Author Name" name="author" value="{{$Page['author']}}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Canonical</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="canonical" placeholder="Enter Canonical" name="canonical" value="{{$Page['canonical']}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Geo Region</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="geo_region" placeholder="Enter Geo Region" name="geo_region" value="{{$Page['geo_region']}}">
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Geo Place Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="geo_place_name" placeholder="Enter Geo Place Name" name="geo_place_name" value="{{$Page['geo_place_name']}}">
                  </div>
                </div>
                   <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Geo Position</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="geo_position" placeholder="Enter Geo Position" name="geo_position" value="{{$Page['geo_position']}}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">ICBM</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="icbm" placeholder="Enter ICBM" name="icbm" value="{{$Page['icbm']}}">
                  </div>
                </div>
                
            </div>
            <!-- /.box-body -->
          </div>
           </div>
          <!-- /.box -->
        </div>
              
               
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Save</button>
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

<!-- ./wrapper -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#addMore').on('click',function(){
    //alert(88);
    var banner = "<div class='form-group'><label for='inputPassword' class='col-sm-2 control-label'>Banner</label><div class='col-sm-8'><input  type='file' class='form-control1'  name='logo[]'></div></div>";
    var imageAlt = "<div class='form-group'><label for='inputPassword3' class='col-sm-2 control-label'>Image ALT Text</label><div class='col-sm-10'><input type='text' class='form-control' id='image_alt' placeholder='Enter Image Alt Text' name='image_alt[]'></div></div>";
    var imageTitle="<div class='form-group'><label for='inputPassword3' class='col-sm-2 control-label'>Image Title Text</label><div class='col-sm-10'><input type='text' class='form-control' id='image_title' placeholder='Enter Image Title Text' name='image_title[]'></div></div>";
    $("#addmoreDiv").append(banner+imageAlt+imageTitle);
  });
});
</script>
@endsection
