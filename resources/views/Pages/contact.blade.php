@extends('layouts.app')
@section('topCss')
<style>
  .form-div{
    padding: 0 !important;
  }
  
</style>
    
@endsection
@section('pageTitle', $pageTitle)

@section('businessBanner')
@include('partialview.businessbanner')
@stop
@section('content')
<div class="padding-top-large"></div>
 
    <div class="bussiness-our-address">
        <div class="container">
            <div class="row">
              <div class="col-md-6">
                  <div class="business-title-left">
                      <h2>Feedback form</h2>
                      <span class="title-border-left"></span>
                      <p>For suggestion, comment or any information, please let's hear from you.</p>
                  </div>
                  @include('includes.alerts')
                  <form action="{{ route('contact.send') }}" method="post">
                    {{ csrf_field() }}
                      <div class="col-md-12 form-div">                        
                        <div class="form-group">                        
                          <input type="text" class="form-control" id="formGroupExampleInput1" name="name" placeholder="Your name">
                        </div>
                      </div>
                     
                      <div class="col-md-12 form-div">                        
                        <div class="form-group">
                          <input type="email" name="email" class="form-control" id="formGroupExampleInput3" placeholder="Your email" required>
                        </div>
                      </div>
                      <div class="col-md-12 form-div">                        
                        <div class="form-group">
                          <input type="text" class="form-control" id="formGroupExampleInput4" name="phone" placeholder="Your phone number" required>
                        </div>
                      </div>
                      <div class="col-md-12 form-div">
                          <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea15" name="message" rows="3" placeholder="Your message" required></textarea>
                          </div>
                      </div>
                      <div class="col-md-12 form-div">
                          <div class="form-group">
                            <button class="btn bussiness-btn-larg" style="width:100%">Send Message</button>
                          </div>
                      </div>
                       
                  </form>
              </div>
              <div class="col-md-6">
                 <div class="s-space">
                      
                  </div>
                  <div class="col-md-12">
                    <div class="single-address text-left">
                        <i class="fa fa-map-marker"></i>
                        <span>{{ $setting->address }}</span>                      
                    </div>   
                  </div>
                  <div class="col-md-12">
                    <div class="single-address text-left">
                        <i class="fa fa-phone"></i>
                        <span> {{ $setting->phone }} </span>                      
                    </div>   
                  </div>
                    
                </div>   
            </div>   
        </div>   
    </div>
    <div class="padding-top-large"></div>
    
    <div class="client_map">
        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d700.6106515449229!2d3.3715581!3d6.615539300000046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b93ae7d0a8e23%3A0xcfd248703aba8dfb!2sThe+Gospel+Faith+Mission+Int&#39;l!5e0!3m2!1sen!2sng!4v1524518041785" height="400" frameborder="0" style="border:0; width:100%; padding-right:0px !important; margin-right:0px !important" allowfullscreen></iframe></div>
        
    </div>
    <div class="padding-top-large"></div>

@endsection
