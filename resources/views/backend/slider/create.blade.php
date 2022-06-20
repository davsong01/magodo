@extends('backend.layouts.layout')
@section('title', 'Slider')
@section('breadcrumb')
<li><a href="{{ route('slider.index') }}">All sliders</a></li>
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
                            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Title</label>
                                    <input id="title" name="title" value="{{ old('title') }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                
                                <div class="form-group has-success">
                                    <label for="file" class="control-label mb-1">File</label>
                                    <input id="youtube_form_link" name="filex" type="file"
                                        class="form-control file" value="{{ old('filex')}}" aria-invalid="false"
                                        aria-describedby="file" accept="image/png, image/gif, image/jpeg" >
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