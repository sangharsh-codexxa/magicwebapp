@extends('theme.master')
@section('title', 'Online Courses')
@section('content')
@include('admin.message')
@include('sweetalert::alert')
@section('meta_tags')
<meta name="title" content="{{ $gsetting['project_title'] }}">
<meta name="description" content="{{ $gsetting['meta_data_desc'] }} ">
<meta property="og:title" content="{{ $gsetting['project_title'] }} ">
<meta property="og:url" content="{{ url()->full() }}">
<meta property="og:description" content="{{ $gsetting['meta_data_desc'] }}">
<meta property="og:image" content="{{ asset('images/logo/'.$gsetting['logo']) }}">
<meta itemprop="image" content="{{ asset('images/logo/'.$gsetting['logo']) }}">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="{{ asset('images/logo/'.$gsetting['logo']) }}">
<meta property="twitter:title" content="{{ $gsetting['project_title'] }} ">
<meta property="twitter:description" content="{{ $gsetting['meta_data_desc'] }}">
<meta name="twitter:site" content="{{ url()->full() }}" />
<link rel="canonical" href="{{ url()->full() }}" />
<meta name="robots" content="all">
<meta name="keywords" content="{{ $gsetting->meta_data_keyword }}">


@endsection

<!-- categories-tab start-->
@if($gsetting->category_enable == 1)
<section id="categories-tab" class="categories-tab-main-block">
    <div class="container-xl">
        <div id="categories-tab-slider" class="categories-tab-block owl-carousel">

            @foreach($category as $cat)
            @if($cat->status == 1)
            <div class="item categories-tab-dtl">
                <a href="{{ route('category.page',['id' => $cat->id, 'category' => str_slug(str_replace('-','&',$cat->slug))]) }}" title="{{ $cat->title }}"><i class="fa {{ $cat->icon }}"></i>{{ $cat->title }}</a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- categories-tab end-->
@if(isset($sliders))
<section id="home-background-slider" class="background-slider-block owl-carousel">
    <div class="lazy item home-slider-img">
        @foreach($sliders as $slider)
        @if($slider->status == 1)
        <div id="home" class="home-main-block" style="background-image: url('{{ asset('images/slider/'.$slider['image']) }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 {{$slider['left'] == 1 ? 'col-md-offset-6 col-sm-offset-6 col-sm-6 col-md-6' : ''}}">
                        <div class="home-dtl">
                            <div class="home-heading">{{ $slider['heading'] }}</div>
                            <p class=" subhead btm-10">{{ $slider['sub_heading'] }}</p>
                            <p class="btm-20">{{ $slider['detail'] }}
                            <div class="slider_btn">
                                <a href="">View Courses</a>
                                <a href="">Register Now</a>

                            </div>
                        </div>

                        @if($slider->search_enable == 1)
                        <div class="home-search">
                            <form method="GET" id="searchform" action="{{ route('search') }}">
                                <div class="search">

                                    <input type="text" name="searchTerm" class="searchTerm" placeholder="{{ __('What do you want to learn?')}}">
                                    <button type="submit" class="searchButton">{{ __('Search')}}
                                    </button>

                                </div>
                            </form>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    </div>
