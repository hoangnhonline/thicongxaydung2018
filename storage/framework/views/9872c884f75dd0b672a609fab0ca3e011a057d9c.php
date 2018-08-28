 

<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

<?php $__env->startSection('content'); ?>
<div class="block2 block-breadcrumb">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>" title="Trở về trang chủ">Trang chủ</a></li>            
      <li class="active"><?php echo $cateDetail->name; ?></li>
    </ul>
  </div>
</div><!-- /block-breadcrumb -->
<div class="block block-two-col container">
  <div class="row">
    <div class="col-sm-9 col-xs-12 block-col-left">
      <div class="block-title-commom block-ct-news">
        <div class="block block-title">
          <h1>
            <i class="fa fa-home"></i>
            <?php echo $cateDetail->name; ?>

          </h1>
        </div>
        <div class="block-content">            
          <?php foreach( $articlesArr as $articles ): ?>
          <div class="item">
            <div class="thumb">
              <a href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>"><img title="<?php echo $articles->title; ?>" src="<?php echo e($articles->image_url ? Helper::showImage($articles->image_url) : URL::asset('public/assets/images/no-img.png')); ?>" alt="<?php echo $articles->title; ?>"></a>
            </div>
            <div class="des">
              <a href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>" title="<?php echo $articles->title; ?>"><?php echo $articles->title; ?></a>
              <p class="date-post"><i class="fa fa-calendar"></i> <?php echo e(date('d/m/Y', strtotime($articles->created_at))); ?></p>
              <p class="description"><?php echo $articles->description; ?></p>
            </div>
          </div><!-- /item -->
          <?php endforeach; ?>
        </div>
      </div><!-- /block-ct-news -->
      <nav class="block-pagination">
        <?php echo e($articlesArr->links()); ?>

      </nav><!-- /block-pagination -->
    </div><!-- /block-col-left -->
    <?php echo $__env->make('frontend.news.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
</div><!-- /block_big-title -->
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>