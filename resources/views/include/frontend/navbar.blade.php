<style>
    .badge-fade-in {
        animation: fadeInScale 0.4s ease-in-out;
    }

    @keyframes fadeInScale {
        0% {
            opacity: 0;
            transform: scale(0);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>

<div class="main_nav Sticky">
    <div class="container">
        <div class="row small-gutters">
            <div class="col-xl-3 col-lg-3 col-md-3">
                <nav class="categories">
                    <ul class="clearfix">
                        <li><span>
                                <a href="#">
                                    <span class="hamburger hamburger--spin">
                                        <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                        </span>
                                    </span>
                                    Categories
                                </a>
                            </span>
                            <div id="menu">
                                <ul>
                                    <li><span><a href="#0">Collections</a></span>
                                        <ul>
                                            <li><a href="listing-grid-1-full.html">Trending</a></li>
                                            <li><a href="listing-grid-2-full.html">Life style</a></li>
                                            <li><a href="listing-grid-3.html">Running</a></li>
                                            <li><a href="listing-grid-4-sidebar-left.html">Training</a></li>
                                            <li><a href="listing-grid-5-sidebar-right.html">View all Collections</a></li>
                                        </ul>
                                    </li>
                                    <li><span><a href="#">Men</a></span>
                                        <ul>
                                            <li><a href="listing-grid-6-sidebar-left.html">Offers</a></li>
                                            <li><a href="listing-grid-7-sidebar-right.html">Shoes</a></li>
                                            <li><a href="listing-row-1-sidebar-left.html">Clothing</a></li>
                                            <li><a href="listing-row-3-sidebar-left.html">Accessories</a></li>
                                            <li><a href="listing-row-4-sidebar-extended.html">Equipment</a></li>
                                        </ul>
                                    </li>
                                    <li><span><a href="#">Women</a></span>
                                        <ul>
                                            <li><a href="listing-grid-1-full.html">Best Sellers</a></li>
                                            <li><a href="listing-grid-2-full.html">Clothing</a></li>
                                            <li><a href="listing-grid-3.html">Accessories</a></li>
                                            <li><a href="listing-grid-4-sidebar-left.html">Shoes</a></li>
                                        </ul>
                                    </li>
                                    <li><span><a href="#">Boys</a></span>
                                        <ul>
                                            <li><a href="listing-grid-6-sidebar-left.html">Easy On Shoes</a></li>
                                            <li><a href="listing-grid-7-sidebar-right.html">Clothing</a></li>
                                            <li><a href="listing-row-3-sidebar-left.html">Must Have</a></li>
                                            <li><a href="listing-row-4-sidebar-extended.html">All Boys</a></li>
                                        </ul>
                                    </li>
                                    <li><span><a href="#">Girls</a></span>
                                        <ul>
                                            <li><a href="listing-grid-1-full.html">New Releases</a></li>
                                            <li><a href="listing-grid-2-full.html">Clothing</a></li>
                                            <li><a href="listing-grid-3.html">Sale</a></li>
                                            <li><a href="listing-grid-4-sidebar-left.html">Best Sellers</a></li>
                                        </ul>
                                    </li>
                                    <li><span><a href="#">Customize</a></span>
                                        <ul>
                                            <li><a href="listing-row-1-sidebar-left.html">For Men</a></li>
                                            <li><a href="listing-row-2-sidebar-right.html">For Women</a></li>
                                            <li><a href="listing-row-4-sidebar-extended.html">For Boys</a></li>
                                            <li><a href="listing-grid-1-full.html">For Girls</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                <div class="custom-search-input">
                    <input type="text" placeholder="Search over 10.000 products">
                    <button type="submit"><i class="header-icon_search_custom"></i></button>
                </div>
            </div>
            <div class="col-xl-3 col-lg-2 col-md-3">
                <ul class="top_tools">
                    <li>
                        <div class="dropdown dropdown-cart">
                            <a href="{{ route('keranjang.index') }}" class="cart_bt position-relative">
                               
                                    <span class="badge badge-pill badge-danger badge-fade-in"
                                        style="position: absolute; top: -8px; right: -8px; font-size: 12px; padding: 4px 6px;">
                                        
                                    </span>
                               
                            </a>
                        </div>
                    </li>
                    
                    <li>
                        <a href="#0" class="wishlist"><span>Wishlist</span></a>
                    </li>
                    <li>
                        <div class="dropdown dropdown-access">
                            <a href="account.html" class="access_link"><span>Account</span></a>
                            <div class="dropdown-menu">
                                <a href="{{ route('login') }}" class="btn_1">Sign In or Sign Up</a>
                                <ul>
                                    <li>
                                        <a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
                                    </li>
                                    <li>
                                        <a href="account.html"><i class="ti-package"></i>My Orders</a>
                                    </li>
                                    <li>
                                        <a href="account.html"><i class="ti-user"></i>My Profile</a>
                                    </li>
                                    <li>
                                        <a href="help.html"><i class="ti-help-alt"></i>Help and Faq</a>
                                    </li>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <!-- /dropdown-access-->
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
                    </li>
                    <li>
                        <a href="#menu" class="btn_cat_mob">
                            <div class="hamburger hamburger--spin" id="hamburger">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                            Categories
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <div class="search_mob_wp">
        <input type="text" class="form-control" placeholder="Search over 10.000 products">
        <input type="submit" class="btn_1 full-width" value="Search">
    </div>
    <!-- /search_mobile -->
</div>
<script>
    document.querySelectorAll('.main-menu ul li a').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.querySelector('span').style.width = '100%';
        });
        link.addEventListener('mouseleave', function() {
            this.querySelector('span').style.width = '0%';
        });
    });
</script>
