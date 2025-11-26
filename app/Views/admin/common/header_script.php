<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
<meta name="msapplication-tap-highlight" content="no"> 
<title>RD Web-Admin</title> 
<link rel="icon"   href="<?= base_url('assets/images/Reeva_Developers.png');?>">
<link href="<?= base_url('assets/include/fonts/main.d810cf0ae7f39f28f336.css');?>" rel="stylesheet">
<link href="<?= base_url('assets'); ?>/include/css/style.css" rel="stylesheet">
<?php if(isset($page_url) && $page_url == "dashboard"){ ?>
<link href="<?= base_url('assets'); ?>/include/css/lib/chartist/chartist.min.css" rel="stylesheet">
<?php }else{ ?>
<link href="<?= base_url('assets'); ?>/include/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
<?php } ?>
<link href="<?= base_url('assets'); ?>/include/fontawesome-6.4/css/fontawesome.min.css" rel="stylesheet">
<link href="<?= base_url('assets'); ?>/include/fontawesome-6.4/css/brands.css" rel="stylesheet">
<link href="<?= base_url('assets'); ?>/include/fontawesome-6.4/css/solid.css" rel="stylesheet">
<?php if(isset($page_url) && $page_url == "dashboard"){ ?>
<link href="<?= base_url('assets'); ?>/include/css/lib/owl.carousel.min.css" rel="stylesheet" />
<link href="<?= base_url('assets'); ?>/include/css/lib/owl.theme.default.min.css" rel="stylesheet" />
<?php } ?>
<link href="<?= base_url('assets'); ?>/include/css/lib/weather-icons.css" rel="stylesheet" />
<link href="<?= base_url('assets'); ?>/include/css/lib/themify-icons.css" rel="stylesheet">
<link href="<?= base_url('assets'); ?>/include/css/lib/menubar/sidebar.css" rel="stylesheet">
<link href="<?= base_url('assets'); ?>/include/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets'); ?>/include/css/lib/unix.css" rel="stylesheet">
<link href="<?= base_url('assets'); ?>/include/css/lib/jquery-ui.css" rel="stylesheet">
<link href="<?= base_url('assets'); ?>/include/css/lib/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?= base_url('assets/'); ?>include/css/fineCrop.css" rel="stylesheet">
<link href="<?= base_url('assets'); ?>/include/css/datepicker.css" rel="stylesheet">
<style>
.modal-header{
	background-color: aliceblue;
    padding: 10px;
}
.modal-header .modal-title{
	color: #acc0d1;
}
</style>