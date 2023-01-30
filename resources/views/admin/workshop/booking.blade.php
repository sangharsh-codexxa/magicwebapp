@extends('admin.layouts.master')
@section('title','All Workshops')
@section('maincontent')
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Workshops') }}
@endslot

@slot('menu1')
{{ __('Workshop Bookings') }}
@endslot
@slot('button')
<div class="col-md-4 col-lg-4">
  <div class="widgetbar">

  </div>
</div>

@endslot
@endcomponent
<div class="contentbar">
  <div class="row">

    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <h5 class="card-box">{{ __('All Workshops') }}</h5>
          <div class="row"><div class="col-md-12">
              <select calss="form-control" id="selected-workshop">
                  <option value="0">All</option>
                  @foreach($workshops as $workshop)
                  <option value="{{$workshop->id}}">{{$workshop->title}}</option>
                  @endforeach
              </select>
          </div>
          </div>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table id="datatable-server" class="table table-striped table-bordered">
              <thead>
                <tr>
                  
                  <th>{{ __('User Name') }}</th>
                  <th>{{ __('Workshop Name') }}</th>
                  <th>{{ __('Start Date Time') }}</th>
                </tr>
              </thead>
              <tbody>
                
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- End col -->
  </div>
  <!-- End row -->
</div>



@endsection

@section('script')


<script>
var tableServer = null;
  $(document).ready(() => {
    tableServer = $('#datatable-server').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{url('list/bookings')}}',
    });
    
    $('#selected-workshop').select2()
    $('#selected-workshop').on('change', (e) => {
        var url = `{{url('list/bookings')}}?workshop_id=${e.target.value}`;
        console.log(url);
        tableServer.ajax.reload(url)
    });
  });
</script>

@endsection