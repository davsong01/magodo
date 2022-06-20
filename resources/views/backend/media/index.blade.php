@extends('backend.layouts.layout')
@section('title', 'Media')
@section('breadcrumb')
<li><a href="#">Media</a></li>
@endsection
@section('css')
<style>
.blog-content a {
  height: 100px;
  padding: 5px
}
</style>
@endsection
@section('content')
<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                @include('includes.alerts')
                <div class="card-header">
                    <strong class="card-title">All media</strong>
                    <a href="{{ route('media.create') }}" class="btn btn-outline-primary">Add media</a>

                </div>

                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Thumbnail</th>
                                <th>Upload date</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Is Free</th>
                                <th>Uploaded by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($media as $med)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td> <img src="{{ url('/').'/'.$med->featured_image }}"style="width:60px" alt=""></td>
                                    <td>{{ $med->created_at }}</td>
                                    <td>{{ $med->title }} <br> <small style="color:{{ $med->status == 'draft' ? 'red' : 'green' }}">{{ $med->status }}</small></td>
                                    <td>{{ $med->type }} <br>
                                        @if($med->isFree == "yes")
                                            <a target="_blank" href="{{ route('media.view', $med->slug) }}" class="btn btn-info btn-sm" style="font-size:12px; color:white;width: 100%;">View</a>
                                        @else
                                            <a href="{{ route('media.paid2', $med->id) }}" class="btn btn-primary btn-sm" style="font-size:12px; color:white;width: 100%;"><i class="fa fa-download"></i> Download Media</a>
                                        @endif
                                        
                                    </td>
                                    <td>{{ ucfirst($med->isFree) }} @if($med->isFree == 'no') <br>&#8358;{{ number_format($med->price) }} @endif</td>
                                    {{-- <td>
                                        @if($med->type == 'audio')
                                            <img src="{{ url('/').'/'.$med->featured_image }}"style="width:60px" alt="">
                                        @endif

                                        @if($med->type == 'video')
                                            <img src="{{ url('/').'/'.$med->featured_image }}"style="width:60px" alt="">
                                        @endif

                                        @if($med->type == 'youtube')
                                            @if(isset($med->featured_image))
                                                <img src="{{ url('/').'/'.$med->featured_image }}"style="width:60px" alt="">
                                            @endif
                                        @endif

                                        @if($med->type == 'mxlr')
                                        @endif
                                    </td> --}}
                                    <td>{{ $med->uploaded_by }}</td>
                                    <td>
                                        <a href="{{ route('media.edit', $med->id) }}"
                                            class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" href="{{ route('media.destroy', $med->id) }}" onclick="event.preventDefault(); document.getElementById('med{{ $med->id }}').submit();"><i class="fa fa-trash"></i> Delete</button>
                                        <form id="med{{ $med->id }}" action="{{ route('media.destroy', $med->id)}}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
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