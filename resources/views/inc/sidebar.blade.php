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
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Order Options</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('order/create')}}">
                            <i class="fa fa-circle-o"></i> Qucik Order
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('order')}}">
                            <i class="fa fa-circle-o"></i> View Orders
                        </a>
                    </li>
                </ul>
            </li>
            {{-- end general options --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>General Options</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Manage User</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ url('user/create')}}">
                                    <i class="fa fa-circle-o"></i> Create User
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('user')}}">
                                    <i class="fa fa-circle-o"></i> View User
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Manage User --}}

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Manage Role</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ url('role/create')}}">
                                    <i class="fa fa-circle-o"></i> Create Role
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('role')}}">
                                    <i class="fa fa-circle-o"></i> View Role
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Manage Role --}}

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Manage Department</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ url('department/create')}}">
                                    <i class="fa fa-circle-o"></i> Create Department
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('department')}}">
                                    <i class="fa fa-circle-o"></i> View Department
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            {{-- end general options --}}

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Order Options</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Manage Producttype</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ url('producttype/create')}}">
                                    <i class="fa fa-circle-o"></i> Create Producttype
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('producttype')}}">
                                    <i class="fa fa-circle-o"></i> View Producttype
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Manage Category --}}
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Manage Supplier</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ url('supplier/create') }}">
                                    <i class="fa fa-circle-o"></i> Create Supplier
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('supplier') }}">
                                    <i class="fa fa-circle-o"></i> View Supplier
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Manage Supplier --}}

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Manage UOM</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ url('uom/create')}}">
                                    <i class="fa fa-circle-o"></i> Create UOM
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('uom')}}">
                                    <i class="fa fa-circle-l"></i> View UOM
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Manage UOM --}}

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Manage Product</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ url('product/create')}}">
                                    <i class="fa fa-circle-o"></i> Create Product
                                </a>
                            </li>
                            <li>
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

            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>