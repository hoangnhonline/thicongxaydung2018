 
  
<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="block2 block-breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>
			<li><a href="<?php echo e(route('services')); ?>">Dịch vụ</a></li>
			<li class="active"><?php echo $detail->title; ?></li>
		</ul>
	</div>
</div><!-- /block-breadcrumb -->
<div class="block block-two-col container">
	<div class="row">
		<div class="col-sm-9 col-xs-12 block-col-left">
			<div class="block-title-commom block-quote clearfix">
				<div class="block block-title">
					<h1>
						<i class="fa fa-home"></i>
						<?php echo $detail->title; ?>

					</h1>
				</div>
				<div class="block-content">	
					<div class="block-editor-content"><?php echo $detail->content; ?></div>
					<div class="clearfix" style="margin-bottom:20px"></div>
					<?php if(Session::has('message')): ?>
                        
                    <p class="alert alert-info" ><?php echo e(Session::get('message')); ?></p>
                    
                    <?php endif; ?>
                    <?php if(count($errors) > 0): ?>                        
                      <div class="alert alert-danger ">
                        <ul>                           
                            <li>Vui lòng nhập đầy đủ thông tin.</li>                            
                        </ul>
                      </div>                        
                    <?php endif; ?>  				
					<form class="block-form" id="dataForm" method="POST" action="<?php echo e(route('send-thi-cong')); ?>">
					<?php echo e(csrf_field()); ?>

						<div class="row">
						<input type="hidden" name="id" value="<?php echo e($id); ?>">
							<div class="form-group col-sm-6 col-xs-12">
								<input type="text" class="form-control req" name="full_name" id="full_name" placeholder="Tên khách hàng...(*)" value="<?php echo e(old('full_name')); ?>">
							</div>
							<div class="form-group col-sm-6 col-xs-12">
								<input type="text" class="form-control req" id="phone" name="phone" placeholder="Số điện thoại...(*)" value="<?php echo e(old('phone')); ?>">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-12 col-xs-12">
								<input type="text" class="form-control req" name="address" id="address" placeholder="Địa chỉ...(*)" value="<?php echo e(old('address')); ?>">
							</div>							
						</div>		
						<div class="row">
							<div class="form-group col-sm-6 col-xs-12">
								<input type="email" class="form-control req" id="email" name="email" placeholder="Email...(*)" value="<?php echo e(old('email')); ?>">
							</div>
							<div class="form-group col-sm-6 col-xs-12">
				              	<select class="form-control req" name="kien_truc_thi_cong" id="kien_truc_thi_cong">
								    <option value="">Kiến trúc...</option>
								    <?php foreach($arrSetting['kien_truc_thi_cong'] as $value): ?>
								    <option value="<?php echo $value->id; ?>" <?php echo e(old('kien_truc_thi_cong') == $value->id ? "selected" : ""); ?>><?php echo $value->name; ?></option>
								    <?php endforeach; ?>
								</select>
							</div>
						</div>		
						<div class="row">
							<div class="form-group col-sm-6 col-xs-12">
				              	<select class="form-control req" name="loai_kien_truc_thi_cong" id="loai_kien_truc_thi_cong">
								    <option value="">Loại kiến trúc thi công...</option>
								    <?php foreach($arrSetting['loai_kien_truc_thi_cong'] as $value): ?>
								    <option value="<?php echo $value->id; ?>" <?php echo e(old('loai_kien_truc_thi_cong') == $value->id ? "selected" : ""); ?>><?php echo $value->name; ?></option>
								    <?php endforeach; ?>
								</select>
							</div>
							<div class="form-group col-sm-6 col-xs-12">
				              	<select class="form-control req" name="hinh_thuc_thi_cong" id="hinh_thuc_thi_cong">
				              		<option value="">Hình thức thi công xây dựng...</option>
								    <?php foreach($arrSetting['hinh_thuc_thi_cong'] as $value): ?>
								    <option value="<?php echo $value->id; ?>" <?php echo e(old('hinh_thuc_thi_cong') == $value->id ? "selected" : ""); ?>><?php echo $value->name; ?></option>
								    <?php endforeach; ?>
								</select>
							</div>
						</div>   
					
						<div class="row">
							<div class="form-group col-sm-6 col-xs-12">
								<input type="text" class="form-control req" name="tong_dien_tich" id="tong_dien_tich" placeholder="Tổng diện tích xây dựng...(*)" value="<?php echo e(old('tong_dien_tich')); ?>">
							</div>
							<div class="form-group col-sm-6 col-xs-12">
								<input type="text" class="form-control req" value="<?php echo e(old('so_tang')); ?>" name="so_tang" id="so_tang" placeholder="Số tầng...(*)">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6 col-xs-12">
								<input type="text" class="form-control req" value="<?php echo e(old('chieu_dai')); ?>"  name="chieu_dai" id="chieu_dai" placeholder="Chiều dài...(*)">
							</div>
							<div class="form-group col-sm-6 col-xs-12">
								<input type="text" class="form-control req" value="<?php echo e(old('chieu_rong')); ?>" id="chieu_rong" name="chieu_rong" placeholder="Chiều rộng...(*)">
							</div>
						</div>						
						<div class="row">
							<div class="form-group col-sm-12 col-xs-12">
								<textarea name="notes" rows="4" class="form-control" placeholder="Ghi chú"><?php echo e(old('notes')); ?></textarea>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-12 col-xs-12">
								<button type="submit" id="btnSave" class="btn btn-prmary btn-view">Xem báo giá</button>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /block-ct-news -->
		</div><!-- /block-col-left -->
		<div class="col-sm-3 col-xs-12 block-col-right">
			<div class="block-sidebar">
				<div class="block-module block-links-sidebar">
					<div class="block-title">
						<h2>
							<i class="fa fa-home"></i>
							DANH MỤC DỊCH VỤ
						</h2>
					</div>
					<div class="block-content">
					<ul class="list">
						<?php foreach($servicesList as $ser): ?>
						<li><a <?php if(isset($detail) && $detail->id == $ser->id): ?> class="active" <?php endif; ?> href="<?php echo e(route('services-detail', [ $ser->slug, $ser->id ])); ?>" title="<?php echo $ser->title; ?>"><?php echo $ser->title; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				</div>
			</div>
		</div><!-- /block-col-right -->
	</div>
</div><!-- /block_big-title -->	
<style type="text/css">
	.error{
		border : 1px solid red !important;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
	$(document).ready(function(){
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
	        $('#dataForm').submit();
	        $('#btnSave').attr('disabled', 'disabled').html('<i class="fa fa-spin fa-spinner"></i>');
	      });
		$('#dataForm .req').blur(function(){    
	        if($(this).val() != ''){
	          $(this).removeClass('error');
	        }else{
	          $(this).addClass('error');
	        }
	      });
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>