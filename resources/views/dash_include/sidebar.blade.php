<nav class="main-menu">
    <ul>
        <li>
            <a href="{!! route('dashboard') !!}">
                <i class="fa fa-home nav_icon"></i>
                <span class="nav-text">
					Dashboard
					</span>
            </a>
        </li>
        <li class="">
            <a href="{!! route('sales.index') !!}">
                <i class="fa fa-list-ul"></i>
                <span class="nav-text">Sales</span>
            </a>
        </li>
        {{--product Part--}}
        <li class="has-subnav">
            <a href="{!! route('product.index') !!}">
                <i class="fa fa-file-text-o nav_icon"></i>
                <span class="nav-text">Product</span>
            </a>
        </li>
        {{--End Product Part--}}
        {{--Customer part--}}
        <li>
            <a href="{!! route('customers.index') !!}">
                <i class="fa fa-user"></i>
                <span class="nav-text">
			     Customers
			    </span>
            </a>
        </li>
        {{--End customer part--}}
        <li class="has-subnav">
            <a href="javascript:;">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span class="nav-text">
					User
				</span>
                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
            </a>
            <ul>
                <li>
                    <a class="subnav-text" href="/dash/{{Auth::user()->id}}">
                        Show Profile
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="{!! route('editProfile') !!}">
                        Edit Profile
                    </a>
                </li>
            </ul>
        </li>

    </ul>
    <ul class="logout">
        <li>
            <a href="{!! route('logout') !!}">
                <i class="icon-off nav-icon"></i>
                <span class="nav-text">
			Logout
			</span>
            </a>
        </li>
    </ul>
</nav>