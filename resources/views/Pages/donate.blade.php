@extends('Layouts.app')
@section('topCss')
<style>
.form-div{
    padding: 0 !important;
}
audio, canvas, progress, video {
    display: inline-block;
    vertical-align: baseline;
    width: 100%;
    margin-top: 20px;
}
.iframe-container{
  position: relative;
  width: 100%;
  padding-bottom: 56.25%; 
  height: 0;
}
.iframe-container iframe{
  position: absolute;
  top:0;
  left: 0;
  width: 100%;
  height: 100%;
}
.blog-content a {
  margin-top: 10px !important;
}

.blog-content a {
  display: block;
  font-size: 12px !important;
  font-weight: 500;
  color: #033d75;
  transition: all 0.3s ease;
  line-height: 1.4 !important;
}
.nobox-shadow {
  box-shadow: unset !important
}
</style>
    
@endsection
@section('pageTitle', $pageTitle)

@section('businessBanner')
@include('PartialView.businessBanner')
@stop
@section('content')
<div class="padding-top-small"></div>
 
    <div class="bussiness-our-address">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('includes.alerts')
                </div>
                <div class="col-md-10">
                    <div class="business-title-left">
                      <h2>Donate</h2>
                      <span class="title-border-left"></span>
                      <p>You can make donations here, please fill the form below to continue</p>
                    </div>
                    <div class="">
                        <form action="{{ route('donate.cart') }}" method="post">
                            {{ csrf_field() }}
                            <div class="col-md-12 form-div">                        
                                <div class="form-group">                        
                                <input type="text" class="form-control" id="formGroupExampleInput1" value="{{ auth()->user()->name ?? old('name') }}" name="name" placeholder="Your name">
                                </div>
                            </div>
                            
                            <div class="col-md-12 form-div">                        
                                <div class="form-group">
                                <input type="email" name="email" value="{{ auth()->user()->email ?? old('email') }}" class="form-control" id="formGroupExampleInput3" placeholder="Your email" required>
                                </div>
                            </div>
                            <div class="col-md-12 form-div">                        
                                <div class="form-group">                        
                                <input type="number" class="form-control" id="formGroupExampleInput1" name="amount" placeholder="Enter Amount" required>
                                </div>
                            </div>
                             <div class="form-group has-success">
                                    <label for="type" class="control-label mb-1">Donation type</label>
                                    <select class="form-control" name="type" id="type" required>
                                        <option value="offering" {{ old('type') == 'offering' ? 'selected' : '' }}>Offering</option>
                                        <option value="tithe" {{ old('type') == 'tithe' ? 'selected' : '' }}>Tithe</option>
                                        <option value="donation" {{ old('type') == 'donation' ? 'selected' : '' }}>Donation</option>
                                    </select>
                                </div>
                            <div class="col-md-12 form-div">
                                <div class="form-group">
                                    <button class="btn bussiness-btn-larg" style="width:100%">Continue to payment page</button>
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>  
                <div class="col-md-2">
                    @if(isset($related) && $related->count() > 0)
                    <div class="col-md-12">
                        <div class="business-title-left">
                            <h5 style="color: red;">Recent media</h5>
                            <span class="title-border-left"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        @foreach($related as $r)
                        <div class="single-bolg hover01">
                            <figure style="width: 100px;border: solid 1px #f00;">
                                <img src="{{asset($r->featured_image)}}" alt="slide 1" class="" style="width: 100%; height:auto">
                            </figure>
                            <div class="blog-content">
                                @if($r->isFree == 'yes')
                                <a href="{{ route('media.view', $r->slug) }}">{{\Illuminate\Support\Str::limit($r->title , 30), '...'}}</a>
                                @else
                                <a href="#">{{\Illuminate\Support\Str::limit($r->title , 30), '...'}}</a>
                                @endif
                            </div>
                            @if($r->isFree == 'yes')
                            {{-- <a href="{{ route('media.view', $r->slug) }}" class="btn btn-danger" style="font-size:12px; color:white;width: 100%;">View</a> --}}
                            @else 
                            {{-- <a href="{{ route('media.purchase', $r->slug) }}" class="btn btn-danger" style="font-size:12px; color:white;width: 100%;">Purchase for only &#8358;{{ number_format( $r->price )}}"</a> --}}
                            @endif
                        </div>
                        @endforeach
                    </div>  
                    @endif
                </div>
            </div> 
        </div>  
    </div>
    <div class="padding-top-large"></div>
@endsection
