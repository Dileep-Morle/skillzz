@extends('coach.layouts.app')
@section('content')
<div class="page-body">
    <div class="container-xl">
      @include('coach.components.alert')
        <div class="row row-cards">
            <div class="col-12">
               <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All batches</h3>
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="{{ route('coach.batch.add') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                 Add new batch
                                </a>
                                <a href="{{ route('coach.batch.add') }}" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Add batch new report">
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
                            <form action="{{route('coach.batches')}}" method="get">
                                <input type="text" name="search" value="{{ old('search') }}" class="form-control form-control-sm" aria-label="Search batches">
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
                            <th><a href="?sort_by=id">ID</a></th>
                            <th><a href="?sort_by=batch_name">batch Name</a></th>
                            <th><a href="?sort_by=start_date">Start Date</a></th>
                            <th><a href="?sort_by=end_date">End Date</a></th>
                            <th><a href="?sort_by=duration">Duration</a></th>
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
                                <td>{{ $record->batch_name }}</td>
                                <td>{{ $record->start_date }}</td>
                                <td>{{ $record->end_date }}</td>
                                <td> {{ $record->duration }} </td>
                                <td> {{ $record->created_at }} </td>
                                <td> 
                                    @if($record->status =='1') 
                                    <a class="btn btn-success" href="{{url('/coach/batch/change_status', $record->id)}}">
                                        Active
                                    </a>
                                    @else 
                                    <a class="btn btn-danger" href="{{url('/coach/batch/change_status', $record->id)}}">
                                    InActive
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{route('coach.batch.edit', $record->id)}}">
                                                Edit
                                            </a>
                                            <a class="dropdown-item" id="demo" href="{{route('coach.batch.delete', $record->id)}}" onclick="return confirm('Are you sure you want to delete this item?');">
                                                Delete
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                           @endforeach
                           @else
                            <tr>
                                <td>batch details not found</td>
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