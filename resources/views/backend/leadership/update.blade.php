@extends('backend.layouts.layout')
@section('title', 'Leadership')
@section('breadcrumb')
<li><a href="{{ route('leadership.index') }}">All leaders</a></li>
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
                            <form action="{{ route('leadership.update', $leader->id) }}" method="POST" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                 {{method_field('PATCH')}}

                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Name</label>
                                    <input id="name" name="name" value="{{ old('name') ?? $leader->name }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group">
                                    <label for="position" class="control-label mb-1">Office</label>
                                    <input id="position" name="position" value="{{ old('position') ?? $leader->position }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group has-success">
                                    <label for="image" class="control-label mb-1">Replace avatar</label> <br>
                                    <img src="{{ url('/').'/'.$leader->image }}"style="width:60px;margin: 10px;" alt="">
                                    <input id="avatar" name="avatar" type="file"
                                        class="form-control" value="{{ old('avatar')}}" aria-invalid="false">
                                </div>
                                <div class="form-group has-success">
                                    <label for="image" class="control-label mb-1">Rank</label>
                                    <input class="form-control" disabled value="{{ $leader->rank }}" type="text">
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