</section>
@endif
<!-- home end -->
<!-- learning-work start -->
<!--@if(isset($facts))
<section id="learning-work" class="learning-work-main-block" style="background:#2A6AA8">
    <div class="container-xl">
        <div class="row">
            @foreach($facts as $fact)
            <div class="col-lg-4 col-md-4">
                <div class="learning-work-block">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="learning-work-icon">
                                <i class="fa {{ $fact['icon'] }}"></i>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="learning-work-dtl">
                                <div class="work-heading">{{ $fact['heading'] }}</div>
                                <p>{{ $fact['sub_heading'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif-->
<!-- learning-work end -->
<!--top course-->

<!-- Student start featured courses-->

@if( ! $cors->isEmpty())
<section id="student" class="student-main-block page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">{{ __('Courses') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="view-button txt-rgt">
                    <a href="{{ url('featuredcourse/view') }}" class="btn btn-secondary" title="View More">{{__('View
                        More')}}<i data-feather="chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="student-view-slider" class="student-view-slider-main-block owl-carousel">
            @foreach($cors as $c)
            @if($c->status == 1)
            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image @if($gsetting['course_hover'] == 0)  @endif" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block{{$c->id}}">
                    <div class="view-block">
                        <div class="view-img">
                            @if($c['preview_image'] !== NULL && $c['preview_image'] !== '')
                            <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"><img data-src="{{ asset('images/course/'.$c['preview_image']) }}" alt="course" class="img-fluid owl-lazy"></a>
                            @else
                            <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"><img data-src="{{ Avatar::create($c->title)->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
                            @endif
                        </div>
                        <!--{{-- <div class="badges bg-priamry offer-badge"><span>OFF<span><? php // echo round((($c->price - $c->discount_price) * 100) / $c->price) . '%'; 
                                                                                            ?></span></span></div> --}}-->

                        @if($c['level_tags'] == 'trending')
                        <div class="advance-badge">
                            <span class="badge bg-warning">{{__('Trending')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'featured')

                        <div class="advance-badge">
                            <span class="badge bg-danger">{{__('Featured')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'new')

                        <div class="advance-badge">
                            <span class="badge bg-success">{{__('New')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'onsale')

                        <div class="advance-badge">
                            <span class="badge bg-info">{{__('Onsale')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'bestseller')

                        <div class="advance-badge">
                            <span class="badge bg-success">{{__('Bestseller')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'beginner')

                        <div class="advance-badge">
                            <span class="badge bg-primary">{{__('Beginner')}}</span>
                        </div>
                        @endif
                        @if($c['level_tags'] == 'intermediate')

                        <div class="advance-badge">
                            <span class="badge bg-secondary">{{__('Intermediate')}}</span>
                        </div>
                        @endif
                        <div class="view-user-img">

                            @if(optional($c->user)['user_img'] !== NULL && optional($c->user)['user_img'] !== '')
                            <a href="{{ route('all/profile',$c->user->id) }}" title=""><img src="{{ asset('images/user_img/'.$c->user['user_img']) }}" class="img-fluid user-img-one" alt=""></a>
                            @else
                            <a href="{{ route('all/profile',$c->user->id) }}" title=""><img src="{{ asset('images/default/user.png') }}" class="img-fluid user-img-one" alt=""></a>
                            @endif


                        </div>

                        <div class="view-dtl">
                            <div class="view-heading"><a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}">{{
                                    str_limit($c->title, $limit = 30, $end = '...') }}</a>
                            </div>
                            <div class="user-name">
                                <h6><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>By <span><a href="{{ route('all/profile',$c->user->id) }}"> {{
                                            optional($c->user)['fname'] }}</a></span></h6>
                            </div>
                            <div class="rating">

                                <ul>
                                    <li><img src="images/logo/review.png" style="width:100px"></li>
                                    <li>
                                        <?php
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $sub_total = 0;
                                        $reviews = App\ReviewRating::where('course_id', $c->id)->get();
                                        ?>
                                        @if(!empty($reviews[0]))
                                        <?php
                                        $count =  App\ReviewRating::where('course_id', $c->id)->count();

                                        foreach ($reviews as $review) {
                                            $learn = $review->price * 5;
                                            $price = $review->price * 5;
                                            $value = $review->value * 5;
                                            $sub_total = $sub_total + $learn + $price + $value;
                                        }

                                        $count = ($count * 3) * 5;
                                        $rat = $sub_total / $count;
                                        $ratings_var = ($rat * 100) / 5;
                                        ?>

                                        <div class="pull-left">
                                            <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>


                                        @else
                                        <div class="pull-left">{{ __('No Rating') }}</div>
                                        @endif
                                    </li>
                                    <!-- overall rating-->
                                    <?php
                                    $learn = 0;
                                    $price = 0;
                                    $value = 0;
                                    $sub_total = 0;
                                    $count =  count($reviews);
                                    $onlyrev = array();

                                    $reviewcount = App\ReviewRating::where('course_id', $c->id)->WhereNotNull('review')->get();

                                    foreach ($reviews as $review) {

                                        $learn = $review->learn * 5;
                                        $price = $review->price * 5;
                                        $value = $review->value * 5;
                                        $sub_total = $sub_total + $learn + $price + $value;
                                    }

                                    $count = ($count * 3) * 5;

                                    if ($count != "") {
                                        $rat = $sub_total / $count;

                                        $ratings_var = ($rat * 100) / 5;

                                        $overallrating = ($ratings_var / 2) / 10;
                                    }

                                    ?>

                                    @php
                                    $reviewsrating = App\ReviewRating::where('course_id', $c->id)->first();
                                    @endphp
                                    @if(!empty($reviewsrating))
                                    <!-- <li>
                                            <b>{{ round($overallrating, 1) }}</b>
                                        </li> -->
                                    @endif
                                    <li class="reviews">
                                        (@php
                                        $data = App\ReviewRating::where('course_id', $c->id)->count();
                                        if($data>0){

                                        echo $data;
                                        }
                                        else{

                                        echo "0";
                                        }
                                        @endphp Reviews)
                                    </li>

                                </ul>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="des-btn-block">
                                        <a class="btn btn-primary" style="padding: 0.375rem 0.75rem;" href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}">
                                            View Details
                                        </a>
                                        </div>
                                        <!--<div class="count-user">
                                            <i data-feather="user"></i><span>
                                                @php
                                                $data = App\Order::where('course_id', $c->id)->count();
                                                if(($data)>0){

                                                echo $data;
                                                }
                                                else{

                                                echo "0";
                                                }
                                                @endphp</span>
                                        </div>-->
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        @if( $c->type == 1)
                                        <div class="rate text-right">
                                            <ul>

                                                @if($c->discount_price == !NULL)

                                                <li><a><b>{{ activeCurrency()->getData()->position == 'l' ?
                                                            activeCurrency()->getData()->symbol :'' }}{{ price_format(
                                                            currency($c['discount_price'], $from = $currency->code, $to
                                                            = Session::has('changed_currency') ?
                                                            Session::get('changed_currency') : $currency->code, $format
                                                            = false)) }}{{ activeCurrency()->getData()->position == 'r'
                                                            ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>

                                                <li><a><b><strike>{{ activeCurrency()->getData()->position == 'l' ?
                                                                activeCurrency()->getData()->symbol :'' }}{{
                                                                price_format( currency($c['price'], $from =
                                                                $currency->code, $to = Session::has('changed_currency')
                                                                ? Session::get('changed_currency') : $currency->code,
                                                                $format = false) ) }}{{
                                                                activeCurrency()->getData()->position == 'r' ?
                                                                activeCurrency()->getData()->symbol :''
                                                                }}</strike></b></a>
                                                </li>


                                                @else

                                                @if($c->price == !NULL)
                                                <li><a><b>{{ activeCurrency()->getData()->position == 'l' ?
                                                            activeCurrency()->getData()->symbol :'' }}{{ price_format(
                                                            currency($c['price'], $from = $currency->code, $to =
                                                            Session::has('changed_currency') ?
                                                            Session::get('changed_currency') : $currency->code, $format
                                                            = false) ) }}{{ activeCurrency()->getData()->position == 'r'
                                                            ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>
                                                @endif

                                                @endif
                                            </ul>
                                        </div>
                                        @else
                                        <div class="rate text-right">
                                            <ul>
                                                <li><a><b>{{ __('Free') }}</b></a></li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="img-wishlist">
                                <div class="protip-wishlist">
                                    <ul>

                                        
                                        @if(Auth::check())

                                       
                                        @php
                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',
                                        $c->id)->first();
                                        @endphp
                                        @if ($wish == NULL)
                                        <li class="protip-wish-btn">
                                            <form id="demo-form2" method="post" action="{{ url('show/wishlist', $c->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$c->id}}" />

                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @else
                                        <li class="protip-wish-btn-two">
                                            <form id="demo-form2" method="post" action="{{ url('remove/wishlist', $c->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$c->id}}" />

                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist" type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @endif
                                        @else
                                        <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i data-feather="heart"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- <div id="prime-next-item-description-block{{$c->id}}" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading">{{ $c['title'] }}    sr testing pro tip</h5>
                            <div class="main-des">
                                <p>Last Updated: {{ date('jS F Y', strtotime($c->updated_at)) }}</p>
                            </div>

                            <ul class="description-list">
                                <li>
                                    <i data-feather="play-circle"></i>
                                    <div class="class-des">
                                        {{ __('Classes') }}:
                                        @php
                                        $data = App\CourseClass::where('course_id', $c->id)->count();
                                        if($data > 0){

                                        echo $data;
                                        }
                                        else{

                                        echo "0";
                                        }
                                        @endphp
                                    </div>
                                </li>
                                &nbsp;
                                <li>
                                    <div>
                                        <div class="time-des">
                                            <span class="">
                                                <i data-feather="clock"></i>
                                                @php

                                                $classtwo = App\CourseClass::where('course_id',
                                                $c->id)->sum("duration");

                                                @endphp
                                                {{ $classtwo }} Minutes
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="lang-des">
                                        @if($c['language_id'] == !NULL)
                                        @if(isset($c->language))
                                        <i data-feather="globe"></i> {{ $c->language['name'] }}
                                        @endif
                                        @endif
                                    </div>
                                </li>

                            </ul>

                            <div class="product-main-des">
                                <p>{{ $c->short_detail }}</p>
                            </div>
                            <div>
                                @if($c->whatlearns->isNotEmpty())
                                @foreach($c->whatlearns as $wl)
                                @if($wl->status ==1)
                                <div class="product-learn-dtl">
                                    <ul>
                                        <li><i data-feather="check-circle"></i>{{ str_limit($wl['detail'], $limit = 120,
                                            $end = '...') }}
                                        </li>
                                    </ul>
                                </div>
                                @endif
                                @endforeach
                                @endif
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-8">
                                        @if($c->type == 1)
                                        @if(Auth::check())
                                        @if(Auth::User()->role == "admin")
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}" class="btn btn-secondary" title="course">{{ __('Go To Course') }}</a>
                                        </div>
                                        @else
                                        @php
                                        $order = App\Order::where('user_id', Auth::User()->id)->where('course_id',
                                        $c->id)->first();
                                        @endphp
                                        @if(!empty($order) && $order->status == 1)
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}" class="btn btn-secondary" title="course">{{ __('Go To Course') }}</a>
                                        </div>
                                        @else
                                        @php
                                        $cart = App\Cart::where('user_id', Auth::User()->id)->where('course_id',
                                        $c->id)->first();
                                        @endphp
                                        @if(!empty($cart))
                                        <div class="protip-btn">
                                            <form id="demo-form2" method="post" action="{{ route('remove.item.cart',$cart->id) }}">
                                                {{ csrf_field() }}

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">{{ __('Remove From
                                                        Cart') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                        @else
                                        <div class="protip-btn">
                                            <form id="demo-form2" method="post" action="{{ route('addtocart',['course_id' => $c->id, 'price' => $c->price, 'discount_price' => $c->discount_price ]) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="category_id" value="{{$c->category['id'] ?? '-'}}" />

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary"><i data-feather="shopping-cart"></i>{{ __('Add To Cart')
                                                        }}</button>
                                                </div>
                                            </form>
                                        </div>
                                        @endif
                                        @endif
                                        @endif
                                        @else
                                        @if($gsetting->guest_enable == 1)
                                        <form id="demo-form2" method="post" action="{{ route('guest.addtocart', $c->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                            {{ csrf_field() }}


                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;{{ __('Add To Cart')
                                                    }}</button>
                                            </div>
                                        </form>

                                        @else

                                        <div class="protip-btn">
                                            <a href="{{ route('login') }}" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;{{ __('Add To Cart') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                        @else
                                        @if(Auth::check())
                                        @if(Auth::User()->role == "admin")
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}" class="btn btn-secondary" title="course">{{ __('Go To Course') }}</a>
                                        </div>
                                        @else
                                        @php
                                        $enroll = App\Order::where('user_id', Auth::User()->id)->where('course_id',
                                        $c->id)->first();
                                        @endphp
                                        @if($enroll == NULL)
                                        <div class="protip-btn">
                                            <a href="{{url('enroll/show',$c->id)}}" class="btn btn-primary" title="Enroll Now"><i data-feather="shopping-cart"></i>{{ __('Enroll
                                                Now') }}</a>
                                        </div>
                                        @else
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $c->id, 'slug' => $c->slug ]) }}" class="btn btn-secondary" title="Cart">{{ __('Go To Course') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                        @else
                                        <div class="protip-btn">
                                            <a href="{{ route('login') }}" class="btn btn-primary" title="Enroll Now"><i data-feather="shopping-cart"></i>{{ __('Enroll Now') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="img-wishlist">
                                            <div class="protip-wishlist">
                                                <ul>
                                                    @if(Auth::check())

                                                    @php
                                                    $wish = App\Wishlist::where('user_id',
                                                    Auth::User()->id)->where('course_id', $c->id)->first();
                                                    @endphp
                                                    @if ($wish == NULL)
                                                    <li class="protip-wish-btn">
                                                        <form id="demo-form2" method="post" action="{{ url('show/wishlist', $c->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                            <input type="hidden" name="course_id" value="{{$c->id}}" />

                                                            <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart"></i></button>
                                                        </form>
                                                    </li>
                                                    @else
                                                    <li class="protip-wish-btn-two">
                                                        <form id="demo-form2" method="post" action="{{ url('remove/wishlist', $c->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                            <input type="hidden" name="course_id" value="{{$c->id}}" />

                                                            <button class="wishlisht-btn heart-fill" title="Remove from Wishlist" type="submit"><i data-feather="heart"></i></button>
                                                        </form>
                                                    </li>
                                                    @endif
                                                    @else
                                                    <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i data-feather="heart"></i></a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            @endif
            @endforeach
        </div>

    </div>
</section>
<style>
    .riskwala .challenges .item-col {
        position: relative;
        max-width: 600px;
        width: 90%;
        height: 400px;
        background: #fff;
        box-shadow: 0 0 15px rgba(0, 0, 0, .1);
    }

    /* common */
    .ribbon {
        width: 100px;
        height: 100px;
        overflow: hidden;
        position: absolute;
        z-index: 2;
    }

    .ribbon::before,
    .ribbon::after {
        position: absolute;
        z-index: -1;
        content: '';
        display: block;
        border: 5px solid #f8ba00;
    }

    .ribbon span {
        position: absolute;
        display: block;
        width: 138px;
        padding: 15px 0;
        background-color: #f8ba00;
        box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
        color: #000;
        font: 600 14px/1 'Lato', sans-serif;
        text-shadow: 0 1px 1px rgb(0 0 0 / 20%);
        text-transform: uppercase;
        text-align: center;
    }

    /* top left*/
    .ribbon-top-left {
        top: -10px;
        left: -10px;
    }

    .ribbon-top-left::before,
    .ribbon-top-left::after {
        border-top-color: transparent;
        border-left-color: transparent;
    }

    .ribbon-top-left::before {
        top: 0;
        right: 0;
    }

    .ribbon-top-left::after {
        bottom: 0;
        left: 0;
    }

    .ribbon-top-left span {
        right: -4px;
        top: 15px;
        transform: rotate(-45deg);
    }
</style>
<!--FIRST STEP RISK-->
<div class="page-section riskwala" id="transforming">
    <div class="container wide3">
        <div class="content-element6">
            <div class="align-center" style="text-align:center;">
                <h2>Take The First Step Risk - Free</h2>
                <p class="text-size-medium">If you are just beginning your journey and are looking for a place to begin,
                    you are at the eight place!.</p>
                <p class="text-size-medium" style="font-style:italic">Choose any of these transformational courses,
                    priced incredibly low to keep them accessible, to begin your empowerment journey.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">{{ __('Workshop') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="view-button txt-rgt">
                    <a href="{{ url('workshopsdata/view') }}" class="btn btn-secondary" title="View More">{{__('View
                        More')}}<i data-feather="chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="challenges masonry flex-row item-col-2">
            @foreach($workshops as $workshop)

            @php
            $days = Carbon\Carbon::parse($workshop->end_date)->diffInDays(Carbon\Carbon::parse($workshop->start_date));
            <!-- $days = Carbon\Carbon::parse($workshop->end_date)->diffInDays(Carbon\Carbon::parse($workshop->start_date)); -->

         
            @endphp
            <div class="item-col full-size">
                <div class="ribbon ribbon-top-left"><span>{{$days}} days</span></div>
                <div class="challenge-item">
                    <div class="bg-img" data-bg="{{asset('images/workshop/'.$workshop['image'])}}" style="background-image: url(&quot;{{asset('images/workshop/'.$workshop['image'])}}&quot;);background-position: center;">
                    </div>
                    <a href="#" class="link"></a>
                    <div class="inner">
                        <h3 class="item-title"><a href="#">{{$workshop->title}}</a></h3>

                        <p style="color:#fff " class="limit">{{$workshop->description}}</p>

                        <a href="#" class="item-country">ONLINE | WHATSAPP</a>

                        <h3 class="item-title"><a href="#">{{activeCurrency()->getData()->position == 'l'
                                                            ? activeCurrency()->getData()->symbol : '' }} {{ price_format($workshop->fee)}}</a></h3>

                        <div class="butns">
                            <a href="{{url('workshop') . '/' . $workshop['id'] }}/details">Book Now</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!-- Students end -->
@if(isset($advs))
@foreach($advs as $adv)
@if($adv->position == 'belowslider')
<br>
<section id="student" class="student-main-block top-40">
    <div class="container">
        <a href="{{ $adv->url1 }}" title="{{ __('Click to visit') }}">

        </a>
    </div>
</section>
@endif
@endforeach
@endif

<!-- Student start -->
@if(Auth::check())
@if($hsetting->recentcourse_enable == 1 && isset($recent_course_id) && isset($recent_course) &&
optional($recent_course)->status == 1)
<section id="student" class="student-main-block top-40">
    <div class="container">

        @if($total_count >= '0')
        <h4 class="student-heading">{{ __('Recently Viewed Courses') }}</h4>
        <div id="recent-courses-slider" class="student-view-slider-main-block owl-carousel">
            @foreach($recent_course_id as $view)
            @php

            $recent_course = App\Course::where('id', $view)->with('user')->first();

            @endphp
            @if(isset($recent_course))

            @if($recent_course->status == 1)
            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image">
                    <div class="view-block">
                        <div class="view-img">
                            @if($recent_course['preview_image'] !== NULL && $recent_course['preview_image'] !== '')
                            <a href="{{ route('user.course.show',['id' => $recent_course->id, 'slug' => $recent_course->slug ]) }}"><img data-src="{{ asset('images/course/'.$recent_course['preview_image']) }}" alt="course" class="img-fluid owl-lazy"></a>
                            @else
                            <a href="{{ route('user.course.show',['id' => $recent_course->id, 'slug' => $recent_course->slug ]) }}"><img data-src="{{ Avatar::create($recent_course->title)->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
                            @endif
                        </div>
                        @if($recent_course['level_tags'] == 'trending')
                        <div class="advance-badge">
                            <span class="badge bg-warning">{{__('Trending')}}</span>
                        </div>
                        @endif
                        @if($recent_course['level_tags'] == 'featured')

                        <div class="advance-badge">
                            <span class="badge bg-danger">{{__('Featured')}}</span>
                        </div>
                        @endif
                        @if($recent_course['level_tags'] == 'new')

                        <div class="advance-badge">
                            <span class="badge bg-success">{{__('New')}}</span>
                        </div>
                        @endif
                        @if($recent_course['level_tags'] == 'onsale')

                        <div class="advance-badge">
                            <span class="badge bg-info">{{__('On-sale')}}</span>
                        </div>
                        @endif
                        @if($recent_course['level_tags'] == 'bestseller')

                        <div class="advance-badge">
                            <span class="badge bg-success">{{__('Bestseller')}}</span>
                        </div>
                        @endif
                        @if($recent_course['level_tags'] == 'beginner')

                        <div class="advance-badge">
                            <span class="badge bg-primary">{{__('Beginner')}}</span>
                        </div>
                        @endif
                        @if($recent_course['level_tags'] == 'intermediate')

                        <div class="advance-badge">
                            <span class="badge bg-secondary">{{__('Intermediate')}}</span>
                        </div>
                        @endif

                        <div class="view-user-img">

                            @if($recent_course->user['user_img'] !== NULL && $recent_course->user['user_img'] !== '')
                            <a href="{{ route('all/profile',$recent_course->user->id) }}" title=""><img src="{{ asset('images/user_img/'.$recent_course->user['user_img']) }}" class="img-fluid user-img-one" alt=""></a>
                            @else
                            <a href="{{ route('all/profile',$recent_course->user->id) }}" title=""><img src="{{ asset('images/default/user.png') }}" class="img-fluid user-img-one" alt=""></a>
                            @endif
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading"><a href="{{ route('user.course.show',['id' => $recent_course->id, 'slug' => $recent_course->slug ]) }}">{{
                                    str_limit($recent_course->title, $limit = 30, $end = '...') }}</a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="{{ route('all/profile',$recent_course->user->id) }}"> {{
                                            optional($recent_course->user)['fname'] }}</a></span></h6>
                            </div>
                            <div class="rating">
                                <ul>
                                    <li>
                                        <?php
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $sub_total = 0;
                                        $reviews = App\ReviewRating::where('course_id', $recent_course->id)->get();
                                        ?>
                                        @if(!empty($reviews[0]))
                                        <?php
                                        $count =  App\ReviewRating::where('course_id', $recent_course->id)->count();

                                        foreach ($reviews as $review) {
                                            $learn = $review->price * 5;
                                            $price = $review->price * 5;
                                            $value = $review->value * 5;
                                            $sub_total = $sub_total + $learn + $price + $value;
                                        }

                                        $count = ($count * 3) * 5;
                                        $rat = $sub_total / $count;
                                        $ratings_var = ($rat * 100) / 5;
                                        ?>

                                        <div class="pull-left">
                                            <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>


                                        @else
                                        <div class="pull-left">{{ __('No Rating') }}</div>
                                        @endif
                                    </li>
                                    <!-- overall rating-->
                                    <?php
                                    $learn = 0;
                                    $price = 0;
                                    $value = 0;
                                    $sub_total = 0;
                                    $count =  count($reviews);
                                    $onlyrev = array();

                                    $reviewcount = App\ReviewRating::where('course_id', $recent_course->id)->WhereNotNull('review')->get();

                                    foreach ($reviews as $review) {

                                        $learn = $review->learn * 5;
                                        $price = $review->price * 5;
                                        $value = $review->value * 5;
                                        $sub_total = $sub_total + $learn + $price + $value;
                                    }

                                    $count = ($count * 3) * 5;

                                    if ($count != "") {
                                        $rat = $sub_total / $count;

                                        $ratings_var = ($rat * 100) / 5;

                                        $overallrating = ($ratings_var / 2) / 10;
                                    }

                                    ?>

                                    @php
                                    $reviewsrating = App\ReviewRating::where('course_id', $recent_course->id)->first();
                                    @endphp
                                    <!-- @if(!empty($reviewsrating))
                                        <li>
                                            <b>{{ round($overallrating, 1) }}</b>
                                        </li>
                                        @endif -->

                                    <li class="reviews">
                                        (@php
                                        $data = App\ReviewRating::where('course_id', $recent_course->id)->count();
                                        if($data>0){

                                        echo $data;
                                        }
                                        else{

                                        echo "0";
                                        }
                                        @endphp Reviews)
                                    </li>
                                </ul>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="count-user">
                                            <i data-feather="user"></i><span>
                                                @php
                                                $data = App\Order::where('course_id', $recent_course->id)->count();
                                                if(($data)>0){

                                                echo $data;
                                                }
                                                else{

                                                echo "0";
                                                }
                                                @endphp</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        @if( $recent_course->type == 1)
                                        <div class="rate text-right">
                                            <ul>

                                                @if($recent_course->discount_price == !NULL)

                                                <li><a><b>
                                                            {{ currency($recent_course->discount_price, $from =
                                                            $currency->code, $to = Session::has('changed_currency') ?
                                                            Session::get('changed_currency') : $currency->code, $format
                                                            = true) }}
                                                        </b></a>
                                                </li>

                                                <li><a><b><strike>{{ currency($recent_course->price, $from =
                                                                $currency->code, $to = Session::has('changed_currency')
                                                                ? Session::get('changed_currency') : $currency->code,
                                                                $format = true) }}</strike></b></a>
                                                </li>


                                                @else
                                                <li><a><b>
                                                            {{ currency($recent_course->price, $from = $currency->code,
                                                            $to = Session::has('changed_currency') ?
                                                            Session::get('changed_currency') : $currency->code, $format
                                                            = true) }}</b></a>
                                                </li>


                                                @endif
                                            </ul>
                                        </div>
                                        @else
                                        <div class="rate text-right">
                                            <ul>
                                                <li><a><b>{{ __('Free') }}</b></a></li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="img-wishlist">
                                <div class="protip-wishlist">
                                    <ul>
                                        @if(Auth::check())
                                        @php
                                        $wish = App\Wishlist::where('user_id', auth()->user()->id)->where('course_id',
                                        $recent_course->id)->first();
                                        @endphp
                                        @if ($wish == NULL)
                                        <li class="protip-wish-btn">
                                            <form id="demo-form2" method="post" action="{{ url('show/wishlist', $recent_course->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$recent_course->id}}" />

                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart" class="rgt-10"></i></button>
                                            </form>
                                        </li>
                                        @else
                                        <li class="protip-wish-btn-two">
                                            <form id="demo-form2" method="post" action="{{ url('remove/wishlist', $recent_course->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$recent_course->id}}" />

                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist" type="submit"><i data-feather="heart" class="rgt-10"></i></button>
                                            </form>
                                        </li>
                                        @endif
                                        @else
                                        <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i data-feather="heart" class="rgt-10"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endif
            @endif
            @endforeach
        </div>
        @endif

    </div>
</section>
@endif
@endif
<!-- Students end -->
<!-- Student start -->
@if(Auth::check())
@php
if(Schema::hasColumn('orders', 'refunded')){
$enroll = App\Order::where('refunded', '0')->where('user_id', auth()->user()->id)->where('status',
'1')->with('courses')->with(['user','courses.user'] )->get();
}
else{
$enroll = NULL;
}
@endphp
@if($hsetting->purchase_enable == 1 && isset($enroll))
<section id="student" style="display:none;" class="student-main-block top-40">
    <div class="container-xl">
        @if(count($enroll) > 0)
        <h4 class="student-heading" style="display:none;">{{ __('My Purchased Courses') }}</h4>
        <div id="my-courses-slider" class="student-view-slider-main-block owl-carousel">
            @foreach($enroll as $enrol)
            @if(isset($enrol->courses) && $enrol->courses['status'] == 1 )
            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image">
                    <div class="view-block">
                        <div class="view-img">
                            @if($enrol->courses['preview_image'] !== NULL && $enrol->courses['preview_image'] !== '')
                            <a href="{{ route('course.content',['id' => $enrol->courses->id, 'slug' => $enrol->courses->slug ]) }}"><img data-src="{{ asset('images/course/'.$enrol->courses['preview_image']) }}" alt="course" class="img-fluid owl-lazy"></a>
                            @else
                            <a href="{{ route('course.content',['id' => $enrol->courses->id, 'slug' => $enrol->courses->slug ]) }}"><img data-src="{{ Avatar::create($enrol->courses->title)->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
                            @endif
                        </div>
                        <div class="view-user-img">

                            @if($enrol->user['user_img'] !== NULL && $enrol->user['user_img'] !== '')
                            <a href="{{ route('all/profile',$enrol->user->id) }}" title=""><img src="{{ asset('images/user_img/'.$enrol->user['user_img']) }}" class="img-fluid user-img-one" alt=""></a>
                            @else
                            <a href="{{ route('all/profile',$enrol->user->id) }}" title=""><img src="{{ asset('images/default/user.png') }}" class="img-fluid user-img-one" alt=""></a>
                            @endif
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading"><a href="{{ route('course.content',['id' => $enrol->courses->id, 'slug' => $enrol->courses->slug ]) }}">{{
                                    str_limit($enrol->courses->title, $limit = 30, $end = '...') }}</a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="{{ route('all/profile',$enrol->user->id) }}"> {{
                                            optional($enrol->user)['fname'] }}</a></span></h6>
                            </div>
                            <div class="rating">
                                <ul>
                                    <li>
                                        <?php
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $sub_total = 0;
                                        $reviews = App\ReviewRating::where('course_id', $enrol->courses->id)->get();
                                        ?>
                                        @if(!empty($reviews[0]))
                                        <?php
                                        $count =  App\ReviewRating::where('course_id', $enrol->courses->id)->count();

                                        foreach ($reviews as $review) {
                                            $learn = $review->price * 5;
                                            $price = $review->price * 5;
                                            $value = $review->value * 5;
                                            $sub_total = $sub_total + $learn + $price + $value;
                                        }

                                        $count = ($count * 3) * 5;
                                        $rat = $sub_total / $count;
                                        $ratings_var = ($rat * 100) / 5;
                                        ?>

                                        <div class="pull-left">
                                            <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>


                                        @else
                                        <div class="pull-left">{{ __('No Rating') }}</div>
                                        @endif
                                    </li>
                                    <!-- overall rating-->
                                    <?php
                                    $learn = 0;
                                    $price = 0;
                                    $value = 0;
                                    $sub_total = 0;
                                    $count =  count($reviews);
                                    $onlyrev = array();

                                    $reviewcount = App\ReviewRating::where('course_id', $enrol->courses->id)->WhereNotNull('review')->get();

                                    foreach ($reviews as $review) {

                                        $learn = $review->learn * 5;
                                        $price = $review->price * 5;
                                        $value = $review->value * 5;
                                        $sub_total = $sub_total + $learn + $price + $value;
                                    }

                                    $count = ($count * 3) * 5;

                                    if ($count != "") {
                                        $rat = $sub_total / $count;

                                        $ratings_var = ($rat * 100) / 5;

                                        $overallrating = ($ratings_var / 2) / 10;
                                    }

                                    ?>

                                    @php
                                    $reviewsrating = App\ReviewRating::where('course_id', $enrol->courses->id)->first();
                                    @endphp

                                    <li class="reviews">
                                        (@php
                                        $data = App\ReviewRating::where('course_id', $enrol->courses->id)->count();
                                        if($data>0){

                                        echo $data;
                                        }
                                        else{

                                        echo "0";
                                        }
                                        @endphp Reviews)
                                    </li>
                                </ul>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="count-user">
                                            <i data-feather="user"></i><span>
                                                @php
                                                $data = App\Order::where('course_id', $enrol->courses->id)->count();
                                                if(($data)>0){

                                                echo $data;
                                                }
                                                else{

                                                echo "0";
                                                }
                                                @endphp</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        @if( $enrol->courses->type == 1)
                                        <div class="rate text-right">
                                            <ul>


                                                @if($enrol->courses->discount_price == !NULL)

                                                <li><a><b>{{ activeCurrency()->getData()->position == 'l' ?
                                                            activeCurrency()->getData()->symbol :'' }} {{ price_format(
                                                            currency($enrol->courses->discount_price, $from =
                                                            $currency->code, $to = Session::has('changed_currency') ?
                                                            Session::get('changed_currency') : $currency->code, $format
                                                            = false)) }} {{ activeCurrency()->getData()->position == 'r'
                                                            ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>

                                                <li><a><b><strike>{{ activeCurrency()->getData()->position == 'l' ?
                                                                activeCurrency()->getData()->symbol :'' }} {{
                                                                price_format( currency($enrol->courses->price, $from =
                                                                $currency->code, $to = Session::has('changed_currency')
                                                                ? Session::get('changed_currency') : $currency->code,
                                                                $format = false)) }} {{
                                                                activeCurrency()->getData()->position == 'r' ?
                                                                activeCurrency()->getData()->symbol :''
                                                                }}</strike></b></a>
                                                </li>




                                                @else

                                                <li><a><b>
                                                            {{ activeCurrency()->getData()->position == 'l' ?
                                                            activeCurrency()->getData()->symbol :'' }} {{ price_format(
                                                            currency($enrol->courses->price, $from = $currency->code,
                                                            $to = Session::has('changed_currency') ?
                                                            Session::get('changed_currency') : $currency->code, $format
                                                            = false)) }} {{ activeCurrency()->getData()->position == 'r'
                                                            ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>

                                                @endif
                                            </ul>
                                        </div>
                                        @else
                                        <div class="rate text-right">
                                            <ul>
                                                <li><a><b>{{ __('Free') }}</b></a></li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            @endif
            @endforeach
        </div>
        @endif

    </div>
</section>
@endif
@endif
<!-- Students end -->
<!--top courses end-->
<!--WHAT A MAGIC COURSE BRINGS YOU-->
<!--  -->
<div id="what_a_magic" class="page-section half-bg-col var2">
    <div class="container wide3">
        <div class="content-element5">
            <h2 class="section-title" style="text-align:center;">What A Magic Course Brings You</h2>
        </div>
        <div class="row align-content-center">
            <div class="col-lg-6">
                <div class="icons-box style-1 type-2">
                    <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->
                    <div class="icons-wrap">
                        <div class="icons-item">
                            <div class="item-box">
                                <i> <img class="svg" src="images/logo/knowledge.png" alt=""></i>
                                <h5 class="icons-box-title">Learning at your own pace</h5>
                                <p>Enjoy learning from anywhere without a set schedule
                                    and with an easy-to-follow method. You set your own
                                    pace.</p><br>
                            </div>
                        </div>
                    </div>
                    <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->
                    <div class="icons-wrap">
                        <div class="icons-item">
                            <div class="item-box">
                                <i> <img class="svg" src="images/logo/admission.png" alt=""></i>
                                <h5 class="icons-box-title">Front-row seats to great content</h5>
                                <p>A high-quality online learning experience with content
                                    developed in-house as well as curated from around
                                    the world. Grab your seat and get started!</p>
                            </div>
                        </div>
                    </div>
                    <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->
                    <div class="icons-wrap">

                        <div class="icons-item">
                            <div class="item-box">
                                <i> <img class="svg" src="images/logo/teacher.png" alt=""></i>
                                <h5 class="icons-box-title">Teaching from the best professionals</h5>
                                <p>Learn valuable methods and techniques explained by
                                    top experts in the healing, well-being, and personal
                                    growth sector.</p>
                            </div>
                        </div>

                    </div>
                    <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->
                    <div class="icons-wrap">
                        <div class="icons-item">
                            <div class="item-box">
                                <i> <img class="svg" src="images/logo/idea-exchange.png" alt=""></i>
                                <h5 class="icons-box-title">Sharing of knowledge and ideass</h5>
                                <p>Ask questions, request feedback, or offer solutions.
                                    Share your learning experience with other students in
                                    the community who are as passionate about healing,
                                    transforming, and happiness as you are.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="icons-box style-1 type-2">
                    <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->
                    <div class="icons-wrap">
                        <div class="icons-item">
                            <div class="item-box">
                                <i> <img class="svg" src="images/logo/rating.png" alt=""></i>
                                <h5 class="icons-box-title">Meeting expert healers and guides</h5>
                                <p>Each expert teaches what they do best, with clear
                                    guidelines, and shares their wisdom gathered with
                                    their professional experience.</p>
                            </div>
                        </div>
                    </div>
                    <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->
                    <div class="icons-wrap">
                        <div class="icons-item">
                            <div class="item-box">
                                <i> <img class="svg" src="images/logo/communities.png" alt=""></i>
                                <h5 class="icons-box-title">Connection with a global community</h5>
                                <p>Our community is home to millions of people from
                                    around the world who are curious and passionate
                                    about exploring and expressing their creativity.</p>
                            </div>
                        </div>
                    </div>
                    <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->
                    <div class="icons-wrap">

                        <div class="icons-item">
                            <div class="item-box">
                                <i> <img class="svg" src="images/logo/certificate.png" alt=""></i>
                                <h5 class="icons-box-title">Earn a certificate with every course</h5>
                                <p>Get a custom certificate signed by your teacher for
                                    every course. Share it on your portfolio, social media,
                                    or wherever you like.</p>
                            </div>
                        </div>

                    </div>
                    <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->
                    <div class="icons-wrap">
                        <div class="icons-item">
                            <div class="item-box">
                                <i> <img class="svg" src="images/logo/career.png" alt=""></i>
                                <h5 class="icons-box-title">Wide range of personal growth tools</h5>
                                <p>Magics courses and workshop roster and designs
                                    and delivers every course in-house. With unlimited
                                    access, you can go through the sessions as many
                                    times as you need to perfect your understanding.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page section -->
<!--WHAT A MAGIC COURSE BRINGS YOU-->

<!--transforming-->
<div class="page-section" id="transforming">
    <div class="container wide3">
        <div class="content-element6">
            <div class="align-center" style="text-align:center;">
                <h2>Your Transformation Starts Here</h2>
                <p class="text-size-medium">Transformative, long-term courses for people who are really serious about
                    their personal growth.</p>
                <p class="text-size-medium" style="font-style:italic">Needs serious commitment to transformation. Not
                    for the faint-hearted!</p>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="view-button txt-rgt">
                    <a href="{{ url('shortcourse/view') }}" class="btn btn-secondary" title="View More">{{__('View
                        More')}}<i data-feather="chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="challenges masonry flex-row item-col-2">
        @php

        @endphp
        @foreach($shortcorses as $shortcourse)


            <div class="item-col full-size">
                <div class="challenge-item">
                    <div class="bg-img" data-bg="{{ asset('images/course/'.$shortcourse['preview_image']) }}" style="background-image: url('images/course/{{$shortcourse['preview_image']}}');background-position: center;">
                    </div>
                    <a href="#" class="link"></a>
                    <div class="inner">
                        <h3 class="item-title"><a href="#">{{$shortcourse->title;}}</a></h3>
                        <p style="color:#fff" class="limit">{{$shortcourse->short_detail}}</p>
                        <a href="#" class="item-country">ONLINE + OFFLINE | WHATSAPP</a>
                        <h3 class="item-title"><a href="#">&#x20B9 {{$shortcourse->price}}</a></h3>
                        <div class="butns">
                            <a href="{{ route('user.course.show',['id' => $shortcourse->id, 'slug' => $shortcourse->slug ]) }}">Enroll Now</a>
                        </div>
                        <div class="more_btn">
                            <a href="">More Details</a>
                        </div>
                    </div>
                </div>
            </div>

         @endforeach   

            <!-- <div class="item-col full-size">
                <div class="challenge-item">
                    <div class="bg-img" data-bg="images/logo/608x598_img1.jpg" style="background-image: url(&quot;images/logo/608x598_img1.jpg&quot;);background-position: center;">
                    </div>
                    <a href="#" class="link"></a>
                    <div class="inner">
                        <h3 class="item-title"><a href="#">Well-Being For Self</a></h3>
                        <p style="color:#fff" class="limit">A powerful program that empowers
                            you to take care of your mental wellbeing
                            no matter what is happening
                            around you.</p>
                        <a href="#" class="item-country">ONLINE + OFFLINE | WHATSAPP</a>
                        <h3 class="item-title"><a href="#">&#x20B9 90,000</a></h3>
                        <div class="butns">
                            <a href="#">Enroll Now</a>
                        </div>
                        <div class="more_btn">
                            <a href="#">More Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-col full-size">
                <div class="challenge-item">
                    <div class="bg-img" data-bg="images/logo/godness-invocation.jpg" style="background-image: url(&quot;images/logo/godness-invocation.jpg&quot;);background-position: center;">
                    </div>
                    <a href="#" class="link"></a>
                    <div class="inner">
                        <h3 class="item-title"><a href="#">Goddess Invocation</a></h3>
                        <p style="color:#fff" class="limit">Invoke the powerful Goddess
                            Energy to manifest your desires
                            and transcend challenges.</p>
                        <a href="#" class="item-country">ONLINE + OFFLINE | WHATSAPP</a>
                        <h3 class="item-title"><a href="#">&#x20B9 36,000</a></h3>
                        <div class="butns">
                            <a href="#">Enroll Now</a>
                        </div>
                        <div class="more_btn">
                            <a href="#">More Details</a>
                        </div>
                    </div>
                </div>
            </div> -->



        </div>
    </div>
</div>
<!--transforming-->

<!--FIRST STEP RISK-->

<!--for professionals-->
<div class="page-section riskwala" id="transforming">
    <div class="container wide3">
        <div class="content-element6">
            <div class="align-center" style="text-align:center;">
                <h2>For The Professionals</h2>
                <p class="text-size-medium">Extremely beneficial for healers and professionals working in well-being.
                    Keep growing your skills and your knowledge with these advanced courses.</p>
                <p class="text-size-medium" style="font-style:italic">Take your own inner practice up few levels to keep
                    up with the demands on your energy levels.</p>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="view-button txt-rgt">
                    <a href="{{ url('longcourse/view') }}" class="btn btn-secondary" title="View More">{{__('View
                        More')}}<i data-feather="chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="challenges masonry flex-row item-col-2">
        @foreach($longcourses as $shortcourse)
            <div class="item-col full-size">
                <div class="ribbon ribbon-top-left"><span>12 months</span></div>
                <div class="challenge-item">
                    <div class="bg-img" data-bg="{{ asset('images/course/'.$shortcourse['preview_image']) }}" style="background-image: url('images/course/{{$shortcourse['preview_image']}}');background-position: center;">
                    </div>
                    <a href="#" class="link"></a>
                    <div class="inner">
                        <h3 class="item-title"><a href="#">{{$shortcourse->title}}</a></h3>
                        <p class="limit" style="color:#fff">{{$shortcourse->short_detail}}</p>

                        <a href="#" class="item-country">IN-PERSON + ONLINE | WHATSAPP</a><br>
                        <span style="font-size:14px;color:#fff;">(8 sessions)</span>
                        <h3 class="item-title"><a href="#">&#x20B9 {{$shortcourse->price}} </a></h3>

                        <div class="butns">
                            <a href="{{ route('user.course.show',['id' => $shortcourse->id, 'slug' => $shortcourse->slug ]) }}">Enroll Now</a>
                        </div>
                        <div class="more_btn">
                            <a href="#">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach   

            <!-- <div class="item-col full-size">
                <div class="ribbon ribbon-top-left"><span>12 months</span></div>
                <div class="challenge-item">
                    <div class="bg-img" data-bg="images/logo/tarot-reading.jpg" style="background-image: url(&quot;images/logo/tarot-reading.jpg&quot;);background-position: center;">
                    </div>
                    <a href="#" class="link"></a>
                    <div class="inner">
                        <h3 class="item-title"><a href="#">Goddness Tarot Reading</a></h3>
                        <p class="limit" style="color:#fff">Bring the Goddess into your Tarot Reading to become a Master
                            Manifestor.</p>
                        <a href="#" class="item-country">IN-PERSON + ONLINE | WHATSAPP</a>
                        <br>
                        <span style="font-size:14px;color:#fff;">(12 sessions)</span>
                        <h3 class="item-title"><a href="#">&#x20B9 1,50,000</a></h3>
                        <div class="butns">
                            <a href="#">Enroll Now</a>
                        </div>
                        <div class="more_btn">
                            <a href="#">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-col full-size">
                <div class="ribbon ribbon-top-left"><span>3 years</span></div>
                <div class="challenge-item">
                    <div class="bg-img" data-bg="images/logo/atma-siddhi.jpg" style="background-image: url(&quot;images/logo/atma-siddhi.jpg&quot;);background-position: center;">
                    </div>
                    <a href="#" class="link"></a>
                    <div class="inner">
                        <h3 class="item-title"><a href="#">Atma<br>Siddi</a></h3>
                        <p class="limit" style="color:#fff">Only for dedicated professionals looking to leap into the
                            next level of transformation and
                            evolution.</p>
                        <a href="#" class="item-country">IN-PERSON + ONLINE | WHATSAPP</a>
                        <br>
                        <span style="font-size:14px;color:#fff;">(with sessions as needed)</span>
                        <h3 class="item-title"><a href="#">&#x20B9 2,40,000</a></h3>
                        <div class="butns">
                            <a href="#">Enroll Now</a>
                        </div>
                        <div class="more_btn">
                            <a href="#">More Details</a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!--for professionals-->

<!-- fact start -->
@if($hsetting->fact_enable == 1 && isset($factsetting))
<section id="facts" class="fact-main-block">
    <div class="container-xl">
        <div class="row">
            @foreach($factsetting as $factset)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="facts-block text-center">
                    <div class="facts-block-one">
                        <div class="facts-block-img">
                            @if($factset['image'] !== NULL && $factset['image'] !== '')
                            <img src="{{ url('/images/facts/'.$factset->image) }}" class="img-fluid" alt="" />
                            @else
                            <img src="{{ Avatar::create($factset->title)->toBase64() }}" alt="course" class="img-fluid">
                            @endif
                            <div class="facts-count">{{ $factset->number }}</div>
                        </div>
                        <h5 class="facts-title"><a href="#" title="">{{ $factset->title }}</a></h5>
                        <p>{{ $factset->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!-- fact end -->
<!-- Advertisement -->


<!-- learning-courses start -->
@if($hsetting->recentcourse_enable == 1 && isset($categories))
<section id="learning-courses" class="learning-courses-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <h4 class="student-heading">{{ __('Recent Courses') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="btn_more float-right">

                </div>
            </div>
        </div>

        <div class="row">



            <div class="col-lg-12">
                <div class="learning-courses">
                    @if(isset($categories))
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach($categories as $cats)

                        <li class="btn nav-item"><a class="nav-item nav-link" id="home-tab" data-toggle="tab" href="#content-tabs" role="tab" aria-controls="home" onclick="showtab('{{ $cats->id }}')" aria-selected="true">{{ $cats['title'] }}</a></li>

                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="tab-content" id="myTabContent">
                    @if(!empty($categories))


                    @foreach($categories as $cate)
                    <div class="tab-pane fade show active" id="content-tabs" role="tabpanel" aria-labelledby="home-tab">

                        <div id="tabShow">

                        </div>

                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- learning-courses end -->
<!-- Advertisement -->
@if(isset($advs))
@foreach($advs as $adv)
@if($adv->position == 'belowrecent')
<br>
<section id="student" class="student-main-block btm-40">
    <div class="container-xl">
        <a href="{{ $adv->url1 }}" title="{{ __('Click to visit') }}">
            <img class="lazy img-fluid advertisement-img-one" data-src="{{ url('images/advertisement/'.$adv->image1) }}" alt="{{ $adv->image1 }}">
        </a>
    </div>
</section>
@endif

@endforeach

@endif
<!-- Advertisement -->



<!-- Subscription Bundle start -->
<section id="subscription" class="student-main-block">
    <div class="container-xl">
        @if (isset($subscriptionBundles) && !$subscriptionBundles->isEmpty())
        <h4 class="student-heading">{{ __('Subscription Bundles') }}</h4>
        <div id="subscription-bundle-view-slider" class="student-view-slider-main-block owl-carousel">
            @foreach ($subscriptionBundles as $bundle)
            @if ($bundle->status == 1 && $bundle->is_subscription_enabled == 1)

            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-3{{ $bundle->id }}">
                    <div class="view-block">
                        <div class="view-img">
                            @if ($bundle['preview_image'] !== null && $bundle['preview_image'] !== '')
                            <a href="{{ route('bundle.detail', $bundle->id) }}"><img data-src="{{ asset('images/bundle/' . $bundle['preview_image']) }}" alt="course" class="img-fluid owl-lazy"></a>
                            @else
                            <a href="{{ route('bundle.detail', $bundle->id) }}"><img data-src="{{ Avatar::create($bundle->title)->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
                            @endif
                        </div>
                        <div class="badges bg-priamry offer-badge"><span>OFF<span>
                                    <?php echo round((($bundle->price - $bundle->discount_price) * 100) / $bundle->price) . '%'; ?>
                                </span></span></div>

                        <div class="view-user-img">

                            @if($bundle->user['user_img'] !== NULL && $bundle->user['user_img'] !== '')
                            <a href="{{ route('all/profile',$bundle->user->id) }}" title=""><img src="{{ asset('images/user_img/'.$bundle->user['user_img']) }}" class="img-fluid user-img-one" alt=""></a>
                            @else
                            <a href="{{ route('all/profile',$bundle->user->id) }}" title=""><img src="{{ asset('images/default/user.png') }}" class="img-fluid user-img-one" alt=""></a>
                            @endif
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading"><a href="{{ route('bundle.detail', $bundle->id) }}">{{
                                    str_limit($bundle->title, $limit = 30, $end = '...') }}</a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="{{ route('all/profile',$bundle->user->id) }}"> {{
                                            optional($bundle->user)['fname'] }}</a></span></h6>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i> {{ date('d-m-Y',
                                                strtotime($bundle['created_at'])) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        @if ($bundle->type == 1 && $bundle->price != null)
                                        <div class="rate text-right">
                                            <ul>
                                                @if ($bundle->discount_price == !null)

                                                <li><a><b>{{ activeCurrency()->getData()->position == 'l' ?
                                                            activeCurrency()->getData()->symbol :'' }}{{ price_format(
                                                            currency($bundle->discount_price, $from = $currency->code,
                                                            $to = Session::has('changed_currency') ?
                                                            Session::get('changed_currency') : $currency->code, $format
                                                            = false)) }}{{ activeCurrency()->getData()->position == 'r'
                                                            ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>

                                                <li><a><b><strike>{{ activeCurrency()->getData()->position == 'l' ?
                                                                activeCurrency()->getData()->symbol :'' }}{{
                                                                price_format( currency($bundle->price, $from =
                                                                $currency->code, $to = Session::has('changed_currency')
                                                                ? Session::get('changed_currency') : $currency->code,
                                                                $format = false)) }}{{
                                                                activeCurrency()->getData()->position == 'r' ?
                                                                activeCurrency()->getData()->symbol :''
                                                                }}</strike></b></a>
                                                </li>


                                                @else



                                                <li><a><b>
                                                            {{ activeCurrency()->getData()->position == 'l' ?
                                                            activeCurrency()->getData()->symbol :'' }}{{ price_format(
                                                            currency($bundle->price, $from = $currency->code, $to =
                                                            Session::has('changed_currency') ?
                                                            Session::get('changed_currency') : $currency->code, $format
                                                            = false)) }}{{ activeCurrency()->getData()->position == 'r'
                                                            ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>

                                        @else
                                        <div class="rate text-right">
                                            <ul>
                                                <li><a><b>{{ __('Free') }}</b></a></li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prime-next-item-description-block-3{{ $bundle->id }}" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading">{{ $bundle['title'] }}</h5>
                            <div class="main-des">
                                @if($bundle['short_detail'] != NUll)

                                <p>{{ str_limit($bundle['short_detail'], $limit = 200, $end = '...') }}</p>
                                @else
                                <p>{{ str_limit($bundle['detail'], $limit = 200, $end = '...') }}</p>
                                @endif
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-12">
                                        @if ($bundle->type == 1)
                                        @if (Auth::check())
                                        @if (Auth::User()->role == 'admin')
                                        <div class="protip-btn">
                                            <a href="" class="btn btn-secondary" title="course">{{ __('Purchased')
                                                }}</a>
                                        </div>
                                        @else
                                        @php
                                        $order = App\Order::where('user_id',
                                        Auth::User()->id)->where('bundle_id',
                                        $bundle->id)->first();
                                        @endphp
                                        @if (!empty($order) && $order->status == 1)
                                        <div class="protip-btn">
                                            <a href="" class="btn btn-secondary" title="course">{{ __('Purchased')
                                                }}</a>
                                        </div>
                                        @else
                                        @php
                                        $cart = App\Cart::where('user_id',
                                        Auth::User()->id)->where('bundle_id',
                                        $bundle->id)->first();
                                        @endphp
                                        @if (!empty($cart))
                                        <div class="protip-btn">
                                            <form id="demo-form2" method="post" action="{{ route('remove.item.cart', $cart->id) }}">
                                                {{ csrf_field() }}

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">{{ __('Remove From
                                                        Cart') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                        @else
                                        <div class="protip-btn">
                                            <form id="demo-form2" method="post" action="{{ route('bundlecart', $bundle->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{ Auth::User()->id }}" />
                                                <input type="hidden" name="bundle_id" value="{{ $bundle->id }}" />

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">{{ __('Subscribe Now')
                                                        }}</button>
                                                </div>


                                            </form>
                                        </div>
                                        @endif
                                        @endif
                                        @endif
                                        @else
                                        <div class="protip-btn">

                                            <a href="{{ route('login') }}" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;{{
                                                __('Subscribe Now') }}</a>

                                        </div>
                                        @endif
                                        @else
                                        @if (Auth::check())
                                        @if (Auth::User()->role == 'admin')
                                        <div class="protip-btn">
                                            <a href="" class="btn btn-secondary" title="course">{{ __('Purchased')
                                                }}</a>
                                        </div>
                                        @else
                                        @php
                                        $enroll = App\Order::where('user_id',
                                        Auth::User()->id)->where('course_id', $c->id)->first();
                                        @endphp
                                        @if ($enroll == null)
                                        <div class="protip-btn">
                                            <a href="{{ url('enroll/show', $bundle->id) }}" class="btn btn-primary" title="Enroll Now">{{ __('Subscribe Now') }}</a>
                                        </div>
                                        @else
                                        <div class="protip-btn">
                                            <a href="" class="btn btn-secondary" title="Cart">{{ __('Purchased') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                        @else
                                        <div class="protip-btn">
                                            <a href="{{ route('login') }}" class="btn btn-primary" title="Enroll Now">{{
                                                __('Subscribe Now') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endif

            @endforeach
        </div>
        @endif
    </div>
</section>
<!-- Subscription Bundle end -->

<!-- Bundle start -->
@if(!$bundles->isEmpty() && $hsetting->bundle_enable && isset($bundles))
<section id="bundle-block" class="student-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">{{ __('Bundle Courses') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="view-button txt-rgt">
                    <a href="{{url('bundle/view')}}" class="btn btn-secondary" title="View More">View More<i data-feather="chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @if(count($bundles) > 0)

        <div id="bundle-view-slider" class="student-view-slider-main-block owl-carousel">
            @foreach($bundles as $bundle)
            @if($bundle->status == 1)

            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image @if($gsetting['course_hover'] == 1) protip @endif" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-4{{$bundle->id}}">
                    <div class="view-block">
                        <div class="view-img">
                            @if($bundle['preview_image'] !== NULL && $bundle['preview_image'] !== '')
                            <a href="{{ route('bundle.detail', $bundle->id) }}"><img data-src="{{ asset('images/bundle/'.$bundle['preview_image']) }}" alt="course" class="img-fluid owl-lazy"></a>
                            @else
                            <a href="{{ route('bundle.detail', $bundle->id) }}"><img data-src="{{ Avatar::create($bundle->title)->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
                            @endif
                        </div>
                        <div class="view-user-img">

                            @if($bundle->user['user_img'] !== NULL && $bundle->user['user_img'] !== '')
                            <a href="{{ route('all/profile',$bundle->user->id) }}" title=""><img src="{{ asset('images/user_img/'.$bundle->user['user_img']) }}" class="img-fluid user-img-one" alt=""></a>
                            @else
                            <a href="{{ route('all/profile',$bundle->user->id) }}" title=""><img src="{{ asset('images/default/user.png') }}" class="img-fluid user-img-one" alt=""></a>
                            @endif
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading"><a href="{{ route('bundle.detail', $bundle->id) }}">{{
                                    str_limit($bundle->title, $limit = 30, $end = '...') }}</a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="{{ route('all/profile',$bundle->user->id) }}"> {{
                                            optional($bundle->user)['fname'] }}</a></span></h6>
                            </div>
                            <!-- <p class="btm-10"><a herf="#">{{ __('by') }} @if(isset($bundle->user)) {{ $bundle->user['fname'] }} {{ $bundle->user['lname'] }} @endif</a></p> -->

                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="count-user">
                                            <i data-feather="user"></i><span>
                                                {{ $bundle->order->count() }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        @if($bundle->type == 1 && $bundle->price != null)
                                        <div class="rate text-right">
                                            <ul>

                                                @if($bundle->discount_price == !NULL)

                                                <li><a><b>{{ activeCurrency()->getData()->position == 'l' ?
                                                            activeCurrency()->getData()->symbol :'' }}{{ price_format(
                                                            currency($bundle->discount_price, $from = $currency->code,
                                                            $to = Session::has('changed_currency') ?
                                                            Session::get('changed_currency') : $currency->code, $format
                                                            = false)) }}{{ activeCurrency()->getData()->position == 'r'
                                                            ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>

                                                <li><a><b><strike>{{ activeCurrency()->getData()->position == 'l' ?
                                                                activeCurrency()->getData()->symbol :'' }}{{
                                                                price_format( currency($bundle->price, $from =
                                                                $currency->code, $to = Session::has('changed_currency')
                                                                ? Session::get('changed_currency') : $currency->code,
                                                                $format = false)) }}{{
                                                                activeCurrency()->getData()->position == 'r' ?
                                                                activeCurrency()->getData()->symbol :''
                                                                }}</strike></b></a>
                                                </li>


                                                @else
                                                <li><a><b>
                                                            {{ activeCurrency()->getData()->position == 'l' ?
                                                            activeCurrency()->getData()->symbol :'' }}{{ price_format(
                                                            currency($bundle->price, $from = $currency->code, $to =
                                                            Session::has('changed_currency') ?
                                                            Session::get('changed_currency') : $currency->code, $format
                                                            = false)) }}{{ activeCurrency()->getData()->position == 'r'
                                                            ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                        @else
                                        <div class="rate text-right">
                                            <ul>
                                                <li><a><b>{{ __('Free') }}</b></a></li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="img-wishlist">
                                <div class="protip-wishlist">
                                    <ul>

                                        <li class="protip-wish-btn"><a href="https://calendar.google.com/calendar/r/eventedit?text={{ $bundle['title'] }}" target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                        @if(Auth::check())

                                        <li class="protip-wish-btn"><a class="compare" data-id="{{filter_var($bundle->id)}}" title="compare"><i data-feather="bar-chart"></i></a></li>

                                        @php
                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',
                                        $bundle->id)->first();
                                        @endphp
                                        @if ($wish == NULL)
                                        <li class="protip-wish-btn">
                                            <form id="demo-form2" method="post" action="{{ url('show/wishlist', $bundle->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$bundle->id}}" />

                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @else
                                        <li class="protip-wish-btn-two">
                                            <form id="demo-form2" method="post" action="{{ url('remove/wishlist', $bundle->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$bundle->id}}" />

                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist" type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @endif
                                        @else
                                        <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i data-feather="heart"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div id="prime-next-item-description-block-4{{$bundle->id}}" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading">{{ $bundle['title'] }}</h5>

                            <div class="product-main-des">
                                <p>{{ strip_tags(str_limit($bundle['detail'], $limit = 200, $end = '...')) }}</p>
                            </div>
                            <div>
                                <div class="product-learn-dtl">
                                    <ul>

                                        @foreach ($bundle->course_id as $bundles)

                                        @php
                                        $course = App\Course::where('id', $bundles)->first();
                                        @endphp
                                        @isset($course)
                                        <li><i data-feather="check-circle"></i>
                                            <a href="#">{{ $course['title'] }}</a>
                                        </li>
                                        @endisset

                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-12">
                                        @if($bundle->type == 1)
                                        @if(Auth::check())
                                        @if(Auth::User()->role == "admin")
                                        <div class="protip-btn">
                                            <a href="" class="btn btn-secondary" title="course">{{ __('Purchased')
                                                }}</a>
                                        </div>
                                        @else
                                        @php
                                        $order = App\Order::where('user_id', Auth::User()->id)->where('bundle_id',
                                        $bundle->id)->first();
                                        @endphp
                                        @if(!empty($order) && $order->status == 1)
                                        <div class="protip-btn">
                                            <a href="" class="btn btn-secondary" title="course">{{ __('Purchased')
                                                }}</a>
                                        </div>
                                        @else
                                        @php
                                        $cart = App\Cart::where('user_id', Auth::User()->id)->where('bundle_id',
                                        $bundle->id)->first();
                                        @endphp
                                        @if(!empty($cart))
                                        <div class="protip-btn">
                                            <form id="demo-form2" method="post" action="{{ route('remove.item.cart',$cart->id) }}">
                                                {{ csrf_field() }}

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">{{ __('Remove From
                                                        Cart') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                        @else
                                        <div class="protip-btn">
                                            <form id="demo-form2" method="post" action="{{ route('bundlecart', $bundle->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="bundle_id" value="{{$bundle->id}}" />

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary"><i data-feather="shopping-cart"></i>{{ __('Add To Cart')
                                                        }}</button>
                                                </div>
                                            </form>
                                        </div>
                                        @endif
                                        @endif
                                        @endif
                                        @else
                                        <div class="protip-btn">
                                            <a href="{{ route('login') }}" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;{{ __('Add To Cart') }}</a>
                                        </div>
                                        @endif
                                        @else
                                        @if(Auth::check())
                                        @if(Auth::User()->role == "admin")
                                        <div class="protip-btn">
                                            <a href="" class="btn btn-secondary" title="course">{{ __('Purchased')
                                                }}</a>
                                        </div>
                                        @else
                                        @php
                                        $enroll = App\Order::where('user_id', Auth::User()->id)->where('bundle_id',
                                        $bundle->id)->first();
                                        @endphp
                                        @if($enroll == NULL)
                                        <div class="protip-btn">
                                            <a href="{{url('enroll/show',$bundle->id)}}" class="btn btn-primary" title="Enroll Now"><i data-feather="shopping-cart"></i>{{ __('Enroll
                                                Now') }}</a>
                                        </div>
                                        @else
                                        <div class="protip-btn">
                                            <a href="" class="btn btn-secondary" title="Cart">{{ __('Purchased') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                        @else
                                        <div class="protip-btn">
                                            <a href="{{ route('login') }}" class="btn btn-primary" title="Enroll Now"><i data-feather="shopping-cart"></i>{{ __('Enroll Now') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @endif

            @endforeach
        </div>
        @endif

    </div>
</section>
@endif
<!-- Bundle end -->
@if(! $bestselling->isEmpty() && $hsetting->bestselling_enable && isset($bestselling) && count($bestselling) > 0 )
<section id="student" class="student-main-block" style="display:none">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">{{ __('Best selling Courses') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="view-button txt-rgt">
                    <a href="{{ url('bestselling/view') }}" class="btn btn-secondary" title="View More">View More<i data-feather="chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="bestseller-view-slider" class="student-view-slider-main-block owl-carousel">
            @foreach($bestselling as $best)

            @if($best->courses->status == 1 )

            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image @if($gsetting['course_hover'] == 1) protip @endif" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block{{$best->id}}">
                    <div class="view-block">
                        <div class="view-img">
                            @if($best->courses['preview_image'] !== NULL && $best->courses['preview_image'] !== '')
                            <a href="{{ route('user.course.show',['id' => $best->courses->id, 'slug' => $best->courses->slug ]) }}"><img data-src="{{ asset('images/course/'.$best->courses['preview_image']) }}" alt="course" class="img-fluid owl-lazy"></a>
                            @else
                            <a href="{{ route('user.course.show',['id' => $best->courses->id, 'slug' => $best->courses->slug ]) }}"><img data-src="{{ Avatar::create($best->title)->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
                            @endif
                        </div>
                        @if($best->courses['level_tags'] == 'trending')
                        <div class="advance-badge">
                            <span class="badge bg-warning">{{__('Trending')}}</span>
                        </div>
                        @endif
                        @if($best->courses['level_tags'] == 'featured')

                        <div class="advance-badge">
                            <span class="badge bg-danger">{{__('Featured')}}</span>
                        </div>
                        @endif
                        @if($best->courses['level_tags'] == 'new')

                        <div class="advance-badge">
                            <span class="badge bg-success">{{__('New')}}</span>
                        </div>
                        @endif
                        @if($best->courses['level_tags'] == 'onsale')

                        <div class="advance-badge">
                            <span class="badge bg-info">{{__('Onsale')}}</span>
                        </div>
                        @endif
                        @if($best->courses['level_tags'] == 'bestseller')

                        <div class="advance-badge">
                            <span class="badge bg-success">{{__('Bestseller')}}</span>
                        </div>
                        @endif
                        @if($best->courses['level_tags'] == 'beginner')

                        <div class="advance-badge">
                            <span class="badge bg-primary">{{__('Beginner')}}</span>
                        </div>
                        @endif
                        @if($best->courses['level_tags'] == 'intermediate')

                        <div class="advance-badge">
                            <span class="badge bg-secondary">{{__('Intermediate')}}</span>
                        </div>
                        @endif
                        <div class="view-user-img">
                            @if($best->courses->user['user_img'] !== NULL && $best->courses->user['user_img'] !== '')
                            <a href="{{ route('all/profile',$best->courses->user->id) }}" title=""><img src="{{ asset('images/user_img/'.$best->courses->user['user_img']) }}" class="img-fluid user-img-one" alt=""></a>
                            @else
                            <a href="{{ route('all/profile',$best->courses->user->id) }}" title=""><img src="{{ asset('images/default/user.png') }}" class="img-fluid user-img-one" alt=""></a>
                            @endif

                        </div>

                        <div class="view-dtl">
                            <div class="view-heading"><a href="{{ route('user.course.show',['id' => $best->courses->id, 'slug' => $best->courses->slug ]) }}">{{
                                    str_limit($best->courses->title, $limit = 30, $end = '...') }}</a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="{{ route('all/profile',$best->courses->user->id) }}"> {{
                                            optional($best->courses->user)['fname'] }}</a></span></h6>
                            </div>
                            <div class="rating">
                                <ul>
                                    <li>
                                        <?php
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $sub_total = 0;
                                        $reviews = App\ReviewRating::where('course_id', $best->courses->id)->get();
                                        ?>
                                        @if(!empty($reviews[0]))
                                        <?php
                                        $count =  App\ReviewRating::where('course_id', $best->courses->id)->count();

                                        foreach ($reviews as $review) {
                                            $learn = $review->price * 5;
                                            $price = $review->price * 5;
                                            $value = $review->value * 5;
                                            $sub_total = $sub_total + $learn + $price + $value;
                                        }

                                        $count = ($count * 3) * 5;
                                        $rat = $sub_total / $count;
                                        $ratings_var = ($rat * 100) / 5;
                                        ?>

                                        <div class="pull-left">
                                            <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>


                                        @else
                                        <div class="pull-left">{{ __('No Rating') }}</div>
                                        @endif
                                    </li>
                                    <!-- overall rating-->
                                    <?php
                                    $learn = 0;
                                    $price = 0;
                                    $value = 0;
                                    $sub_total = 0;
                                    $count =  count($reviews);
                                    $onlyrev = array();

                                    $reviewcount = App\ReviewRating::where('course_id', $best->courses->id)->WhereNotNull('review')->get();

                                    foreach ($reviews as $review) {

                                        $learn = $review->learn * 5;
                                        $price = $review->price * 5;
                                        $value = $review->value * 5;
                                        $sub_total = $sub_total + $learn + $price + $value;
                                    }

                                    $count = ($count * 3) * 5;

                                    if ($count != "") {
                                        $rat = $sub_total / $count;

                                        $ratings_var = ($rat * 100) / 5;

                                        $overallrating = ($ratings_var / 2) / 10;
                                    }

                                    ?>

                                    @php
                                    $reviewsrating = App\ReviewRating::where('course_id', $best->courses->id)->first();
                                    @endphp
                                    @if(!empty($reviewsrating))
                                    <!-- <li>
                                            <b>{{ round($overallrating, 1) }}</b>
                                        </li> -->
                                    @endif
                                    <li class="reviews">
                                        (@php
                                        $data = App\ReviewRating::where('course_id', $best->courses->id)->count();
                                        if($data>0){

                                        echo $data;
                                        }
                                        else{

                                        echo "0";
                                        }
                                        @endphp Reviews)
                                    </li>

                                </ul>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="count-user">
                                            <i data-feather="user"></i><span>
                                                @php
                                                $data = App\Order::where('course_id', $best->courses->id)->count();
                                                if(($data)>0){

                                                echo $data;
                                                }
                                                else{

                                                echo "0";
                                                }
                                                @endphp</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        @if( $best->courses->type == 1)
                                        <div class="rate text-right">
                                            <ul>

                                                @if($best->courses->discount_price == !NULL)

                                                <li><a><b>{{ activeCurrency()->getData()->position == 'l' ?
                                                            activeCurrency()->getData()->symbol :'' }}{{ price_format(
                                                            currency($best->courses['discount_price'], $from =
                                                            $currency->code, $to = Session::has('changed_currency') ?
                                                            Session::get('changed_currency') : $currency->code, $format
                                                            = false)) }}{{ activeCurrency()->getData()->position == 'r'
                                                            ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>

                                                <li><a><b><strike>{{ activeCurrency()->getData()->position == 'l' ?
                                                                activeCurrency()->getData()->symbol :'' }}{{
                                                                price_format( currency($best->courses['price'], $from =
                                                                $currency->code, $to = Session::has('changed_currency')
                                                                ? Session::get('changed_currency') : $currency->code,
                                                                $format = false) ) }}{{
                                                                activeCurrency()->getData()->position == 'r' ?
                                                                activeCurrency()->getData()->symbol :''
                                                                }}</strike></b></a>
                                                </li>


                                                @else

                                                @if($c->price == !NULL)
                                                <li><a><b>{{ activeCurrency()->getData()->position == 'l' ?
                                                            activeCurrency()->getData()->symbol :'' }}{{ price_format(
                                                            currency($best->courses['price'], $from = $currency->code,
                                                            $to = Session::has('changed_currency') ?
                                                            Session::get('changed_currency') : $currency->code, $format
                                                            = false) ) }}{{ activeCurrency()->getData()->position == 'r'
                                                            ? activeCurrency()->getData()->symbol :'' }}</b></a>
                                                </li>
                                                @endif

                                                @endif
                                            </ul>
                                        </div>
                                        @else
                                        <div class="rate text-right">
                                            <ul>
                                                <li><a><b>{{ __('Free') }}</b></a></li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="img-wishlist">
                                <div class="protip-wishlist">
                                    <ul>

                                        <li class="protip-wish-btn"><a href="https://calendar.google.com/calendar/r/eventedit?text={{ $best['title'] }}" target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                        @if(Auth::check())

                                        <li class="protip-wish-btn"><a class="compare" data-id="{{filter_var($best->id)}}" title="compare"><i data-feather="bar-chart"></i></a></li>

                                        @php
                                        $wish = App\Wishlist::where('user_id',
                                        Auth::User()->id)->where('course_id',$best->courses->id)->first();
                                        @endphp
                                        @if ($wish == NULL)
                                        <li class="protip-wish-btn">
                                            <form id="demo-form2" method="post" action="{{ url('show/wishlist', $best->courses->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$best->courses->id}}" />

                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @else
                                        <li class="protip-wish-btn-two">
                                            <form id="demo-form2" method="post" action="{{ url('remove/wishlist', $best->courses->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$best->courses->id}}" />

                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist" type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @endif
                                        @else
                                        <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i data-feather="heart"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div id="prime-next-item-description-block{{$best->courses->id}}" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading">{{ $best->courses['title'] }}</h5>
                            <div class="main-des">
                                <p>Last Updated: {{ date('jS F Y', strtotime($best->courses->updated_at)) }}</p>
                            </div>

                            <ul class="description-list">
                                <li>
                                    <i data-feather="play-circle"></i>
                                    <div class="class-des">
                                        {{ __('Classes') }}:
                                        @php
                                        $data = App\CourseClass::where('course_id', $best->courses->id)->count();
                                        if($data > 0){

                                        echo $data;
                                        }
                                        else{

                                        echo "0";
                                        }
                                        @endphp
                                    </div>
                                </li>
                                &nbsp;
                                <li>
                                    <div>
                                        <div class="time-des">
                                            <span class="">
                                                <i data-feather="clock"></i>
                                                @php

                                                $classtwo = App\CourseClass::where('course_id',
                                                $best->courses->id)->sum("duration");

                                                @endphp
                                                {{ $classtwo }} {{ __('Minutes')}}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="lang-des">
                                        @if($best->courses['language_id'] == !NULL)
                                        @if(isset($best->courses->language))
                                        <i data-feather="globe"></i> {{ $best->courses->language['name'] }}
                                        @endif
                                        @endif
                                    </div>
                                </li>
                            </ul>

                            <div class="product-main-des">
                                <p>{{ $best->courses->short_detail }}</p>
                            </div>
                            <div>
                                @if($best->courses->whatlearns->isNotEmpty())
                                @foreach($best->courses->whatlearns as $wl)
                                @if($wl->status ==1)
                                <div class="product-learn-dtl">
                                    <ul>
                                        <li><i data-feather="check-circle"></i>{{ str_limit($wl['detail'], $limit = 120,
                                            $end = '...') }}
                                        </li>
                                    </ul>
                                </div>
                                @endif
                                @endforeach
                                @endif
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-8">
                                        @if($best->courses->type == 1)
                                        @if(Auth::check())
                                        @if(Auth::User()->role == "admin")
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $best->courses->id, 'slug' => $best->courses->slug ]) }}" class="btn btn-secondary" title="course">{{ __('Go To Course') }}</a>
                                        </div>
                                        @else
                                        @php
                                        $order = App\Order::where('user_id', Auth::User()->id)->where('course_id',
                                        $best->courses->id)->first();
                                        @endphp
                                        @if(!empty($order) && $order->status == 1)
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $best->courses->id, 'slug' => $best->courses->slug ]) }}" class="btn btn-secondary" title="course">{{ __('Go To Course') }}</a>
                                        </div>
                                        @else
                                        @php
                                        $cart = App\Cart::where('user_id', Auth::User()->id)->where('course_id',
                                        $best->courses->id)->first();
                                        @endphp
                                        @if(!empty($cart))
                                        <div class="protip-btn">
                                            <form id="demo-form2" method="post" action="{{ route('remove.item.cart',$cart->id) }}">
                                                {{ csrf_field() }}

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">{{ __('Remove From
                                                        Cart') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                        @else
                                        <div class="protip-btn">
                                            <form id="demo-form2" method="post" action="{{ route('addtocart',['course_id' => $best->courses->id, 'price' => $best->courses->price, 'discount_price' => $best->courses->discount_price ]) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="category_id" value="{{$best->category['id'] ?? '-'}}" />

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">{{ __('Add To Cart')
                                                        }}</button>
                                                </div>
                                            </form>
                                        </div>
                                        @endif
                                        @endif
                                        @endif
                                        @else
                                        @if($gsetting->guest_enable == 1)
                                        <form id="demo-form2" method="post" action="{{ route('guest.addtocart', $best->courses->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                            {{ csrf_field() }}
                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;{{ __('Add To Cart')
                                                    }}</button>
                                            </div>
                                        </form>
                                        @else
                                        <div class="protip-btn">
                                            <a href="{{ route('login') }}" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;{{ __('Add To Cart') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                        @else
                                        @if(Auth::check())
                                        @if(Auth::User()->role == "admin")
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $best->courses->id, 'slug' => $best->courses->slug ]) }}" class="btn btn-secondary" title="course">{{ __('Go To Course') }}</a>
                                        </div>
                                        @else
                                        @php
                                        $enroll = App\Order::where('user_id', Auth::User()->id)->where('course_id',
                                        $best->courses->id)->first();
                                        @endphp
                                        @if($enroll == NULL)
                                        <div class="protip-btn">
                                            <a href="{{url('enroll/show',$best->courses->id)}}" class="btn btn-primary" title="Enroll Now"><i data-feather="shopping-cart"></i>{{ __('Enroll
                                                Now') }}</a>
                                        </div>
                                        @else
                                        <div class="protip-btn">
                                            <a href="{{ route('course.content',['id' => $best->courses->id, 'slug' => $best->courses->slug ]) }}" class="btn btn-secondary" title="Cart">{{ __('Go To Course') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                        @else
                                        <div class="protip-btn">
                                            <a href="{{ route('login') }}" class="btn btn-primary" title="Enroll Now"><i data-feather="shopping-cart"></i>{{ __('Enroll Now') }}</a>
                                        </div>
                                        @endif
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="img-wishlist">
                                            <div class="protip-wishlist">
                                                <ul>
                                                    @if(Auth::check())

                                                    @php
                                                    $wish = App\Wishlist::where('user_id',
                                                    Auth::User()->id)->where('course_id', $best->courses->id)->first();
                                                    @endphp
                                                    @if ($wish == NULL)
                                                    <li class="protip-wish-btn">
                                                        <form id="demo-form2" method="post" action="{{ url('show/wishlist', $best->courses->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                            <input type="hidden" name="course_id" value="{{$best->courses->id}}" />

                                                            <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart"></i></button>
                                                        </form>
                                                    </li>
                                                    @else
                                                    <li class="protip-wish-btn-two">
                                                        <form id="demo-form2" method="post" action="{{ url('remove/wishlist', $best->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                            {{ csrf_field() }}

                                                            <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                            <input type="hidden" name="course_id" value="{{$best->courses->id}}" />

                                                            <button class="wishlisht-btn heart-fill" title="Remove from Wishlist" type="submit"><i data-feather="heart"></i></button>
                                                        </form>
                                                    </li>
                                                    @endif
                                                    @else
                                                    <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i data-feather="heart"></i></a></li>
                                                    @endif
                                                </ul>
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
            @endforeach

        </div>
    </div>
</section>
@endif
<!-- Advertisement -->
@if(isset($advs))
@foreach($advs as $adv)
@if($adv->position == 'belowbundle')
<br>
<section id="student" class="student-main-block btm-40">
    <div class="container-xl">
        <a href="{{ $adv->url1 }}" title="{{ __('Click to visit') }}">
            <img class="lazy img-fluid advertisement-img-one" data-src="{{ url('images/advertisement/'.$adv->image1) }}" alt="{{ $adv->image1 }}">
        </a>
    </div>
</section>
@endif

@endforeach

@endif
<!-- Zoom start -->
@if($hsetting->livemeetings_enable == 1)
@if($gsetting->zoom_enable == '1' || $gsetting->bbl_enable == '1' || $gsetting->googlemeet_enable == '1' ||
$gsetting->jitsimeet_enable == '1')
<section id="student" class="student-main-block">
    <div class="container-xl">
        @php
        $mytime = Carbon\Carbon::now();
        @endphp
        @if( count($meetings) > 0 || count($bigblue) > 0 || count($allgooglemeet) > 0 || count($jitsimeeting) > 0 )
        <h4 class="student-heading">{{ __('Live Meetings') }}</h4>
        <div id="zoom-view-slider" class="student-view-slider-main-block owl-carousel">

            @if( ! $meetings->isEmpty() )
            @foreach($meetings as $meeting)
            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image @if($gsetting['course_hover'] == 1) protip @endif" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-6{{$meeting->id}}">
                    <div class="view-block">
                        <div class="view-img">

                            @if($meeting['image'] !== NULL && $meeting['image'] !== '')
                            <a href="{{ route('zoom.detail', $meeting->id) }}"><img data-src="{{ asset('images/zoom/'.$meeting['image']) }}" alt="course" class="img-fluid owl-lazy"></a>
                            @else
                            <a href="{{ route('zoom.detail', $meeting->id) }}"><img data-src="{{ Avatar::create($meeting['meeting_title'])->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
                            @endif


                        </div>
                        <div class="view-user-img">

                            @if(optional($meeting->user)['user_img'] !== NULL && optional($meeting->user)['user_img']
                            !== '')
                            <a href="{{ route('all/profile',$meeting->user->id) }}" title=""><img src="{{ asset('images/user_img/'.$meeting->user['user_img']) }}" class="img-fluid user-img-one" alt=""></a>
                            @else
                            <a href="{{ route('all/profile',$meeting->user->id) }}" title=""><img src="{{ asset('images/default/user.png') }}" class="img-fluid user-img-one" alt=""></a>
                            @endif


                        </div>
                        @if(asset('images/meeting_icons/zoom.png') == !NULL)
                        <div class="meeting-icon"><img src="{{ asset('images/meeting_icons/zoom.png')}}" class="img-circle" alt=""></div>
                        @endif


                        <div class="view-dtl">
                            <div class="view-heading"><a href="#">
                                    {{ str_limit($meeting->meeting_title, $limit = 30, $end = '...') }}</a></div>
                            <div class="user-name">
                                <h6>By <span><a href="{{ route('all/profile',$meeting->user->id) }}"> {{
                                            optional($meeting->user)['fname'] }}</a></span></h6>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i>
                                                {{ date('d-m-Y',strtotime($meeting['start_time'])) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i>
                                                {{ date('h:i:s A',strtotime($meeting['start_time'])) }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="img-wishlist">
                                <div class="protip-wishlist">
                                    <ul>

                                        <li class="protip-wish-btn"><a href="https://calendar.google.com/calendar/r/eventedit?text={{ $discount['title'] }}" target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                        @if(Auth::check())

                                        <li class="protip-wish-btn"><a class="compare" data-id="{{filter_var($discount->id)}}" title="compare"><i data-feather="bar-chart"></i></a></li>

                                        @php
                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',
                                        $discount->id)->first();
                                        @endphp
                                        @if ($wish == NULL)
                                        <li class="protip-wish-btn">
                                            <form id="demo-form2" method="post" action="{{ url('show/wishlist', $discount->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$discount->id}}" />

                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @else
                                        <li class="protip-wish-btn-two">
                                            <form id="demo-form2" method="post" action="{{ url('remove/wishlist', $discount->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$discount->id}}" />

                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist" type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @endif
                                        @else
                                        <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i data-feather="heart"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prime-next-item-description-block-6{{$meeting->id}}" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading"><a href="{{ route('zoom.detail', $meeting->id) }}">{{
                                    $meeting['meeting_title'] }}</a>
                            </h5>
                            <div class="protip-img">
                                <h6 class="user-name">{{ __('by') }}
                                    @if(isset($meeting->user)) {{ $meeting->user['fname'] }} @endif</h6>
                                <p class="meeting-owner btm-10"><a herf="#">Meeting Owner:
                                        {{ $meeting->owner_id }}</a></p>
                            </div>
                            <div class="main-des meeting-main-des">
                                <div class="main-des-head">Start At: </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i> {{
                                                date('d-m-Y',strtotime($meeting['start_time'])) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i> {{ date('h:i:s
                                                A',strtotime($meeting['start_time'])) }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="des-btn-block">
                                <a href="{{ $meeting->zoom_url }}" class="iframe btn btn-light">{{ __('Join Meeting')
                                    }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

            @if( ! $bigblue->isEmpty() )
            @foreach($bigblue as $bbl)


            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image @if($gsetting['course_hover'] == 1) protip @endif" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-7{{$bbl->id}}">
                    <div class="view-block">
                        <div class="view-img">
                            <a href="{{ route('bbl.detail', $bbl->id) }}"><img data-src="{{ Avatar::create($bbl['meetingname'])->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
                        </div>
                        <div class="view-user-img">

                            @if(optional($bbl->user)['user_img'] !== NULL && optional($bbl->user)['user_img'] !== '')
                            <a href="{{ route('all/profile',$bbl->user->id) }}" title=""><img src="{{ asset('images/user_img/'.$bbl->user['user_img']) }}" class="img-fluid user-img-one" alt=""></a>
                            @else
                            <a href="{{ route('all/profile',$bbl->user->id) }}" title=""><img src="{{ asset('images/default/user.png') }}" class="img-fluid user-img-one" alt=""></a>
                            @endif


                        </div>
                        @if(asset('images/meeting_icons/bigblue.png') == !NULL)
                        <div class="meeting-icon"><img src="{{ asset('images/meeting_icons/bigblue.png')}}" class="img-circle" alt=""></div>
                        @endif

                        <div class="view-dtl">
                            <div class="view-heading"><a href="{{ route('bbl.detail', $bbl->id) }}">{{
                                    str_limit($bbl['meetingname'], $limit = 30, $end = '...') }}</a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="{{ route('all/profile',$bbl->user->id) }}"> {{
                                            optional($bbl->user)['fname'] }}</a></span></h6>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i>
                                                {{ date('d-m-Y',strtotime($bbl['start_time'])) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i>
                                                {{ date('h:i:s A',strtotime($bbl['start_time'])) }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="img-wishlist">
                                <div class="protip-wishlist">
                                    <ul>

                                        <li class="protip-wish-btn"><a href="https://calendar.google.com/calendar/r/eventedit?text={{ $discount['title'] }}" target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                        @if(Auth::check())

                                        <li class="protip-wish-btn"><a class="compare" data-id="{{filter_var($discount->id)}}" title="compare"><i data-feather="bar-chart"></i></a></li>

                                        @php
                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',
                                        $discount->id)->first();
                                        @endphp
                                        @if ($wish == NULL)
                                        <li class="protip-wish-btn">
                                            <form id="demo-form2" method="post" action="{{ url('show/wishlist', $discount->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$discount->id}}" />

                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @else
                                        <li class="protip-wish-btn-two">
                                            <form id="demo-form2" method="post" action="{{ url('remove/wishlist', $discount->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$discount->id}}" />

                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist" type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @endif
                                        @else
                                        <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i data-feather="heart"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="prime-next-item-description-block-7{{$bbl->id}}" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading">{{ $bbl['meetingname'] }}</h5>
                            <div class="protip-img">
                                <a href="{{ route('bbl.detail', $bbl->id) }}"><img src="{{ Avatar::create($bbl['meetingname'])->toBase64() }}" alt="course" class="img-fluid"></a>
                            </div>

                            <div class="main-des">
                                <p>{!! $bbl['detail'] !!}</p>
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-12">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            @endif

            @if( isset($allgooglemeet) )
            @foreach($allgooglemeet as $meeting)
            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image @if($gsetting['course_hover'] == 1) protip @endif" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-6{{ $meeting['meeting_id'] }}">
                    <div class="view-block">
                        <div class="view-img">

                            @if($meeting['image'] !== NULL && $meeting['image'] !== '')
                            <a href="{{ route('googlemeetdetailpage.detail', $meeting['id']) }}"><img data-src="{{ asset('images/googlemeet/profile_image/'.$meeting['image']) }}" alt="course" class="img-fluid owl-lazy"></a>
                            @else
                            <a href="{{ route('googlemeetdetailpage.detail', $meeting['id']) }}"><img data-src="{{ Avatar::create($meeting['meeting_title'])->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
                            @endif


                        </div>
                        <div class="view-user-img">

                            @if(optional($meeting->user)['user_img'] !== NULL && optional($meeting->user)['user_img']
                            !== '')
                            <a href="{{ route('all/profile',$meeting->user->id) }}" title=""><img src="{{ asset('images/user_img/'.$meeting->user['user_img']) }}" class="img-fluid user-img-one" alt=""></a>
                            @else
                            <a href="{{ route('all/profile',$meeting->user->id) }}" title=""><img src="{{ asset('images/default/user.png') }}" class="img-fluid user-img-one" alt=""></a>
                            @endif


                        </div>
                        @if(asset('images/meeting_icons/google.png') == !NULL)
                        <div class="meeting-icon"><img src="{{ asset('images/meeting_icons/google.png')}}" class="img-circle" alt=""></div>
                        @endif

                        <div class="view-dtl">
                            <div class="view-heading"><a href="#">
                                    {{ str_limit($meeting->meeting_title, $limit = 30, $end = '...') }}</a></div>
                            <div class="user-name">
                                <h6>By <span><a href="{{ route('all/profile',$meeting->user->id) }}"> {{
                                            optional($meeting->user)['fname'] }}</a></span></h6>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i>
                                                {{ date('d-m-Y',strtotime($meeting['start_time'])) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i>
                                                {{ date('h:i:s A',strtotime($meeting['start_time'])) }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="img-wishlist">
                                <div class="protip-wishlist">
                                    <ul>

                                        <li class="protip-wish-btn"><a href="https://calendar.google.com/calendar/r/eventedit?text={{ $discount['title'] }}" target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                        @if(Auth::check())

                                        <li class="protip-wish-btn"><a class="compare" data-id="{{filter_var($discount->id)}}" title="compare"><i data-feather="bar-chart"></i></a></li>

                                        @php
                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',
                                        $discount->id)->first();
                                        @endphp
                                        @if ($wish == NULL)
                                        <li class="protip-wish-btn">
                                            <form id="demo-form2" method="post" action="{{ url('show/wishlist', $discount->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$discount->id}}" />

                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @else
                                        <li class="protip-wish-btn-two">
                                            <form id="demo-form2" method="post" action="{{ url('remove/wishlist', $discount->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$discount->id}}" />

                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist" type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @endif
                                        @else
                                        <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i data-feather="heart"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prime-next-item-description-block-6{{$meeting['meeting_id']}}" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading"><a href="{{ route('zoom.detail', $meeting->id) }}">{{
                                    $meeting['meeting_title'] }}</a>
                            </h5>
                            <div class="protip-img">
                                <h6 class="user-name">{{ __('by') }}
                                    @if(isset($meeting->user)) {{ $meeting->user['fname'] }} @endif</h6>
                                <p class="meeting-owner btm-10"><a herf="#">{{ __('Meeting Owner:') }}
                                        {{ $meeting->owner_id }}</a></p>
                            </div>
                            <div class="main-des meeting-main-des">
                                <div class="main-des-head">{{ __('Start At:') }} </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i> {{
                                                date('d-m-Y',strtotime($meeting['start_time'])) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i> {{ date('h:i:s
                                                A',strtotime($meeting['start_time'])) }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-des meeting-main-des">
                                <div class="main-des-head">{{ __('End At: ') }}</div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i> {{
                                                date('d-m-Y',strtotime($meeting['end_time'])) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i> {{ date('h:i:s
                                                A',strtotime($meeting['end_time'])) }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="des-btn-block">
                                <a href="{{ $meeting->meet_url }}" target="_blank" class="btn btn-light">Join
                                    {{ __('Meeting') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

            @if( ! $jitsimeeting->isEmpty() )
            @foreach($jitsimeeting as $meeting)
            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image @if($gsetting['course_hover'] == 1) protip @endif" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-6{{ $meeting['meeting_id'] }}">
                    <div class="view-block">
                        <div class="view-img">

                            @if($meeting['image'] !== NULL && $meeting['image'] !== '')
                            <a href="{{ route('jitsipage.detail', $meeting['id']) }}"><img data-src="{{ asset('images/jitsimeet/'.$meeting['image']) }}" alt="course" class="img-fluid owl-lazy"></a>
                            @else
                            <a href="{{ route('jitsipage.detail', $meeting['id']) }}"><img data-src="{{ Avatar::create($meeting['meeting_title'])->toBase64() }}" alt="course" class="img-fluid owl-lazy"></a>
                            @endif


                        </div>
                        <div class="view-user-img">

                            @if(optional($meeting->user)['user_img'] !== NULL && optional($meeting->user)['user_img']
                            !== '')
                            <a href="{{ route('all/profile',$meeting->user->id) }}" title=""><img src="{{ asset('images/user_img/'.$meeting->user['user_img']) }}" class="img-fluid user-img-one" alt=""></a>
                            @else
                            <a href="{{ route('all/profile',$meeting->user->id) }}" title=""><img src="{{ asset('images/default/user.png') }}" class="img-fluid user-img-one" alt=""></a>
                            @endif


                        </div>
                        @if(asset('images/meeting_icons/jitsi.png') == !NULL)
                        <div class="meeting-icon"><img src="{{ asset('images/meeting_icons/jitsi.png')}}" class="img-circle" alt=""></div>
                        @endif

                        <div class="view-dtl">
                            <div class="view-heading"><a href="#">
                                    {{ str_limit($meeting->meeting_title, $limit = 30, $end = '...') }}</a></div>
                            <div class="user-name">
                                <h6>By <span><a href="{{ route('all/profile',$meeting->user->id) }}"> {{
                                            optional($meeting->user)['fname'] }}</a></span></h6>
                            </div>
                            <div class="view-footer">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i>
                                                {{ date('d-m-Y',strtotime($meeting['start_time'])) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i>
                                                {{ date('h:i:s A',strtotime($meeting['start_time'])) }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="img-wishlist">
                                <div class="protip-wishlist">
                                    <ul>

                                        <li class="protip-wish-btn"><a href="https://calendar.google.com/calendar/r/eventedit?text={{ $discount['title'] }}" target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                        @if(Auth::check())

                                        <li class="protip-wish-btn"><a class="compare" data-id="{{filter_var($discount->id)}}" title="compare"><i data-feather="bar-chart"></i></a></li>

                                        @php
                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',
                                        $discount->id)->first();
                                        @endphp
                                        @if ($wish == NULL)
                                        <li class="protip-wish-btn">
                                            <form id="demo-form2" method="post" action="{{ url('show/wishlist', $discount->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$discount->id}}" />

                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @else
                                        <li class="protip-wish-btn-two">
                                            <form id="demo-form2" method="post" action="{{ url('remove/wishlist', $discount->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                <input type="hidden" name="course_id" value="{{$discount->id}}" />

                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist" type="submit"><i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                        @endif
                                        @else
                                        <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i data-feather="heart"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prime-next-item-description-block-6{{$meeting['meeting_id']}}" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading"><a href="{{ route('zoom.detail', $meeting->id) }}">{{
                                    $meeting['meeting_title'] }}</a>
                            </h5>
                            <div class="protip-img">
                                <h6 class="user-name">{{ __('by') }}
                                    @if(isset($meeting->user)) {{ $meeting->user['fname'] }} @endif</h6>
                                <p class="meeting-owner btm-10"><a herf="#">{{ __('Meeting Owner')}}:
                                        {{ $meeting->owner_id }}</a></p>
                            </div>
                            <div class="main-des meeting-main-des">
                                <div class="main-des-head">Start At: </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i> {{
                                                date('d-m-Y',strtotime($meeting['start_time'])) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i> {{ date('h:i:s
                                                A',strtotime($meeting['start_time'])) }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-des meeting-main-des">
                                <div class="main-des-head">{{ __('End At')}}: </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i> {{
                                                date('d-m-Y',strtotime($meeting['end_time'])) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i> {{ date('h:i:s
                                                A',strtotime($meeting['end_time'])) }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="des-btn-block">
                                <a href="{{url('meetup-conferencing/'.$meeting->meeting_id) }}" target="_blank" class="btn btn-light">{{ __('Join Meeting')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif


        </div>

        @endif

    </div>
</section>
@endif
@endif
<!-- Zoom end -->

<!-- google class room start -->
@if(Schema::hasTable('googleclassrooms') && Module::has('Googleclassroom') &&
Module::find('Googleclassroom')->isEnabled())
@include('googleclassroom::frontend.home')
@endif

<!-- google class room end -->
@if($hsetting->batch_enable == 1 && ! $instruct->isEmpty() )
<section id="instructor-home-two" class="instructor-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h4 class="student-heading">{{ __('Featured Instructor') }}</h4>
            </div>

        </div>

        <div id="instructor-home-slider-two" class="instructor-home-main-slider owl-carousel">
            @foreach($instruct as $inst)
            <div class="item">
                <div class="instructor-home-block text-center">
                    <div class="instructor-home-block-one">
                        @if($inst->user->user_img !== NULL && $inst->user->user_img !== '')
                        <a href="#" title=""><img src="{{ url('/images/user_img/'.$inst->user->user_img) }}" class="img-fluid" /></a>
                        @else
                        <a href="#" title=""><img src="{{ Avatar::create($inst->user->fname)->toBase64() }}" alt="course" class="img-fluid"></a>
                        @endif
                        <div class="instructor-home-hover-icon">
                            <ul>
                                <li>
                                    <div class="tooltip">
                                        <div class="tooltip-icon">
                                            <i data-feather="share-2"></i>
                                        </div>
                                        <span class="tooltiptext">
                                            <div class="instructor-home-social-icon">
                                                <ul>
                                                    <li><a href="{{ $inst->fb_url }}"><i data-feather="facebook"></i></a></li>
                                                    <li><a href="{{ $inst->twitter_url }}"><i data-feather="twitter"></i></a></li>
                                                    <li><a href="{{ $inst->youtube_url }}"><i data-feather="youtube"></i></a></li>
                                                    <li><a href="{{ $inst->linkedin_url }}"><i data-feather="linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="instructor-home-btn">
                                        <a href="{{ route('allinstructor/profile',$inst->id) }}" class="btn btn-primary" title="View Profile"><i data-feather="eye"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="instructor-home-dtl">
                            <h4 class="instructor-home-heading"><a href="#" title="">{{ $inst->fname }} {{ $inst->lname
                                    }}</a></h4>
                            <p>{{ $inst->role }}</p>

                            @php

                            $followers = App\Followers::where('user_id', '!=', $inst->id)->where('follower_id',
                            $inst->id)->count();

                            $followings = App\Followers::where('user_id', $inst->id)->where('follower_id','!=',
                            $inst->id)->count();
                            $course = App\Course::where('user_id', $inst->id)->count();

                            @endphp
                            <div class="instructor-home-info">
                                <ul>
                                    <li>{{ $course }} {{ __('Courses') }}</li>
                                    <li>{{ $followers }} {{ __('Follower') }}</li>
                                    <li>{{ $followings }} {{ __('Following') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endif
<!-- Bundle start -->
@if($hsetting->blog_enable == 1 && ! $blogs->isEmpty() )
<section id="student" class="student-main-block">
    <div class="container">

        <h4 class="student-heading">{{ __('Recent Blogs') }}</h4>
        <div id="blog-post-slider" class="student-view-slider-main-block owl-carousel">
            @foreach($blogs as $blog)


            <div class="item student-view-block student-view-block-1">
                <div class="genre-slide-image @if($gsetting['course_hover'] == 1) protip @endif" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-8{{$blog->id}}">
                    <div class="view-block">
                        <div class="view-img">
                            @if($blog['image'] !== NULL && $blog['image'] !== '')
                            @if($blog->slug != NULL)
                            <a href="{{ route('blog.detail', ['id' => $blog->id, 'slug' => $blog->slug ]) }}">
                                @else
                                <a href="{{ route('blog.detail', ['id' => $blog->id, 'slug' => str_slug(str_replace('-','&',$blog->heading)) ]) }}">
                                    @endif

                                    <img data-src="{{ asset('images/blog/'.$blog['image']) }}" alt="course" class="img-fluid owl-lazy">
                                </a>
                                @else
                                @if($blog->slug != NULL)
                                <a href="{{ route('blog.detail', ['id' => $blog->id, 'slug' => $blog->slug ]) }}">
                                    @else
                                    <a href="{{ route('blog.detail', ['id' => $blog->id, 'slug' => str_slug(str_replace('-','&',$blog->heading)) ]) }}">
                                        @endif
                                        <img data-src="{{ Avatar::create($blog->heading)->toBase64() }}" alt="course" class="img-fluid owl-lazy">
                                    </a>
                                    @endif
                        </div>
                        <div class="view-user-img">

                            @if(optional($blog->user)['user_img'] !== NULL && optional($blog->user)['user_img'] !== '')
                            <a href="{{ route('all/profile',$blog->user->id) }}" title=""><img src="{{ asset('images/user_img/'.$blog->user['user_img']) }}" class="img-fluid user-img-one" alt=""></a>
                            @else
                            <a href="{{ route('all/profile',$blog->user->id) }}" title=""><img src="{{ asset('images/default/user.png') }}" class="img-fluid user-img-one" alt=""></a>
                            @endif


                        </div>
                        <div class="tooltip">
                            <div class="tooltip-icon">
                                <i data-feather="share-2"></i>
                            </div>
                            <span class="tooltiptext">
                                <div class="instructor-home-social-icon">
                                    <ul>
                                        <li><a href="{{ $blog->user->fb_url }}"><i data-feather="facebook"></i></a></li>
                                        <li><a href="{{ $blog->user->twitter_url }}"><i data-feather="twitter"></i></a>
                                        </li>
                                        <li><a href="{{ $blog->user->youtube_url }}"><i data-feather="youtube"></i></a>
                                        </li>
                                        <li><a href="{{ $blog->user->linkedin_url }}"><i data-feather="linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </span>
                        </div>
                        <div class="view-dtl">
                            <div class="view-heading">
                                @if($blog->slug != NULL)
                                <a href="{{ route('blog.detail', ['id' => $blog->id, 'slug' => $blog->slug ]) }}">
                                    {{ str_limit($blog['heading'], $limit = 25, $end = '...') }}
                                    @else
                                    <a href="{{ route('blog.detail', ['id' => $blog->id, 'slug' => str_slug(str_replace('-','&',$blog->heading)) ]) }}">

                                        {{ str_limit($blog['heading'], $limit = 25, $end = '...') }}
                                        @endif
                                    </a>
                            </div>
                            <div class="user-name">
                                <h6>By <span><a href="{{ route('all/profile',$blog->user->id) }}"> {{
                                            optional($blog->user)['fname'] }}</a></span></h6>
                            </div>
                            <div class="view-footer">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i>
                                                {{ date('d-m-Y',strtotime($blog['created_at'])) }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i>
                                                {{ date('h:i:s A',strtotime($blog['created_at'])) }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prime-next-item-description-block-8{{$blog->id}}" class="prime-description-block">
                    <div class="prime-description-under-block">
                        <div class="prime-description-under-block">
                            <h5 class="description-heading">{{ $blog['heading'] }}</h5>
                            <div class="row btm-20">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="view-date">
                                        <a href="#"><i data-feather="calendar"></i> {{
                                            date('d-m-Y',strtotime($blog['start_time'])) }}</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="view-time">
                                        <a href="#"><i data-feather="clock"></i> {{ date('h:i:s
                                            A',strtotime($blog['start_time'])) }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="main-des">
                                <p>{{substr(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($blog->detail))),
                                    0, 400)}}
                                </p>
                            </div>
                            <div class="des-btn-block">
                                <div class="row">
                                    <div class="col-lg-12">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>

    </div>
</section>
@endif
<!-- Bundle end -->
<!-- recommendations start -->
@if($hsetting->became_enable == 1)
<section id="border-recommendation" class="border-recommendation">
    @php
    $gets = App\JoinInstructor::first();
    @endphp
    @if(isset($gets))
    <!-- <div class="top-border"></div> -->
    <div class="recommendation-main-block  text-center">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-4 col-sm-5">
                    <div class="recommendations-block">
                        <h4 class="recommendations-heading"> {{ $gets->text }}</h4>
                        <p>{{ $gets->detail }}</p>
                        <div class="recommendation-btn">
                            <a href="" data-toggle="modal" data-target="#myModalinstructor" class="btn btn-primary" title="Become an Instructor">{{__('Become an Instructor')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-7">
                    <div id="recommendations-slider" class="recommendations-main-slider owl-carousel">
                        <div class="item">
                            <div class="recommendations-img">
                                @if($gets['img'] !== NULL && $gets['img'] !== '')
                                <img src="{{ url('/images/joininstructor/'.$gets->img) }}" height="100px;" width="100px;" />
                                @else
                                <img src="{{ Avatar::create($gets->text)->toBase64() }}" alt="course" class="img-fluid">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endif
<!-- recommendations end -->
<!-- categories start -->
@if($hsetting->featuredcategories_enable == 1 && !$category->isEmpty())
<section id="categories" class="categories-main-block">
    <div class="container-xl">
        @if( count($category->where('featured', '1')) > 0)

        <h3 class="categories-heading">{{ __('Featured Categories') }}</h3>
        <div class="row">
            @foreach($category as $t)
            @if($t->status == 1 && $t->featured == 1)

            <div class="col-lg-2 col-md-4 col-sm-4 col-6">

                <div class="cat-container btm-20 text-center">
                    <a href="{{ route('category.page',['id' => $t->id, 'category' => str_slug(str_replace('-','&',$t->slug))]) }}">
                        <div class="cat-img">
                            @if($t['cat_image'] == !NULL)
                            <img src="{{ asset('images/category/'.$t['cat_image']) }}">
                            @else
                            <img src="{{ Avatar::create($t->title)->toBase64() }}">
                            @endif
                        </div>
                        <div class="cat-dtl">
                            <div>
                                <span>
                                    <h5 class="cat-name"><i class="fa {{ $t['icon'] }} mr-2"></i>{{ $t['title'] }}</h5>
                                    <div class="cat-img-count">{{ $t->courses->count() }} {{ __('Courses')}}</div>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- <a href="{{ route('category.page',['id' => $t->id, 'category' => str_slug(str_replace('-','&',$t->slug))]) }}">
                        <div class="image-overlay">
                            <span><i class="fa {{ $t['icon'] }}"></i>{{ $t['title'] }}
                                <div class="categories-img-count">{{ $t->courses->count() }} {{ __('Courses')}}</div>
                            </span>
                         </div>
                        @if($t['cat_image'] == !NULL)
                        <img src="{{ asset('images/category/'.$t['cat_image']) }}">
                        @else
                        <img src="{{ Avatar::create($t->title)->toBase64() }}">
                        @endif
                    </a> -->
                <!-- </div> -->

            </div>

            @endif
            @endforeach
        </div>

        @endif
    </div>
</section>
@endif
<!-- categories end -->
<!-- testimonial start -->
@if($hsetting->testimonial_enable == 1 && ! $testi->isEmpty() )
<section id="testimonial" class="testimonial-main-block">
    <div class="container-xl">
        <h4 class="test_heading">{{ __('What People are Saying About Us') }}</h4>
        <div id="testimonial-slider" class="testimonial-slider-main-block owl-carousel">
            @foreach($testi as $tes)
            <div class="item testimonial-block text-center">
                <div class="testimonial-block-one">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="testimonial-img">
                                <img data-src="{{ asset('images/testimonial/'.$tes['image']) }}" alt="blog" class="img-fluid owl-lazy">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                            <div class="testimonial-name">
                                <h5 class="testimonial-heading">{{ $tes['client_name'] }}</h5>
                                <p class="testimonial-para">{{ $tes['designation'] }}</p>
                            </div>
                            <div class="testimonial-rating">
                                @for($i = 1; $i <= 5; $i++) @if($i<=$tes->rating)
                                    <i class='fa fa-star' style='color:orange'></i>
                                    @else
                                    <i class='fa fa-star' style='color:#ccc'></i>
                                    @endif
                                    @endfor
                            </div>
                        </div>
                    </div>
                    <p>{{ str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($tes->details))) ,
                        $limit = 300, $end = '...') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!-- testimonial end -->
<!-- video start -->
@if($hsetting->video_enable == 1 && isset($videosetting) )
<section id="video" class="video-main-block">
    <div class="container-fluid">
        <div class="video-block">
            @if($videosetting['image'] !== NULL && $videosetting['image'] !== '')
            <img src="{{ url('/images/videosetting/'.$videosetting->image) }}" class="img-fluid" />
            @else
            <img src="{{ Avatar::create($videosetting->tittle)->toBase64() }}" alt="course" class="img-fluid">
            @endif
            <div class="overlay-bg"></div>
        </div>
        <div class="video-play-btn">
            <a class="play-btn" href="#video_modal" data-toggle="modal"></a>
            <div id="video_modal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe id="elearningVideo" class="embed-responsive-item" width="560" height="315" src="{{$videosetting->url}}" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-dtl text-center">
            <h3 class="video-heading text-white">{{ $videosetting->tittle }}</h3>
            <p class="text-white">{{ $videosetting->description }}</p>
        </div>
    </div>
</section>
@endif
<!-- video end -->

<!-- instructor start -->
@if( $hsetting->institute_enable == 1 && !$institute->isEmpty())
<section id="instructor-home" class="instructor-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">{{ __('Instructor') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="instructor-button txt-rgt">
                    <a href="{{ route('allinstructor/view') }}" class="btn btn-secondary" title="All Instructor">{{
                        __('All Instructor') }}<i data-feather="chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div id="instructor-home-slider" class="instructor-home-main-slider owl-carousel">
            @foreach($instructors as $inst)
            <div class="item">
                <div class="instructor-home-block text-center">
                    <div class="instructor-home-block-one">
                        @if($inst['user_img'] !== NULL && $inst['user_img'] !== '')
                        <a href="#" title=""><img src="{{ url('/images/user_img/'.$inst->user_img) }}" class="img-fluid" /></a>
                        @else
                        <a href="#" title=""><img src="{{ Avatar::create($inst->fname)->toBase64() }}" alt="course" class="img-fluid"></a>
                        @endif
                        <div class="instructor-home-hover-icon">
                            <ul>
                                <li>
                                    <div class="tooltip">
                                        <div class="tooltip-icon">
                                            <i data-feather="share-2"></i>
                                        </div>
                                        <span class="tooltiptext">
                                            <div class="instructor-home-social-icon">
                                                <ul>
                                                    <li><a href="{{ $inst->fb_url }}"><i data-feather="facebook"></i></a></li>
                                                    <li><a href="{{ $inst->twitter_url }}"><i data-feather="twitter"></i></a></li>
                                                    <li><a href="{{ $inst->youtube_url }}"><i data-feather="youtube"></i></a></li>
                                                    <li><a href="{{ $inst->linkedin_url }}"><i data-feather="linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="instructor-home-btn">
                                        <a href="{{ route('allinstructor/profile',$inst->id) }}" class="btn btn-primary" title="View Profile"><i data-feather="eye"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="instructor-home-dtl">
                            <h4 class="instructor-home-heading"><a href="#" title="">{{ $inst->fname }} {{ $inst->lname
                                    }}</a></h4>
                            <p>{{ $inst->role }}</p>

                            @php

                            $followers = App\Followers::where('user_id', '!=', $inst->id)->where('follower_id',
                            $inst->id)->count();

                            $followings = App\Followers::where('user_id', $inst->id)->where('follower_id','!=',
                            $inst->id)->count();
                            $course = App\Course::where('user_id', $inst->id)->count();

                            @endphp
                            <div class="instructor-home-info">
                                <ul>
                                    <li>{{ $course }} {{ __('Courses') }}</li>
                                    <li>{{ $followers }} {{ __('Follower') }}</li>
                                    <li>{{ $followings }} {{ __('Following') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endif
@if($hsetting->get_enable == 1)
<section id="get-started" class="get-started-main-block">
    <div class="container-fluid p-0">
        <div class="get-started-block">
            <div class="get-started-bg-image">
                @if($get_enable['image'] !== NULL && $get_enable['image'] !== '')
                <img src="{{ url('/images/getstarted/'.$get_enable->image) }}" class="img-fluid" />
                @else
                <img src="{{ Avatar::create($get_enable->heading)->toBase64() }}" alt="course" class="img-fluid">
                @endif
                <div class="overlay-bg"></div>
            </div>
            <div class="get-started-dtl text-center">
                <h1 class="get-started-title text-white mb-2">{{ $get_enable->heading }}</h1>
                <h4 class="get-started-sub-title text-white">{{ $get_enable->sub_heading }}</h4>
                <a href="{{ $get_enable->link }}" type="button" class="btn btn-primary">{{ $get_enable->button_txt
                    }}</a>
            </div>
        </div>
    </div>
</section>
@endif
@if( $hsetting->instructor_enable == 1 && !$institute->isEmpty() && isset($inst->slug))
<section id="instructor-home" class="instructor-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">{{ __('Institute') }}</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="instructor-button txt-rgt">
                    {{-- <a href="{{ route('allinstructor/view') }}" class="btn btn-secondary"
                    title="All Instructor">All Institute<i data-feather="chevron-right"></i> --}}
                    {{-- </a> --}}
                </div>
            </div>
        </div>

        <div id="institute-home-slider" class="instructor-home-main-slider owl-carousel">
            @foreach($institute as $inst)
            @if(isset($inst->slug))
            <div class="item">
                <div class="instructor-home-block text-center">
                    <div class="instructor-home-block-one">
                        @if($inst['image'] !== NULL && $inst['image'] !== '')
                        <a href="{{ route('ins.sluging',['id' => $inst->id, 'slug' => $inst->slug ]) }}" title=""><img src="{{ url('/files/institute/'.$inst->image) }}" class="img-fluid" /></a>
                        @else
                        <a href="{{ route('ins.sluging',['id' => $inst->id, 'slug' => $inst->slug ]) }}" title=""><img src="{{ Avatar::create($inst->fname)->toBase64() }}" alt="course" class="img-fluid"></a>
                        @endif
                        <div class="instructor-home-hover-icon">
                            <ul>
                                <li>
                                    <div class="instructor-home-btn">
                                        <a href="{{ route('ins.sluging',['id' => $inst->id, 'slug' => $inst->slug ]) }}" class="btn btn-primary" title="View Page"><i data-feather="eye"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="instructor-home-dtl">
                            <h4 class="instructor-home-heading"><a href="{{ route('ins.sluging',['id' => $inst->id, 'slug' => $inst->slug ]) }}" title="">{{ $inst->title }} </a></h4>
                            <p>{{ $inst->email }}</p>
                            <p>{{ $inst->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>
    </div>
</section>
@endif
<!-- instructor end -->
<!-- Advertisement -->
@if(isset($advs))
@foreach($advs as $adv)
@if($adv->position == 'belowtestimonial')
<br>
<section id="student" class="student-main-block btm-40">
    <div class="container-xl">
        <a href="{{ $adv->url1 }}" title="{{ __('Click to visit') }}">
            <img class="lazy img-fluid advertisement-img-one" data-src="{{ url('images/advertisement/'.$adv->image1) }}" alt="{{ $adv->image1 }}">
        </a>
    </div>
</section>
@endif
@endforeach
@endif
@if($hsetting->trusted_enable == 1 && ! $trusted->isEmpty() )
<section id="trusted" class="trusted-main-block">
    <div class="container-xl">
        <div class="patners-block">

            <h6 class="patners-heading btm-40">{{ __('Trusted By Companies') }}</h6>
            <div id="patners-slider" class="patners-slider owl-carousel">
                @foreach($trusted as $trust)
                <div class="item-patners-img">
                    <a href="{{ $trust['url'] }}" target="_blank"><img data-src="{{ asset('images/trusted/'.$trust['image']) }}" class="img-fluid owl-lazy" alt="patners-1"></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</section>
@endif

<section id="trusted" class="trusted-main-block">
    <!-- google adsense code -->
    <div class="container-fluid" id="adsense">
        @php
        $ad = App\Adsense::first();
        @endphp
        <?php
        if (isset($ad)) {
            if ($ad->ishome == 1 && $ad->status == 1) {
                $code = $ad->code;
                echo html_entity_decode($code);
            }
        }
        ?>
    </div>
</section>


@endsection

@section('custom-script')



<script>
    (function($) {
        "use strict";
        // $(window).scroll(function() {
        // console.log("Facts height is ", $("#facts").height());
        // console.log("Window scroll height is  ", $(window).scrollTop());
        // console.log("Document scroll height is  ", $(document).height() );
        // if($(window).scrollTop() >=  $("#facts").height()) {
        //     $("#facts").fadeIn(1500);
        // }
        // if($(window).scrollTop() >=  $("#student").height()){
        //     $("#student").fadeIn(1500);
        // }
        // if($(window).scrollTop() >=  $("#learning-courses").height()){
        //     $("#learning-courses").fadeIn(1500);
        // }
        // if($(window).scrollTop() >=  $("#subscription").height()){
        //     $("#subscription").fadeIn(1500);
        // }else{
        //     $("#facts").hide();
        //     $("#student").hide();
        //     $("#learning-courses").hide();
        //     $("#subscription").hide();
        // }
        // });
        $(function() {
            $("#home-tab").trigger("click");
        });
    })(jQuery);

    function showtab(id) {
        $.ajax({
            type: 'GET',
            url: '{{ url(' / tabcontent ') }}/' + id,
            dataType: 'json',
            success: function(data) {

                $('.btn_more').html(data.btn_view);
                $('#tabShow').html(data.tabview);

            }
        });
    }
</script>

<script src="{{ url('js/colorbox-script.js')}}"></script>


<script>
    "use Strict";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function() {
        $('.compare').on('click', function(e) {
            var id = $(this).data('id');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: 'compare/dataput',
                data: {
                    id: id
                },
                success: function(data) {}
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        /* Get iframe src attribute value i.e. YouTube video url
        and store it in a variable */
        var url = $("#elearningVideo").attr('src');

        /* Assign empty url value to the iframe src attribute when
        modal hide, which stop the video playing */
        $("#video_modal").on('hide.bs.modal', function() {
            $("#elearningVideo").attr('src', '');
        });

        /* Assign the initially stored url back to the iframe src
        attribute when modal is displayed again */
        $("#video_modal").on('show.bs.modal', function() {
            $("#elearningVideo").attr('src', url);
        });
    });
</script>

@endsection