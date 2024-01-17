@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List users</h3>
                                <div class="filter">
                                    <form action="{{ route('admins.users.index') }}" method="get">
                                        <input class="search" type="text" name="search" placeholder="Search..."
                                            value="{{ request()->input('search') }}">
                                        <button class="user-search" type="submit">Search</button>
                                    </form>
                                </div>
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
                                                        <th scope="col">{{ __('admin.id') }}</th>
                                                        <th scope="col">{{ __('admin.name') }}</th>
                                                        <th scope="col">{{ __('admin.email') }}</th>
                                                        <th scope="col">{{ __('admin.image') }}</th>
                                                        <th scope="col">{{ __('admin.status') }}</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <div class="list">
                                                        @foreach ($users as $item)
                                                            <tr>
                                                                <td>{{ $item->id }}</td>
                                                                <td class="category-name">
                                                                    <a class="title btn-toggle"
                                                                        href="#">{{ $item->name }}</a>
                                                                </td>
                                                                <td>{{ $item->email }}</td>
                                                                <td><img class="avatar"
                                                                        src="{{ $item->getUserImageURL() }}"
                                                                        alt=""></td>
                                                                <td>
                                                                    <label class="switch">
                                                                        <form>
                                                                            <input
                                                                                {{ $item->status == App\Models\User::STATUS_ACTIVE ? 'checked' : '' }}
                                                                                type="checkbox" class="checkbox"
                                                                                block-route="{{ route('admins.users.update', $item) }}">
                                                                            <span class="slider round"></span>
                                                                        </form>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </div>
                                                </tbody>
                                            </table>
                                            @if (!empty($users))
                                                {{ $users->links() }}
                                            @endif
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
