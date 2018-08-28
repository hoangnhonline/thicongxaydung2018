 

<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

<?php $__env->startSection('content'); ?>
<div class="block2 block-breadcrumb">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>" title="Trở về trang chủ">Trang chủ</a></li>            
      <li class="active"><a href="<?php echo e(route('news-list', $cateDetail->slug )); ?>" title="<?php echo $cateDetail->name; ?>"><?php echo $cateDetail->name; ?></a></li>
    </ul>
  </div>
</div><!-- /block-breadcrumb -->
<div class="block block-two-col container">
  <div class="row">
    <div class="col-sm-9 col-xs-12 block-col-left">
		<div class="block-title-commom block-dt-news">
			<div class="block block-title">
				<h2>
					<i class="fa fa-home"></i>
					<?php echo $cateDetail->name; ?>

				</h2>
			</div>
			<div class="block-content">
				<div class="block block-article">
					<h1 class="title"><?php echo $detail->title; ?></h1>
					<div class="reviews-summary" id="rating-summary" itemscope itemtype="http://schema.org/Review">
						
                    </div><!-- /reviews-summary -->
                    <div class="block-author">
                    	<ul>
                    		<li>
                    			<span>Tác giả:</span>
                    			<span class="name"><?php echo $detail->createdUser->display_name; ?></span>
                    		</li>
                    		<li>
                    			<?php echo date('d/m/Y', strtotime($detail->created_at)); ?>

                    		</li>
                    		<li>
                    			<?php echo Helper::view($detail->id, 2); ?> lượt xem
                    		</li>
                    	</ul>
                    </div>
					<div class="block-editor-content">
					    <?php 
					       $content = str_replace('<table ', '<div class="table-responsive"><table class="table" ', $detail->content);
					       $content = str_replace('</table>', '</table></div>', $content);
					       $content = preg_replace('/(\<table[^>]+)(style\=\"[^\"]+\")([^>]+)(>)/', '${1}${3}${4}', $content);
					    ?>
					    <?php echo $content; ?></div>
					
				</div>
				<div class="block block-share" id="share-buttons">
					<div class="share-item">
						<div class="fb-like" data-href="<?php echo e(url()->current()); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
					</div>
					<div class="share-item" style="max-width: 65px;">
						<div class="g-plus" data-action="share"></div>
					</div>
					<div class="share-item">
						<a class="twitter-share-button"
					  href="https://twitter.com/intent/tweet?text=<?php echo $detail->title; ?>">
					Tweet</a>
					</div>
					<div class="share-item">
						<div class="addthis_inline_share_toolbox"></div>
					</div>
				</div><!-- /block-share-->		
			    <?php if($tagSelected->count() > 0): ?>
				<div class="block-tags">
					<ul>
						<li class="tags-first">Tags:</li>
						<?php $i = 0; ?>
				        <?php foreach($tagSelected as $tag): ?>
				        <?php $i++; ?>
						<li class="tags-link"><a href="<?php echo e(route('tag', $tag->slug)); ?>" title="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div><!-- /block-tags -->
				<?php endif; ?>
			</div>
		</div><!-- /block-ct-news -->
	</div><!-- /block-col-left -->
    <?php echo $__env->make('frontend.news.sidebar-detail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
</div><!-- /block_big-title -->
<input type="hidden" id="rating-route" value="<?php echo e(route('rating')); ?>">
<form id="rating-form">
	<?php echo e(csrf_field()); ?>

	<input type="hidden" id="object_id" name="object_id" value="<?php echo e($detail->id); ?>">
	<input type="hidden" id="object_type" name="object_type" value="2">
	<input type="hidden" id="score" name="score" value="">
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(URL::asset('public/assets/lib/starrating/js/star-rating.js')); ?>"></script>  
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
	        url : $('#rating-route').val(),
	        type : 'POST',
	        dataType : 'html',
	        data : $('#rating-form').serialize(),
	        success : function(data){
	            $('#rating-summary').html(data);
	            var $input = $('input.rating');
	            if ($input.length) {
	                $input.removeClass('rating-loading').addClass('rating-loading').rating();
	            }
	        }
   		});
	});
</script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>