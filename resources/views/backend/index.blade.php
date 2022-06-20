@extends('backend.layouts.layout')
@section('title', 'Dashboard')
@section('css')
<style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

</style>
@endsection
@section('content')
<!-- Animated -->
<div class="animated fadeIn">
    <!-- Widgets  -->
    <div class="row">
        @if(auth()->user()->role == 1)
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-cash"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <?php $premium_products = \App\Media::where('status', 'published')->where('isFree', 'no')->count() ?>
                                <div class="stat-text"><span class="count">{{ number_format($premium_products)}} </span></div>
                                <div class="stat-heading">Paid Media</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <i class="pe-7s-cart"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <?php $sales = \App\Transaction::all() ?>
                                <div class="stat-text"><span class="count">{{ number_format($sales->count() ) }}</span> <small style="color:green">(&#8358;{{ number_format($sales->sum('amount')) }})</small> </div>
                                <div class="stat-heading">Sales</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-3">
                            <i class="pe-7s-browser"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <?php $free_products = \App\Media::where('status', 'published')->where('isFree', 'yes')->count() ?>

                                <div class="stat-text"><span class="count">{{ number_format($free_products)}}</span></div>
                                <div class="stat-heading">Free media</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-4">
                            <i class="pe-7s-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <?php $customers = \App\User::where('role', 0)->count() ?>

                                <div class="stat-text"><span class="count">{{ number_format($customers) }}</span></div>
                                <div class="stat-heading">Customer(s)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(auth()->user()->role == 0)
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-cash"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <?php $products = \App\Transaction::whereNotNull('product')->where('user_id', auth()->user()->id)->count() ?>
                                <div class="stat-text"><span class="count">{{ number_format($products)}} </span></div>
                                <div class="stat-heading">Purchased Media</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <i class="pe-7s-cart"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <?php $transactions = \App\Transaction::where('user_id', auth()->user()->id)->get() ?>
                                <div class="stat-text"><span class="count">{{ number_format($transactions->count() ) }}</span> <small style="color:green">(&#8358;{{ number_format($transactions->sum('amount')) }})</small> </div>
                                <div class="stat-heading">Total Transactions</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>


</div>
<!-- .animated -->
@endsection