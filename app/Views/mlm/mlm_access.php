<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reeva-Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no">
    <link href="<?= base_url('assets/fonts/main.d810cf0ae7f39f28f336.css');?>" rel="stylesheet">
	 <?php include('common/header_script.php'); ?>

</head>
<body>
	<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <?php include('common/header.php'); ?>		
        <div class="app-main">
            <?php include('common/sidebar.php');?>

            <div class="app-main__outer">
                <div class="app-main__inner">
					<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div>Reeva Access</span>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">Reeva Access</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
					<div class="tabs-animation">
					<form action="<?=site_url('members/mlm_access');?>" method="GET" class="mb-3"> 
						<div class="row">
							<div class="col-md-6">
							<select class="form-control" name="type">
								<option value="" <?php echo ((''==$types)?'selected':''); ?>>Choose Type</option>
								<?php foreach($types as $key=>$ty){?>
									<option value="<?=$ty->id?>" <?php echo(($ty->id == $type)?'selected':'')?>><?=$ty->name;?></option>
								<?php }?>
							</select>
							</div>
							<div class="col-md-6"> 
								<input type="submit" class="form-control btn btn-success" value="Fetch">
							</div>
						</div>						
					</form>
					<?php if (isset($_GET['type']) && $_GET['type'] !== '') { ?>
					<form class="form-submit" action="<?= site_url('members/mlm_access/update_mlm_access'); ?>">
						<div id="accordion">
							<?php if(isset($menu)){ foreach($menu as $tbgroup => $submenu){ ?>
								<h3><i class="<?=$submenu['icon'];?>"></i> <?=$tbgroup;?></h3>
								<div>
								<?php foreach($submenu['menu'] as $name => $prop){
									$oa = explode(',',$prop['other_action']);
								?>
									<div class="row">
										<div class="col-md-6">
											<input type="checkbox" name="tab[]" value="<?=$prop['id'];?>" <?php  echo ((isset($user_access[$prop['id']]) && $user_access[$prop['id']]['status']=='A')?'checked':''); ?> > <?=$name;?>
										</div>
										<div class="col-md-6">
										<?php 
										if($oa[0] != null)
										{
											$uaoa = array();
											if(isset($user_access[$prop['id']]['other_action']))
											{
												$uaoa = explode(' ',$user_access[$prop['id']]['other_action']);
											}
											foreach($oa as $a){
												$toa = explode('|',$a);
												echo '<label><input type="checkbox" name="action['.$prop['id'].'][]" value="'.$toa[1].'" '.((in_array($toa[1],$uaoa)?'checked':'')).'> '.ucfirst($toa[0]).'</label> ';
											}
										}
										?>
										</div>
									</div>
								<?php } ?>
								</div>
							<?php }} ?>
						</div>
						<div class="row">
							<div class="col-md-12">
							<?php if(in_array('1',$other_action)){ ?>
								<input type="hidden" name="type_id" value="<?= isset($type_id)?$type_id:''; ?>">
								
								<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
								<button type="submit" class="btn btn-success form-control">Update</button>
							<?php } ?>
							</div>
						</div>
					</form>
					<?php }?>
				</div>
				</div>				
            </div>
        </div>
    </div>

	<div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="<?= base_url('assets/scripts');?>/main.d810cf0ae7f39f28f336.js"></script>
	<?php include('common/footer_script.php'); ?>
	<script>
	$( "#accordion" ).accordion({
		  collapsible: true,
		  heightStyle: "content"
		});
	</script>
</body>
</html>