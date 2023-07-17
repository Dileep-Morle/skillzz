@extends('admin.layouts.app')
@section('content')
<div class="page-body">
    <div class="container-xl">
      @include('admin.components.alert')
        <div class="row row-cards">
            <div class="col-12">
               <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Parents</h3>
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="{{ route('admin.parent.add') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                 Add new parent
                                </a>
                                <a href="{{ route('admin.parent.add') }}" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Add parent new report">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                   <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                        <div class="text-muted">
                        Show
                        <div class="mx-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                        </div>
                        entries
                        </div>  
                        <div class="ms-auto text-muted">
                        Search:
                        <div class="ms-2 d-inline-block">
                            <form action="{{route('admin.parents')}}" method="get">
                                <input type="text" name="search" value="{{ old('search') }}" class="form-control form-control-sm" aria-label="Search Parents">
                                <!-- <button type="submit">Search</button> -->
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="myTable" class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                        <tr>
                            <th><a href="?sort_by=id">Parent ID</a></th>
                            <th><a href="?sort_by=name">Parent Name</a></th>
                            <th><a href="?sort_by=age">Age</a></th>
                            <th><a href="?sort_by=address">Address</a></th>
                            <th><a href="?sort_by=phone">Mobile Number</a></th>
                            <th><a href="?sort_by=created_at">Date</a></th>
                            <th><a href="#">Status</a></th>
                            <th><a href="#">Action</a></th>
                        </tr>
                        </thead>
                        <tbody>
                           @if($count > 0)
                           @foreach($records as $record)
                            <tr>
                                <td><span class="text-muted">{{ $record->id }}</span></td>
                                <td>{{ $record->name }}</td>
                                <td>{{ $record->age }}</td>
                                <td>{{ $record->address }}</td>
                                <td>{{ $record->phone }}</td>
                                <td> {{ $record->created_at }} </td>
                                <td> 
                                    @if($record->status =='1') 
                                    <a class="btn btn-success" href="{{url('/admin/parent/status', $record->id)}}">
                                        Active
                                    </a>
                                    @else 
                                    <a class="btn btn-danger" href="{{url('/admin/parent/status', $record->id)}}">
                                    InActive
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{route('admin.parent.edit', $record->id)}}">
                                                Edit
                                            </a>
                                            <a class="dropdown-item" id="demo" href="{{route('admin.parent.delete', $record->id)}}" onclick="return confirm('Are you sure you want to delete this item?');">
                                                Delete
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                           @endforeach
                           @else
                            <tr>
                                <td>Parent details not found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $records->links() }}
                </div>
           </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')

@endsection