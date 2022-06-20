@extends('Layouts.layout')

@section('pageTitle')
 Our History
@endsection

@section('AboutActive')
  active 
@endsection

@section('businessBanner')
@include('PartialView.businessBanner')
@stop

@section('content')   
<div class="bussiness-about-company">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                   <div class="about-company-left">
                      <h2>@yield('pageTitle')</h2>                        
					
							<span style="text-align:justify !important">
                            <img src="{{asset('images/history.jpg')}}" style="padding: 0px 0px 20px 20px !important; float:right !important; width:300px;" />{!!html_entity_decode($ourhistory->content)!!}</span>
						<div class="promotion-box">	</div>
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
