<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

<div class="block2 block-breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>
			<li><a href="<?php echo e(route('cate-parent', [$cateDetail->cateParent->slug])); ?>"><?php echo $cateDetail->cateParent->name; ?></a></li>
			<li class="active"><?php echo $cateDetail->name; ?></li>
		</ul>
	</div>
</div><!-- /block-breadcrumb -->

<div class="block2 block-ct-pro block-title-commom block-repadding">
	<div class="container">
		<div class="block2 block-title">
			<h1>
				<i class="fa fa-home"></i>
				<?php echo $cateDetail->name; ?>

			</h1>	
		</div>
		<div class="block-content">
			<div class="row">
				<?php if($productList): ?>
			  	<?php foreach($productList as $product): ?>				
				<div class="col-sm-4 col-xs-6 box-item">
					<div class="item">
						<div class="thumb">
							<a href="<?php echo e(route('product', [$product->slug, $product->id ])); ?>"><img src="<?php echo e($product->image_url ? Helper::showImage($product->image_url) : URL::asset('public/assets/images/no-img.png')); ?>" alt="<?php echo $product->title; ?>"></a>
						</div>
						<div class="des">
							<p class="code"><span>Mã sản phẩm: </span><?php echo $product->code; ?></p>
							<a href="<?php echo e(route('product', [$product->slug, $product->id ])); ?>" title="<?php echo $product->title; ?>"><?php echo $product->title; ?></a>							
						</div>
					</div><!-- /item -->
				</div>

				<?php endforeach; ?>
		  		<?php endif; ?>			  	
			</div>
			<nav class="block-pagination">
				<?php echo e($productList->links()); ?>

			</nav><!-- /block-pagination -->
		</div>
		
	</div>
</div><!-- /block-product -->	

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>