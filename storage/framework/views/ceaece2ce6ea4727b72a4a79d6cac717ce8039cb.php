<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Bài viết    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo e(route('articles.index')); ?>">Bài viết</a></li>
      <li class="active">Tạo mới</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="<?php echo e(route('articles.index')); ?>" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="<?php echo e(route('articles.store')); ?>">
    <div class="row">
      <!-- left column -->

      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tạo mới</h3>
          </div>
          <!-- /.box-header -->               
            <?php echo csrf_field(); ?>


            <div class="box-body">
              <?php if(count($errors) > 0): ?>
                  <div class="alert alert-danger">
                      <ul>
                          <?php foreach($errors->all() as $error): ?>
                              <li><?php echo e($error); ?></li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
              <?php endif; ?>                
                <div class="form-group">
                  <label for="email">Danh mục <span class="red-star">*</span></label>
                  <select class="form-control" name="cate_id" id="cate_id">
                    <option value="">-- chọn --</option>
                    <?php if( $cateArr->count() > 0): ?>
                      <?php foreach( $cateArr as $value ): ?>
                      <option value="<?php echo e($value->id); ?>" <?php echo e($value->id == old('cate_id') || $value->id == $cate_id ? "selected" : ""); ?>><?php echo e($value->name); ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>                           
                
                <div class="form-group" >
                  
                  <label>Tiêu đề <span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="title" id="title" value="<?php echo e(old('title')); ?>">
                </div>
                <span class=""></span>
                <div class="form-group">                  
                  <label>Slug <span class="red-star">*</span></label>                  
                  <input type="text" class="form-control" name="slug" id="slug" value="<?php echo e(old('slug')); ?>">
                </div>
                
                <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                  <label class="col-md-3 row">Thumbnail ( 624x468 px)</label>    
                  <div class="col-md-9">
                    <img id="thumbnail_image" src="<?php echo e(old('image_url') ? Helper::showImage(old('image_url')) : URL::asset('public/admin/dist/img/img.png')); ?>" class="img-thumbnail" width="145" height="85">
                    
                    <input type="file" id="file-image" style="display:none" />                    
                    <button class="btn btn-default btn-sm" id="btnUploadImage" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                    <input type="hidden" name="image_url" id="image_url" value="<?php echo e(old('image_url')); ?>"/>
                  </div>
                  <div style="clear:both"></div>
                </div>
                <div style="clear:both"></div>                
                <!-- textarea -->
                <div class="form-group">
                  <label>Mô tả</label>
                  <textarea class="form-control" rows="6" name="description" id="description"><?php echo e(old('description')); ?></textarea>
                </div> 
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="is_hot" value="1" <?php echo e(old('is_hot') == 1 ? "checked" : ""); ?>>
                      Bài viết nổi bật
                    </label>
                  </div>               
                </div>
                <div class="form-group">
                  <label>Ẩn/hiện</label>
                  <select class="form-control" name="status" id="status">                  
                    <option value="0" <?php echo e(old('status') == 0 ? "selected" : ""); ?>>Ẩn</option>
                    <option value="1" <?php echo e(old('status') == 1 || old('status') == NULL ? "selected" : ""); ?>>Hiện</option>                  
                  </select>
                </div>
                <div class="input-group">
                  <label>Tags</label>
                  <select class="form-control select2" name="tags[]" id="tags" multiple="multiple">                  
                    <?php if( $tagArr->count() > 0): ?>
                      <?php foreach( $tagArr as $value ): ?>
                      <option value="<?php echo e($value->id); ?>" <?php echo e((old('tags') && in_array($value->id, old('tags'))) ? "selected" : ""); ?>><?php echo e($value->name); ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                  <span class="input-group-btn">
                    <button style="margin-top:24px" class="btn btn-primary btn-sm" id="btnAddTag" type="button" data-value="3">
                      Tạo mới
                    </button>
                  </span>
                </div>                
                <div class="form-group">
                  <label>Chi tiết</label>
                  <textarea class="form-control" rows="4" name="content" id="content"><?php echo e(old('content')); ?></textarea>
                </div>
                <input type="hidden" id="editor" value="content">
                  
            </div>          
                              
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
              <a class="btn btn-default btn-sm" class="btn btn-primary btn-sm" href="<?php echo e(route('articles.index')); ?>">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-4">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thông tin SEO</h3>
          </div>
          <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <label>Meta title </label>
                <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo e(old('meta_title')); ?>">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Meta desciption</label>
                <textarea class="form-control" rows="4" name="meta_description" id="meta_description"><?php echo e(old('meta_description')); ?></textarea>
              </div>  

              <div class="form-group">
                <label>Meta keywords</label>
                <textarea class="form-control" rows="4" name="meta_keywords" id="meta_keywords"><?php echo e(old('meta_keywords')); ?></textarea>
              </div>  
              <div class="form-group">
                <label>Custom text</label>
                <textarea class="form-control" rows="4" name="custom_text" id="custom_text"><?php echo e(old('custom_text')); ?></textarea>
              </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <!--/.col (left) -->      
    </div>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<input type="hidden" id="route_upload_tmp_image" value="<?php echo e(route('image.tmp-upload')); ?>">
