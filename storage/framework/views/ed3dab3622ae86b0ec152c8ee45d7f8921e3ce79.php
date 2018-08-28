 
  
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
				<div class="block-title-commom block-service clearfix">
					<div class="block block-title">
						<h1>
							<i class="fa fa-home"></i>
							<?php echo $detail->title; ?>

						</h1>
					</div>
					<div class="block-content">
						<div class="block-article">
							<div class="block block-content block-editor-content">						
								<?php echo preg_replace('#<img (.+) style="(.+)" />#isU', '<img $1 style="width: 100%" />', $detail->content); ?>

							</div>
						</div>
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
		</div><!-- /container-->
		</div>
<?php $__env->stopSection(); ?>
  
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>