@extends('front.layouts.design')
@section('title'){{ $property->title }} @endsection

@section('extra_css')
<style>
    .iti {
        position: relative;
        display: inline-block;
        width: 100%;
    }
</style>
@endsection

@section('content')
<!-- ============================ Hero Banner  Start================================== -->
@if ($images !== '')
<div class="featured_slick_gallery gray">
    <div class="featured_slick_gallery-slide">
        @foreach ($images as $image)
        <div class="featured_slick_padd">
            <a href="{{ asset('/storage/property/'.$image) }}" class="mfp-gallery">
                <img src="{{ asset('/storage/property/'.$image) }}" class="img-fluid mx-auto" alt="" />
            </a>
        </div>
        @endforeach
        {{-- <div class="featured_slick_padd"><a href="{{asset('/assets/img/p-2.jpg')}}" class="mfp-gallery"><img src="{{asset('/assets/img/p-2.jpg')}}" class="img-fluid mx-auto" alt="" /></a></div>
        <div class="featured_slick_padd"><a href="{{asset('/assets/img/p-3.jpg')}}" class="mfp-gallery"><img src="{{asset('/assets/img/p-3.jpg')}}" class="img-fluid mx-auto" alt="" /></a></div>
        <div class="featured_slick_padd"><a href="{{asset('/assets/img/p-4.jpg')}}" class="mfp-gallery"><img src="{{asset('/assets/img/p-4.jpg')}}" class="img-fluid mx-auto" alt="" /></a></div> --}}
    </div>
    <a href="JavaScript:Void(0);" class="btn-view-pic">View photos</a>
</div>
@endif
<!-- ============================ Hero Banner End ================================== -->

