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
@section('title', 'Settings')
@section('breadcrumb')
<li><a href="{{ route('setting.edit') }}">Settings Page</a></li>
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

                            <form action="{{ route('updateseeting') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{method_field('PATCH')}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="demarcate-header">Regional Pastor details</h4>
                                        <hr class="demarcate">
                                        <label for="rp" class="control-label mb-1">Regional Pastor Name</label>
                                            <input id="rp" name="rp" value="{{ old('rp') ?? $setting->rp}}" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                            
                                            <div class="form-group">
                                                <label for="rp_greetings" class="control-label mb-1">R. Pastor's greetings</label>
                                                <textarea class="form-control" name="rp_greetings" id="rp_greetings" cols="30" rows="10">{{ old('rp_greetings') ?? $setting->rp_greetings}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="rp_image" class="control-label mb-1">Replace R. Pastor's Image <img id="rp-image" src="{{ url('/') . '/' .$setting->rp_image }}" alt="" style="width: 50px;height: 100p;display: flex;"> </label>
                                                <input class="form-control" type="file" name="image">
                                            </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <h4 class="demarcate-header">About Page Settings</h4>
                                        <hr class="demarcate">
                                        <label for="history" class="control-label mb-1">History</label>
                                            <textarea rows="350" id="history" name="history" value="{{ old('history') ?? $setting->history}}" type="text" class="form-control" aria-required="true" aria-invalid="false">{{ old('history') ?? $setting->history}}</textarea>
                                            <div class="form-group">
                                                <label for="faith_declaration" class="control-label mb-1">{{ date('Y') }} Faith Declaration</label>
                                                <input id="faith_declaration" name="faith_declaration" value="{{ old('faith_declaration') ?? $setting->faith_declaration }}" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group">
                                                <label for="anchor" class="control-label mb-1">{{ date('Y') }} Anchor</label>
                                                <textarea class="form-control" name="anchor" id="" cols="30" rows="10">{{ old('anchor') ?? $setting->anchor}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="aim" class="control-label mb-1">Aim</label>
                                                <textarea class="form-control" name="aim" id="" cols="30" rows="5">{{ old('aim') ?? $setting->aim}}</textarea>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="core-values" class="control-label mb-1">Core Values</label>
                                                <textarea class="form-control" name="core_values" id="" cols="30" rows="5">{{ old('core_values') ?? $setting->core_values }}</textarea>
                                            </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h4 class="demarcate-header">Contact details</h4>
                                        <hr class="demarcate">
                                            <label for="mail" class="control-label mb-1">Official email</label>
                                            <input id="mail" name="mail" value="{{ old('mail') ?? $setting->mail}}" type="email" class="form-control">
                                            <label for="phone" class="control-label mb-1">Official Phone number</label>
                                            <input id="phone" name="phone" value="{{ old('phone') ?? $setting->phone}}" type="text" class="form-control">
                                            <div class="form-group">
                                                <label for="facebook" class="control-label mb-1">Facebook url</label>
                                                <input id="facebook" name="facebook" value="{{ old('facebook') ?? $setting->facebook }}" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group">
                                                <label for="twitter" class="control-label mb-1">Twitter url</label>
                                                <input id="twitter" name="twitter" value="{{ old('twitter') ?? $setting->twitter }}" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group">
                                                <label for="instagram" class="control-label mb-1">Instagram url</label>
                                                <input id="instagram" name="instagram" value="{{ old('instagram') ?? $setting->instagram }}" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group">
                                                <label for="youtube" class="control-label mb-1">Youtube url</label>
                                                <input id="youtube" name="youtube" value="{{ old('youtube') ?? $setting->youtube }}" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            <div class="form-group">
                                                <label for="address" class="control-label mb-1">Church address</label>
                                                <input id="address" name="address" value="{{ old('address') ?? $setting->address }}" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                           
                                    </div>

                                    <div class="col-md-12">
                                        <h4 class="demarcate-header">Other details</h4>
                                        <hr class="demarcate">
                                         <div class="form-group">
                                            <label for="number_of_leaders" class="control-label mb-1">Number of church leaders</label>
                                            <input id="" name="number_of_leaders" value="{{ old('number_of_leaders') ?? $setting->number_of_leaders}}" type="number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="youtube_livestream_link" class="control-label mb-1">Youtube Livestream link</label>
                                            <input id="" name="youtube_livestream_link" value="{{ old('youtube_livestream_link') ?? $setting->youtube_livestream_link}}" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="mixlr_livestream_link" class="control-label mb-1">Mixlr Livestream link</label>
                                            <input id="" name="mixlr_livestream_link" value="{{ old('mixlr_livestream_link') ?? $setting->mixlr_livestream_link}}" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="facebook_livestream_link" class="control-label mb-1">Mixlr Livestream link</label>
                                            <input id="" name="facebook_livestream_link" value="{{ old('facebook_livestream_link') ?? $setting->facebook_livestream_link}}" type="text" class="form-control">
                                        </div>
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