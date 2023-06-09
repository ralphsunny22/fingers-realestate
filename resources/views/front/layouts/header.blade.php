<?php
//$url = url()->current(); 
$routeName = \Route::currentRouteName();
//dd($routeName);
?>
<div class="header {{ $routeName=='landing' ? 'header-transparent' : 'header-light' }} change-logo">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand static-logo" href="#"><img src="assets/img/logo-light.png" class="logo" alt="" /></a>
                <a class="nav-brand fixed-logo" href="#"><img src="assets/img/logo.png" class="logo" alt="" /></a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">
                
                    <li class="active"><a href="#">Home<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a class="active" href="index.html">Home Layout 1</a></li>
                            <li><a href="home-2.html">Home Layout 2</a></li>
                            <li><a href="home-3.html">Home Layout 3</a></li>
                            <li><a href="home-4.html">Home Layout 4</a></li>
                            <li><a href="home-5.html">Home Layout 5</a></li>
                            <li><a href="home-6.html">Home Layout 6</a></li>
                            <li><a href="home-7.html">Home Layout 7</a></li>
                            <li><a href="home-8.html">Home Layout 8</a></li>
                            <li><a href="home-9.html">Home Layout 9</a></li>
                            <li><a href="home-10.html">Home Layout 10<span class="ms-2 label-new">New</span></a></li>
                            <li><a href="home-11.html">Home Layout 11<span class="ms-2 label-new">New</span></a></li>
                            <li><a href="video.html">Video Home</a></li>
                            <li><a href="map.html">Map Home Layout</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="JavaScript:Void(0);">Listings<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="JavaScript:Void(0);">List Layout<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="list-layout-with-sidebar.html">With Sadebar</a></li>                                    
                                    <li><a href="list-layout-with-map.html">With Map</a></li>                                    
                                    <li><a href="list-layout-full.html">Full Width</a></li>
                                </ul>
                            </li>
                            <li><a href="JavaScript:Void(0);">Grid Layout<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="grid-layout-with-sidebar.html">With Sidebar</a></li>                                    
                                    <li><a href="classical-layout-with-sidebar.html">Classical With Sidebar</a></li>                                    
                                    <li><a href="grid-layout-with-map.html">With Map</a></li>                                    
                                    <li><a href="grid.html">Full Width</a></li>
                                    <li><a href="classical-property.html">Classical Full Width</a></li>	 
                                </ul>
                            </li>
                            <li><a href="JavaScript:Void(0);">With Map Property<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="list-layout-with-map.html">List With Map</a></li>                                    
                                    <li><a href="grid-layout-with-map.html">Grid With Map</a></li>                                    
                                    <li><a href="classical-layout-with-map.html">Classical With Map</a></li>                                    
                                    <li><a href="half-map.html">Half Map Search</a></li> 
                                </ul>
                            </li>
                        </ul>
                    </li>
                    
                    <li><a href="JavaScript:Void(0);">Features<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="JavaScript:Void(0);">Single Property<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="single-property-1.html">Single Property 1</a></li>                                    
                                    <li><a href="single-property-2.html">Single Property 2</a></li>                                    
                                    <li><a href="single-property-3.html">Single Property 3</a></li> 
                                    <li><a href="single-property-4.html">Single Property 4<span class="ms-2 label-new">New</span></a></li> 												
                                </ul>
                            </li>
                            <li><a href="JavaScript:Void(0);">Agencies & Agents<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="agents.html">Agents List</a></li>                                    
                                    <li><a href="agent-page.html">Agent Page</a></li>                                    
                                    <li><a href="agencies.html">Agencies List</a></li>                                    
                                    <li><a href="agency-page.html">Agency Page</a></li> 
                                </ul>
                            </li>
                            <li><a href="JavaScript:Void(0);">My Account<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="dashboard.html">User Dashboard</a></li><li><a href="payment.html">Payment Confirmation</a></li>
                                    <li><a href="my-profile.html">My Profile</a></li>                                    
                                    <li><a href="my-property.html">Property List</a></li>                                    
                                    <li><a href="bookmark-list.html">Bookmarked Listings</a></li>                                    
                                    <li><a href="change-password.html">Change Password</a></li> 
                                </ul>
                            </li>
                            <li>
                                <a href="compare-property.html">Compare Property</a>                                
                            </li>
                            <li>
                                <a href="submit-property.html">Submit Property</a>                                
                            </li>
                        </ul>
                    </li>
                    
                    <li><a href="JavaScript:Void(0);">Pages<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="blog.html">Blogs Page</a></li>                                    
                            <li><a href="blog-detail.html">Blog Detail</a></li>                                    
                            <li><a href="component.html">Shortcodes</a></li> 
                            <li><a href="pricing.html">Pricing</a></li>  
                            <li><a href="404.html">Error Page</a></li>
                            <li><a href="contact.html">Contacts</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#signup">Sign Up</a></li>
                    
                </ul>
                
                <ul class="nav-menu nav-menu-social align-to-right">
                    
                    <li>
                        <a href="submit-property.html" class="text-light-theme"><i class="fa-solid fa-circle-plus me-1"></i>Add Property</a>
                    </li>
                    <li class="add-listing light">
                        <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login"><i class="fa-regular fa-user font-10 mr-2"></i>Sign In</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>