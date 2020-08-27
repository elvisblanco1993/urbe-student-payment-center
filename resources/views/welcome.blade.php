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

<section class="w-100 bg-primary">
    <div class="container my-0">
        <div class="row align-items-center" style="padding-top:10%; padding-bottom:10%">
            <div class="col-md-6 text-white">
                <h2>
                    Bursar Office
                </h2>
                <p class="lead">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt, repellat reprehenderit adipisci, iure deleniti omnis perspiciatis officiis ad veniam nemo repudiandae aliquam incidunt doloremque esse cumque inventore numquam quo labore.
                </p>
            </div>
            <div class="col-md-6">
                <img
                    class="img-fluid shadow rounded"
                    src="{{ asset('img/bruce-mars-FWVMhUa_wbY-unsplash_edited.jpg') }}"
                    alt="Female student looking at laptop"
                    style="width: 100%">
            </div>
        </div>
    </div>
</section>

<div class="container my-0">
    <div class="row" style="padding-top:10%; padding-bottom:10%">
        <div class="col-md-6">
            <h2>Payment Options</h2>
        </div>

        <div class="col-md-4 offset-2 bg-white rounded shadow-sm py-4">
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