<!-- Modal -->
<div id="tagModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
    <form method="POST" action="<?php echo e(route('tag.ajax-save')); ?>" id="formAjaxTag">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tạo mới tag</h4>
      </div>
      <div class="modal-body" id="contentTag">
          <input type="hidden" name="type" value="2">
           <!-- text input -->
          <div class="col-md-12">
            <div class="form-group">
              <label>Tags<span class="red-star">*</span> ( Cách nhau bằng dấu ;  )</label>
              <textarea class="form-control" name="str_tag" id="str_tag" rows="4" ><?php echo e(old('str_tag')); ?></textarea>
            </div>
            
          </div>
          <div classs="clearfix"></div>
      </div>
      <div style="clear:both"></div>
      <div class="modal-footer" style="text-align:center">
        <button type="button" class="btn btn-primary btn-sm" id="btnSaveTagAjax"> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" id="btnCloseModalTag">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_page'); ?>
<script type="text/javascript">
var h = screen.height;
var w = screen.width;
var left = (screen.width/2)-((w-300)/2);
var top = (screen.height/2)-((h-100)/2);
function openKCFinder_singleFile() {
      window.KCFinder = {};
      window.KCFinder.callBack = function(url) {
         $('#image_url').val(url);
         $('#thumbnail_image').attr('src', $('#app_url').val() + url);
          window.KCFinder = null;
      };
      window.open('<?php echo e(URL::asset("public/admin/dist/js/kcfinder/browse.php?type=images")); ?>', 'kcfinder_single','scrollbars=1,menubar=no,width='+ (w-300) +',height=' + (h-300) +',top=' + top+',left=' + left);
  }

$(document).on('click', '#btnSaveTagAjax', function(){
    $.ajax({
      url : $('#formAjaxTag').attr('action'),
      data: $('#formAjaxTag').serialize(),
      type : "post", 
      success : function(str_id){          
        $('#btnCloseModalTag').click();
        $.ajax({
          url : "<?php echo e(route('tag.ajax-list')); ?>",
          data: { 
            type : 2 ,
            tagSelected : $('#tags').val(),
            str_id : str_id
          },
          type : "get", 
          success : function(data){
              $('#tags').html(data);
              $('#tags').select2('refresh');
              
          }
        });
      }
    });
 }); 
$(document).ready(function(){
      $(".select2").select2();
      var editor = CKEDITOR.replace( 'content');
      $('#btnUploadImage').click(function(){        
        //$('#file-image').click();
        openKCFinder_singleFile($('#image_url'));
      });      
      $('#btnAddTag').click(function(){
          $('#tagModal').modal('show');
      });
      var files = "";
      $('#file-image').change(function(e){
         files = e.target.files;
         
         if(files != ''){
           var dataForm = new FormData();        
          $.each(files, function(key, value) {
             dataForm.append('file', value);
          });   
          
          dataForm.append('date_dir', 1);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_image').attr('src',$('#upload_url').val() + response.image_path);
                $( '#image_url' ).val( response.image_path );
                $( '#image_name' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
            },
            error: function(response){                             
                var errors = response.responseJSON;
                for (var key in errors) {
                  
                }
                //$('#btnLoading').hide();
                //$('#btnSave').show();
            }
          });
        }
      });
      
      
      $('#title').change(function(){
         var name = $.trim( $(this).val() );
         if( name != '' && $('#slug').val() == ''){
            $.ajax({
              url: $('#route_get_slug').val(),
              type: "POST",
              async: false,      
              data: {
                str : name
              },              
              success: function (response) {
                if( response.str ){                  
                  $('#slug').val( response.str );
                }                
              },
              error: function(response){                             
                  var errors = response.responseJSON;
                  for (var key in errors) {
                    
                  }
                  //$('#btnLoading').hide();
                  //$('#btnSave').show();
              }
            });
         }
      });
      $('#parent_id').change(function(){
        $.ajax({
            url: $('#route_get_cate_by_parent').val(),
            type: "POST",
            async: false,
            data: {          
                parent_id : $(this).val(),
                type : 'list'
            },
            success: function(data){
                $('#cate_id').html(data).select2('refresh');                      
            }
        });
      });
      $('#btnLoadMovies').click(function(){
        if( $('#url').val() != '' ){
          $('#spanLoad').removeClass('glyphicon glyphicon-download-alt').addClass('fa fa-spin fa-spinner');
          $.ajax({
              url: $('#route_get_movies_external').val(),
              type: "POST",
              async: true,
              data: {          
                  url : $('#url').val()                
              },              
              success: function(response){      
                  $('#title').val(response.title);
                  $('#slug').val(response.slug);
                  $('#thumbnail_image').attr('src', response.image_url);
                  $('#image_url').val(response.image_url);                
                  $('#spanLoad').removeClass('fa fa-spinner fa-spin').addClass('glyphicon glyphicon-download-alt');              
                                      
              }
          });
        }
      });
    });
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>