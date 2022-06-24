@extends('layouts.admin')
@section('header','DASBOARD')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$total_karyawan}}</h3>
                    <p>TOTAL PRESENSI</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </div>
                <a href="{{url('masuk')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/dist/js/adminlte.min.js?v=3.2.0')}}"></script>