@extends('backend.layouts.layout')
@section('title', 'User')
@section('breadcrumb')
<li><a href="#">User</a></li>
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
                    <strong class="card-title">All users</strong>
                    {{-- <a href="{{ route('user.create') }}" class="btn btn-outline-primary">Add user</a> --}}

                </div>

                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Transactions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($users as $med)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td> <img src="{{ url('/').'/'.$med->avatar }}"style="width:60px" alt=""></td>
                                    <td>{{ $med->name }}</td>
                                    <td>{{ $med->email }}</td>
                                    <td>{{ $med->transactions->count() }}</td>
                                
                                    <td>
                                        <a href="{{ route('users.edit', $med->id) }}"
                                            class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" href="{{ route('users.destroy', $med->id) }}" onclick="event.preventDefault(); document.getElementById('med{{ $med->id }}').submit();"><i class="fa fa-trash"></i> Delete</button>
                                        <form id="med{{ $med->id }}" action="{{ route('users.destroy', $med->id)}}" method="POST" style="display: none;">
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