@extends('Layouts.layout')

<?php $pageTitle = 'Members Login'; //for business banner ?>
@section('pageTitle')
 {{$pageTitle}}
@endsection

@section('LoginActive')
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
                      <h2>{{$pageTitle}}</h2>                        
                        
                        <div class="promotion-box">							
							<p>Content coming soon</p>
						</div>
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
