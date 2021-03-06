<header class="header">
	<div class="block-header-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12 block-intro">
					<p>Chào mừng bạn đến với bất động sản Houseland!</p>
				</div><!-- /block-intro -->
				<div class="col-sm-6 col-xs-12 block-search">
					<div class="block-search-inner clearfix">
						<form class=""  action="<?php echo e(route('search')); ?>" method="GET">
				            <div class="input-serach">
								<input type="text" class="txtSearch" value="<?php echo isset($tu_khoa) ? $tu_khoa : ""; ?>" name="keyword" placeholder="Từ khóa bạn cần tìm...">
				            </div><!-- /input-serach -->
				            <div class="select-choice">
				            	<div class="form-category">
					                <select id="cid" class="cid choice" name="cid">
									    <option value="" >Tìm theo danh mục</option>
									   	<?php foreach($cateParentList as $value): ?>
									   	<option value="<?php echo e($value->id); ?>" <?php echo e(isset($parent_id) && $parent_id == $value->id ? "selected" : ""); ?>><?php echo $value->name; ?></option>>
									   	<?php endforeach; ?>
									</select>
					            </div><!-- /form-category -->
				            	<button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
				            </div><!-- /select-choice -->
			            </form>
					</div>
				</div><!-- /block-search -->
			</div>
		</div>
	</div><!-- /block-header-top -->
	<div class="block-header-bottom">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12 block-logo">
					<a href="<?php echo e(route('home')); ?>" title="Logo">
						<img src="<?php echo e(Helper::showImage($settingArr['logo'])); ?>" alt="Logo Houseland">
					</a>
				</div><!-- /block-logo -->
				<div class="col-sm-6 col-xs-12 block-info">
					<div class="hotline">
						<i class="fa fa-phone"></i>
						<p>
							<span class="title">Hotline</span>
							<span class="info"><?php echo $settingArr['hotline']; ?></span>
						</p>
					</div>
					<div class="email">
						<i class="fa fa-envelope-o"></i>
						<p>
							<span class="title">Email</span>
							<span class="info"><?php echo $settingArr['email_header']; ?></span>
						</p>
					</div>
				</div><!-- /bblock-info -->
			</div>
		</div>
	</div><!-- /block-header-bottom -->
	<div class="menu">
		<div class="nav-toogle">
			<i class="fa"></i>
		</div>	
		<nav class="menu-top">
			<div class="container">
				<ul class="nav-menu">
					<?php 
					$menuLists = DB::table('menu')->where('parent_id', 0)->orderBy('display_order')->get();
					?>
					<?php foreach($menuLists as $menu): ?>

					<?php
                  	$menuCap1List = DB::table('menu')->where('parent_id', $menu->id)->orderBy('display_order')->get();
                  	?>
                                      
					<li class="level0 <?php if($menuCap1List): ?>  parent <?php endif; ?> "><a href="<?php echo e($menu->url); ?>" title="<?php echo e($menu->title); ?>"><?php echo e($menu->title); ?></a>

						<?php if($menuCap1List): ?>
						
						<ul class="level0 submenu">			
							<?php foreach($menuCap1List as $cap1): ?>
							<?php 
							$menuCap2List = DB::table('menu')->where('parent_id', $cap1->id)->orderBy('display_order')->get(); 

							?>
							<li class="level1 <?php if($menuCap2List): ?> parent <?php endif; ?>">
								<a href="<?php echo e($cap1->url); ?>" title="<?php echo $cap1->title; ?>"><?php echo $cap1->title; ?></a>
								
								<?php if($menuCap2List): ?>
								<ul class="level1 submenu">
									<?php foreach($menuCap2List as $cap2): ?>
									<li class="level2"><a href="<?php echo e($cap2->url); ?>" title="<?php echo $cap2->title; ?>"><?php echo $cap2->title; ?></a></li>
									<?php endforeach; ?>
								</ul>
								<?php endif; ?>
							</li>
							<?php endforeach; ?>
						</ul>
						
						<?php endif; ?>
					</li>					

					<?php endforeach; ?>
					<li class="search-mb">
						<div class="block-search">
							<div class="block-search-inner clearfix">
								<form class="form-inline" action="<?php echo e(route('search')); ?>" method="GET">
						            <div class="form-group input-serach">
										<input type="text" class="txtSearch" value="<?php echo isset($tu_khoa) ? $tu_khoa : ""; ?>" name="keyword"  placeholder="Từ khóa bạn cần tìm...">
						            </div><!-- /input-serach -->
						            <div class="form-group select-choice">
						            	<div class="form-group form-category">
							              <select id="cid" class="cid choice" name="cid">
										    <option value="" >Tìm theo danh mục</option>
										   	<?php foreach($cateParentList as $value): ?>
										   	<option value="<?php echo e($value->id); ?>" <?php echo e(isset($parent_id) && $parent_id == $value->id ? "selected" : ""); ?>><?php echo $value->name; ?></option>>
										   	<?php endforeach; ?>
										</select>
							            </div><!-- /form-category -->
						            	<button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
						            </div><!-- /select-choice -->
					            </form>
							</div>
						</div><!-- /block-search -->
					</li>
				</ul>
			</div>
		</nav><!-- /menu-top -->
	</div><!-- /menu -->
	</header><!-- /header -->