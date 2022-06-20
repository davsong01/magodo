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
                  <h2>Our Core Values</h2>
                  <span class="title-border-left"></span>
              </div>
              <div class="entry-content">
                  {!! $setting->core_values !!}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="padding-top-large"></div>
@endsection
