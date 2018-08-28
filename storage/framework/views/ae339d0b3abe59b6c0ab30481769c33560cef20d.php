<?php $__env->startSection('slider'); ?>
<?php 
$bannerArr = DB::table('banner')->where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
?>
<?php if($bannerArr): ?>
<div class="block block-side">
	<div class="owl-carousel owl-style2" data-nav="true" data-margin="0" data-items='1' data-autoplayTimeout="1000" data-autoplay="true" data-loop="true" data-navcontainer="true">
		<?php $i = 0; ?>
		<?php foreach($bannerArr as $banner): ?>
		<?php $i++; ?>
		<div class="item-slide">
			<?php if($banner->ads_url !=''): ?>
			<a href="<?php echo e($banner->ads_url); ?>" title="banner slide <?php echo e($i); ?>">
			<?php endif; ?>
			<img src="<?php echo e(Helper::showImage($banner->image_url)); ?>" alt="banner slide <?php echo e($i); ?>">
			<?php if($banner->ads_url !=''): ?>
			</a>
			<?php endif; ?>
		</div><!-- item-slide -->
		<?php endforeach; ?>
	</div>
</div><!-- /block-side -->
<?php endif; ?>
<?php $__env->stopSection(); ?>