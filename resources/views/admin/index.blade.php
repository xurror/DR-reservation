@extends('layouts.app')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ __('Dashboard') }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button class="btn btn-sm btn-outline-secondary">{{ __('Share') }}</button>
        <button class="btn btn-sm btn-outline-secondary">{{ __('Export') }}</button>
      </div>
      <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        {{ __('This week') }}
      </button>
    </div>
  </div>

  <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

  <h2>{{ __('Payment Request') }}</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm table-hover" id="myTable">
      <thead>
        <tr>
          <th>{{ __('#') }}</th>
          <th>{{ __('Guest Name') }}</th>
          <th>{{ __('Package Description') }}</th>
          <th>{{ __('method') }}</th>          
        </tr>
      </thead>
      <tbody>
        @foreach ($requests as $request)
          <tr>
            <td><a href="{{ url('/admin/payments/' . $request->id) }}">{{ __($request->id) }}</a></td>
            <td>{{ __($request->first_name . ' ' . $request->last_name) }}</td>            
            <td>{{ __($request->description) }}</td>
            <td>{{ __($request->method) }}</td>
          </tr>              
        @endforeach        
      </tbody>
    </table>
  </div>
</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {

    $('#myTable tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

  });
</script>

@endsection
