@extends('Layouts.app')
@section('topCss')
   
<style>
    .form-div{
        padding: 0 !important;
    }
    .page-item.active .page-link {
        background-color: #dc3545 !important;
        color: white !important;

        border-color: #d93444 !important;
    }
    
    .page-link {
        color: #033d75 !important;
    }
    
    .centre{
        margin-top: 50px;
    }
</style>
    
@endsection
@section('pageTitle', $pageTitle)

@section('businessBanner')
@include('PartialView.businessBanner')
@stop
@section('content')
<div class="padding-top-large"></div>
 
    <div class="bussiness-our-address">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                  <div class="business-title-left">
                      <h2>Media gallery</h2>
                      <span class="title-border-left"></span>
                      <p>We have a robust gallery of audio visual materials to boost your knowledge in the christian journey, feel free to access any of them</p>
                  </div>
                  @include('includes.alerts')
              </div>
              @foreach($medias as $media)        
                <div class="col-md-3">
                    <div class="single-bolg hover01">
                        <figure>
                            {{-- <img src="{{asset('images/blog-2.jpg')}}" alt="slide 1" class="" style="width: 300px; height:200px"> --}}
                            <img src="{{asset($media->featured_image)}}" alt="slide 1" class="" style="width: 300px; height:200px">
                        </figure>
                        <div class="blog-content">
                            @if($media->isFree == 'yes')
                            <a href="{{ route('media.view', $media->slug) }}">{{\Illuminate\Support\Str::limit($media->title , 75), '...'}}</a>
                            @else
                            <a href="#">{{\Illuminate\Support\Str::limit($media->title , 75), '...'}}</a>
                            @endif
                        </div>
                        @if($media->isFree == 'yes')
                        <a href="{{ route('media.view', $media->slug) }}" class="btn btn-danger" style="font-size:12px; color:white;width: 100%;">View</a>
                        @else 
                        <a href="{{ route('media.purchase', $media->slug) }}" class="btn btn-danger" style="font-size:12px; color:white;width: 100%;">Purchase for only &#8358;{{ number_format( $media->price )}}</a>
                        @endif
                    </div>
                </div>  
                @endforeach  
                <div class="centre col-md-12">
                 {{ $medias->links() }}
                </div>
            </div> 
        </div> 
    </div>
    <div class="padding-top-large"></div>
@endsection
