<div class="white r box-shadow-z0 m-b navbar-md">
    <div class="navbar">
        <a data-toggle="collapse" data-target="#navbar-4" class="navbar-item pull-right hidden-md-up m-a-0 m-l">
            <i class="material-icons"></i>
        </a>
        <!-- brand -->
        <a class="navbar-brand">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24" height="24">
                <path d="M 4 4 L 44 4 L 44 44 Z" fill="#a88add"></path>
                <path d="M 4 4 L 34 4 L 24 24 Z" fill="rgba(0,0,0,0.15)"></path>
                <path d="M 4 4 L 24 4 L 4  44 Z" fill="#0cc2aa"></path>
            </svg>
            <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="." class="hide">
                <span class="hidden-folded inline">Flatkit</span>
        </a>
        <!-- / brand -->

        <!-- nabar right -->
        <ul class="nav navbar-nav pull-right">
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="material-icons"></i>
                    <span class="label up p-a-0 primary"></span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link" data-toggle="dropdown">
                    <i class="material-icons"></i>
                    <span class="label up p-a-0 accent"></span>
                </a>
                <div class="dropdown-menu w-xl text-color pull-right p-a-0 animated flipInX">
                    <div class="row no-gutter text-primary-hover">
                        <div class="col-xs-4 b-r b-b">
                            <a class="p-a block text-center">
                                <i class="material-icons md-24 text-muted m-v-sm"></i>
                                <span class="block">Alarm</span>
                            </a>
                        </div>
                        <div class="col-xs-4 b-r b-b">
                            <a class="p-a block text-center">
                                <i class="material-icons md-24 text-muted m-v-sm"></i>
                                <span class="block">Favorite</span>
                            </a>
                        </div>
                        <div class="col-xs-4 b-b">
                            <a class="p-a block text-center">
                                <i class="material-icons md-24 text-muted m-v-sm"></i>
                                <span class="block">History</span>
                            </a>
                        </div>
                        <div class="col-xs-4 b-r">
                            <a class="p-a block text-center">
                                <i class="material-icons md-24 text-muted m-v-sm"></i>
                                <span class="block">Call</span>
                            </a>
                        </div>
                        <div class="col-xs-4 b-r">
                            <a class="p-a block text-center">
                                <i class="material-icons md-24 text-muted m-v-sm"></i>
                                <span class="block">Chat</span>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a class="p-a block text-center">
                                <i class="material-icons md-24 text-muted m-v-sm"></i>
                                <span class="block">Inbox</span>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link" data-toggle="dropdown">
                    <i class="material-icons"></i>
                    <span class="label up p-a-0 warn"></span>
                </a>
                <!-- dropdown -->
                <div class="dropdown-menu pull-right w-xl animated fadeInUp no-bg no-border no-shadow">
                    <div class="scrollable" style="max-height: 220px">
                        <ul class="list-group list-group-gap m-a-0">
                            <li class="list-group-item black lt box-shadow-z0 b">
                                <span class="pull-left m-r">
                                    <img src="<?php echo base_url(); ?>assets/images/a0.jpg" alt="..." class="w-40 img-circle">
                                </span>
                                <span class="clear block">
                                    Use awesome <a href="" class="text-primary">animate.css</a><br>
                                        <small class="text-muted">10 minutes ago</small>
                                </span>
                            </li>
                            <li class="list-group-item black lt box-shadow-z0 b">
                                <span class="pull-left m-r">
                                    <img src="<?php echo base_url(); ?>assets/images/a1.jpg" alt="..." class="w-40 img-circle">
                                </span>
                                <span class="clear block">
                                    <a href="" class="text-primary">Joe</a> Added you as friend<br>
                                        <small class="text-muted">2 hours ago</small>
                                </span>
                            </li>
                            <li class="list-group-item dark-white text-color box-shadow-z0 b">
                                <span class="pull-left m-r">
                                    <img src="<?php echo base_url(); ?>assets/images/a2.jpg" alt="..." class="w-40 img-circle">
                                </span>
                                <span class="clear block">
                                    <a href="" class="text-primary">Danie</a> sent you a message<br>
                                        <small class="text-muted">1 day ago</small>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- / dropdown -->
            </li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle clear" data-toggle="dropdown">
                    <span class="avatar w-32">
                        <img src="<?php echo base_url(); ?>assets/images/a2.jpg" alt="...">
                            <i class="busy b-white right"></i>
                    </span>
                </a>
                <div class="dropdown-menu pull-right dropdown-menu-scale">
                    <a class="dropdown-item" ui-sref="app.inbox.list">
                        <span>Inbox</span>
                        <span class="label warn m-l-xs">3</span>
                    </a>
                    <a class="dropdown-item" ui-sref="app.page.profile">
                        <span>Profile</span>
                    </a>
                    <a class="dropdown-item" ui-sref="app.page.setting">
                        <span>Settings</span>
                        <span class="label primary m-l-xs">3/9</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" ui-sref="app.docs">
                        Need help?
                    </a>
                    <a class="dropdown-item" ui-sref="access.signin">Sign out</a>
                </div>
            </li>
        </ul>
        <!-- / navbar right -->
        <!-- navbar collapse -->
        <div class="collapse navbar-toggleable-sm" id="navbar-4">
            <!-- link and dropdown -->
            <ul class="nav navbar-nav pull-left m-r">
                <li class="nav-item dropdown dropdown-submenu pos-stc">
                    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <span>Mega</span>
                    </a>
                    <div class="dropdown-menu pull-down p-a w-full text-color text-primary-hover">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="_600 text-u-c m-y-sm">UI kits <span class="label label-sm success">10</span></div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <ul class="nav l-h-2x">
                                            <li class="hide" ng-class="{'show': 1}">
                                                <a ui-sref="app.ui.angularstrap"><span>AngularStrap</span></a>
                                            </li>
                                            <li>
                                                <a href="arrow.html" ui-sref="app.ui.arrow"><span>Arrow</span></a>
                                            </li>
                                            <li>
                                                <a href="box.html" ui-sref="app.ui.box"><span>Box</span></a>
                                            </li>
                                            <li>
                                                <a href="button.html" ui-sref="app.ui.button"><span>Button</span></a>
                                            </li>
                                            <li>
                                                <a href="color.html" ui-sref="app.ui.color"><span>Color</span></a>
                                            </li>
                                            <li>
                                                <a href="dropdown.html" ui-sref="app.ui.dropdown"><span>Dropdown</span></a>
                                            </li>
                                            <li>
                                                <a href="grid.html" ui-sref="app.ui.grid"><span>Grid</span></a>
                                            </li>
                                            <li>
                                                <a href="icon.html" ui-sref="app.ui.icon"><span>Icon</span></a>
                                            </li>
                                            <li>
                                                <a href="label.html" ui-sref="app.ui.label"><span>Label</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-6">
                                        <ul class="nav l-h-2x">
                                            <li>
                                                <a href="list.html" ui-sref="app.ui.list"><span>List Group</span></a>
                                            </li>
                                            <li>
                                                <a href="modal.html" ui-sref="app.ui.modal"><span>Modal</span></a>
                                            </li>
                                            <li>
                                                <a href="nav.html" ui-sref="app.ui.nav"><span>Nav</span></a>
                                            </li>
                                            <li>
                                                <a href="progress.html" ui-sref="app.ui.progress"><span>Progress</span></a>
                                            </li>
                                            <li>
                                                <a href="social.html" ui-sref="app.ui.social"><span>Social</span></a>
                                            </li>
                                            <li>
                                                <a href="streamline.html" ui-sref="app.ui.streamline"><span>Streamline</span></a>
                                            </li>
                                            <li>
                                                <a href="timeline.html" ui-sref="app.ui.timeline"><span>Timeline</span></a>
                                            </li>
                                            <li>
                                                <a href="vectormap.html" ui-sref="app.ui.vectormap"><span>Vector Map</span></a>
                                            </li>
                                            <li class="hide" ng-class="{'show': 1}">
                                                <a ui-sref="app.googlemap"><span>Google Map</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="_600 text-u-c m-y-sm">Pages <span class="label label-sm">12</span></div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <ul class="nav l-h-2x">
                                            <li>
                                                <a href="profile.html" ui-sref="app.page.profile">
                                                    <span>Profile</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="setting.html" ui-sref="app.page.settings">
                                                    <span>Settings</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="search.html" ui-sref="app.page.search">
                                                    <span>Search</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="faq.html" ui-sref="app.page.faq">
                                                    <span>FAQ</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="invoice.html" ui-sref="app.page.invoice">
                                                    <span>Invoice</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="price.html" ui-sref="app.page.price">
                                                    <span>Price</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blank.html" ui-sref="app.page.blank">
                                                    <span>Blank</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="signin.html" ui-sref="access.signin">
                                                    <span>Sign In</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="signup.html" ui-sref="access.signup">
                                                    <span>Sign Up</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-6">
                                        <ul class="nav l-h-2x">
                                            <li>
                                                <a href="forgot-password.html" ui-sref="access.forgot-password">
                                                    <span>Forgot Password</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="lockme.html" ui-sref="access.lockme">
                                                    <span>Lockme Screen</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="404.html" ui-sref="404">
                                                    <span>Error 404</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="505.html" ui-sref="505">
                                                    <span>Error 505</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="_600 text-u-c m-y-sm">Form</div>
                                <ul class="nav l-h-2x">
                                    <li>
                                        <a href="form.layout.html" ui-sref="app.form.layout"><span>Form Layout</span></a>
                                    </li>
                                    <li>
                                        <a href="form.element.html" ui-sref="app.form.element"><span>Form Element</span></a>
                                    </li>
                                    <li class="hide" ng-class="{'show': 1}">
                                        <a ui-sref="app.form.validation"><span>Form Validation</span></a>
                                    </li>
                                    <li class="hide" ng-class="{'show': 1}">
                                        <a ui-sref="app.form.select"><span>Select</span></a>
                                    </li>
                                    <li class="hide" ng-class="{'show': 1}">
                                        <a ui-sref="app.form.editor"><span>Editor</span></a>
                                    </li>
                                    <li class="hide" ng-class="{'show': 1}">
                                        <a ui-sref="app.form.slider"><span>Slider</span></a>
                                    </li>
                                    <li class="hide" ng-class="{'show': 1}">
                                        <a ui-sref="app.form.tree"><span>Tree</span></a>
                                    </li>
                                    <li class="hide" ng-class="{'show': 1}">
                                        <a ui-sref="app.form.file-upload"><span>File Upload</span></a>
                                    </li>
                                    <li class="hide" ng-class="{'show': 1}">
                                        <a ui-sref="app.form.image-crop"><span>Image Crop</span></a>
                                    </li>
                                    <li class="hide" ng-class="{'show': 1}">
                                        <a ui-sref="app.form.editable"><span>Editable</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-2">
                                <div class="_600 text-u-c m-y-sm">Table</div>
                                <ul class="nav l-h-2x">
                                    <li>
                                        <a href="static.html" ui-sref="app.table.static"><span>Static table</span></a>
                                    </li>
                                    <li>
                                        <a href="datatable.html" ui-sref="app.table.datatable"><span>Datatable</span></a>
                                    </li>
                                    <li>
                                        <a href="footable.html" ui-sref="app.table.footable"><span>Footable</span></a>
                                    </li>
                                    <li class="hide" ng-class="{'show': 1}">
                                        <a ui-sref="app.table.smart"><span>Smart table</span></a>
                                    </li>
                                    <li class="hide" ng-class="{'show': 1}">
                                        <a ui-sref="app.table.nggrid"><span>NG Grid</span></a>
                                    </li>
                                    <li class="hide" ng-class="{'show': 1}">
                                        <a ui-sref="app.table.uigrid"><span>UI Grid</span></a>
                                    </li>
                                    <li class="hide" ng-class="{'show': 1}">
                                        <a ui-sref="app.table.editable"><span>Editable</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-submenu">
                    <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">
                        <span>Submenu</span>
                    </a>
                    <ul class="dropdown-menu pull-down text-color" role="menu">
                        <li class="dropdown-item"><a href="">Action</a></li>
                        <li class="dropdown-item"><a href="">Another action</a></li>
                        <li class="dropdown-item"><a href="">Something else here</a></li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item"><a href="">Separated link</a></li>
                        <li class="dropdown-item dropdown-submenu">
                            <a href="">Submenu</a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown-item"><a href="">Action</a></li>
                                <li class="dropdown-item"><a href="">Another action</a></li>
                                <li class="dropdown-item"><a href="">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- / link and dropdown -->
            <!-- search form -->
            <form class="navbar-form form-inline navbar-item m-l v-m" role="search">
                <div class="form-group l-h m-a-0">
                    <div class="input-group">
                        <input type="text" class="form-control b-a form-control-sm" placeholder="Search projects...">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-sm btn-default b-a no-shadow"><i class="fa fa-search"></i></button>
                            </span>
                    </div>
                </div>
            </form>
            <!-- / search form -->
        </div>
        <!-- / navbar collapse -->
    </div>
</div>