<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">
            <li class="header">Navigation</li>
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i><span>Dashboard</span>
                </a>
            </li>
            {{-- end general options --}}
            <li class="treeview {{ Request::path() == 'user/create' ? 'active' : '' || Request::path() == 'user' ? 'active' : ''}} || {{ Request::path() == 'role/create' ? 'active' : '' }} || {{ Request::path() == 'role' ? 'active' : '' }} || {{ Request::path() == 'department/create' ? 'active' : '' }} || {{ Request::path() == 'department' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-wrench"></i>
                    <span>General Options</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview {{ Request::path() == 'user/create' ? 'active' : '' || Request::path() == 'user' ? 'active' : ''}}">
                        <a href="#">
                            <i class="fa fa-user-plus"></i>
                            <span>Manage User</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::path() == 'user/create' ? 'active' : '' }}">
                                <a href="{{ url('user/create')}}">
                                    <i class="fa fa-plus-circle"></i> Create User
                                </a>
                            </li>
                            <li class="{{ Request::path() == 'user' ? 'active' : '' }}">
                                <a href="{{ url('user')}}">
                                    <i class="fa fa-list"></i> View User
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Manage User --}}

                    <li class="treeview {{ Request::path() == 'role/create' ? 'active' : '' }} || {{ Request::path() == 'role' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>Manage Role</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::path() == 'role/create' ? 'active' : '' }}">
                                <a href="{{ url('role/create')}}">
                                    <i class="fa fa-circle-o"></i> Create Role
                                </a>
                            </li>
                            <li class="{{ Request::path() == 'role' ? 'active' : '' }}">
                                <a href="{{ url('role')}}">
                                    <i class="fa fa-circle-o"></i> View Role
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Manage Role --}}

                    <li class="treeview {{ Request::path() == 'department/create' ? 'active' : '' }} || {{ Request::path() == 'department' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-yelp"></i>
                            <span>Manage Department</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::path() == 'department/create' ? 'active' : '' }}">
                                <a href="{{ url('department/create')}}">
                                    <i class="fa fa-circle-o"></i> Create Department
                                </a>
                            </li>
                            <li class="{{ Request::path() == 'department' ? 'active' : '' }}">
                                <a href="{{ url('department')}}">
                                    <i class="fa fa-circle-o"></i> View Department
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            {{-- end general options --}}

            <li class="treeview {{ Request::path() == 'producttype/create' ? 'active' : '' }} || {{ Request::path() == 'producttype' ? 'active' : '' }} || {{ Request::path() == 'supplier/create' ? 'active' : '' }} || {{ Request::path() == 'supplier' ? 'active' : '' }} || {{ Request::path() == 'product/create' ? 'active' : '' }} || {{ Request::path() == 'product' ? 'active' : '' }} || {{ Request::path() == 'uom/create' ? 'active' : '' }} || {{ Request::path() == 'uom' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-th-large"></i>
                    <span>Order Options</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview {{ Request::path() == 'producttype/create' ? 'active' : '' }} || {{ Request::path() == 'producttype' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Manage Producttype</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::path() == 'producttype/create' ? 'active' : '' }}">
                                <a href="{{ url('producttype/create')}}">
                                    <i class="fa fa-pencil-square"></i> Create Producttype
                                </a>
                            </li>
                            <li class="{{ Request::path() == 'producttype' ? 'active' : '' }}">
                                <a href="{{ url('producttype')}}">
                                    <i class="fa fa-circle-o"></i> View Producttype
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Manage Category --}}
                    <li class="treeview {{ Request::path() == 'supplier/create' ? 'active' : '' }} || {{ Request::path() == 'supplier' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Manage Supplier</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::path() == 'supplier/create' ? 'active' : '' }}">
                                <a href="{{ url('supplier/create') }}">
                                    <i class="fa fa-puzzle-piece"></i> Create Supplier
                                </a>
                            </li>
                            <li class="{{ Request::path() == 'supplier' ? 'active' : '' }}">
                                <a href="{{ url('supplier') }}">
                                    <i class="fa fa-circle-o"></i> View Supplier
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Manage Supplier --}}

                    <li class="treeview {{ Request::path() == 'uom/create' ? 'active' : '' }} || {{ Request::path() == 'uom' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-tint"></i>
                            <span>Manage UOM</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::path() == 'uom/create' ? 'active' : '' }}">
                                <a href="{{ url('uom/create')}}">
                                    <i class="fa fa-circle-o"></i> Create UOM
                                </a>
                            </li>
                            <li class="{{ Request::path() == 'uom/' ? 'active' : '' }}">
                                <a href="{{ url('uom')}}">
                                    <i class="fa fa-circle-o"></i> View UOM
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Manage UOM --}}

                    <li class="treeview {{ Request::path() == 'product/create' ? 'active' : '' }} || {{ Request::path() == 'product' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Manage Product</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ Request::path() == 'product/create' ? 'active' : '' }}">
                                <a href="{{ url('product/create')}}">
                                    <i class="fa fa-circle-o"></i> Create Product
                                </a>
                            </li>
                            <li class="{{ Request::path() == 'product' ? 'active' : '' }}">
                                <a href="{{ url('product')}}">
                                    <i class="fa fa-circle-o"></i> View Product
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Manage Role --}}
                </ul>
            </li>
            {{-- end general options --}}


            <li class="treeview {{ Request::path() == 'order/create' ? 'active' : '' }} || {{ Request::path() == 'order' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-industry"></i>
                    <span>Order Options</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::path() == 'order/create' ? 'active' : '' }}">
                        <a href="{{ url('order/create')}}">
                            <i class="fa fa-bullseye"></i> Qucik Order
                        </a>
                    </li><!-- 
                    <li class="{{ Request::path() == 'order' ? 'active' : '' }}">
                        <a href="{{ url('order')}}">
                            <i class="fa fa-circle-o"></i> View Orders
                        </a>
                    </li> -->
                </ul>
            </li>
             {{-- end Order options --}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>