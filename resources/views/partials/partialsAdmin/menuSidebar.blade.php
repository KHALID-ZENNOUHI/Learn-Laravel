        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <h1><strong>Adidas</strong></h1>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{ route('users.show') }}">
                                <i class="fas fa-tachometer-alt"></i>User</a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{ route('permissions.index') }}">
                                <i class="fas fa-tachometer-alt"></i>Permission</a>
                        </li>
                        <li>
                            <a href="{{ route('products.show') }}">
                                <i class="fas fa-chart-bar"></i>Products</a>
                        </li>
                        <li>
                            <a href="{{route('categories.show') }}">
                                <i class="fas fa-table"></i>Categories</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->