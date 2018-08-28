<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo e(URL::asset('public/admin/dist/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo e(Auth::user()->display_name); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
     
      <li class="treeview <?php echo e(in_array(\Request::route()->getName(), ['product.index', 'product.create', 'product.edit', 'cate-type.index', 'cate-type.edit', 'cate-type.create', 'cate.index', 'cate.edit', 'cate.create', 'cate-parent.index', 'cate-parent.edit', 'cate-parent.create']) ? 'active' : ''); ?>">
        <a href="#">
          <i class="fa fa-opencart"></i> 
          <span>Sản phẩm</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php echo e(in_array(\Request::route()->getName(), ['product.index', 'product.edit']) ? "class=active" : ""); ?>><a href="<?php echo e(route('product.index')); ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          <li <?php echo e(\Request::route()->getName() == "product.create" ? "class=active" : ""); ?>><a href="<?php echo e(route('product.create')); ?>"><i class="fa fa-circle-o"></i> Thêm sản phẩm</a></li>        
               
          <li <?php echo e(in_array(\Request::route()->getName(), ['cate-parent.index', 'cate-parent.edit', 'cate-parent.create']) ? "class=active" : ""); ?>><a href="<?php echo e(route('cate-parent.index')); ?>"><i class="fa fa-circle-o"></i> Danh mục cha</a></li>
          <li <?php echo e(in_array(\Request::route()->getName(), ['cate.index', 'cate.edit', 'cate.create']) ? "class=active" : ""); ?>><a href="<?php echo e(route('cate.index')); ?>"><i class="fa fa-circle-o"></i> Danh mục con</a></li>
          
        </ul>
      </li>            
      <li <?php echo e(in_array(\Request::route()->getName(), ['services.edit', 'services.index', 'services.create']) ? "class=active" : ""); ?>>
          <a href="<?php echo e(route('services.index')); ?>">
            <i class="fa fa-pencil-square-o"></i> 
            <span>Dịch vụ</span>          
          </a>       
        </li>
      <li class="treeview <?php echo e(in_array(\Request::route()->getName(), ['pages.index', 'pages.create']) ? 'active' : ''); ?>">
        <a href="#">
          <i class="fa fa-twitch"></i> 
          <span>Trang</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php echo e(in_array(\Request::route()->getName(), ['pages.index', 'pages.edit']) ? "class=active" : ""); ?>><a href="<?php echo e(route('pages.index')); ?>"><i class="fa fa-circle-o"></i> Trang</a></li>
          <li <?php echo e(in_array(\Request::route()->getName(), ['pages.create']) ? "class=active" : ""); ?>><a href="<?php echo e(route('pages.create')); ?>"><i class="fa fa-circle-o"></i> Thêm trang</a></li>          
        </ul>
      </li>
      
      <li class="treeview <?php echo e(in_array(\Request::route()->getName(), ['articles.index', 'articles.create', 'articles.edit','articles-cate.create', 'articles-cate.index', 'articles-cate.edit']) ? 'active' : ''); ?>">
        <a href="#">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Tin tức</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php echo e(in_array(\Request::route()->getName(), ['articles.edit', 'articles.index']) ? "class=active" : ""); ?>><a href="<?php echo e(route('articles.index')); ?>"><i class="fa fa-circle-o"></i> Tin tức</a></li>
          <li <?php echo e(in_array(\Request::route()->getName(), ['articles.create']) ? "class=active" : ""); ?> ><a href="<?php echo e(route('articles.create', ['cate_id' => 1])); ?>"><i class="fa fa-circle-o"></i> Thêm tin tức</a></li>
          <?php if(Auth::user()->role == 3): ?>
        <li <?php echo e(in_array(\Request::route()->getName(), ['articles-cate.create', 'articles-cate.index', 'articles-cate.edit']) ? "class=active" : ""); ?> ><a href="<?php echo e(route('articles-cate.index')); ?>"><i class="fa fa-circle-o"></i> Danh mục tin tức</a></li>      
        <?php endif; ?>    
        </ul>
       
      </li> 
        <li <?php echo e(in_array(\Request::route()->getName(), ['tag.edit', 'tag.index']) ? "class=active" : ""); ?>>
          <a href="<?php echo e(route('tag.index')); ?>">
            <i class="fa fa-pencil-square-o"></i> 
            <span>Tags</span>          
          </a>       
        </li>
      <?php if(Auth::user()->role > 1): ?>
        <li <?php echo e(in_array(\Request::route()->getName(), ['hot-cate.edit', 'hot-cate.index']) ? "class=active" : ""); ?>>
          <a href="<?php echo e(route('hot-cate.index')); ?>">
            <i class="fa fa-pencil-square-o"></i> 
            <span>Danh mục trang chủ</span>          
          </a>       
        </li>
        <li <?php echo e(in_array(\Request::route()->getName(), ['bao-gia.edit', 'bao-gia.index']) ? "class=active" : ""); ?>>
          <a href="<?php echo e(route('bao-gia.index')); ?>">
            <i class="fa fa-pencil-square-o"></i> 
            <span>Yêu cầu báo giá</span>          
          </a>       
        </li>
      
      <li <?php echo e(in_array(\Request::route()->getName(), ['newsletter.edit', 'newsletter.index']) ? "class=active" : ""); ?>>
        <a href="<?php echo e(route('newsletter.index')); ?>">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Newsletter</span>         
        </a>       
      </li>

      <li <?php echo e(in_array(\Request::route()->getName(), ['contact.edit', 'contact.index']) ? "class=active" : ""); ?>>
        <a href="<?php echo e(route('contact.index')); ?>">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Liên hệ</span>          
        </a>       
      </li>
      <?php endif; ?>    
      <li <?php echo e(in_array(\Request::route()->getName(), ['banner.list', 'banner.edit', 'banner.create']) ? "class=active" : ""); ?>>
        <a href="<?php echo e(route('banner.list')); ?>">
          <i class="fa fa-file-image-o"></i> 
          <span>Banner</span>          
        </a>       
      </li> 
      <?php if(Auth::user()->role > 1): ?>
      <li class="treeview <?php echo e(in_array(\Request::route()->getName(), ['thong-so.index', 'thong-so.create', 'thong-so.edit']) ? 'active' : ''); ?>">
        <a href="#">
          <i class="fa fa-twitch"></i> 
          <span>Thông số sản phẩm</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php echo e(in_array(\Request::route()->getName(), ['thong-so.index', 'thong-so.edit']) ? "class=active" : ""); ?>><a href="<?php echo e(route('thong-so.index')); ?>"><i class="fa fa-circle-o"></i> Thông số sản phẩm</a></li>
          <li <?php echo e(in_array(\Request::route()->getName(), ['thong-so.create']) ? "class=active" : ""); ?>><a href="<?php echo e(route('thong-so.create')); ?>"><i class="fa fa-circle-o"></i> Thêm thông số</a></li>          
        </ul>
      </li>
      <?php endif; ?>
      <?php if(Auth::user()->role == 3): ?>
      <li class="treeview <?php echo e(in_array(\Request::route()->getName(), ['menu.index', 'account.index', 'info-seo.index', 'settings.index', 'settings.noti', 'menu.index', 'video.index', 'video.edit', 'video.create']) || (in_array(\Request::route()->getName(), ['custom-link.edit', 'custom-link.index', 'custom-link.create']) && isset($block_id) && $block_id == 2 ) || (in_array(\Request::route()->getName(), ['custom-link.edit', 'custom-link.index', 'custom-link.create']) && isset($block_id) && $block_id == 1 ) ? 'active' : ''); ?>">
        <a href="#">
          <i class="fa  fa-gears"></i>
          <span>Cài đặt</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php if(Auth::user()->role == 3): ?>
        
          <li <?php echo e(\Request::route()->getName() == "settings.index" ? "class=active" : ""); ?>><a href="<?php echo e(route('settings.index')); ?>"><i class="fa fa-circle-o"></i> Thông tin houseland</a></li>
          <li><a target="_blank" href="<?php echo e(route('rss')); ?>"><i class="fa fa-circle-o"></i> RSS</a></li>
          <li <?php echo e((in_array(\Request::route()->getName(), ['custom-link.edit', 'custom-link.index', 'custom-link.create']) && isset($block_id) && $block_id == 1 )? "class=active" : ""); ?>>
            <a href="<?php echo e(route('custom-link.index', ['block_id' => 1 ])); ?>">
              <i class="fa fa-circle-o"></i>
              <span>Link Footer trái</span>         
            </a>       
          </li>
          <li <?php echo e((in_array(\Request::route()->getName(), ['custom-link.edit', 'custom-link.index', 'custom-link.create']) && isset($block_id) && $block_id == 2 )? "class=active" : ""); ?>>
            <a href="<?php echo e(route('custom-link.index', ['block_id' => 2 ])); ?>">
              <i class="fa fa-circle-o"></i>
              <span>Link Footer giữa</span>         
            </a>       
          </li>
          <li <?php echo e(\Request::route()->getName() == "menu.index" ? "class=active" : ""); ?>><a href="<?php echo e(route('menu.index')); ?>"><i class="fa fa-circle-o"></i> Menu</a></li>
          <li <?php echo e(in_array(\Request::route()->getName(), ['member.list', 'member.edit', 'member.create']) ? "class=active" : ""); ?>><a href="<?php echo e(route('member.index')); ?>"><i class="fa fa-circle-o"></i> Ban lãnh đạo</a></li>
          <?php endif; ?>
          <li <?php echo e(\Request::route()->getName() == "account.index" ? "class=active" : ""); ?>><a href="<?php echo e(route('account.index')); ?>"><i class="fa fa-circle-o"></i> Users</a></li>              
        </ul>
      </li>
      <?php endif; ?>
      <!--<li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<style type="text/css">
  .skin-blue .sidebar-menu>li>.treeview-menu{
    padding-left: 15px !important;
  }
</style>