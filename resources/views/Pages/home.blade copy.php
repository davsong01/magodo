@extends('layouts.app')
@section('topCss')
<style>
    .single-services {
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
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

    .rp {
        border-radius: 10px;
        border: 4px solid #033d75;
    }

    .blog-content a {
        margin-top: 5px !important;
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

<div class="team-members-1x">
    <div style="padding: 10px 0;margin-bottom: 10px; background: url({{ asset('images/about-background.jpg') }}); background-size: cover;background-repeat: no-repeat;background-attachment: none;background-position: center;padding-top: 0;margin-bottom: 0">
        <div class="container">
            <div class="team-members-content" style="padding-top: 30px">
                <div class="row">
                    <div class="col-md-8">
                        <div class="business-title-left">
                            <h2>{{ $setting->rp }}</h2>
                            <h6 style="color: #ef454d;">Senior Pastor, GOFAMINT Wonders Cathedral</h6>
                        </div>
                        <div class="team-members-left">
                            {!! $setting->rp_greetings !!}
                            {{-- <hr />                      --}}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="float:left; position:relative; padding-right: 40px; text-align:center">
                                    <img style="width:300px" class="rp" src="{{asset($setting->rp_image)}}">
                                    <h2 style="font-size:20px; padding-top:15px; "></h2>
                                    {{-- <span style="font-size:15px;padding-top:15px">Senior Pastor</span> </div> --}}
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="business-services-1x" style="background: #0d40720a;padding: 30px 0;">
        <div class="container">
            <div class="business-services">
                <div class="row">
                    <div class="col-md-12">
                        <div class="business-title-middle" style="padding-bottom:15px">
                            <h2>Core Values</h2>
                            <span class="title-border-middle"></span>
                        </div>
                    </div>

                    <div class="col-md-12 service-content" style="margin-top:0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="single-services">
                                    <div class="media">
                                        <img class="mr-3" src="{{asset('images/icon/icon-1.png')}}" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a>Our Faith Declaration</a>
                                            <p>{{ $setting->faith_declaration }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-services">
                                    <div class="media">
                                        <img class="mr-3" src="{{asset('images/icon/icon-2.png')}}" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a href="">Aim</a>
                                            <p>For with God nothing will be impossible.</p><a href="" class="btn btn-light" style="font-size:10px;">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-services">
                                    <div class="media">
                                        <img class="mr-3" src="{{asset('images/icon/icon-3.png')}}" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a href="">Our Statement of Purpose</a>
                                            <p>To Preach the Word of God and bring people into the membership of God&rsquo;s family;...</p>
                                            <a href="" class="btn btn-light" style="font-size:10px;">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-services">
                                    <div class="media">
                                        <img class="mr-3" src="" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a href="#">Our Core Values</a>
                                            <p>The Gospel Faith Mission International is an organisation, which aims at preaching  and teaching the gospel of our Lord Jesus Christ.  </p>
                                            <a href="#" class="btn btn-light" style="font-size:10px;">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-services">
                                    <div class="media">
                                        <img class="mr-3" src="" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a href="#">Membership Covenant</a>
                                            <p>Having accepted Jesus Christ into my life as my personal Lord and Saviour, upon which I have been baptized by immersion ...</p><a href="#" class="btn btn-light" style="font-size:10px;">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-services">
                                    <div class="media">
                                        <img class="mr-3" src="{{asset('images/icon/icon-6.png')}}" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a href="#">Our Beliefs</a>
                                            <p>We preach Christ the only hope of the world</p><a href="#" class="btn btn-light" style="font-size:10px;">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="business-features-3x">
        <div class="colourful-features-content" style="padding-top: 35px;">
            <div class="business-title-middle">
                <h2>Our Meeting Times</h2>
                <span class="title-border-middle"></span>
            </div>
            <div class="row">
                <div class="col-md-3 no-padding">
                    <div class="single-colorful-feature feature-color-1">
                        <h3>Tuesday:</h3>
                        <h2>Bible Studies</h2>
                        <p>Search the Scripture - 6:30pm</p>
                    </div>
                </div>
                <div class="col-md-3 no-padding">
                    <div class="single-colorful-feature feature-color-2">
                        <h3>Thursday:</h3>
                        <h2>Prayer</h2>
                        <p>Sweet hour of prayer - 6pm</p>
                    </div>
                </div>
                <div class="col-md-3 no-padding">
                    <div class="single-colorful-feature feature-color-3">
                        <h3>Sunday:</h3>
                        <h2></h2>
                        <p>Workers' Refrehing Hour - 7am<br />
                            Sunday School - 8am<br />
                            Rhema Service - 9am<br /></p>
                    </div>
                </div>
                <div class="col-md-3 no-padding">
                    <div class="single-colorful-feature feature-color-4">
                        <h3>Last Friday of the Month:</h3>
                        <h2>General Vigil</h2>
                        <p>11pm prompt</p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{-- <div class="business-testimonial-slider-1x">    
        <div class="container">
        <div class="business-title-left">
                            <h2>Testimonies</h2>
                            <span class="title-border-left"></span>
                        </div>
            <div class="row">
                                
                <div class="col-md-12">
                    <div class="testimonial-slider-content">
                        <div class="owl-carousel testimonial-slider">
                            <div class="item">
                              <img src="{{asset('images/member/team5.jpg')}}" alt="slide 1" class="">
    <p>"It happened in a blur. One minute we were enjoying a night out, shooting pool. The next thing I knew, we were running from the law—wanted for murder."</p><a href="#" class="btn btn-light" style="font-size:10px; float:right">Read more</a>
    <h2>Sis. Goodluck</h2>

</div>
<div class="item">
    <img src="{{asset('images/member/team6.jpg')}}" alt="slide 1" class="">
    <p>"I grew up in Iraq as the third oldest of eight siblings. My family was untraditional. My mom was Muslim, and my dad was Catholic. They didn’t force any religion on their children, in part because they didn’t take religion very seriously themselves." </p><a href="#" class="btn btn-light" style="font-size:10px; float:right">Read more</a>
    <h2>Bro. Abbas Hameed</h2>

</div>

</div>
<p align="right" style="margin-top:10px;"><a href="#" class="btn btn-danger" style="font-size:10px; position:relative; margin-right:5px; color:#FFF !important">Prev</a><a href="#" class="btn btn-danger" style="font-size:10px; position:relative; color:#FFF !important">Next</a></p>
</div>
</div>
</div>
</div>
</div>
--}}

<!-- Prayer request starts -->
{{-- <div class="business-call-back-1x"> 
        <div class="business-call-back-content">    
            <div class="container">
            <form>
                <div class="row">                   
                    <div class="col-md-4">              
                        <div class="call-back-left">
                          <div class="business-title-left">
                                <h2>Prayer Request</h2>
                                <span class="title-border-left"></span>
                            </div>                      
                            <textarea cols="" rows="3" class="form-control" id="exampleFormControlInput1" placeholder="Prayer Request"></textarea>                                          
                        </div>                                  
                    </div>
                    <div class="col-md-8">              
                        <div class="call-back-right">
                            <h2>We would like to have your details</h2>
                            
                                <div class="row">                                                           
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Name" required>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="Email" required>
                                      </div>
                                    </div>
                                                            
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <input type="number" class="form-control" id="exampleFormControlInput4" placeholder="Phone Number" required>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="bussiness-btn-larg">Submit</a>
                                    </div>
                                </div>                                      
                            </form>                                         
                        </div>      
                    </div>
                    
                </div>      
            </div>
        </div>
    </div>

    <div class="padding-top-large"></div> --}}
<!-- Prayer request ends -->

<!-- messaes starts -->

<div class="business-blog-1x" style="padding-top:35px">
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
                        <a href="{{ route('media.view', $media->id) }}">{{\Illuminate\Support\Str::limit($media->title , 85), '...'}}</a>
                        @else
                        <a href="#">{{\Illuminate\Support\Str::limit($media->title , 85), '...'}}</a>
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
            <div class="col-md-12">
                <a href="{{ route('media.gallery') }}" class="btn btn-info" style="font-size:12px; padding: 12px;color:white;width: 100%;">Go to media gallery</a>
            </div>
        </div>
    </div>

    <div class="padding-top-large"></div>
    <!-- Messages end -->
    <div class="client_map">
        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d700.6106515449229!2d3.3715581!3d6.615539300000046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b93ae7d0a8e23%3A0xcfd248703aba8dfb!2sThe+Gospel+Faith+Mission+Int&#39;l!5e0!3m2!1sen!2sng!4v1524518041785" height="400" frameborder="0" style="border:0; width:100%; padding-right:0px !important; margin-right:0px !important" allowfullscreen></iframe>
        </div>
    </div>
    <!-- End content -->
    @endsection