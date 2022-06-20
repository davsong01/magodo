@extends('backend.layouts.layout')
@section('title', 'Assembly')
@section('breadcrumb')
<li><a href="#">Assembly Locator</a></li>
@endsection
@section('content')
<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                @include('includes.alerts')
                <div class="card-header">
                    <strong class="card-title">All assemblies</strong>
                    <a href="{{ route('assemblys.create') }}" class="btn btn-outline-primary">Add assembly</a>

                </div>

                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>District</th>
                                <th>Pastor In-charge</th>
                                <th>Contact Phone</th>
                                <th>Contact email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($assemblys as $assembly)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $assembly->name }}</td>
                                    <td>{{ $assembly->district->name }}</td>
                                    <td>{{ $assembly->pastor }}</td>
                                    <td>{{ $assembly->phone }}</td>
                                    <td>{{ $assembly->email }}</td>
                                    <td>
                                        <a href="{{ route('assemblys.edit', $assembly->id) }}"
                                            class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" href="{{ route('assemblys.destroy', $assembly->id) }}" onclick="event.preventDefault(); document.getElementById('assembly{{ $assembly->id }}').submit();"><i class="fa fa-trash"></i> Delete</button>
                                        <form id="assembly{{ $assembly->id }}" action="{{ route('assemblys.destroy', $assembly->id)}}" method="POST" style="display: none;">
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