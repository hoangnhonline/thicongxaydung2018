@extends('backend.layout')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Sản phẩm    
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('product.index') }}">Sản phẩm</a></li>
        <li class="active"><span class="glyphicon glyphicon-pencil"></span></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <a class="btn btn-default btn-sm" href="{{ route('product.index', ['parent_id' => $detail->parent_id, 'cate_id' => $detail->cate_id]) }}" style="margin-bottom:5px">Quay lại</a>
    <a class="btn btn-primary btn-sm" href="{{ route('product', [$detail->slug, $detail->id] ) }}" target="_blank" style="margin-top:-6px"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
    <div class="block-author edit">
      <ul>
        <li>
          <span>Tác giả:</span>
          <span class="name">{!! $detail->createdUser->display_name !!}</span>
        </li>
        <li>
            <span>Ngày tạo:</span>
          <span class="name">{!! date('d/m/Y H:i', strtotime($detail->created_at)) !!}</span>
          
        </li>
         <li>
            <span>Cập nhật lần cuối:</span>
          <span class="name">{!! $detail->updatedUser->display_name !!} ( {!! date('d/m/Y H:i', strtotime($detail->updated_at)) !!} )</span>          
        </li>        
      </ul>
    </div>
    <form role="form" method="POST" action="{{ route('product.update') }}" id="dataForm">
        <div class="row">
            <!-- left column -->
            <input type="hidden" name="id" value="{{ $detail->id }}">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        Chỉnh sửa
                    </div>
                    <!-- /.box-header -->               
                    {!! csrf_field() !!}          
                    <div class="box-body">
                        @if(Session::has('message'))
                        <p class="alert alert-info" >{{ Session::get('message') }}</p>
                        @endif
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin</a></li>
                                <li role="presentation" class=""><a href="#lien-he" aria-controls="tien-ich" role="tab" data-toggle="tab">Thông số chi tiết</a></li>
                                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Hình ảnh</a></li>
                                <li role="presentation"><a href="#tien-ich" aria-controls="tien-ich" role="tab" data-toggle="tab">Thông tin SEO</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">                                    
                                    <div class="form-group col-md-4  pleft-5">
                                        <label for="email">Danh mục cha <span class="red-star">*</span></label>
                                        <select class="form-control req" name="parent_id" id="parent_id">
                                            <option value="">-- chọn --</option>
                                            @foreach( $cateParentList as $value )
                                            <option value="{{ $value->id }}"
                                            {{ old('parent_id', $detail->parent_id) == $value->id ? "selected" : "" }}                           
                                            >{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4  pleft-5">
                                        <label for="email">Danh mục con <span class="red-star">*</span></label>
                                        <select class="form-control req" name="cate_id" id="cate_id">
                                            <option value="">-- chọn --</option>
                                            <?php 
                                                if(isset($parent_id) && $parent_id > 0){
                                                  $cateList = App\Models\Cate::where('parent_id', $parent_id)->get();
                                                }
                                                ?>
                                            <?php $cate_id = old('cate_id', $detail->cate_id); ?>
                                            @foreach( $cateList as $value )
                                            <option value="{{ $value->id }}"
                                            {{ $cate_id == $value->id ? "selected" : "" }}                           
                                            >{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 none-padding" >                  
                                        <label>Mã sản phẩm <span class="red-star">*</span></label>
                                        <input type="text" class="form-control req" name="code" id="code" value="{{ old('code', $detail->code) }}">
                                    </div>
                                    <div class="form-group" >                  
                                        <label>Tên sản phẩm<span class="red-star">*</span></label>
                                        <input type="text" class="form-control req" name="title" id="title" value="{{ old('title', $detail->title) }}">
                                    </div>
                                    <div class="form-group">                  
                                        <label>Slug <span class="red-star">*</span></label>                  
                                        <input type="text" class="form-control req" readonly="readonly" name="slug" id="slug" value="{{ old('slug', $detail->slug) }}">
                                    </div>
                                    <div class="col-md-6 none-padding">
                                      <div class="checkbox">
                                          <label><input type="checkbox" name="is_slider" value="1" {{ old('is_slider', $detail->is_slider) == 1 ? "checked" : "" }}> Hiện slider </label>
                                      </div>                          
                                    </div>     
                                    <div class="form-group col-md-6">
                                        <div class="checkbox">
                                            <label style="font-weight:bold;color:red">
                                            <input type="checkbox" name="is_hot" value="1" {{ old('is_hot', $detail->is_hot ) == 1 ? "checked" : "" }}>
                                            HOT
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12  pleft-5">
                                        <label for="email">Layout <span class="red-star">*</span></label>
                                        <select class="form-control" name="layout" id="layout">
                                        <option value="1" {{ old('layout', $detail->layout ) == 1 ? "selected" : "" }}>Thông số chung</option>
                                        <option value="2" {{ old('layout', $detail->layout ) == 2 ? "selected" : "" }}>Thông số riêng</option>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label>Tags</label>
                                        <select class="form-control select2" name="tags[]" id="tags" multiple="multiple">                  
                                        @if( $tagList->count() > 0)
                                        @foreach( $tagList as $value )
                                        <option value="{{ $value->id }}" {{ in_array($value->id, old('tags', $tagSelected)) ? "selected" : "" }}>{{ $value->name }}</option>
                                        @endforeach
                                        @endif
                                        </select>
                                        <span class="input-group-btn">
                                        <button style="margin-top:24px" class="btn btn-primary btn-sm" id="btnAddTag" type="button" data-value="3">
                                        Tạo mới
                                        </button>
                                        </span>
                                    </div>
                                    <div class="form-group" style="margin-top:10px">
                                        <label>Mô tả chi tiết</label>
                                        <textarea class="form-control" rows="5" name="content" id="content">{{ old('content', $detail->content ) }}</textarea>
                                    </div>              
                                    <div class="clearfix"></div>                     
                                    <div class="form-group form-group col-md-6 none-padding" style="margin-top:10px">
                                        <label>Tiến độ</label>
                                        <textarea class="form-control" rows="6" name="tien_do" id="tien_do">{{ old('tien_do', $detail->tien_do ) }}</textarea>
                                    </div>
                                    <div class="form-group form-group col-md-6" style="margin-top:10px">
                                        <label>Hỏi đáp</label>
                                        <textarea class="form-control" rows="6" name="hoi_dap" id="hoi_dap">{{ old('hoi_dap', $detail->hoi_dap ) }}</textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!--end thong tin co ban--> 
                                <div role="tabpanel" class="tab-pane" id="lien-he">
                                    @foreach($thongsoList as $ts)
                                    <?php 
                                    $thongso = isset($arrThongSo[$ts->id]) ? $arrThongSo[$ts->id]  : '';
                                    ?>
                                    <div class="form-group col-md-12 " >                  
                                        <label>{{ $ts->name }}</label>
                                        <input type="text" class="form-control" name="thong_so_chi_tiet[{{ $ts->id }}]" id="thong_so_chi_tiet{{ $ts->id}}" value="{{ old('thong_so_chi_tiet[$ts->id]', $thongso) }}">
                                    </div>
                                    @endforeach
                                    <div class="clearfix"></div>
                                </div>
                                <!--end lien he -->                       
                                <div role="tabpanel" class="tab-pane" id="settings">
                                    <div class="form-group" style="margin-top:10px;margin-bottom:10px">
                                        <div class="col-md-12" style="text-align:center">
                                            <input type="file" id="file-image"  style="display:none" multiple/>
                                            <button class="btn btn-primary btn-sm" id="btnUploadImage" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button> 
                                            <div class="clearfix"></div>
                                            <div id="div-image" style="margin-top:10px">

                                                @if( $hinhArr )
                                                @foreach( $hinhArr as $k => $hinh)
                                                <div class="col-md-3">                              
                                                    <img class="img-thumbnail" src="{{ Helper::showImage($hinh) }}" style="width:100%">
                                                    <div class="checkbox">                                   
                                                        <label><input type="radio" name="thumbnail_id" class="thumb" value="{{ $k }}" {{ $detail->thumbnail_id == $k ? "checked" : "" }}> Ảnh đại diện </label>
                                                        <button class="btn btn-danger btn-sm remove-image" type="button" data-value="{{  $hinh }}" data-id="{{ $k }}" ><span class="glyphicon glyphicon-trash"></span></button>
                                                    </div>
                                                    <input type="hidden" name="image_id[]" value="{{ $k }}">
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div style="clear:both"></div>
                                    </div>
                                </div>
                                <!--end hinh anh-->    
                                <div role="tabpanel" class="tab-pane" id="tien-ich">
                                    <input type="hidden" name="meta_id" value="{{ $detail->meta_id }}">
                                    <div class="form-group">
                                        <label>Meta title </label>
                                        <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ !empty((array)$meta) ? $meta->title : "" }}">
                                    </div>
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Meta desciption</label>
                                        <textarea class="form-control" rows="6" name="meta_description" id="meta_description">{{ !empty((array)$meta) ? $meta->description : "" }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta keywords</label>
                                        <textarea class="form-control" rows="4" name="meta_keywords" id="meta_keywords">{{ !empty((array)$meta) ? $meta->keywords : "" }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Custom text</label>
                                        <textarea class="form-control" rows="6" name="custom_text" id="custom_text">{{ !empty((array)$meta) ? $meta->custom_text : ""  }}</textarea>
                                    </div>
                                </div>
                                <!--end tien ich-->                
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-default btn-sm" id="btnLoading" style="display:none"><i class="fa fa-spin fa-spinner"></i></button>
                        <button type="submit" class="btn btn-primary btn-sm" id="btnSave">Lưu</button>
                        <a class="btn btn-default btn-sm" class="btn btn-primary btn-sm" href="{{ route('product.index', ['parent_id' => $detail->parent_id])}}">Hủy</a>
                    </div>
                </div>
                <!-- /.box -->     
            </div>
    </form>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
<style type="text/css">
    .nav-tabs>li.active>a{
    color:#FFF !important;
    background-color: #3C8DBC !important;
    }
</style>
<!-- Modal -->
<div id="tagModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <form method="POST" action="{{ route('tag.ajax-save') }}" id="formAjaxTag">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tạo mới tag</h4>
                </div>
                <div class="modal-body" id="contentTag">
                    <input type="hidden" name="type" value="1">
                    <!-- text input -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tags<span class="red-star">*</span></label>
                            <textarea class="form-control" name="str_tag" id="str_tag" rows="4" >{{ old('str_tag') }}</textarea>
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
<input type="hidden" id="route_upload_tmp_image_multiple" value="{{ route('image.tmp-upload-multiple') }}">
<input type="hidden" id="route_upload_tmp_image" value="{{ route('image.tmp-upload') }}">
@stop
@section('javascript_page')
<script type="text/javascript">
var h = screen.height;
var w = screen.width;
var left = (screen.width/2)-((w-300)/2);
var top = (screen.height/2)-((h-100)/2);
function openKCFinder_singleFile() {
        window.KCFinder = {};
        window.KCFinder.callBack = function(url) {
            console.log(url);
            window.KCFinder = null;
        };
        window.open('{{ URL::asset("public/admin/dist/js/kcfinder/browse.php?type=images") }}', 'kcfinder_single','scrollbars=1,menubar=no,width='+ (w-300) +',height=' + (h-300) +',top=' + top+',left=' + left);
    }
 
function openKCFinder_multipleFiles() {
    window.KCFinder = {};
    window.KCFinder.callBackMultiple = function(files) {
        var strHtml = '';
        for (var i = 0; i < files.length; i++) {
             strHtml += '<div class="col-md-3">';

        strHtml += '<img class="img-thumbnail" src="' + '{{ env('APP_URL') }}' + files[i]  + '" style="width:100%">';
         strHtml += '<div class="checkbox">';
         strHtml += '<input type="hidden" name="image_tmp_url[]" value="' + files[i]  + '">';
        
        strHtml += '<label><input type="radio" name="thumbnail_id" class="thumb" value="' +  files[i]  + '"> &nbsp; Ảnh đại diện </label>';
        strHtml += '<button class="btn btn-danger btn-sm remove-image" type="button" data-value="' + '{{ env('APP_URL') }}' + files[i]  + '" data-id="" ><span class="glyphicon glyphicon-trash"></span></button></div></div>';
      
            console.log(files[i]);
        }
        $('#div-image').append(strHtml);
            if( $('#div-image input.thumb:checked').length == 0){
              $('#div-image input.thumb').eq(0).prop('checked', true);
            }
        window.KCFinder = null;
    };
      window.open('{{ URL::asset("public/admin/dist/js/kcfinder/browse.php?type=images") }}', 'kcfinder_multiple','scrollbars=1,menubar=no,width='+ (w-300) +',height=' + (h-300) +',top=' + top+',left=' + left);
}
    $(document).ready(function(){
        
      $('#btnAddTag').click(function(){
          $('#tagModal').modal('show');
      });
    });
    $(document).on('click', '#btnSaveTagAjax', function(){
        $.ajax({
          url : $('#formAjaxTag').attr('action'),
          data: $('#formAjaxTag').serialize(),
          type : "post", 
          success : function(str_id){          
            $('#btnCloseModalTag').click();
            $.ajax({
              url : "{{ route('tag.ajax-list') }}",
              data: { 
                type : 1 ,
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
     $('#contentTag #name').change(function(){
           var name = $.trim( $(this).val() );
         
            $.ajax({
              url: $('#route_get_slug').val(),
              type: "POST",
              async: false,      
              data: {
                str : name
              },              
              success: function (response) {
                if( response.str ){                  
                  $('#contentTag #slug').val( response.str );
                }                
              }
            });
         
        });
    $(document).on('click', '.remove-image', function(){
        var parent = $(this).parents('.col-md-3');
        if(parent.find('input.thumb').prop('checked') == true){
            alert('Chọn hình đại diện khác trước khi xóa.'); return true;
        }else{
            if( confirm ("Bạn có chắc chắn không ?")){        
        
                $(this).parents('.col-md-3').remove();
            }

        }
    });
    
    $(document).on('click', '#btnSearchAjax', function(){
      filterAjax($('#search_type').val());
    });
    $(document).on('keypress', '#name_search', function(e){
      if(e.which == 13) {
          e.preventDefault();
          filterAjax($('#search_type').val());
      }
    });
    
        $(document).ready(function(){
         $('#dataForm .req').blur(function(){    
            if($(this).val() != ''){
              $(this).removeClass('error');
            }else{
              $(this).addClass('error');
            }
          });
              $('#btnSave').click(function(){
              var errReq = 0;
              $('#dataForm .req').each(function(){
                var obj = $(this);
                if(obj.val() == '' || obj.val() == '0'){
                  errReq++;
                  obj.addClass('error');
                }else{
                  obj.removeClass('error');
                }
              });
              if(errReq > 0){          
               $('html, body').animate({
                    scrollTop: $("#dataForm .req.error").eq(0).parents('div').offset().top
                }, 500);
                return false;
              }
              if( $('#div-image img.img-thumbnail').length == 0){
                alert('Bạn chưa upload hình sản phẩm');return false;
              }
            });
          $('#type').change(function(){
            location.href="{{ route('product.create') }}?type=" + $(this).val();
          })
          $(".select2").select2();
          $('#dataForm').submit(function(){
            
            $('#btnSave').hide();
            $('#btnLoading').show();
          });
          
          var editor1 = CKEDITOR.replace( 'content',{
              height : 400
          });
          var editor2 = CKEDITOR.replace( 'tien_do',{
              height : 400
          });
          var editor3 = CKEDITOR.replace( 'hoi_dap',{
              height : 400        
          });
          
          $('#btnUploadImage').click(function(){        
            //$('#file-image').click();
            openKCFinder_multipleFiles();
          }); 
         
          var files = "";
          $('#file-image').change(function(e){
             files = e.target.files;
             
             if(files != ''){
               var dataForm = new FormData();        
              $.each(files, function(key, value) {
                 dataForm.append('file[]', value);
              });   
              
              dataForm.append('date_dir', 0);
              dataForm.append('folder', 'tmp');
    
              $.ajax({
                url: $('#route_upload_tmp_image_multiple').val(),
                type: "POST",
                async: false,      
                data: dataForm,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#div-image').append(response);
                    if( $('input.thumb:checked').length == 0){
                      $('input.thumb').eq(0).prop('checked', true);
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
         
    
          $('#title').change(function(){
             var name = $.trim( $(this).val() );
             
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
                  }
                });
           
          }); 
          $('#parent_id').change(function(){         
    
              $.ajax({
                url : '{{ route('get-child') }}',
                data : {
                  mod : 'cate',
                  col : 'parent_id',
                  id : $('#parent_id').val()
                },
                type : 'POST',
                dataType : 'html',
                success : function(data){
                  $('#cate_id').html(data);              
                }
              })
            
          });
          $('#type_id').change(function(){         
    
              $.ajax({
                url : '{{ route('get-child') }}',
                data : {
                  mod : 'cate_parent',
                  col : 'type_id',
                  id : $('#type_id').val()
                },
                type : 'POST',
                dataType : 'html',
                success : function(data){
                  $('#parent_id').html(data);
                  $('#cate_id').html('');
                }
              })
            
          });
    
        });
        
</script>
@stop