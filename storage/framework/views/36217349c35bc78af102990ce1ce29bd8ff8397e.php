<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

<div class="block2 block-breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>		
			<li class="active"><?php echo $parentDetail->name; ?></li>
		</ul>
	</div>
</div><!-- /block-breadcrumb -->
<div class="block block_big-title" style="margin-bottom:0px">
	<div class="container">
		<h1><?php echo $parentDetail->name; ?></h1>
		<p class="desc"><?php echo $parentDetail->description; ?></p>
	</div>
</div><!-- /block_big-title -->
<?php if($cateList): ?>
<?php foreach($cateList as $cate): ?>
<?php if(isset($productArr[$cate->id]) && count($productArr[$cate->id]) > 0 ): ?>
<div class="block2 block-btn-slide block-ct-pro block-title-commom">
	<div class="container">
		<div class="block2 block-title">
			<h2>
				<i class="fa fa-home"></i>
				<a href="<?php echo e(route('cate', [$parentDetail->slug, $cate->slug])); ?>" title="<?php echo $cate->name; ?>"><?php echo $cate->name; ?></a>
			</h2>	
		</div>
		<div class="block-content">
			<ul class="owl-carousel owl-theme owl-style2" data-nav="true" data-dots="false" data-margin="12" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":3},"800":{"items":3},"992":{"items":3}}'>
			  	
			  	<?php foreach($productArr[$cate->id] as $product): ?>
			  	<li class="item">
			  		<div class="thumb">
			  			<a href="<?php echo e(route('product', [$product->slug, $product->id ])); ?>" title="<?php echo $product->title; ?>">
			  				<img src="<?php echo e($product->image_url ? Helper::showImageThumb($product->image_url) : URL::asset('public/assets/images/no-img.png')); ?>" alt="<?php echo $product->title; ?>">
			  			</a>
			  		</div>
			  		<div class="des">
		                <p class="code"><span>Mã sản phẩm: </span><?php echo $product->code; ?></p>
		                <a href="<?php echo e(route('product', [$product->slug, $product->id ])); ?>" title="<?php echo $product->title; ?>"><?php echo $product->title; ?></a>                
		              </div>
		  		</li>
		  		<?php endforeach; ?>	  		
		</div>
	</div>
</div><!-- /block-product -->	
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>