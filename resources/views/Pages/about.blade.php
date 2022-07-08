@extends('Layouts.app')
@section('topCss')
<style>
  .form-div{
    padding: 0 !important;
  }
  
</style>
    
@endsection
@section('pageTitle', $pageTitle)

@section('businessBanner')
@include('PartialView.businessBanner')
@stop
@section('content')
<div class="bussiness-our-address" style="margin-top:30px">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="business-title-left">
                  <h2>History</h2>
                  <span class="title-border-left"></span>
              </div>
              @include('includes.alerts')
              <div class="entry-content">
                 {!! $setting->history !!}
              </div>
            </div>
          </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="business-title-left">
                  <h2>The Ministries</h2>
                  <span class="title-border-left"></span>
              </div>
              <div class="entry-content">
                  {!! $setting->ministries !!}
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="business-title-left">
                  <h2>Our Days of Service</h2>
                  <span class="title-border-left"></span>
              </div>
              <div class="entry-content">
                  {!! $setting->days_of_service !!}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="padding-top-large"></div>
@endsection
