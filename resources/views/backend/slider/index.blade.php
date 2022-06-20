@extends('backend.layouts.layout')
@section('title', 'slider')
@section('breadcrumb')
<li><a href="#">Slider</a></li>
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
                    <strong class="card-title">All slider</strong>
                    <a href="{{ route('slider.create') }}" class="btn btn-outline-primary">Add slider</a>

                </div>

                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($slider as $med)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td> <img src="{{ url('/').'/'.$med->file }}"style="width:60px" alt=""></td>
                                    <td>{{ $med->title }} <br> <small style="color:{{ $med->status == 'draft' ? 'red' : 'green' }}">{{ $med->status }}</small></td>
                                    <td>
                                        
                                        <button type="button" class="btn btn-outline-danger btn-sm" href="{{ route('slider.destroy', $med->id) }}" onclick="event.preventDefault(); document.getElementById('med{{ $med->id }}').submit();"><i class="fa fa-trash"></i> Delete</button>
                                        <form id="med{{ $med->id }}" action="{{ route('slider.destroy', $med->id)}}" method="POST" style="display: none;">
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
