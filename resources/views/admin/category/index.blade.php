@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Manage Category</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
            <div class="col-12 mb-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="mb-4 font-weight-bold">Category List</h5>
                        <div class="separator mb-5"></div>
                        <div class="table-responsive">
                            <table class="data-table data-table-category">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Category Description</th>
                                    <th style="width: 100px;">Page Slug</th>
                                    <th style="width: 80px;">Date</th>
                                    <th style="width: 200px;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $record)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$record->name}}</td>
                                        <td>{{$record->description}}</td>
                                        <td>{{$record->page_slug}}</td>
                                        <td>{{date('d M Y',strtotime($record->created_at))}}</td>
                                        <td class="text-center">
                                            <a href="{{route('admin-category-edit', $record->id)}}" class="las la-edit btn btn-secondary mx-1"></a>
                                            <a data-delete='{{$record->id}}' href="javascript:void(0)" class="las la-trash-alt btn btn-secondary mx-1 delete_item"></a>
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
    </div>
    </div>
@endsection
