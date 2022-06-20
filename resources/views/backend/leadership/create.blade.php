@extends('backend.layouts.layout')
@section('title', 'Leaders')
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
                            <form action="{{ route('leadership.store') }}" method="POST" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Name</label>
                                    <input id="title" name="title" value="{{ old('title') }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group">
                                    <label for="position" class="control-label mb-1">Office</label>
                                    <input id="position" name="position" value="{{ old('position') }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group has-success">
                                    <label for="image" class="control-label mb-1">Avatar</label>
                                    <input id="avatar" name="avatar" type="file"
                                        class="form-control" value="{{ old('avatar')}}" aria-invalid="false" required>
                                </div>
                                <div class="form-group has-success">
                                    <label for="rank" class="control-label mb-1">Select rank (This will be used to place the leaders on the leadership page)</label>
                                    <select class="form-control" name="rank" id="rank" required>
                                        @foreach($range as $r=>$value)
                                        <option value="{{ $value }}" {{ old('rank') == $value ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button type="submit"
                                        class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Submit</span>
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
@section('script')
<script>
$(document).ready(function() {
    $("#type").change(function(e) {
        if($(this).val() == 'audio' || $(this).val() == 'video'){
            // alert('video');
            $('#file').show();
            $('#mixlr_link').hide();
            $('#youtube_link').hide();
        }else if($(this).val() == 'youtube'){
            $('#file').hide();
            $('#youtube_link').show();
            $('#mixlr_link').hide();
            $('#file').hide();

        }else{
            $('#mixlr_link').show();
            $('#youtube_link').hide();
        }
    } );

    $("#isFree").change(function(e) {
        if($(this).val() == 'no'){
            $('#price').show();
        }else{
            $('#price').hide();
        }
    } );
} );

</script>
    
@endsection