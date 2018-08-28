<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

<div class="block2 block-breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>			
			<li class="active">Tìm kiếm</li>
		</ul>
	</div>
</div><!-- /block-breadcrumb -->
<div class="block block-title-commom">
	<div class="container">
		<div class="block block-title">
			<h1>
				<i class="fa fa-home"></i>
				Tìm kiếm
			</h1>
		</div>
		<div class="block-content block-ct-pro">
			<h2 class="tit-page3">HIỂN THỊ KẾT QUẢ CHO “<?php echo $tu_khoa; ?>”</h2>
			<div class="row">
				<?php if($productList->count() > 0): ?>
			  	<?php foreach($productList as $product): ?>
				<div class="col-sm-4 col-xs-12">
					<div class="item">
						<div class="thumb">
							<a href="<?php echo e(route('product', [$product->slug, $product->id ])); ?>"><img src="<?php echo e($product->image_url ? Helper::showImageThumb($product->image_url) : URL::asset('public/assets/images/no-img.png')); ?>" alt="<?php echo $product->title; ?>"></a>
						</div>
						<div class="des">
							<p class="code"><span>Mã sản phẩm: </span><?php echo $product->code; ?></p>
							<a href="<?php echo e(route('product', [$product->slug, $product->id ])); ?>" title="<?php echo $product->title; ?>"><?php echo $product->title; ?></a>
						</div>
					</div><!-- /item -->
				</div>
				<?php endforeach; ?>
		  		<?php else: ?>
		  		<p style="padding-left:15px">Không tìm thấy dữ liệu!</p>
		  		<?php endif; ?>		  
			</div>
			<nav class="block-pagination">
				<?php echo e($productList->appends(['keyword' => $tu_khoa])->links()); ?> 
			</nav><!-- /block-pagination -->
		</div>
	</div>
</div><!-- /block_big-title -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>