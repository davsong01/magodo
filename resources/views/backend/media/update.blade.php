@extends('backend.layouts.layout')
@section('title', 'Media')
@section('breadcrumb')
<li><a href="{{ route('assemblys.index') }}">Media</a></li>
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

                            <form action="{{ route('media.update', $media->id) }}" method="POST" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                 {{method_field('PATCH')}}
                                 <div class="form-group">
                                    <label for="title" class="control-label mb-1">Title</label>
                                    <input id="title" name="title" value="{{ old('title') ?? $media->title }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group has-success">
                                    <label for="image" class="control-label mb-1">Replace featured Image</label> <br>
                                    <img src="{{ asset($media->featured_image) }}" alt="" style="width:100px;height:100px;margin-bottom:10px"> <br>
                                    <input id="image" name="image" type="file"
                                        class="form-control" value="{{ old('image')}}" aria-invalid="false">
                                </div>
                                @if($media->type == 'audio' || $media->type == 'video')
                                <div class="form-group has-success">
                                    <label for="isFree" class="control-label mb-1">Is Free</label>
                                    <select class="form-control" name="isFree" id="isFree" required>
                                        <option value="yes" {{ $media->isFree == 'yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="no" {{ $media->isFree == 'no' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                @endif
                                <div class="form-group has-success" id="price" style="{{ $media->isFree == 'yes' ? 'display:none' : '' }}">
                                    <label for="price" class="control-label mb-1">Price</label>
                                    <input id="price" name="price" type="number"
                                        class="form-control" value="{{ $media->price }}" step=".01">
                                   
                                </div>
                                @if($media->type == 'youtube')
                                <div class="form-group has-success" id="youtube_link">
                                    <label for="youtube_link" class="control-label mb-1">Youtube Video ID</label>
                                    <input id="youtube_form_link" name="youtube_link" type="text"
                                        class="form-control youtube_link" value="{{ old('youtube_link') ?? $media->youtube_link }}" aria-invalid="false"
                                        aria-describedby="youtube_link">
                                </div>
                                @endif
                                @if($media->type == 'mixlr')
                                <div class="form-group has-success" style="display:none" id="mixlr_link">
                                    <label for="mixlr_link" class="control-label mb-1">Mixlr Link</label>
                                    <input id="mixlr_form_link" name="mixlr_link" type="text"
                                        class="form-control mixlr_link" value="{{ old('mixlr_link') ?? $media->mixlr_link}}" aria-invalid="false"
                                        aria-describedby="mixlr_link">
                                </div>
                                @endif
                                {{-- <div class="form-group has-success" style="display:none" id="mixlr_link">
                                    <label for="mixlr_link" class="control-label mb-1">Mixlr Link</label>
                                    <input id="mixlr_form_link" name="mixlr_link" type="text"
                                        class="form-control mixlr_link" value="{{ old('mixlr_link')}}" aria-invalid="false"
                                        aria-describedby="mixlr_link">
                                </div> --}}
                                {{-- 
                                <div class="form-group has-success" style="display:none" id="file">
                                    <label for="file" class="control-label mb-1">File</label>
                                    <input id="youtube_form_link" name="filex" type="file"
                                        class="form-control file" value="{{ old('filex')}}" aria-invalid="false"
                                        aria-describedby="file">
                                </div> --}}
                                <div class="form-group has-success">
                                    <label for="status" class="control-label mb-1">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="published" {{ $media->status == 'published' ? 'selected' : '' }}>Published</option>
                                        <option value="draft" {{ $media->status == 'draft' ? 'selected' : '' }}>Draft</option>
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