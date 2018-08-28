<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Sản phẩm
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo e(route( 'product.index' )); ?>">Sản phẩm</a></li>
    <li class="active">Danh sách</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <?php if(Session::has('message')): ?>
      <p class="alert alert-info" ><?php echo e(Session::get('message')); ?></p>
      <?php endif; ?>
      <a href="<?php echo e(route('product.create', ['parent_id' => $arrSearch['parent_id'], 'cate_id' => $arrSearch['cate_id']])); ?>" class="btn btn-info btn-sm" style="margin-bottom:5px">Tạo mới</a>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Bộ lọc</h3>
        </div>
        <div class="panel-body">
          <form class="form-inline" id="searchForm" role="form" method="GET" action="<?php echo e(route('product.index')); ?>">           
              
            <div class="form-group">              
              <select class="form-control" name="parent_id" id="parent_id">
                <option value="">--Danh mục cha--</option>                  
                  <?php foreach( $cateParentList as $value ): ?>
                    <option value="<?php echo e($value->id); ?>"
                    <?php echo e($arrSearch['parent_id'] == $value->id ? "selected" : ""); ?>                        

                    ><?php echo e($value->name); ?></option>
                    <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">              
              <select class="form-control" name="cate_id" id="cate_id">
                <option value="">--Danh mục con--</option>
                  <?php 
                  if($arrSearch['parent_id']){
                    $cateList = App\Models\Cate::where('parent_id', $arrSearch['parent_id'])->get();
                  }
                  ?>
                  <?php foreach( $cateList as $value ): ?>
                    <option value="<?php echo e($value->id); ?>"
                    <?php echo e($arrSearch['cate_id'] == $value->id ? "selected" : ""); ?>                        

                    ><?php echo e($value->name); ?></option>
                    <?php endforeach; ?>
              </select>
            </div>          
            <div class="form-group">              
              <input type="text" placeholder="Tên sản phẩm" class="form-control" name="title" value="<?php echo e($arrSearch['title']); ?>" >
            </div>
            <div class="form-group">              
              <input type="text" placeholder="Mã sản phẩm" class="form-control" name="code" value="<?php echo e($arrSearch['code']); ?>" >
            </div>           
            <div class="form-group">
                <div class="checkbox">
                  <label style="color:red; font-weight:bold">
                    <input type="checkbox" name="is_hot" id="is_hot" value="1" <?php echo e($arrSearch['is_hot'] == 1 ? "checked" : ""); ?>>
                     HOT
                  </label>
                </div>               
              </div>
            <button type="submit" class="btn btn-primary btn-sm">Lọc</button>
          </form>         
        </div>
      </div>
      
      <div class="box">

        <div class="box-header with-border">
          <h3 class="box-title">Danh sách ( <?php echo e($items->total()); ?> sản phẩm )</h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <div style="text-align:center">
           <?php echo e($items->appends( $arrSearch )->links()); ?>

          </div>  
          <?php if($arrSearch['is_hot'] == 1): ?>
          <form method="post" action=<?php echo e(route('product.save-order-hot')); ?> >
            <?php echo e(csrf_field()); ?>

            <?php if($items->count() > 0): ?>
            <button type="submit" class="btn btn-warning btn-sm">Save thứ tự</button>
            <?php endif; ?>
            <input type="hidden" name="parent_id" value="<?php echo e($arrSearch['parent_id']); ?>">
            <input type="hidden" name="is_hot" value="1">
          <?php endif; ?>

            <table class="table table-bordered" id="table-list-data">
              <tr>
                <th style="width: 1%">#</th>
                <th style="width: 1%;white-space:nowrap">Mã tin</th>
                <?php if($arrSearch['is_hot'] == 1): ?>
                <td width="120px">
                  Thứ tự
                </td>
                <?php endif; ?>
                <th width="100px">Hình ảnh</th>
                <th>Thông tin sản phẩm</th>                                          
                <th width="1%;white-space:nowrap">Thao tác</th>
              </tr>
              <tbody>
              <?php if( $items->count() > 0 ): ?>
                <?php $i = 0; ?>
                <?php foreach( $items as $item ): ?>
                  <?php $i ++; 

                  ?>
                <tr id="row-<?php echo e($item->id); ?>">
                  <td><span class="order"><?php echo e($i); ?></span></td>
                  <td style="text-align:center"><?php echo e($item->code); ?></td>
                  <?php if($arrSearch['is_hot'] == 1): ?>
                  <td>
                    <input type="text" value="<?php echo e($item->display_order); ?>" name="display_order[<?php echo e($item->id); ?>]" style="width:80px" class="form-control" />
                  </td>
                  <?php endif; ?>
                  <td>
                    <img class="img-thumbnail lazy" width="80" data-original="<?php echo e($item->image_urls ? Helper::showImage($item->image_urls) : URL::asset('public/admin/dist/img/no-image.jpg')); ?>" alt="Nổi bật" title="Nổi bật" />
                  </td>
                  <td>                  
                    <a style="color:#444;font-weight:bold;font-size:16px" href="<?php echo e(route( 'product.edit', [ 'id' => $item->id ])); ?>"><?php echo e($item->title); ?></a> 
                    <?php if( $item->is_hot == 1 ): ?>
                    <label class="label label-danger">HOT</label>
                    <?php endif; ?>
                    
                  <br>
                  <p style="color:#00acd6;font-weight:bold;margin-top:10px"><?php echo e($item->cateParent->name); ?> / <?php echo e($item->cate->name); ?></p>
                    <div class="block-author">
                      <ul>
                        <li>
                          <span>Tác giả:</span>
                          <span class="name"><?php echo $item->createdUser->display_name; ?></span>
                        </li>
                        <li>
                            <span>Ngày tạo:</span>
                          <span class="name"><?php echo date('d/m/Y H:i', strtotime($item->created_at)); ?></span>
                          
                        </li>
                         <li>
                            <span>Cập nhật:</span>
                          <span class="name"><?php echo $item->updatedUser->display_name; ?> ( <?php echo date('d/m/Y H:i', strtotime($item->updated_at)); ?> )</span>          
                        </li>  
                        <li>
                          <?php echo Helper::view($item->id, 1); ?> lượt xem
                        </li>
                      </ul>
                    </div>
                  </td>
                 
                  <td style="white-space:nowrap; text-align:right">
                    <a class="btn btn-default btn-sm" href="<?php echo e(route('product', [$item->slug, $item->id] )); ?>" target="_blank" title="Xem"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
                    <a href="<?php echo e(route( 'product.edit', [ 'id' => $item->id ])); ?>" class="btn btn-warning btn-sm" title="Chỉnh sửa"><span class="glyphicon glyphicon-pencil"></span></a>                 

                    <a onclick="return callDelete('<?php echo e($item->title); ?>','<?php echo e(route( 'product.destroy', [ 'id' => $item->id ])); ?>');" class="btn btn-danger btn-sm" title="Xóa">
                      <span class="glyphicon glyphicon-trash"></span>
                      </a>

                  </td>
                </tr> 
                <?php endforeach; ?>
              <?php else: ?>
              <tr>
                <td colspan="9">Không có dữ liệu.</td>
              </tr>
              <?php endif; ?>

            </tbody>
            </table>
          <?php if($arrSearch['is_hot'] == 1): ?>
          </form>
          <?php endif; ?>
          <div style="text-align:center">
           <?php echo e($items->appends( $arrSearch )->links()); ?>

          </div>  
        </div>        
      </div>
      <!-- /.box -->     
    </div>
    <!-- /.col -->  
  </div> 
