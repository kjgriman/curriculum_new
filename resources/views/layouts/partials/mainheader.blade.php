<!-- Main Header -->

<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><div class="fa fa-cube fa-1x"> </div></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><div class="fa fa-cubes fa-1x"> </div> Hoja de vida</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                
                
                @if (Auth::guest())
                    <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <span class="fa fa-user fa-2x"></span>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->

                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <span class="fa fa-user fa-4x"></span>
                                <p>
                                   Bienvenido  <b>{{ Auth::user()->name }}</b> 
                                    <small>{{Date('Y-M-d ')}}</small>
                                </p>

                            </li><b>Medallas obtenidas</b>
                            <li>
                                <?php if(isset($getCourses)){ ?>
                                 @foreach($getCourses as $key => $getCourse)
                                
                                <img data-togle="tooltip"  title="{{$getCourse->name_courses}}" width="30px" height="auto" src="img/imgmedalla/{{$getCourse->imgmedalla }}">
                                @endforeach
<?php
}
else{
    echo 'sin medallas';
}
?>
                            </li>
                            <!-- Menu Body -->
                            
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.signout') }}</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Control Sidebar Toggle Button -->
            
            </ul>
        </div>
    </nav>
</header>
