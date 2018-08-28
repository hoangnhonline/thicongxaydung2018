 
  
<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="wrapper">
		<div class="block2 block-breadcrumb">
			<div class="container">
				<ul class="breadcrumb">
					<li><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>
					<li class="active"><?php echo $detailPage->title; ?></li>
				</ul>
			</div>
		</div><!-- /block-breadcrumb -->
		<div class="container">
			<div class="block-page-about">
				<div class="block-title-commom">
					<div class="block block-title">
						<h1>
							<i class="fa fa-home"></i>
							<?php echo $detailPage->title; ?>

						</h1>
					</div>
				</div>
				<div class="block-article">
					<div class="block block-content block-editor-content">					
						
						<?php echo preg_replace('#<img (.+) style="(.+)" />#isU', '<img $1 style="width: 100%" />', $detailPage->content); ?>

					</div>
				</div>
			</div>
		</div><!-- /container-->
		<?php if($slug == 'gioi-thieu'): ?>
		<div class="block-members">
			<div class="container">
				<div class="block-title">
					<h2>BAN LÃNH ĐẠO</h2>
				</div>
				<?php if($memberList->count() > 0): ?>
				<div class="block-content">
					<ul  class="owl-carousel owl-theme" data-nav="true" data-autoplayTimeout="700" data-autoplay="true" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":3},"800":{"items":3},"992":{"items":5}}' data-center="true" data-loop="true">
						<?php foreach($memberList as $member): ?>
						<li class="item">
							<img src="<?php echo e(Helper::showImage($member->image_url)); ?>" alt="<?php echo $member->name; ?>">
							<p class="name"><?php echo $member->name; ?></p>
							<p class="position"><?php echo $member->chuc_vu; ?></p>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			</div>
		</div><!-- /block-members-->
		<?php endif; ?>
	</div><!-- /wrapper-->
<?php $__env->stopSection(); ?>
  
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>