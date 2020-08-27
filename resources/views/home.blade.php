@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h2 class="font-weight-bolder mt-4 mb-4">
                {{ __('Welcome back, ') . explode(' ', $user->name)[0] . '!' }}
            </h2>
            <div class="alert alert-info"><u>How-to</u>: Use the <i>"MANAGE PAYMENT INFORMATION"</i> button to manage your current payments and cards.</div>
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 mb-4">

                                <h5 class="font-weight-bolder">Important information:</h5>
                                <p>Know your rights and responsibilities as a paying student. Click the link below to learn about the University's Payment and Refund Policy.</p>
                                <a href="http://">Payment and Refund Policy <i class="fas fa-external-link-alt ml-1"></i></a>
                            </div>
                            <div class="col-md-4">
                                @if ( ! is_null( $user->stripe_id ) )
                                    <form action="{{ url('/billing') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-block my-2">
                                            <i class="fas fa-wallet mr-2"></i>
                                            MANAGE PAYMENT INFORMATION
                                        </button>
                                    </form>
                                @endif

                                <div class="card card-body mt-4">
                                    {{-- Contact Us --}}
                                    <h4 class="text-primary font-weight-bolder">Contact Us</h4>
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
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
