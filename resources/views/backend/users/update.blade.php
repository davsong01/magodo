@extends('backend.layouts.layout')
@section('title', 'Users')
@section('breadcrumb')
<li><a href="{{ route('assemblys.index') }}">Users</a></li>
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

                            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                 {{method_field('PATCH')}}
                                 <div class="form-group">
                                    <label for="name" class="control-label mb-1">Name</label>
                                    <input id="name" name="name" value="{{ old('name') ?? $user->name }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email</label>
                                    <input id="email" name="email" value="{{ old('email') ?? $user->email }}" type="email"
                                        class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Password (Optional)</label>
                                    <input id="name" name="password" value="{{ old('password') }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group has-success">
                                    <label for="image" class="control-label mb-1">Replace avatar</label> <br>
                                    <img src="{{ asset($user->avatar) }}" alt="" style="width:100px;height:100px;margin-bottom:10px"> <br>
                                    <input id="image" name="image" type="file"
                                        class="form-control" value="{{ old('image')}}" aria-invalid="false">
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