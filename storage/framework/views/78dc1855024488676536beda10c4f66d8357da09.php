<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('frontend.home.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>
<div class="block block_big-title" style="margin-bottom:0px">
  <div class="container">
    <h1 data-text="2" <?php if($isEdit): ?> class="edit" <?php endif; ?>><?php echo $textList[2]; ?></h1>
    <?php if($settingArr['gioi_thieu_chung'] != ''): ?>
    <p class="desc">
      <?php echo $settingArr['gioi_thieu_chung']; ?>

    </p>
    <?php endif; ?>
  </div>
</div><!-- /block_big-title -->
<?php if($hotCateList): ?>
<?php foreach($hotCateList as $hotCate): ?>
<div class="block2 block-btn-slide block-ct-pro block-title-commom">
      <div class="container">
        <div class="block2 block-title">
          <h2>
            
              <i class="fa fa-home"></i>
              <?php if($hotCate->type == 1): ?>
              <a href="<?php echo e(route('cate-parent', [$parentArr[$hotCate->object_id]->slug])); ?>" title="<?php echo $hotCate->title; ?>"><?php echo $hotCate->title; ?></a>
              <?php else: ?>
              <a href="<?php echo e(route('cate', [$cateArr[$hotCate->object_id]->cateParent->slug, $cateArr[$hotCate->object_id]->slug])); ?>" title="<?php echo $hotCate->title; ?>"><?php echo $hotCate->title; ?></a>
              <?php endif; ?>
            
          </h2>
        </div>
        <div class="block-content">
          <div class="owl-carousel owl-theme owl-style2" data-nav="true" data-dots="false" data-margin="12" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":3},"800":{"items":3},"992":{"items":3}}'>
            <?php if($productHot[$hotCate->id]): ?>
            <?php foreach($productHot[$hotCate->id] as $product): ?> 
            <div class="item">
              <div class="thumb">
                <a href="<?php echo e(route('product', [$product->slug, $product->id ])); ?>" title="<?php echo $product->title; ?>">
                <img src="<?php echo e(Helper::showImageThumb($product->image_url)); ?>" alt="<?php echo $product->title; ?>">
              </a>
              </div>
              <div class="des">
                <p class="code"><span>Mã sản phẩm: </span><?php echo $product->code; ?></p>
                <a href="<?php echo e(route('product', [$product->slug, $product->id ])); ?>" title="<?php echo $product->title; ?>"><?php echo $product->title; ?></a>                
              </div>
            </div><!-- /item -->
            <?php endforeach; ?>
            <?php endif; ?> 
          </div>
        </div>
      </div>
    </div><!-- /block_big-title -->

<?php endforeach; ?>
<?php endif; ?>
<?php 
$bannerArr = DB::table('banner')->where(['object_id' => 5, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
?>
<?php if($bannerArr): ?>
<?php $i = 0; ?>
<?php foreach($bannerArr as $banner): ?>
<?php $i++; ?>
<div class="block block-banner">
  <?php if($banner->ads_url !=''): ?>
  <a href="<?php echo e($banner->ads_url); ?>" title="banner ads <?php echo e($i); ?>">
  <?php endif; ?>
  <img src="<?php echo e(Helper::showImage($banner->image_url)); ?>" alt="banner ads <?php echo e($i); ?>">
  <?php if($banner->ads_url !=''): ?>
  </a>
  <?php endif; ?>
</div><!-- item-slide -->
<?php endforeach; ?>
<?php endif; ?>
<div class="block block_big-title" style="margin-bottom:0px">
  <div class="container">
    <h2 data-text="3" <?php if($isEdit): ?> class="edit" <?php endif; ?>><?php echo $textList[3]; ?></h2>
    <?php if($settingArr['gioi_thieu_tin_tuc'] != ''): ?>
    <p class="desc">
      <?php echo $settingArr['gioi_thieu_tin_tuc']; ?>

    </p>
    <?php endif; ?>
  </div>
</div><!-- /block_big-title -->

<div class="block2 block-news block-title-commom">
  <div class="container">
    <div class="block-content row">
      <?php if($articlesCateHot->count() > 0): ?>
      <?php foreach($articlesCateHot as $cateHot): ?>
      <div class="col-sm-6 col-xs-12 block-news-left">
        <div class="block2 block-title">
          <h2>
            <i class="fa fa-home"></i>
            <?php echo $cateHot->name; ?>

          </h2> 
        </div>
        <?php if(isset($articlesArr[$cateHot->id]) && $articlesArr[$cateHot->id]->count() > 0): ?>
        <ul class="block-content">
          <?php $i = 0; ?>
          <?php foreach($articlesArr[$cateHot->id] as $articles): ?>
          <?php $i++;?>
          <li class="<?php if($i == 1): ?> first <?php else: ?> item <?php endif; ?>">
            <div class="thumb">
              <a href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>" title="<?php echo $articles->title; ?>">
              <img src="<?php echo e($articles->image_url ? Helper::showImage($articles->image_url) : URL::asset('public/assets/images/no-image.jpg')); ?>" alt="<?php echo $articles->title; ?>">
              </a>
            </div>
            <div class="des">
              <h2 class="title"><a href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>" title="<?php echo $articles->title; ?>"><?php echo $articles->title; ?></a></h2>
              <p class="date-post"><i class="fa fa-calendar"></i> <?php echo e(date('d/m/Y', strtotime($articles->created_at))); ?></p>
              <?php if($i == 1): ?> 
              <p class="description"><?php echo $articles->description; ?></p>
              <?php endif; ?>
            </div>
          </li><!-- /item -->          
          <?php endforeach; ?>        
        </ul>
        <?php endif; ?>
      </div><!-- /block-news-left -->
      <?php endforeach; ?>
      <?php endif; ?>
      <div class="clearfix"></div>
    </div>
  </div>
</div><!-- /block-news-->

<div class="block-number">
  <div class="container">
    <div class="block-content">
      <h3><span <?php if($isEdit): ?> class="edit" <?php endif; ?> data-text="8"><?php echo $textList[8]; ?></span></h3>
      <div class="desc <?php if($isEdit): ?> edit <?php endif; ?>" data-text="9"><?php echo $textList[9]; ?></div>
      <div class="row">
        <ul class="list">
          <li class="col-sm-3 col-xs-12">
            <p class="img"><img src="<?php echo e(Helper::showImage($settingArr['icon_nam_hinh_thanh'])); ?>" alt="<?php echo $settingArr['so_nam']; ?> năm hình thành và phát triển"></p>
            <p class="number"><span class="counter"><?php echo $settingArr['so_nam']; ?></span> năm</p>
            <p class="info"><?php echo $settingArr['so_nam']; ?> năm hình thành và phát triển</p>
          </li>
          <li class="col-sm-3 col-xs-12">
            <p class="img"><img src="<?php echo e(Helper::showImage($settingArr['icon_kien_truc_su'])); ?>" alt="<?php echo $settingArr['so_kien_truc_su']; ?> kiến trúc sư và kỹ sư"></p>
            <p class="number"><span class="counter"><?php echo $settingArr['so_kien_truc_su']; ?></span></p>
            <p class="info"><?php echo $settingArr['so_kien_truc_su']; ?> kiến trúc sư và kỹ sư</p>
          </li>
          <li class="col-sm-3 col-xs-12">
            <p class="img"><img src="<?php echo e(Helper::showImage($settingArr['icon_cong_nhan'])); ?>" alt="<?php echo $settingArr['so_cong_nhan']; ?> công nhân lành nghề"></p>
            <p class="number"><span class="counter"><?php echo $settingArr['so_cong_nhan']; ?></span></p>
            <p class="info"><?php echo $settingArr['so_cong_nhan']; ?> công nhân lành nghề</p>
          </li>
          <li class="col-sm-3 col-xs-12">
            <p class="img"><img src="<?php echo e(Helper::showImage($settingArr['icon_cong_trinh'])); ?>" alt="<?php echo $settingArr['so_cong_trinh']; ?> công trình đã thực hiện"></p>
            <p class="number"><span class="counter"><?php echo $settingArr['so_cong_trinh']; ?></span></p>
            <p class="info"><?php echo $settingArr['so_cong_trinh']; ?> công trình đã thực hiện</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div><!-- /block-number -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>