@extends('backend.layouts.layout')
@section('css')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<style>
    .demarcate{
        background-color: red;
        margin-top: 6px;
    }
    .demarcate-header{
        font-weight: 510;
        color: #033d75;
    }
</style>

@endsection
@section('title', 'Profile Update')
@section('breadcrumb')
<li><a href="{{ route('setting.edit') }}">Update Profile</a></li>
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
                            
                            <form action="{{ route('saveprofile') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{method_field('PATCH')}}
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- <h4 class="demarcate-header">Regional Pastor details</h4>
                                        <hr class="demarcate"> --}}
                                            <label for="name" class="control-label mb-1">Name</label>
                                            <input id="name" name="name" value="{{ old('name') ?? $user->name}}" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                           
                                            <div class="form-group">
                                                <label for="email" class="control-label mb-1">Email</label>
                                                <input class="form-control" name="{{ auth()->user()->role == 0 ? 'email' : '' }}" id="email" type="email" value="{{ old('email') ?? $user->email}}" {{ auth()->user()->role == 0 ? 'disabled' :'' }}>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="phone" class="control-label mb-1">Phone Number</label>
                                                <input class="form-control" name="phone" id="phone" type="phone" value="{{ old('phone') ?? $user->phone}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="control-label mb-1">Password(Leave blank to keep unchanged)</label>
                                                <input class="form-control" name="password" id="password" type="password" value="">
                                            </div>
                                            @if(isset($user->avatar) && $user->avatar != 'images/avatar/default.jpeg')
                                            <div class="form-group">
                                                <label for="imageimage" class="control-label mb-1">Replace Avatar <img id="image" src="{{ url('/') . '/' .$user->avatar }}" alt="" style="width: 50px;height: 100p;display: flex;"> </label>
                                                <input class="form-control" type="file" name="image">
                                            </div>
                                            @endif
                                            @if(!isset($user->avatar))
                                            <div class="form-group">
                                                <label for="rp_image" class="control-label mb-1">Upload Avatar </label>
                                                <input class="form-control" type="file" name="image">
                                            </div>
                                            @endif
                                    </div>
                                
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
<script type="text/javascript">
    CKEDITOR.replace('rp_greetings');
    CKEDITOR.replace('wysiwyg-editor', {
        filebrowserUploadUrl: "{{route('image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('history');
    
</script>
@endsection