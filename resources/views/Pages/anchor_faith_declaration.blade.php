@extends('layouts.layout')

@section('pageTitle')
 Anchor/Faith Declaration
@endsection

@section('AboutActive')
  active 
@endsection

@section('businessBanner')
@include('partialview.businessbanner')
@stop

@section('content')   
<div class="bussiness-about-company">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                   <div class="about-company-left">
                      <h2>@yield('pageTitle')</h2>
                                              
					<img src="{{asset('images/slider-3.jpg')}}" style="max-width:1000px;" />
							<span style="text-align:justify !important;">
                            {!!html_entity_decode($faithDeclaration->content)!!}</span>
						
                  </div>
                    
                    
                    <div class="row"></div>
                    
                </div>
                
<!-- Right menu starts -->
                
@include('PartialView.rightMenu')
                
<!-- Right menu ends -->
                
            </div>
        </div>
    </div>
 
    
      
	<div class="padding-top-large"></div>
      
   
@stop
