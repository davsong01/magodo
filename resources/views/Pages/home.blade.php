@extends('layouts.app')
@section('topCss')
    <style>
        .padding-top-large{
            padding-top: 20px !important;
        }
        .single-services{
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
            max-height: 250px;
            margin: 15px 15px;
            min-height: 300px;
            height: 300px;
        }
        .single-services .media img {
            max-height: 45px !important;
            max-width: 48px !important;
            object-fit: cover;
            border-radius: 50%;
        }
        .rp{
            border-radius: 10px;
            border: 4px solid #033d75;
        }
        .blog-content a {
            margin-top: 5px !important;
        }
        .section .section-divider {
            display: block;
            width: 50px;
            height: 50px;
            position: absolute;
            left: 50%;
            margin-left: -25px;
            background-color: inherit;
            z-index: 1;
        }
        .section-divider.triangle.up, .section-divider.triangle.down {
            -moz-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
        .section-divider.triangle.down {
        bottom: -25px;
        }
        .serviceBox{
            color: #555;
            text-align: center;
            padding: 0 25px 20px;
            margin: 0 -5px;
            position: relative;
            z-index: 1;
            margin-bottom:30px
        }
        .serviceBox:before,
        .serviceBox:after{
            content: '';
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 20px -5px rgba(0,0,0,0.4);
            position: absolute;
            left: 15px;
            top: 0;
            right: 15px;
            bottom: 10px;
            z-index: -1;
        }
        .serviceBox:after{
            background-color: transparent;
            border: 2px solid #F84745;
            border-top: none;
            border-radius: 0 0 20px 20px;
            box-shadow: none;
            left: 0;
            top: 30%;
            right: 0;
            bottom: 0;
        }
        .serviceBox .service-icon{
            color: #fff;
            background: #F84745;
            font-size: 30px;
            padding: 5px 40px;
            margin: 0 0 25px;
            border-radius: 0 0 20px 20px;
            display: inline-block;
        } 
        .serviceBox .title{
            color: #F84745;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin: 0 0 15px;
        }
        .serviceBox .description{
            font-size: 16px;
            line-height: 25px;
            margin: 0 10px;
            height: 200px;
        }
        .serviceBox.blue .service-icon{ background: #e54950; }
        .serviceBox.blue:after{ border-color: #e54950; }
        .serviceBox.blue .title{ color: #e54950; }

        .red{
            color: #f84745
        }

        @media only screen and (max-width: 990px){
            .serviceBox{ margin: 0 0 40px; }
        }
        .medium-space{
            padding:30px 0;
        }
        .white::after {
            border: 1px solid white !important;
        }
        .our-team{
        text-align: center;
        }
        .pic{
            position: relative;
            overflow: hidden;
        }
        .pic img{
            width: 100%;
            height: auto;
        }
        .pastors{
            height: 200px !important;
            width: 200px !important
        }
        .social_media_team {
            position: absolute;
            top: 100%;
            width: 200px;
            height: 100%;
            background-color: rgba(222, 79, 0, 0.8);
            transition: all 0.35s ease 0s;
            left: 11%;
        }
        .team_social{
            list-style: none;
            padding: 0;
            height: 100%;
            position: relative;
            top:40%;
        }
        .team_social > li{
            display: inline-block;
            margin: 0 5px 5px 0;
        }
        .team_social > li > a{
            width: 45px;
            height: 45px;
            line-height: 45px;
            border: 1px solid #fff;
            display: block;
            color:#fff;
            font-size: 18px;
            transition: all 1.3s ease 0s;
        }
        .team_social > li > a:hover{
            background: #fff;
            color:#de4f00;
            transition: all 1.3s ease 0s;
        }
        .team-prof{
            margin-top: 0px;
            margin-bottom: 20px;
        }
        .post-title > a{
            text-transform: capitalize;
            color:white !important;
            transition: all 0.2s ease 0s;
            font-size:16px;
            margin-bottom: 0;
            font-weight: 200;
        }
        .post-title > a:hover{
            text-decoration: none;
            color: white;
        }
        .post{
            color:#de4f00;
            font-size: 18px;
            font-size:16px;
            font-weight: lighter;
        }
        .pic:hover .social_media_team{
            top:0;
        }
        .scale-with-grid {
           min-height:210px;
        }
        @media screen and (max-width: 990px){
            .our-team{
                margin-bottom: 30px;
            }
        }
        .small-blocks {
            height: 174px;
        }
    </style>
@endsection
@section('pageTitle', $pageTitle)

@section('content')
    <div class="business-main-slider">
        <div class="owl-carousel main-slider">
            @foreach(\App\Slider::orderBy('id', 'DESC')->get() as $slider)
            <div class="item">          
                <div class="hvrbox">
                    <img src="{{ asset($slider->file) }}" alt="Mountains" class="hvrbox-layer_bottom sliders">
                    <div class="hvrbox-layer_top">
                        <div class="container">
                            
                        </div>
                    </div>
                </div>          
            </div>
            @endforeach            
        </div>  
    </div>
    
    <div class="business-services-1x" style="background: white;padding: 30px 0;">  
        <div class="container">
            <div class="business-services">                         
                <div class="row">               
                    <div class="col-md-12 service-content" style="margin-top:0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="animate fadeInLeft" data-anim-type="fadeInLeft">
                                    <div class="photo_wrapper"><img class="scale-with-grid" src="{{ asset('images/front1.png') }}" alt="" width="600" height="388">
                                    </div>
                                    <div class="desc_wrapper"></div>
                                    <div class="desc">
                                        <p></p>
                                        <h4 class="red">Welcome to Our Church</h4><p></p>
                                        <div class="small-blocks">
                                            {!! $setting->welcome !!}
                                        </div>
                                       
                                        <p>
                                            <a  href="/about">
                                            <button class="read-more">Read more</button>
                                        </a>
                                        </p>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <div class="animate fadeInLeft" data-anim-type="fadeInLeft">
                                    <div class="photo_wrapper"><img class="scale-with-grid" src="{{ asset('images/front2.png') }}" alt="" width="600" height="388">
                                    </div>
                                    <div class="desc_wrapper"></div>
                                    <div class="desc">
                                        <p></p>
                                        <h4 class="red">About us</h4><p></p>
                                        <div class="small-blocks">
                                            {!! $setting->about_us !!}
                                        </div>
                                        <p>
                                            <a  href="/about">
                                            <button class="read-more">Read more</button>
                                        </a>
                                        </p>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <div class="animate fadeInLeft" data-anim-type="fadeInLeft">
                                    <div class="photo_wrapper"><img class="scale-with-grid" src="{{ asset('images/front3.png') }}" alt="" width="600" height="388">
                                    </div>
                                    <div class="desc_wrapper"></div>
                                    <div class="desc">
                                        <p></p>
                                        <h4 class="red">Why you should Join us</h4><p></p>
                                        <div class="small-blocks">{!! $setting->why_join_us !!}</div>
                                        <p>
                                            <a  href="/">
                                            <button class="read-more">Read more</button>
                                        </a>
                                        </p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        
                    </div>                                  
                </div>
            </div>
        </div>
    </div>  
    <div class="padding-top-large"></div>
    
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css /> -->
    <div class="business-services-1x" style="background: #033d75;padding: 30px 0;"> 
    <div class="padding-top-large"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 busines-portfolio-light">
                    <div class="business-title-middle">
                        <h2 style="color:white">Our Core Values</h2>
                        <span class="title-border-middle white"></span>
                    </div>  
                </div>
                @foreach($values as $key=>$value)
               
                <div class="col-md-3 col-sm-6">
                    <div class="serviceBox blue">
                        <div class="service-icon">
                            <span><i class="{{ $value['icon'] }}"></i></span>
                        </div>
                        <h3 class="title">{{ $value['title'] }}</h3>
                        <p class="description">{{ $value['content'] }}</p>
                    </div>
                </div>
                @endforeach
               
            </div>
            <div class="row medium-space">

            </div>
        </div>
    </div>
    {{-- Our leaders --}}
    <div class="business-services-1x" style="background: black;padding: 30px 0;">  
    <div class="padding-top-large" style="background: black;padding: 30px 0;"></div>
        <div class="container">
            <div class="business-services">                     
                <div class="row">     
                    <div class="col-md-12 busines-portfolio-light">
                        <div class="business-title-middle">
                            <h2 style="color:white">Meet Our Ministers</h2>
                            <span class="title-border-middle white"></span>
                        </div>  
                    </div>          
                    <div class="col-md-12 service-content" style="margin-top:0">
                        <div class="row">
                            @foreach($pastors as $pastor)
                            <div class="col-md-3">
                                <div class="our-team">
                                    <div class="pic">
                                        <img class="pastors" src="{{ asset($pastor->image) }}" alt="">
                                        <div class="social_media_team">
                                            <ul class="team_social">
                                            
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="team-prof">
                                        <h3 class="post-title"><a href="#">{{ $pastor->name }}</a></h3>
                                        <span class="post">{{ $pastor->position }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Latest media --}}
    <div class="business-blog-1x" style="padding-top:35px">  
    <div class="padding-top-large"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="business-title-middle" style="padding-bottom: 0;">
                        <h2>Latest Media from us</h2>
                        <span class="title-border-middle"></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="margin-top-middle"></div>
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
                            <a href="{{ route('media.view', $media->id) }}">{{\Illuminate\Support\Str::limit($media->title , 75), '...'}}</a>
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
                <div class="col-md-12" style="display: flex;">
                    <a href="{{ route('media.gallery') }}" class="btn btn-info" style="font-size:12px; padding: 12px;color:white;width: 80%;margin:auto">Go to media gallery</a>
                </div>    
        </div>
    </div>
    {{-- Our leaders --}}
    <div class="padding-top-large" style="padding: 30px 0;"></div>

    <div class="business-services-1x" style="background: black;padding: 30px 0;">  
    <div class="padding-top-large" style="background: black;padding: 30px 0;"></div>
        <div class="container">
            <div class="business-services">                     
                <div class="row">     
                    <div class="col-md-12 busines-portfolio-light">
                        <div class="business-title-middle">
                            <h2 style="color:white">Our Meeting Times</h2>
                            <span class="title-border-middle white"></span>
                        </div>  
                    </div>          
                    <div class="col-md-12 service-content" style="margin-top:0">
                        <div class="row">
                            <div class="col-md-4" style="margin: 0 0 20px 0;">
                                <div class="animate fadeInLeft" data-anim-type="fadeInLeft">
                                    <div class="photo_wrapper"><img class="scale-with-grid" src="{{ asset('images/service1.png') }}" alt="" width="600" height="388">
                                    </div>                                    
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <div class="animate fadeInLeft" data-anim-type="fadeInLeft">
                                    <div class="photo_wrapper"><img class="scale-with-grid" src="{{ asset('images/service2.png') }}" alt="" width="600" height="388">
                                    </div>                                    
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <div class="animate fadeInLeft" data-anim-type="fadeInLeft">
                                    <div class="photo_wrapper"><img class="scale-with-grid" src="{{ asset('images/service3.png') }}" alt="" width="600" height="388">
                                    </div>                                    
                                </div> 
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

