<?php 
$str_page = isset($page) && $page > 1 ? " trang $page" : "";
?>
<?php $__env->startSection('title'); ?><?php echo $seo['title'].$str_page; ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('site_description'); ?><?php echo $seo['description'].$str_page; ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('site_keywords'); ?><?php echo $seo['keywords'].$str_page; ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('site_name'); ?><?php echo $settingArr['site_name']; ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('favicon'); ?><?php echo Helper::showImage($settingArr['favicon']); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('logo'); ?><?php echo Helper::showImage($settingArr['logo']); ?><?php $__env->stopSection(); ?>

