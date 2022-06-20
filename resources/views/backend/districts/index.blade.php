@extends('backend.layouts.layout')
@section('title', 'Districts')
@section('breadcrumb')
<li><a href="#">Dsitrict Locator</a></li>
@endsection
@section('content')
<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                @include('includes.alerts')
                <div class="card-header">
                    <strong class="card-title">All districts</strong>
                    <a href="{{ route('districts.create') }}" class="btn btn-outline-primary">Add district</a>

                </div>

                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Pastor In-charge</th>
                                <th>Contact Phone</th>
                                <th>Contact email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($districts as $district)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $district->name }}</td>
                                    <td>{{ $district->pastor }}</td>
                                    <td>{{ $district->phone }}</td>
                                    <td>{{ $district->email }}</td>
                                    <td>
                                        <a href="{{ route('districts.edit', $district->id) }}"
                                            class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" href="{{ route('districts.destroy', $district->id) }}" onclick="event.preventDefault(); document.getElementById('district{{ $district->id }}').submit();"><i class="fa fa-trash"></i> Delete</button>
                                        <form id="district{{ $district->id }}" action="{{ route('districts.destroy', $district->id)}}" method="POST" style="display: none;">
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