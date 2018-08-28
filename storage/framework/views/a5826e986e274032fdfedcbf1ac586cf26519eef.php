<div class="col-sm-3 col-xs-12 block-col-right">
    <div class="block-sidebar">
      <div class="block-module block-news-sidebar">
        <div class="block-title">
          <h2>
            <i class="fa fa-home"></i>
            DỰ ÁN LIÊN QUAN
          </h2>
        </div>
        <div class="block-content">
          <ul class="list">
            <?php foreach($otherList as $product): ?>
            <li class="item">
              <div class="thumb">
                <a href="<?php echo e(route('product', [$product->slug, $product->id ])); ?>"><img src="<?php echo e($product->image_url ? Helper::showImageThumb($product->image_url) : URL::asset('public/assets/images/no-img.png')); ?>" alt="<?php echo $product->title; ?>"></a>
              </div>
              <div class="description">
                <h2><?php echo $product->title; ?></h2>
              </div>
            </li>
            <?php endforeach; ?>            
          </ul>
        </div>
      </div>
      <div class="block-module block-news-sidebar">
        <div class="block-title">
          <h2>
            <i class="fa fa-home"></i>
            DỰ ÁN NỔI BẬT
          </h2>
        </div>
        <div class="block-content">
          <ul class="list">
            <?php foreach($widgetProduct as $product): ?>
            <li class="item">
              <div class="thumb">
                <a href="<?php echo e(route('product', [$product->slug, $product->id ])); ?>"><img src="<?php echo e($product->image_url ? Helper::showImageThumb($product->image_url) : URL::asset('public/assets/images/no-img.png')); ?>" alt="<?php echo $product->title; ?>"></a>
              </div>
              <div class="description">
                <h2><?php echo $product->title; ?></h2>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div><!-- /block-col-right -->