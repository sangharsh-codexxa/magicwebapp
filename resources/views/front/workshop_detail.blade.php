@extends('theme.master')
@section('title', "$workshop->title")
@section('content')

@include('admin.message')

@section('meta_tags')

@php
$url = URL::current();
@endphp

<meta name="title" content="{{ $workshop->title }}">

@endsection

<section id="about-home" class="about-home-main-block">
  <div class="container-xl">
    <div class="row">
      <div class="col-lg-8 col-md-8">
        <div class="about-home-block">
          <h1 class="about-home-heading">{{ $workshop->title }}</h1>
          <p>{{ $workshop->description }}</p>

        </div>
      </div>
      <!-- course preview -->
      <div class="col-lg-4 col-md-4">

        <div class="about-home-product">
          <div class="video-item hidden-xs">
            <script type="text/javascript">
            </script>

            <div class="video-device">
              <img src="{{url('images/workshop/') . '/' . $workshop->image}}" class="bg_img img-fluid" alt="Background">
            </div>
          </div>
          <div id="bar-fixed">
            <div class="about-home-dtl-training">

              <div class="about-home-dtl-block btm-10">
                <!--<li>Rs 200</li>-->
                <div class="about-home-rate">
                  <ul>
                    <li>{{ activeCurrency()->getData()->position == 'l'  ? activeCurrency()->getData()->symbol :'' }}{{ price_format(  currency($workshop->fee, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false)) }}{{ activeCurrency()->getData()->position == 'r'  ? activeCurrency()->getData()->symbol :'' }}</li>
                  </ul>
                </div>
                @if(Auth::check())
                
                <div class="payment-proceed-btn">
		                            		<form action="{{ route('book-workshop') }}" method="POST">
		                            			@csrf
		                            			   <input type="hidden" name="workshop_id" value="{{$workshop->id}}" />
		                            			
		                         				<input type="hidden" name="amount" value="{{ $workshop->fee }}"/>
		                         				
		                         				<script
												    src="https://checkout.razorpay.com/v1/checkout.js"
												    data-key="{{ env('RAZORPAY_KEY') }}"
												    data-amount= "{{ $workshop->fee*100 }}"
												    data-currency="{{ $currency->code }}"
												    data-order_id=""
												    data-buttontext="BOOK NOW"
												    data-name="{{ $gsetting->project_title }}"
												    data-description=""
												    data-image="{{ asset('images/logo/'.$gsetting->logo) }}"
												    data-prefill.name="XYZ"
												    data-prefill.email="{{auth()->user()->email}}"
												    data-theme.color="#F44A4A"
												></script>
		                            		</form>
		                            	</div>

    
                </div>




                @else
                <div class="about-home-btn btm-20">
                  <a href="{{ route('login') }}" class="btn btn-primary" title="Enroll Now">{{ __('Enroll Now') }}</a>
                </div>
                @endif







 





                <!--Model close -->
              </div>


              <div class="container-xl" id="adsense">
                <!-- google adsense code -->
              </div>
            </div>
          </div>
          <br>



        </div>
      </div>
    </div>
  </div>
</section>
<section id="about-product" class="about-product-main-block">
  <div class="container-xl">
    <div class="row">
      <div class="col-lg-8 col-md-8">








        <div class="requirements about-home-block">
          <h3>Workshop Details</h3>
          <ul>

            <li>

              <a href="#" class="text-dark" title="about">Start: </a>
              <a href="#" class="text-dark" title="instructor"> {{Carbon\Carbon::parse($workshop->start_date . ' ' .
                $workshop->start_time)->format('D, d M Y h:i A')}}
              </a>
            </li>
            <li>

              <a href="#" class="text-dark" title="about">End: </a>
              <a href="#" class="text-dark" title="instructor"> {{Carbon\Carbon::parse($workshop->end_date . ' ' .
                $workshop->end_time)->format('D, d M Y h:i A')}} </a>
            </li>

          </ul>
        </div>
        <div class="description-block btm-30">
          <h3>Description</h3>

          <p></p>
          <p>{{ $workshop->description }}</p>
          <p></p>

        </div>











        <div class="learning-review btm-40">
        </div>




        <!--Model start-->
        <!--Model close -->
      </div>

    </div>
  </div>
  <div>
    <div class="container-xl">
    </div>
  </div>

</section>

@endsection





<style type="text/css">
  .read-more-show {
    cursor: pointer;
    color: #0284A2;
  }

  .read-more-hide {
    cursor: pointer;
    color: #0284A2;
  }

  .hide_content {
    display: none;
  }
</style>