@extends('layouts.app')
@section('topCss')
<style>
body{
    background:#eee;
}

.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.5rem 1.5rem;
}
.left {
    background-color: #f8f9fa;
    padding: 30px;
    border-radius: 5px;
    border: solid 1px #033d75;
}

.bg-opacity-10 {
   border: solid 1px #ef454d; 
    border-radius: 5px;
}

.f_image{
    width: 100px;
    height: auto;
    float: left;
    margin-right: 10px;
}
.media-title{
    line-height: 1.6;
    color: #033d75;
    font-weight: 500;
}
hr {
    background-color: #033d75 !important;
    border: 0;
    height: 1px;
    margin: 7px !important;
}
</style>
    
@endsection
@section('pageTitle', $pageTitle)

@section('businessBanner')
@include('partialview.businessbanner')
@stop
@section('content')
<div class="container">
    <h1 class="h3 mb-5">Confirm Payment</h1>
    <div class="row" style="margin-bottom: 50px;">
        <div class="col-lg-12">
        @include('includes.alerts')
        </div>
        <!-- Left -->
            <div class="col-lg-7">
                <form action="{{ route('pay') }}" method="post">
                    <div class="accordion" id="accordionPayment">
                        <div class="accordion-item mb-3 left">
                            
                            <div id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment" style="">
                            <div class="accordion-body">
                                <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name ?? $name ?? old('name') }}" placeholder="Your name" required>
                                </div>
                                <div class="row">
                                <div class="col-lg-12">
                                    {{-- <div class="mb-3"> --}}
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" value="{{ auth()->user()->email ?? $email ?? old('email') }}" class="form-control" placeholder="Your email" required>
                                    {{-- </div> --}}
                                </div>
                                <?php 
                                    $product = $type == 'product' ? $media->id  : '';
                                    if($type == 'product'){
                                        $type = 'product';
                                    }else{
                                        $type = $type;
                                    }
                                    
                                ?>
                                <input type="hidden" name="orderID" value="">
                                <input type="hidden" name="amount" value="{{ $total * 100 }}"> {{-- required in kobo --}}
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="currency" value="NGN">                        
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                <input type="hidden" name="metadata" value="{{ json_encode($array = ['product' => $product, 'type' =>$type ]) }}" > 
                    
                                {{-- works only when using laravel 5.1, 5.2 --}}

                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
                                </div>
                            </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="col-lg-5 right">
                    <div class="card position-sticky top-0">
                    <div class="p-3 bg-light bg-opacity-10">
                        <h6 class="card-title mb-3">{{ $type == "product" ? 'Order Summary' : 'Donation confirmation' }}</h6>
                        <div>
                        @if($type == 'product')
                            <div class="d-flex justify-content-between mb-1 small" style="margin-bottom: 20px !important;">
                                <img class="f_image" src="{{ asset($media->featured_image) }}" alt="">
                                <span class="media-title">{{ $media->title }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-1 small">
                                <span>Subtotal</span> 
                                <span>&#8358;{{ number_format($media->price) }}</span>
                            </div>

                            </div>
                        @endif
                        {{-- <div class="d-flex justify-content-between mb-1 small">
                        <span>Shipping</span> <span>$20.00</span>
                        </div> --}}
                        {{-- <div class="d-flex justify-content-between mb-1 small">
                        <span>Coupon (Code: NEWYEAR)</span> <span class="text-danger">-$10.00</span>
                        </div> --}}
                        <hr>
                        <div class="d-flex justify-content-between mb-4 small">
                        <span>TOTAL</span> <strong class="text-dark">&#8358;{{ number_format($total) }}</strong>
                        </div>
                
                        <button class="btn btn-success w-100 mt-2">Make Payment</button>
                    </div>
                    </div>
                </div>
        </form>
    </div>
  </div>
@endsection
