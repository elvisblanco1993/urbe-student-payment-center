@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Please enter your Stripe Customer ID') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/account/payment-id" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="strid">Stripe ID</label>
                            <input type="text" name="strid" id="strid" class="form-control @error('strid') is-invalid @enderror">
                            @error('strid')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Update account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
