@extends('theme.master')
@section('title')
@section('content')
@include('admin.message')
<div class="student-view-slider-main-block view-more-pages">
    <div class="container-xl">
        <div class="row">
            @foreach($shops as $shop)
            <div class="col-lg-3">
                <div class="student-view-block student-view-block-1">
                    <div class="genre-slide-image ">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="{{url('workshop') . '/' . $shop->id }}/details"><img src="{{asset('images/workshop/'.$shop->image)}}" alt="course" class="img-fluid owl-lazy"></a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading"><a href="{{url('workshop') . '/' . $shop->id }}/details">{{ str_limit($shop->title, $limit = 30, $end = '...') }}</a>
                                </div>



                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('custom-script')
@endsection