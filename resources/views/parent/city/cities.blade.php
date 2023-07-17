@extends('parent.layouts.app')
@section('content')
<div class="page-body">
    <div class="container-xl">
      @include('parent.components.alert')
        <div class="row row-cards">
            <div class="col-12">
               <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Cities</h3>
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
                            <form action="{{route('parent.cities')}}" method="get">
                                <input type="text" name="search" value="{{ old('search') }}" class="form-control form-control-sm" aria-label="Search invoice">
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
                            <th><a href="?sort_by=id">City ID</a></th>
                            <th><a href="?sort_by=city_name">City Name</a></th>
                            <th><a href="?sort_by=country">Country Name</a></th>
                            <th><a href="?sort_by=created_at">Date</a></th>
                            <th><a href="#">Action</a></th>
                        </tr>
                        </thead>
                        <tbody>
                           @if($count > 0)
                           @foreach($records as $record)
                            <tr>
                                <td><span class="text-muted">{{ $record->id }}</span></td>
                                <td>{{ $record->city_name }}</td>
                                <td>{{ $record->country }}</td>
                                <td> {{ $record->created_at }} </td>
                                <td>
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{route('parent.city.view', $record->id)}}">
                                                View
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                           @endforeach
                           @else
                            <tr>
                                <td>Cities detail not found</td>
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