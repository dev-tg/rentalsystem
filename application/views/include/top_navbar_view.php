
<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="mobile-only-brand pull-left">
					<div class="nav-header pull-left">
						<div class="logo-wrap">
							<a ui-sref="app.home">
								<!--<img class="brand-img" src="dist/img/logo.png" alt="brand">-->
								<span class="brand-text">Rental System</span>
                                                               		</a>
						</div>
                                            <div><small>For Rent and Earn</small></div>
                                           
					</div>	
					<a ng-if="$root.MenuSldBtn" id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
					<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
					<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
					<form id="search_form" role="search" class="top-nav-search collapse pull-left">
<!--						<div class="input-group">
							<input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
							<span class="input-group-btn">
							<button type="button" class="btn  btn-default" data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
							</span>
						</div>-->
					</form>
				</div>
				<div id="mobile_only_nav" class="mobile-only-nav pull-right">
					<ul class="nav navbar-right top-nav pull-right">

						<li class="dropdown full-width-drp">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-more-vert top-nav-icon"></i></a>

						</li>

						<li class="dropdown auth-drp">
							<a href="" class="dropdown-toggle pr-0" data-toggle="dropdown"><?php print_r ($this->session->userdata["name"])?>
                                                            <!--<img src="dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle">-->
                                                            <span class="user-online-status"></span></a>
							<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
								<li>
									<a ui-sref="app.profile"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
								</li>
				
								<li>
									<a ui-sref="admin.dashboard"><i class="pe-7s-helm"></i><span>Admin Pannel</span></a>
								</li>
				
				
				
<!--								<li class="divider"></li>-->
<!--								<li class="sub-menu show-on-hover">
									<a href="#" class="dropdown-toggle pr-0 level-2-drp"><i class="zmdi zmdi-check text-success"></i> available</a>
									<ul class="dropdown-menu open-left-side">
										<li>
											<a href="#"><i class="zmdi zmdi-check text-success"></i><span>available</span></a>
										</li>
										<li>
											<a href="#"><i class="zmdi zmdi-circle-o text-warning"></i><span>busy</span></a>
										</li>
										<li>
											<a href="#"><i class="zmdi zmdi-minus-circle-outline text-danger"></i><span>offline</span></a>
										</li>
									</ul>	
								</li>-->
								<li class="divider"></li>
								<li>
                                                                    <a href="logout"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
								</li>
							</ul>
						</li>
					</ul>
				</div>	
			</nav>
  