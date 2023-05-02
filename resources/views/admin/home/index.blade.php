@extends('layouts.admin')
@section('container')
    <main class="content">
      <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Home</h1>
        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="card flex-fill w-100">
              <div class="card-header">
                <h5 class="card-title">Jumlah Duga Bahaya Tahun {{ date('m') }}</h5>
                {{-- <h6 class="card-subtitle text-muted">A line chart is a way of plotting data points on a line.</h6> --}}
              </div>
              <div class="card-body">
                @if ($label)
                <div class="chart">
                  <canvas id="chartjs-line"></canvas>
                </div>
                @else
                <div class="text-center">
                  <i class="align-middle mb-2" data-feather="alert-circle"></i>
                  <h5>Data is still empty</h5>
                </div>
                @endif 
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Kategori</h5>
                {{-- <h6 class="card-subtitle text-muted">A bar chart provides a way of showing data values represented as vertical bars.</h6> --}}
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </main>

@endsection