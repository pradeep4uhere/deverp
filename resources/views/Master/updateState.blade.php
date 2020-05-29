<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Location Update</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form">
	
  <div class="box-body">
    <div class="form-group">
     <div class="form-group">
      <label>State</label>
      <select class="form-control" name="state" id="state">
         <option>Choose State</option>
        <?php foreach($stateList as $id=>$stateName){ ?>
             <option value="{{str_slug($stateName)}}" <?php if(str_slug($location['state'])==str_slug($stateName)){?> selected="selected"<?php }?>>{{$stateName}}</option>
        <?php } ?>
      </select>
    </div>
    </div>
    <div class="form-group">
      <div class="form-group">
      <label>District</label>
      <select class="form-control" name="district" id="district">
        <option value="-1">Choose District</option>
      </select>
    </div>
    </div>
    <div class="form-group">
      <div class="form-group">
      <label>Location</label>
      <select class="form-control" name="location" id="location">
        <option value="-1">Choose Location</option>
      </select>
    </div>
    </div>
    <div class="form-group">
      <label>Pincode</label>
      <input type="text" class="form-control" placeholder="Enter Pincode" name="pincode" id="pincode">
    </div>
  </div>
    <div class="form-group">
      <div class="form-group">
      <label>Status</label>
      <select class="form-control" name="status">
        <option value="1">Active</option>
        <option value="0">InActive</option>
      </select>
    </div>
    </div>
    
  <!-- /.box-body -->
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
 </div>
</form>
</div>
<!-- jQuery 3 -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function(){
     $("#state").on("change", function(){
        var id = $('#state').val();
        $.get("{{env('APPURL')}}/getdistrict/" + id, function( data ) {
             $("#district").html(data);
        });
     });

     $("#district").on("change", function(){
        var id = $('#state').val();
        var district = $('#district').val();
        $.get("{{env('APPURL')}}/getlocation/" + id+ "/" + district, function( data ) {
            $("#location").html(data);
            var locationStr = $("#location").html(data);
            setTimeout(function(){
                var locationVal = $("#location").val();
                if(locationVal.length>0){
                    var arr= locationVal.split('|');
                    var pincode = arr[1];
                    $('#pincode').val(pincode);
                }

            },2000);
            
        });
     });

 
});
</script>

