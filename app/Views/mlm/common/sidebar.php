<div class="app-sidebar sidebar-shadow bg-heavy-rain sidebar-text-dark">
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>
                <li class="mm-active">
                    <a href="<?= site_url_html('members/dashboard'); ?>">
                        <i class="metismenu-icon fa fa-tachometer" aria-hidden="true"></i> Dashboard
                    </a>
                </li>
                <?php if(isset($tab)){ foreach($tab as $grp => $val){ ?>
                    <li>
                    <a href="#">
                        <i class="metismenu-icon <?=$val['icon'];?>" aria-hidden="true"></i><?=$grp;?>
                        <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                    </a>
                    <ul>
                    <?php asort($val['menu']); foreach($val['menu'] as $name => $url){   ?>
                        <li>
							<a href="<?= site_url_html('members/'.$url); ?>"><i class="metismenu-icon"></i><?=ucfirst($name); ?></a>
						</li>
                    <?php } ?>
                    </ul>
                <?php } } ?>
                <li class="mm-active "> 
                    <li><a href="<?= site_url_html('members/logout'); ?>" ><i class="metismenu-icon fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                </li>
            </ul>
        </div>
    </div>
</div>
                    
                  