<!-- ============================ Property Detail Start ================================== -->
<section class="gray-simple">
    <div class="container">
        <div class="row">
            
            <!-- property main detail -->
            <div class="col-lg-8 col-md-12 col-sm-12">
            
                <div class="property_block_wrap style-2 p-4">
                    <div class="prt-detail-title-desc">
                        <span class="prt-types sale">For {{ ucFirst($property->for_what) }}</span>
                        <h3>{{ $property->title }}</h3>
                        <span><i class="lni-map-marker"></i> {{ $property->address }}</span>
                        <h3 class="prt-price-fix d-none">$7,600<sub>/month</sub></h3>
                        <h3 class="prt-price-fix">NGN{{ number_format($property->price) }}</h3>
                        
                        <div class="list-fx-features d-none">
                            
                            <div class="listing-card-info-icon">
                                
                                <div class="inc-fleat-icon"><img src="{{asset('/assets/img/bed.svg')}}" width="13" alt=""></div>
                               
                            </div>
                            <div class="listing-card-info-icon">
                                <div class="inc-fleat-icon"><img src="{{asset('/assets/img/bathtub.svg')}}" width="13" alt=""></div>1 Bath
                            </div>
                            <div class="listing-card-info-icon">
                                <div class="inc-fleat-icon"><img src="{{asset('/assets/img/move.svg')}}" width="13" alt=""></div>800 sqft
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                
                <!-- Single Block Wrap -->
                @if ($property_features !== '')
                
                <div class="property_block_wrap style-2">
                    
                    <div class="property_block_wrap_header">
                        <a data-bs-toggle="collapse" data-parent="#features" data-bs-target="#clOne" aria-controls="clOne" href="javascript:void(0);" aria-expanded="false"><h4 class="property_block_title">Detail & Features</h4></a>
                    </div>
                    <div id="clOne" class="panel-collapse collapse show" aria-labelledby="clOne">
                        <div class="block-body">
                            <ul class="deatil_features">
                                @foreach ($property_features as $key => $feature)
                                    @if ($feature !== 'on')
                                        <li><strong>{{ $key }}:</strong>{{ $feature }}</li> 
                                    @endif
                                    
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    
                </div>

                <!-- Checkboxes Wrap -->
                <div class="property_block_wrap style-2">
                    
                    <div class="property_block_wrap_header">
                        <a data-bs-toggle="collapse" data-parent="#amen" data-bs-target="#clThree" aria-controls="clThree" href="javascript:void(0);" aria-expanded="true">
                            <h4 class="property_block_title">Ameneties</h4>
                        </a>
                    </div>
                    
                    <div id="clThree" class="panel-collapse collapse show">
                        <div class="block-body">
                            <ul class="avl-features third color">
                                
                                @foreach ($property_features as $key => $feature)
                                    @if ($feature == 'on')
                                    <li>{{ $key }}</li>
                                    @endif
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>

                @endif
                
                <!-- Single Block Wrap -->
                @if (isset($property->description))
                <div class="property_block_wrap style-2">
                    
                    <div class="property_block_wrap_header">
                        <a data-bs-toggle="collapse" data-parent="#dsrp" data-bs-target="#clTwo" aria-controls="clTwo" href="javascript:void(0);" aria-expanded="true"><h4 class="property_block_title">Description</h4></a>
                    </div>
                    <div id="clTwo" class="panel-collapse collapse show">
                        <div class="block-body">
                            {!! $property->description !!}
                        </div>
                    </div>
                </div> 
                @endif

                <!-- Property Gallery Wrap -->
                @if ($images !== '')
                <div class="property_block_wrap style-2">
                    
                    <div class="property_block_wrap_header">
                        <a data-bs-toggle="collapse" data-parent="#clSev"  data-bs-target="#clSev" aria-controls="clOne" href="javascript:void(0);" aria-expanded="true" class="collapsed"><h4 class="property_block_title">Gallery</h4></a>
                    </div>
                    
                    <div id="clSev" class="panel-collapse collapse">
                        <div class="block-body">
                            <ul class="list-gallery-inline">
                                @foreach ($images as $image)
                                <li>
                                    <a href="{{ asset('/storage/property/'.$image) }}" class="mfp-gallery"><img src="{{ asset('/storage/property/'.$image) }}" class="img-fluid mx-auto" alt="" /></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    
                </div>
                @endif
                
                <!-- Video Wrap -->
                @if (isset($property->featured_video))
                <div class="property_block_wrap style-2">
                    
                    <div class="property_block_wrap_header">
                        <a data-bs-toggle="collapse" data-parent="#vid"  data-bs-target="#clFour" aria-controls="clFour" href="javascript:void(0);" aria-expanded="true" class="collapsed"><h4 class="property_block_title">Property video</h4></a>
                    </div>
                    
                    <div id="clFour" class="panel-collapse collapse">
                        <div class="block-body">
                            <div class="property_video">
                                <div class="thumb">
                                    <img class="pro_img img-fluid w100" src="{{asset('/assets/img/pl-6.jpg')}}" alt="7.jpg')}}">
                                    <div class="overlay_icon">
                                        <div class="bb-video-box">
                                            <div class="bb-video-box-inner">
                                                <div class="bb-video-box-innerup">
                                                    <a href="{{ $property->featured_video }}" data-bs-toggle="modal" data-bs-target="#popup-video" class="theme-cl"><i class="ti-control-play"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                @endif
                
                <!-- Floor Plan Wrap -->
                <div class="property_block_wrap style-2 d-none">
                    
                    <div class="property_block_wrap_header">
                        <a data-bs-toggle="collapse" data-parent="#floor"  data-bs-target="#clFive" aria-controls="clFive" href="javascript:void(0);" aria-expanded="true" class="collapsed"><h4 class="property_block_title">Floor Plan</h4></a>
                    </div>
                    
                    <div id="clFive" class="panel-collapse collapse">
                        <div class="block-body">
                            <div class="accordion" id="floor-option">
                                <div class="card">
                                    <div class="card-header" id="firstFloor">
                                        <h2 class="mb-0">
                                            <button type="button" class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#firstfloor" aria-controls="firstfloor">First Floor<span>740 sq ft</span></button>									
                                        </h2>
                                    </div>
                                    <div id="firstfloor" class="collapse" aria-labelledby="firstFloor" data-parent="#floor-option">
                                        <div class="card-body">
                                            <img src="{{asset('/assets/img/floor.jpg')}}" class="img-fluid" alt="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="seconfFloor">
                                        <h2 class="mb-0">
                                            <button type="button" class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#secondfloor" aria-controls="secondfloor">Second Floor<span>710 sq ft</span></button>
                                        </h2>
                                    </div>
                                    <div id="secondfloor" class="collapse" aria-labelledby="seconfFloor" data-parent="#floor-option">
                                        <div class="card-body">
                                            <img src="{{asset('/assets/img/floor.jpg')}}" class="img-fluid" alt="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="third-garage">
                                        <h2 class="mb-0">
                                            <button type="button" class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#garages" aria-controls="garages">Garage<span>520 sq ft</span></button>                     
                                        </h2>
                                    </div>
                                    <div id="garages" class="collapse" aria-labelledby="third-garage" data-parent="#floor-option">
                                        <div class="card-body">
                                            <img src="{{asset('/assets/img/floor.jpg')}}" class="img-fluid" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Google Map Location Wrap -->
                @if (isset($property->google_map_location))
                <div class="property_block_wrap style-2">
                    
                    <div class="property_block_wrap_header">
                        <a data-bs-toggle="collapse" data-parent="#loca"  data-bs-target="#clSix" aria-controls="clSix" href="javascript:void(0);" aria-expanded="true" class="collapsed"><h4 class="property_block_title">Google Map Location</h4></a>
                    </div>
                    
                    <div id="clSix" class="panel-collapse collapse">
                        <div class="block-body">
                            <div class="map-container">
                                {!! $property->google_map_location !!}
                            </div>

                        </div>
                    </div>
                    
                </div>
                @endif

                <!-- Landmark Nearby Wrap -->
                @if ($landmarks !== '')
                <div class="property_block_wrap style-2">
                    
                    <div class="property_block_wrap_header">
                        <a data-bs-toggle="collapse" data-parent="#nearby" data-bs-target="#clNine" aria-controls="clNine" href="javascript:void(0);" aria-expanded="true"><h4 class="property_block_title">Nearby</h4></a>
                    </div>
                    
                    <div id="clNine" class="panel-collapse collapse show">
                        <div class="block-body">
                            
                            <!-- Schools -->
                            <div class="nearby-wrap">
                                
                                <div class="neary_section_list">
                                    @foreach ($landmarks as $landmark)
                                    <div class="neary_section">
                                        
                                        <div class="neary_section_first">
                                            <h4 class="nearby_place_title">{{ $landmark }}</h4>
                                        </div>
                                        
                                    </div>
                                    @endforeach 
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                @endif
                
                <!-- All over Review -->
                <div class="rating-overview  d-none">
                    <div class="rating-overview-box">
                        <span class="rating-overview-box-total">4.2</span>
                        <span class="rating-overview-box-percent">out of 5.0</span>
                        <div class="star-rating" data-rating="5"><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i>
                        </div>
                    </div>

                    <div class="rating-bars">
                            <div class="rating-bars-item">
                                <span class="rating-bars-name">Service</span>
                                <span class="rating-bars-inner">
                                    <span class="rating-bars-rating high" data-rating="4.7">
                                        <span class="rating-bars-rating-inner" style="width: 85%;"></span>
                                    </span>
                                    <strong>4.7</strong>
                                </span>
                            </div>
                            <div class="rating-bars-item">
                                <span class="rating-bars-name">Value for Money</span>
                                <span class="rating-bars-inner">
                                    <span class="rating-bars-rating good" data-rating="3.9">
                                        <span class="rating-bars-rating-inner" style="width: 75%;"></span>
                                    </span>
                                    <strong>3.9</strong>
                                </span>
                            </div>
                            <div class="rating-bars-item">
                                <span class="rating-bars-name">Location</span>
                                <span class="rating-bars-inner">
                                    <span class="rating-bars-rating mid" data-rating="3.2">
                                        <span class="rating-bars-rating-inner" style="width: 52.2%;"></span>
                                    </span>
                                    <strong>3.2</strong>
                                </span>
                            </div>
                            <div class="rating-bars-item">
                                <span class="rating-bars-name">Cleanliness</span>
                                <span class="rating-bars-inner">
                                    <span class="rating-bars-rating poor" data-rating="2.0">
                                        <span class="rating-bars-rating-inner" style="width:20%;"></span>
                                    </span>
                                    <strong>2.0</strong>
                                </span>
                            </div>
                    </div>
                </div>
                <!-- All over Review -->
                
                <!-- Single Reviews Block -->
                @if (count($reviews) > 0)
                <div class="property_block_wrap style-2">
                    
                    <div class="property_block_wrap_header">
                        <a data-bs-toggle="collapse" data-parent="#rev"  data-bs-target="#clEight" aria-controls="clEight" href="javascript:void(0);" aria-expanded="true"><h4 class="property_block_title">102 Reviews</h4></a>
                    </div>
                    
                    <div id="clEight" class="panel-collapse collapse show">
                        <div class="block-body">
                            <div class="author-review">
                                <div class="comment-list">
                                    <ul>
                                        @foreach ($reviews as $review)
                                        <li class="article_comments_wrap">
                                            <article>
                                                <div class="article_comments_thumb">
                                                    <img src="{{asset('/assets/img/user-1.jpg')}}" alt="">
                                                </div>
                                                <div class="comment-details">
                                                    <div class="comment-meta">
                                                        <div class="comment-left-meta">
                                                            <h4 class="author-name">{{ $review->createdBy->name }}</h4>
                                                            <div class="comment-date">{{ $review->created_at }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p>{!! $review->review_content !!}</p>
                                                    </div>
                                                </div>
                                            </article>
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                            </div>
                            <a href="#" class="reviews-checked theme-cl d-none"><i class="fas fa-arrow-alt-circle-down mr-2"></i>See More Reviews</a>
                        </div>
                    </div>
                    
                </div>
                @endif
                
                <!-- Single Write a Review -->
                <div class="property_block_wrap style-2">
                    
                    <div class="property_block_wrap_header">
                        <a data-bs-toggle="collapse" data-parent="#comment" data-bs-target="#clTen" aria-controls="clTen" href="javascript:void(0);" aria-expanded="true"><h4 class="property_block_title">Write a Review</h4></a>
                    </div>
                    
                    <div id="clTen" class="panel-collapse collapse show">
                        <div class="block-body">
                            <div class="alert alert-success mb-3 text-center" id="review_alert" style="display: none"></div>
                            <div class="alert alert-danger mb-3 text-center" id="review_alert_error" style="display: none"></div>

                            <form class="simple-form" id="addReviewForm" action="">@csrf
                                <div class="row">
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <textarea name="review_content" id="review_content" class="form-control ht-80" placeholder="Messages"></textarea>
                                            <input type="hidden" name="property_id" value="{{$property->id}}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Your Name">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="tel" id="mobile_code" class="form-control w-100" placeholder="Phone Number" name="phone_1">
                                        </div>
                                        <input type="hidden" name="countrycode" id="countrycode">
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="email" id="email" class="form-control" placeholder="Your Email" name="email">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-theme-light rounded" type="submit">Submit Review</button>
                                        </div>
                                    </div>
                                    
                                 </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
            <!-- property Sidebar -->
            <div class="col-lg-4 col-md-12 col-sm-12">
                
                <!-- Like And Share -->
                <div class="like_share_wrap b-0">
                    <ul class="like_share_list">
                        <li><a href="JavaScript:Void(0);" class="btn btn-likes" data-toggle="tooltip" data-original-title="Share"><i class="fas fa-share"></i>Share</a></li>
                        <li><a href="JavaScript:Void(0);" class="btn btn-likes" data-toggle="tooltip" data-original-title="Save"><i class="fas fa-heart"></i>Save</a></li>
                    </ul>
                </div>
                
                <div class="details-sidebar">
                
                    <!-- Agent Detail -->
                    <div class="sides-widget">
                        <div class="sides-widget-header">
                            <div class="agent-photo"><img src="{{asset('/assets/img/user-6.jpg')}}" alt=""></div>
                            <div class="sides-widget-details">
                                <h4><a href="#">Shivangi Preet</a></h4>
                                <span><i class="lni-phone-handset"></i>(91) 123 456 7895</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="sides-widget-body simple-form">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <label>Phone No.</label>
                                <input type="text" class="form-control" placeholder="Your Phone">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control">I'm interested in this property.</textarea>
                            </div>
                            <button class="btn btn-black btn-md rounded full-width">Send Message</button>
                        </div>
                    </div>
                    
                    <!-- Mortgage Calculator -->
                    <div class="sides-widget">

                        <div class="sides-widget-header">
                            <div class="sides-widget-details">
                                <h4><a href="#">Shivangi Preet</a></h4>
                                <span>View your Interest Rate</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="sides-widget-body simple-form">
                            <div class="form-group">
                                <div class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="Sale Price">
                                    <i class="ti-money"></i>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="Down Payment">
                                    <i class="ti-money"></i>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="Loan Term (Years)">
                                    <i class="ti-calendar"></i>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="Interest Rate">
                                    <i class="fa fa-percent"></i>
                                </div>
                            </div>
                            
                            <button class="btn btn-black btn-md rounded full-width">Calculate</button>
                        
                        </div>
                    </div>
                    
                    <!-- Featured Property -->
                    <div class="sidebar-widgets">
                        
                        <h4>Featured Property</h4>
                        
                        <div class="sidebar_featured_property">
                            
                            <!-- List Sibar Property -->
                            <div class="sides_list_property">
                                <div class="sides_list_property_thumb">
                                    <img src="{{asset('/assets/img/p-1.jpg')}}" class="img-fluid" alt="">
                                </div>
                                <div class="sides_list_property_detail">
                                    <h4><a href="single-property-1.html">Loss vengel New Apartment</a></h4>
                                    <span><i class="ti-location-pin"></i>Sans Fransico</span>
                                    <div class="lists_property_price">
                                        <div class="lists_property_types">
                                            <div class="property_types_vlix sale">For Sale</div>
                                        </div>
                                        <div class="lists_property_price_value">
                                            <h4>$4,240</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- List Sibar Property -->
                            <div class="sides_list_property">
                                <div class="sides_list_property_thumb">
                                    <img src="{{asset('/assets/img/p-4.jpg')}}" class="img-fluid" alt="">
                                </div>
                                <div class="sides_list_property_detail">
                                    <h4><a href="single-property-1.html">Montreal Quriqe Apartment</a></h4>
                                    <span><i class="ti-location-pin"></i>Liverpool, London</span>
                                    <div class="lists_property_price">
                                        <div class="lists_property_types">
                                            <div class="property_types_vlix">For Rent</div>
                                        </div>
                                        <div class="lists_property_price_value">
                                            <h4>$7,380</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- List Sibar Property -->
                            <div class="sides_list_property">
                                <div class="sides_list_property_thumb">
                                    <img src="{{asset('/assets/img/p-7.jpg')}}" class="img-fluid" alt="">
                                </div>
                                <div class="sides_list_property_detail">
                                    <h4><a href="single-property-1.html">Curmic Studio For Office</a></h4>
                                    <span><i class="ti-location-pin"></i>Montreal, Canada</span>
                                    <div class="lists_property_price">
                                        <div class="lists_property_types">
                                            <div class="property_types_vlix buy">For Buy</div>
                                        </div>
                                        <div class="lists_property_price_value">
                                            <h4>$8,730</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- List Sibar Property -->
                            <div class="sides_list_property">
                                <div class="sides_list_property_thumb">
                                    <img src="{{asset('/assets/img/p-5.jpg')}}" class="img-fluid" alt="">
                                </div>
                                <div class="sides_list_property_detail">
                                    <h4><a href="single-property-1.html">Montreal Quebec City</a></h4>
                                    <span><i class="ti-location-pin"></i>Sreek View, New York</span>
                                    <div class="lists_property_price">
                                        <div class="lists_property_types">
                                            <div class="property_types_vlix">For Rent</div>
                                        </div>
                                        <div class="lists_property_price_value">
                                            <h4>$6,240</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- ============================ Property Detail End ================================== -->

<!-- ============================ Call To Action ================================== -->
<section class="theme-bg call-to-act-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="call-to-act">
                    <div class="call-to-act-head">
                        <h3>Want to Become a Real Estate Agent?</h3>
                        <span>We'll help you to grow your career and growth.</span>
                    </div>
                    <a href="#" class="btn btn-call-to-act">SignUp Today</a>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- ============================ Call To Action End ================================== -->

<!-- Video Modal -->
<div class="modal fade" id="popup-video" tabindex="-1" role="dialog" aria-labelledby="popupvideo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="popupvideo">
            <iframe class="embed-responsive-item" class="full-width" height="480" src="https://www.youtube.com/embed/{{$vParameter}}?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<!-- End Video Modal -->

@endsection

@section('extra_js')

<script>
    // -----Country Code Selection
    var input = document.querySelector("#mobile_code");
    window.intlTelInput(input, {
    // allowDropdown: false,
    // autoInsertDialCode: true,
    // autoPlaceholder: "off",
    // dropdownContainer: document.body,
    // excludeCountries: ["us"],
    // formatOnDisplay: false,
    // geoIpLookup: function(callback) {
    //   fetch("https://ipapi.co/json")
    //     .then(function(res) { return res.json(); })
    //     .then(function(data) { callback(data.country_code); })
    //     .catch(function() { callback("us"); });
    // },
    // hiddenInput: "full_number",
    // initialCountry: "auto",
    // localizedCountries: { 'de': 'Deutschland' },
    // nationalMode: false,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    // placeholderNumberType: "MOBILE",
    preferredCountries: ['ng', 'us'],
    // separateDialCode: true,
    // showFlags: false,
    utilsScript: "/assets/build/js/utils.js"
    });
    
</script>

<!---addAmenityModal--->
<script>
    //amenity Modal
   $('#addReviewForm').submit(function(e){
        e.preventDefault();
        var review_content = $("#review_content").val();
        //console.log(review_content);
        
        var countrycode = $(".iti__selected-flag").attr('title').split(': ')[1].trim();
        $('input#countrycode').val('');
        $('input#countrycode').val(countrycode);
        
        //console.log(countrycode);
        
        if (review_content != '') {

            $.ajax({
                type:'get',
                url:'/ajax-create-review',
                // data:{ category_name:category_name },
                data: $(this).serialize(),
                success:function(resp){
                    console.log(resp)
                    if (resp.status) {
                        
                        $('review_alert_error')
                        $('#review_alert').show();                   
                        $('#review_alert').text('');                   
                        $('#review_alert').text('Message Sent Successfully!');
                        review_content.val('');
                        $('#mobile_code').val();
                        $('#phone_1').val();
                        $('#email').val();

                    } else {
                        $('#review_alert_error').show();                   
                        $('#review_alert_error').text('');                   
                        $('#review_alert_error').text(resp.data);
                    } 
                        
                },error:function(){
                    alert("Error");
                }
            });
        
        } else {
            alert('Error: Something went wrong')
        }
   });
</script>
@endsection