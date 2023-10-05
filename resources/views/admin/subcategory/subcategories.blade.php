@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="app-content main-content">
    <div class="side-app">

        <!--app header-->
        @include('admin.header')
        <!--/app header-->

        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">{{$category->name}}</h4>
            </div>
            <div class="page-rightheader">
                <div class="btn-list">
                    <a href="{{route('admin.subcategory.create', ['category' => $category])}}" class="btn btn-outline-primary">
                        <i class="fe fe-plus me-2"></i>
                        Add New
                    </a>
                </div>
            </div>
        </div>
        <!--End Page header-->

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('SubCategories')}}</h3>
                    </div>
                    <div class="card-body p-0">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />
                        
                        <div class="table-responsive">
                            <table class="table table-striped card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subcategories as $subcategory)
                                    <tr id="row-{{$subcategory->id}}">
                                        <th scope="row">{{$subcategory->id}}</th>
                                        <td>{{$subcategory->name}}</td>
                                        <td>{{$subcategory->slug}}</td>
                                        <td><span @class(['text-success' => $subcategory->status == 'active', 'text-danger' => $category->status == 'inactive'])>{{$category->status}}</span></td>
                                        <td>
                                            <a href="{{route('admin.subcategory.edit', ['subcategory' => $subcategory])}}" class="btn btn-primary btn-sm">
                                                <i class="fe fe-edit"></i>
                                            </a>
                                            <button @class(['btn', 'btn-sm', 'btnDelete', 'btn-danger' => $subcategory->status == 'active', 'btn-success' => $subcategory->status == 'inactive']) data-id="{{$subcategory->id}}">
                                                <i @class(['fe', 'fe-delete' => $subcategory->status == 'active', 'fe-check' => $subcategory->status == 'inactive'])class="fe fe-delete"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            {{ $subcategories->links() }}
                        </div><!-- bd -->
                    </div><!-- bd -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-specific-js')
<script type="text/javascript">
$(document).ready(function() {
    console.log('here');
    $(".btnDelete").click(function() {
        if (confirm('Really mean to delete this category?')) {
            let id = $(this).data('id');

            $.post("{{url('admin/category')}}/"+id, {
                _token: '{{csrf_token()}}',
                _method: 'DELETE'
            }, function(data) {
                if (data.success) {
                    alert('category '+data.status+' successfully.');
                    window.location.reload();
                }
            })
        }
    })
})
</script>
@endsection