@extends('layouts.app')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
  
    <div class="section-body">
      <h3 class="font-weight-bold">Welcome {{ auth()->user()->name }}</h3>
      <h6 class="font-weight-normal mb-0">All systems are running smoothly! <span class="text-primary">
      
        <div class="row mt-3">

          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="fas fa-users"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Merchant</h4>
                </div>
                <div class="card-body">
                  {{ $merchant }}
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-danger">
                <i class="fas fa-cubes"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Product</h4>
                </div>
                <div class="card-body">
                  {{ $product }}
                </div>
              </div>
            </div>
          </div>

        </div>

    </div>
  </section>
@endsection