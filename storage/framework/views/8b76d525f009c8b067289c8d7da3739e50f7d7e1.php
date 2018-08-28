<?xml version="1.0" ?>
<rss version="2.0">
    <channel>
        <title><?php echo $settingArr['site_name']; ?></title>
        <link><?php echo env('APP_URL'); ?></link>
        <description><?php echo $settingArr['site_description']; ?></description>
        <language>vi_VN</language>
        <?php foreach($productList as $product): ?>
        <item>
	        <title><?php echo $product->title; ?></title>
	        <link><?php echo e(route('product', [$product->slug, $product->id])); ?></link>
	        <description><?php echo $product->description; ?></description>	
	        <pubDate><?php echo date('d-m-Y H:i', strtotime($product->created_at)); ?></pubDate>
        </item>
		<?php endforeach; ?>
		<?php foreach($articlesList as $product): ?>
        <item>
	        <title><?php echo $product->title; ?></title>
	        <link><?php echo e(route('news-detail', [$product->slug, $product->id])); ?></link>
	        <description><?php echo $product->description; ?></description>	
	        <pubDate><?php echo date('d-m-Y H:i', strtotime($product->created_at)); ?></pubDate>
        </item>
		<?php endforeach; ?>
    </channel>
</rss>