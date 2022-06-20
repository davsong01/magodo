@extends('backend.layouts.layout')
@section('title', 'Districts')
@section('breadcrumb')
<li><a href="/districts">Assembly Locator</a></li>
@endsection
@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            @include('includes.alerts')

                            <form action="{{ route('districts.update', $district->id) }}" method="POST">
                                 {{ csrf_field() }}
                                 {{method_field('PATCH')}}
                                 
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">District name</label>
                                    <input id="name" name="name" value="{{ old('name') ?? $district->name}}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group has-success">
                                    <label for="pastor" class="control-label mb-1">Pastor in charge</label>
                                    <input id="pastor" name="pastor" type="text"
                                        class="form-control pastor" required value="{{ $district->pastor }}" aria-invalid="false"
                                        aria-describedby="pastor">
                                </div>
                                <div class="form-group has-success">
                                    <label for="address" class="control-label mb-1">Address</label>
                                    <input id="address" name="address" type="text"
                                        class="form-control address" required value="{{ $district->address }}" aria-invalid="false"
                                        aria-describedby="address">
                                </div>
                                <div class="form-group has-success">
                                    <label for="email" class="control-label mb-1">Contact Email</label>
                                    <input id="email" name="email" type="email"
                                        class="form-control email" required value="{{ $district->email }}" aria-invalid="false"
                                        aria-describedby="email">
                                </div>
                                <div class="form-group has-success">
                                    <label for="phone" class="control-label mb-1">Phone</label>
                                    <input id="phone" name="phone" type="text"
                                        class="form-control phone" required value="{{ $district->phone }}" aria-invalid="false"
                                        aria-describedby="phone">
                                </div>
                               
                                <div>
                                    <button type="submit"
                                        class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Update</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div> <!-- .card -->

        </div>

    </div>
</div>

@endsection