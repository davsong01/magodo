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
                        <h4 style="color:#033d75">{{ $media->title }}</h4>
                        <span class="title-border-left"></span>
                    </div>
                    <div class="single-bolg hover01">
                        @if($media->type == 'audio')
                            <audio controls>
                                <source src="{{ asset($media->file) }}" type="audio/ogg">
                                Your browser does not support the audio element.
                            </audio>
                        @endif
                        @if($media->type == 'video')
                        <video width="100%" height="100%" controls>
                            <source src="{{ asset($media->file) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video> 
                        @endif

                        @if($media->type == 'youtube')
                        <div class="iframe-container">
                            <iframe src="https://www.youtube.com/embed/{{ $media->youtube_link }}?controls=0&modestbranding=1">
                            </iframe> 
                        </div>
                        @endif

                        @if($media->type == 'mixlr')

                        @endif
                            
                        @if($media->type == 'video' || $media->type == 'audio')
                            <a href="{{ ($media->file) }}" class="btn btn-danger" style="font-size:12px; color:white;width: 100%;" download>Download</a>
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
