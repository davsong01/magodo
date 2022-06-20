@extends('Layouts.app')
@section('topCss')
<style>
    .serviceBox{
      color: #888;
      background-color: #fff;
      font-family: 'Roboto', sans-serif;
      text-align: center;
      padding: 20px;
      border-radius: 0 40px;
  }
  .serviceBox .service-icon{
      color: #fff;
      background: linear-gradient(45deg, transparent, #033d75, transparent);
      font-size: 50px;
      line-height: 110px;
      width: 110px;
      height: 110px;
      margin: 0 auto 30px;
      border-radius: 50px 0;
      position: relative;
      z-index: 1;
  }
  .serviceBox .service-icon:before{
      content: '';
      background: linear-gradient(to left, #033d75, #033d75);
      border-radius: 50%;
      position: absolute;
      left: 10px;
      bottom: 10px;
      top: 10px;
      right: 10px;
      z-index: -1;
  }
  .serviceBox .title{
      color: #033d75;
      font-size: 20px;
      font-weight: 600;
      text-transform: uppercase;
      margin: 0 0 7px;
  }
  .serviceBox .description{
      font-size: 13px;
      line-height: 22px;
      letter-spacing: 0.5px;
      font-weight: 400;
      line-height: 25px
  }
  .serviceBox.blue .service-icon{
      background: linear-gradient(45deg, transparent, #1c7ac0,transparent);
  }
  .serviceBox.blue .service-icon:before{
      background: linear-gradient(to left, #2ebef3, #1c7ac0);
  }
  .serviceBox.blue .title{ color: #1c7ac0; }
  .serviceBox.pink .service-icon{
      background: linear-gradient(45deg, transparent, #db1557, transparent);
  }
  .serviceBox.pink .service-icon:before{
      background: linear-gradient(to left, #ff2b87, #db1557);
  }
  .serviceBox.pink .title{ color: #db1557; }
  .serviceBox.orange .service-icon{
      background: linear-gradient(45deg, transparent, #f96407, transparent);
  }
  .serviceBox.orange .service-icon:before{
      background: linear-gradient(to left, #f98e1b, #f96407);
  }
  .single-address i {
    font-size: 12px !important;
    padding: 5px !important;
    color: #fff;
    width: 32px !important;
    height: 32px !important;
    border: 5px solid #fff;
    text-align: center;
  }

  .addre{
    margin-bottom: 0;
    color: #000;
  }
  .serviceBox.orange .title{ color: #f96407; }
  @media only screen and (max-width: 990px){
      .serviceBox{ margin: 0 0 30px; }
  }
</style>
@endsection
@section('pageTitle', $pageTitle)

@section('businessBanner')
@include('PartialView.businessBanner')
@endsection
@section('content')

<div class="bussiness-our-address" style="background: #e7e7e7; padding:35px 0">
  <div class="container">
     <div class="row">
        <div class="col-md-6">
            <div class="business-title-left">
                <h2>Region 12 Assemblies</h2>
                <span class="title-border-left"></span>
            </div>
        </div> 
      </div>
      <div class="row" style="padding: 20px 0;">
        @foreach($assemblies as $assembly)
          <div class="col-md-4 col-sm-6" style="padding: 20px 10px">
              <div class="serviceBox">
                  <div class="service-icon">
                      <span><i class="fa fa-globe"></i></span>
                  </div>
                  <h3 class="title">{{ $assembly->name }}</h3>
                  <h6 class="addre" style="color:red">District</h6>
                  <h3 class="title">{{ $assembly->district->name }}</h3>
                  <h6 class="addre">Assembly Pastor</h6>
                  <p class="description">{{ $assembly->pastor }}</p> 
                  <h6 class="addre">Address</h6>
                  <p class="description">{{ $assembly->address }}</p> 
                  <h6 class="addre">Contact</h6>
                  <p class="description">
                    {{ $assembly->email }} <br>
                    {{ $assembly->phone }}
                  </p> 
              </div>
          </div>
        @endforeach
      </div>
  </div>
</div>
@endsection
