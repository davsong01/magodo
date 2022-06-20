@extends('backend.layouts.layout')
@section('title', 'Transactions')
@section('breadcrumb')
<li><a href="#">All Transactions</a></li>
@endsection
@section('content')
<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                @include('includes.alerts')
                <div class="card-header">
                    <strong class="card-title">All transactions</strong>
                </div>

                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                @if(auth()->user()->role==1)
                                <th>Customer details</th>
                                @endif
                                <th>Date</th>
                                <th>Reference</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Product</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($transactions as $transaction)
                                
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    @if(auth()->user()->role==1)
                                    <td>{{ $transaction->user->name }} <br>
                                        <small style="color:blue">{{ $transaction->user->email }}</small>
                                    </td>
                                    @endif
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>{{ $transaction->reference }}</td>
                                    <td>{{ $transaction->type }}</td>
                                    <td>&#8358;{{ number_format($transaction->amount) }}</td>
                                    <td>{{ $transaction->media->title ?? $transaction->type}}
                                    @if(!empty($transaction->product))
                                        <br>
                                        <a href="{{ route('media.paid', $transaction->id) }}" class="btn btn-primary btn-sm" style="font-size:12px; color:white;width: 100%;"><i class="fa fa-download"></i> Download Media</a>
                                    @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->

@endsection