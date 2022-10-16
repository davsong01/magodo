@extends('layouts.app')
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
</style>
    
@endsection
@section('pageTitle', $pageTitle)

@section('businessBanner')
@include('partialview.businessbanner')
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
                        <h4 style="color:#033d75"></h4>
                        <span class="title-border-left"></span>
                    </div>
                    <div class="single-bolg hover01">
                        {{-- {{ dd() }} --}}
                       @if($type == 'youtube')
                            <div class="iframe-container">
                                {!! $setting->youtube_livestream_link !!}
                            </div>
		                    {{-- <iframe width="auto" height="520" src="{{ "https://www.youtube.com/watch?v=e4y1rBOLrEo" }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                        @endif
                    </div>
                </div>  
                <div class="col-md-2">
                    @include('pages.related_media')
                </div>
            </div> 
        </div>  
    </div>
    <div class="padding-top-large"></div>
@endsection
