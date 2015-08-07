<header id="header">
    <div class="header-left">
        <div class="navbar-minimize-mobile left">
            <i class="fa fa-bars"></i>
        </div>
        <div class="navbar-header">
            <a class="navbar-brand" href="dashboard.html">
                <img class="logo" src="img/logo/logo-white.png" alt="brand logo"/>
            </a>
        </div>
        <div class="navbar-minimize-mobile right">
            <i class="fa fa-cog"></i>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="header-right">
        <div class="navbar navbar-toolbar navbar-dark">
            <ul class="nav navbar-nav navbar-left">
                <li class="navbar-minimize">
                    <a href="javascript:void(0);" title="Minimize sidebar">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li class="navbar-search">
                    <a href="javascript:void(0)" class="trigger-search"><i class="fa fa-search"></i></a>
                    <form class="navbar-form" onsubmit=" return false">
                        <div class="form-group has-feedback">
                        <input id="iSearch" type="text" class="form-control typeahead rounded" placeholder="Buscar">
                            <button type="" class="btn btn-theme fa fa-search form-control-feedback rounded" id="search-inventario-user"></button>
                        </div>
                    </form>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown navbar-message">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bar-chart-o"></i></a>
                </li>
                <li class="dropdown navbar-message hide">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i><span class="count label label-danger rounded">7</span></a>
                    <div class="dropdown-menu animated flipInX">
                        <div class="dropdown-body">
                            <li class="dropdown navbar-profile">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="meta">
                                        <span class="avatar"><img src="img/avatar/35/1.png" class="img-circle" alt="admin"></span>
                                        <span class="text hidden-xs hidden-sm text-muted">
                                            <?php 
                                            $user_nombre = explode(' ',Auth::user()->nombre);
                                            $user_apellido = explode(' ',Auth::user()->apellido);

                                            echo $user_nombre[0].' '.$user_apellido[0];
                                            ?>
                                            <span class="caret"></span>
                                        </span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu animated flipInX">
                                    <li class="dropdown-header">Account</li>
                                    <li><a id="profile" href="javascript:void(0)"><i class="fa fa-user"></i>View profile</a></li>
                                    <li><a href="logout"><i class="fa fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                            <li class="navbar-setting pull-right">
                                <a href="javascript:void(0);"><i class="fa fa-cog"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </header>