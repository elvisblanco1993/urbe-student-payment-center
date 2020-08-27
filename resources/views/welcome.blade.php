@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid m-0 p-0" style="background-image: url('{{ asset('img/pexels-buro-millennial-1438072.jpg') }}');background-position: top center; background-size: cover">
    <div class="m-0" style="background-color: #07326063">
        <div class="container" style="padding-top: 10%; padding-bottom: 10%;">
            <h1 class="display-4 text-white">{{ config('app.name', 'Student Payment Center') }}</h1>
            <p class="lead text-white">Manage your payment information.</p>
            <button
                class="btn btn-lg btn-primary"
                onclick="window.location.href='{{ url('login') }}'">
                PORTAL LOGIN
            </button>
        </div>
    </div>
</div>

{{-- Display banner only when there is data on the database --}}
@if ( ! is_null( $next_start ) )
    <div class="bg-white text-center">
        <h3 class="font-weight-bolder py-2 px-2 text-primary my-0">
            <i class="fas fa-clock fa-pulse"></i>
            Attention! {{$semester_name}} starts in {{ $start_date }} days. Talk to your advisor to enroll in class today.
        </h3>
    </div>
@endif

<div class="container my-0">
    <div class="row align-items-center" style="padding-top:10%; padding-bottom:10%">
        <div class="col-md-6 text-primary">
            <h4>The university’s financial services advisors is available during office hours to assist you with any questions you may have, and to help you with payment arrangements when necessary.</h4>
            <a
                class="lead"
                href="https://urbe.university/wp-content/uploads/2020/08/UNIVERSITY-CATALOG-FINAL-2020-v3.13.pdf#%5B%7B%22num%22%3A41%2C%22gen%22%3A0%7D%2C%7B%22name%22%3A%22XYZ%22%7D%2C48%2C741%2C0%5D"
                target="_blank">
                Learn more
                <i class="fas fa-external-link-alt ml-1"></i></a>
        </div>
        <div class="col-sm-12 col-md-4 offset-md-2 bg-white rounded shadow-sm py-4">
            <h4 class="text-primary font-weight-bolder">Contact</h4>
            <p class="lead font-weight-bold mb-1">Bursar Office</p>
            <p class="mb-1"><a href="https://g.page/urbeuniversity?share" target="_blank">11430 NW 20<sup>st</sup> Street, Suite 150 <br> Sweetwater, Florida 33172</a></p>
            <p class="mb-1"><a href="tel:+18447448729">Toll free: +1 (844) 744-8723</a></p>
            <p><a href="tel:+13059648804">USA calls: +1 (305) 964-8804</a></p>

            <p class="lead font-weight-bold mb-1">Office Hours</p>
            <p class="mb-1">Monday - Friday: 8AM - 5PM</p>
            <p><a href="mailto:bursar@urbe.university">bursar@urbe.university</a></p>
        </div>
    </div>
</div>
@endsection
