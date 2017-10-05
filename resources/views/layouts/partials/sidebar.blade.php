<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
     

      
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"></li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
             <li class="treeview">
                <a href="category"><i class='fa fa-cogs'></i> <span>{{ trans('adminlte_lang::message.admincourse') }}</span> </a>

            </li>
            <li><a href="lifepage"><i class='fa fa-clipboard'></i> <span>{{ trans('adminlte_lang::message.pagelife') }}</span></a></li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
