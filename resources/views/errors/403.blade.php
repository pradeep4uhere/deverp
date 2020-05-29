@extends('layouts.dashboard')
@section('content')
<div class="content-wrapper">
  <section class="content">
      <div class="error-page" style="width: 50%">
        <h2 class="headline text-red">403</h2>
        <div class="error-content">
          </br>
          <h3> <i class="fa fa-warning text-red"></i>&nbsp;{{ $exception->getMessage() }}</h3>
          <p> We could not find the page you were looking for. </br>
          Meanwhile, you may return to <b><a href="{{route('home')}}">Dashboard</a></b> or try using the search form.</p>
        </div>
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
</div>
@endsection