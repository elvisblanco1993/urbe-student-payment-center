@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid m-0 p-0" style="background-image: url('{{ asset('img/pexels-buro-millennial-1438072.jpg') }}');background-position: top center; background-size: cover">
    <div class="m-0" style="background-color: #07326063">
        <div class="container" style="padding-top: 10%; padding-bottom: 10%;">
            <h1 class="display-4 text-white">{{ __('Application Fee Payment') }}</h1>
        </div>
    </div>
</div>

<div class="container my-0">
    <div class="row align-items-center" style="padding-top:10%; padding-bottom:10%">
        <div class="col-md-6 text-primary">
            <h4>Use this payment page only if you were directed here by your admissions officer.</h4>
            <p>If you have any questions about tuition options, please contact our Bursar department using the information provided here.</p>

            @if ( request()->get('q') == 'ok' )
            <div class="alert alert-success" role="alert">
                We have received your payment. Please notify your Admissions Officer.
            </div>
            @endif

            @if ( request()->get('q') == 'err' )
            <div class="alert alert-danger" role="alert">
                There was an error processing your payment. Please contact us using the information on this page for more details.
            </div>
            @endif

            {{-- Pay Application Fee --}}
            <a href="https://buy.stripe.com/6oE16zdcy8V7buM288" target="_blank" style="background-color:#6772E5;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1.2em">
                {{__("PAY APPLICATION FEE")}}
            </a>

            <div id="error-message"></div>

            <script>
            (function() {
            var stripe = Stripe('pk_live_3pbeJdVakR3uI3PF9MsRkjOg');

            var checkoutButton = document.getElementById('checkout-button-price_1ItEQTLUSKcMhdsOrP7eBGeA');
            checkoutButton.addEventListener('click', function () {
                /*
                * When the customer clicks on the button, redirect
                * them to Checkout.
                */
                stripe.redirectToCheckout({
                lineItems: [{price: 'price_1ItEQTLUSKcMhdsOrP7eBGeA', quantity: 1}],
                mode: 'payment',
                /*
                * Do not rely on the redirect to the successUrl for fulfilling
                * purchases, customers may not always reach the success_url after
                * a successful payment.
                * Instead use one of the strategies described in
                * https://stripe.com/docs/payments/checkout/fulfill-orders
                */
                successUrl: 'https://myfs.urbe.university/pay/application-fee?q=ok',
                cancelUrl: 'https://myfs.urbe.university/pay/application-fee?q=err',

                })
                .then(function (result) {
                if (result.error) {
                    /*
                    * If `redirectToCheckout` fails due to a browser or network
                    * error, display the localized error message to your customer.
                    */
                    var displayError = document.getElementById('error-message');
                    displayError.textContent = result.error.message;
                }
                });
            });
            })();
            </script>

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
