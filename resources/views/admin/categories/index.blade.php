@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List categories</h3>
                            </div>
                            <div class="card-body">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6"></div>
                                        <div class="col-sm-12 col-md-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Name</th>
                                                        <th class="add" id="create" scope="col">
                                                            <p class="btn btn-success toggle-btn"><i
                                                                    class="bi bi-plus-lg"></i></p>
                                                        </th>
                                                        <div id="data"
                                                            category-create-route="{{ route('admins.categories.store') }}"
                                                            error-message="{{ __('auth.error') }}"></div>
                                                        <div class="create-form">
                                                            <form id="categoryCreateForm">
                                                                <input type="text" id="categoryName" name="name"
                                                                    placeholder="Enter category name">
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="bi bi-send-plus"></i></button>
                                                                <p id="error" class="btn btn-danger"></p>
                                                            </form>
                                                        </div>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <div class="list">
                                                        @foreach ($categories as $item)
                                                            <tr>
                                                                <td>{{ $item->id }}</td>
                                                                <td class="category-name"
                                                                    data-category-id="{{ $item->id }}">
                                                                    <a class="title btn-toggle"
                                                                        href="#">{{ $item->name }}</a>
                                                                    <input type="text"
                                                                        class="form-control edit-input hide-btn">
                                                                    <p class="update-error btn btn-danger"></p>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-primary btn-edit">
                                                                        <i class="bi bi-pen"></i>
                                                                    </button>
                                                                    <button
                                                                        category-update-url="{{ route('admins.categories.update', $item->id) }}"
                                                                        class="btn btn-success hide-btn btn-submit btn-toggle">
                                                                        <i class="bi bi-send-fill"></i>
                                                                    </button>
                                                                    <button
                                                                        class="btn btn-secondary hide-btn btn-cancel btn-toggle">
                                                                        <i class="bi bi-x-circle-fill"></i>
                                                                    </button>
                                                                    <button class="btn btn-danger btn-delete"
                                                                        category-delete-url="{{ route('admins.categories.destroy', $item) }}">
                                                                        <i class="bi bi-trash"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </div>
                                                </tbody>
                                            </table>
                                            {{ $categories->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
