<div class="app-header header-shadow bg-arielle-smile header-text-light">
    <div class="app-header__logo"> 
		<div class="header__pane ml-auto">
			<div>
				<button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
					data-class="closed-sidebar">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
	</div>
	<div class="app-header__mobile-menu">
		<div>
			<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
		</div>
	</div>
	<div class="app-header__menu">
		<span>
			<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
				<span class="btn-icon-wrapper">
					<i class="fa fa-ellipsis-v fa-w-6"></i>
				</span>
			</button>
		</span>
	</div>
	<div class="app-header__content">
		<div class="app-header-left">
			<div class="search-wrapper">
				<div class="input-holder">
					<input type="text" class="search-input" placeholder="Type to search">
					<button class="search-icon"><span></span></button>
				</div>
				<button class="close"></button>
			</div>
		</div>
		<div class="app-header-right">
			<div class="header-dots">
				<div class="dropdown">
					<button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link"></button>
				</div>
			</div>
			<div class="header-btn-lg pr-0">
				<div class="widget-content p-0">
					<div class="widget-content-wrapper">
						<div class="widget-content-left  ml-3 header-user-info">
							<div class="widget-heading"><?= strtoupper($session['f_name']); ?> <?= strtoupper($session['l_name']); ?> ( <?= $session['member_user_id'];?> )</div>
						</div>
						<div class="widget-content-left">
							<div class="btn-group">
								<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
									<img width="42" class="rounded-circle" src="<?= base_url("assets/images/avatar/1.jpg");?>" alt="RD">
									<!--<i class="fa fa-angle-down ml-2 opacity-8"></i>-->
								</a>
								<div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
								
									<div class="dropdown-menu-header">
										<div class="dropdown-menu-header-inner bg-info">
											<ul> 
												<li><a href="<?= site_url('mlm-admin/logout'); ?>"><i class="ti-power-off"></i> <span>Logout</span></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>