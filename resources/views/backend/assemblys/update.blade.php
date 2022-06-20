@extends('backend.layouts.layout')
@section('title', 'Assembly')
@section('breadcrumb')
<li><a href="{{ route('assemblys.index') }}">Assembly Locator</a></li>
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

                            <form action="{{ route('assemblys.update', $assembly->id) }}" method="POST">
                                 {{ csrf_field() }}
                                 {{method_field('PATCH')}}
                                 
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Assembly name</label>
                                    <input id="name" name="name" value="{{ old('name') ?? $assembly->name}}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group has-success">
                                    <label for="pastor" class="control-label mb-1">Pastor in charge</label>
                                    <input id="pastor" name="pastor" type="text"
                                        class="form-control pastor" required value="{{ $assembly->pastor }}" aria-invalid="false"
                                        aria-describedby="pastor">
                                </div>
                                <div class="form-group has-success">
                                    <label for="address" class="control-label mb-1">Address</label>
                                    <input id="address" name="address" type="text"
                                        class="form-control address" required value="{{ $assembly->address }}" aria-invalid="false"
                                        aria-describedby="address">
                                </div>
                                <div class="form-group has-success">
                                    <label for="email" class="control-label mb-1">Contact Email</label>
                                    <input id="email" name="email" type="email"
                                        class="form-control email" required value="{{ $assembly->email }}" aria-invalid="false"
                                        aria-describedby="email">
                                </div>
                                <div class="form-group has-success">
                                    <label for="phone" class="control-label mb-1">Phone</label>
                                    <input id="phone" name="phone" type="text"
                                        class="form-control phone" required value="{{ $assembly->phone }}" aria-invalid="false"
                                        aria-describedby="phone">
                                </div>
                                <div class="form-group has-success">
                                    <label for="district" class="control-label mb-1">Change district</label>
                                    <select class="form-control" name="district_id" id="district_id" required>
                                        <option value="">Select...</option>
                                        @foreach(\App\District::orderBy('created_at', 'decs')->get() as $district)
                                        <option value="{{ $district->id }}" {{ $assembly->district->id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                        @endforeach
                                    </select>
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