</section>
<!-- /.content -->
</div>
<style type="text/css">
#searchForm div{
  margin-right: 7px;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_page'); ?>
<script type="text/javascript">
function callDelete(title, url){  
  swal({
    title: 'Bạn muốn xóa "' + title +'"?',
    text: "Dữ liệu sẽ không thể phục hồi.",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes'
  }).then(function() {
    location.href= url;
  })
  return flag;
}
$(document).ready(function(){
  $('input.submitForm').click(function(){
    var obj = $(this);
    if(obj.prop('checked') == true){
      obj.val(1);      
    }else{
      obj.val(0);
    } 
    obj.parent().parent().parent().submit(); 
  });
  
  $('#parent_id, #type, #cate_id').change(function(){    
    $('#searchForm').submit();
  });  
  $('#is_hot').change(function(){
    $('#searchForm').submit();
  });
  $('#table-list-data tbody').sortable({
        placeholder: 'placeholder',
        handle: ".move",
        start: function (event, ui) {
                ui.item.toggleClass("highlight");
        },
        stop: function (event, ui) {
                ui.item.toggleClass("highlight");
        },          
        axis: "y",
        update: function() {
            var rows = $('#table-list-data tbody tr');
            var strOrder = '';
            var strTemp = '';
            for (var i=0; i<rows.length; i++) {
                strTemp = rows[i].id;
                strOrder += strTemp.replace('row-','') + ";";
            }     
            updateOrder("san_pham", strOrder);
        }
    });
});
function updateOrder(table, strOrder){
  $.ajax({
      url: $('#route_update_order').val(),
      type: "POST",
      async: false,
      data: {          
          str_order : strOrder,
          table : table
      },
      success: function(data){
          var countRow = $('#table-list-data tbody tr span.order').length;
          for(var i = 0 ; i < countRow ; i ++ ){
              $('span.order').eq(i).html(i+1);
          }                        
      }
  });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>