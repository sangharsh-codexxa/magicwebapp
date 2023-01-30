@extends('theme.master')
@section('title', 'Purchase History')
@section('content')

@include('admin.message')

<!-- about-home start -->
@php
$gets = App\Breadcum::first();
@endphp
@if(isset($gets))
<section id="business-home" class="business-home-main-block">
	<div class="business-img">
		@if($gets['img'] !== NULL && $gets['img'] !== '')
		<img src="{{ url('/images/breadcum/'.$gets->img) }}" class="img-fluid" alt="" />
		@else
		<img src="{{ Avatar::create($gets->text)->toBase64() }}" alt="course" class="img-fluid">
		@endif
	</div>
	<div class="overlay-bg"></div>
	<div class="container-xl">
		<div class="business-dtl">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="bredcrumb-dtl">
						<h1 class="wishlist-home-heading text-white">{{ __('Booking History') }}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endif
<!-- about-home start -->

<!-- about-home end -->


<section class="purchase-main-block">
	<div class="container-xl">
		<div class="purchase-table table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th class="purchase-history-heading">{{ __('Booking History') }}</th>
						<th class="purchase-text">{{ __('Booked on') }}</th>
						<th class="purchase-text">{{ __('Workshop Start') }}</th>
						<th class="purchase-text">{{ __('Workshop End') }}</th>
						<th class="purchase-text">{{ __('Payment Mode') }}</th>
						<th class="purchase-text">{{ __('Total Price') }}</th>
						<th class="purchase-text">{{ __('Payment Status') }}</th>

					</tr>
				</thead>

				@foreach($bookings as $booking)

				<div class="purchase-history-table">
					<tbody>
						<tr>
							<td>
								<div class="purchase-history-course-img">
									<a href="{{url('workshop') . '/' . $booking->workshop_id }}/details"><img src="{{asset('images/workshop/'.$booking->workshop_image)}}" class="img-fluid" alt="{{ $booking->workshop_title }}"></a>
								</div>
								<div class="purchase-history-course-title">
									<a href="{{url('workshop') . '/' . $booking->workshop_id }}/details">{{ $booking->workshop_title }}</a>
								</div>
							</td>
							<td>
								<div class="purchase-text">{{ date('jS F Y', strtotime($booking->created_at)) }}</div>
							</td>
							<td>
								<div class="purchase-text">
									{{ date('jS F Y', strtotime("{$booking->start_date} {$booking->start_time}")) }}
								</div>
							</td>
							<td>
								<div class="purchase-text">
									{{ date('jS F Y', strtotime("{$booking->end_date} {$booking->end_time}")) }}
								</div>
							</td>

							<td>
								<div class="purchase-text">{{ $booking->payment_method }}</div>
							</td>
							<td>
								<div class="purchase-text"><b>

										{{ $booking->currency_icon }}

										{{ $booking->total_amount }}</b>
								</div>

							</td>

							<td>
								<div class="purchase-text">

									{{ __('Received') }}


								</div>
							</td>




						</tr>
					</tbody>
				</div>

				@endforeach
			</table>
		</div>
	</div>
</section>



@endsection