@extends('backend.layouts.layout')
@section('title', 'Leadership')
@section('breadcrumb')
<li><a href="#">Leadership</a></li>
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
                    <strong class="card-title">Our leaders</strong>
                    <a href="{{ route('leadership.create') }}" class="btn btn-outline-primary">Add leader</a>

                </div>

                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Office</th>
                                <th>Rank</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($leaders as $leader)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><img src="{{ url('/').'/'.$leader->image }}"style="width:60px" alt=""></td> 
                                    <td>{{ $leader->name }}</td>
                                    <td>{{ $leader->position }}</td>
                                    <td>{{ $leader->rank }}</td>
                                    <td>
                                        <a href="{{ route('leadership.edit', $leader->id) }}"
                                            class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" href="{{ route('leadership.destroy', $leader->id) }}" onclick="event.preventDefault(); document.getElementById('med{{ $leader->id }}').submit();"><i class="fa fa-trash"></i> Delete</button>
                                        <form id="med{{ $leader->id }}" action="{{ route('leadership.destroy', $leader->id)}}" method="POST" style="display: none;">
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
</div>

@endsection