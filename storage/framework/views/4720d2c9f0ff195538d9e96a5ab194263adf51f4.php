<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tạo tài khoản
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo e(route('account.index')); ?>">Tài khoản</a></li>
      <li class="active">Tạo mới</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="<?php echo e(route('account.index')); ?>" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="<?php echo e(route('account.store')); ?>" id="formData">
    <div class="row">
      <!-- left column -->

      <div class="col-md-7">
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
                 
                 <!-- text input -->
                
                 <div class="form-group">
                  <label>Email truy cập <span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="email" id="email" value="<?php echo e(old('email')); ?>">
                </div>   
                <div class="form-group">
                  <label>Mật khẩu <span class="red-star">*</span></label>
                  <input type="password" class="form-control" name="password" id="password" value="<?php echo e(old('password')); ?>">
                </div>   
                <div class="form-group">
                  <label>Nhập lại mật khẩu <span class="red-star">*</span></label>
                  <input type="password" class="form-control" name="re_password" id="re_password" value="<?php echo e(old('re_password')); ?>">
                </div>   
                <div class="form-group">
                  <label>Tên hiển thị<span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="display_name" id="display_name" value="<?php echo e(old('display_name')); ?>">
                </div>
                <div class="form-group">
                  <label>Họ tên</label>
                  <input type="text" class="form-control" name="full_name" id="full_name" value="<?php echo e(old('full_name')); ?>">
                </div>             
                <div class="form-group">
                  <label>Phân loại</label>
                  <select class="form-control" name="role" id="role">      
                    <option value="" >--Chọn role--</option>                       
                    <option value="1" <?php echo e(old('role') == 1 ? "selected" : ""); ?>>Editor</option>                  
                    <?php if(Auth::user()->role == 3): ?>
                    <option value="2" <?php echo e(old('role') == 2 ? "selected" : ""); ?>>Mod</option>                            
                    <?php endif; ?>
                  </select>
                </div>                 
                <div class="clearfix"></div>                     
                <div class="form-group">
                  <label>Trạng thái</label>
                  <select class="form-control" name="status" id="status">                                      
                    <option value="1" <?php echo e(old('status') == 1 || old('status') == NULL ? "selected" : ""); ?>>Mở</option>                  
                    <option value="2" <?php echo e(old('status') == 2 ? "selected" : ""); ?>>Khóa</option>                  
                  </select>
                </div>
            </div>
            <div class="box-footer">             
              <button type="submit" class="btn btn-primary btn-sm" id="btnSave">Lưu</button>
              <a class="btn btn-default btn-sm" class="btn btn-primary btn-sm" href="<?php echo e(route('account.index')); ?>">Hủy</a>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_page'); ?>
<script type="text/javascript">
    $(document).ready(function(){
      $('#formData').submit(function(){
        $('#btnSave').html('<i class="fa fa-spinner fa-spin">').attr('disabled', 'disabled');
      });      
    });
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>