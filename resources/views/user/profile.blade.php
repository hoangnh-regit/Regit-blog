@extends('layouts.base')
@section('content')
    <div class="fade modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('auth.logout') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>{{ __('blog.logout') }}</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close btnc" data-bs-dismiss="modal">{{ __('blog.close') }}</button>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="delete btnc">{{ __('auth.logout') }}</button>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <header>
            <div class="menu" id="navbar">
                <nav class="left nav-menu">
                    <a href="{{ route('home') }}" class="logo"><img class="img"
                            src="{{ asset('/images/Group_155.png') }}" alt="" /></a>
                </nav>
                <nav class="right nav-menu create-blog">
                    @if (auth()->check())
                        <li><a class="third">{{ auth()->user()->name }}</a></li>
                        <li>
                            <div class="user-btn">
                                <p class="user"><i class="fouth bx bx-user-circle"></i></p>
                                <div class="user-list">
                                    <a class="size" href="{{ route('users.home') }}">{{ __('auth.my_profile') }}</a>
                                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="size"
                                        id="logoutBtn">{{ __('auth.logout') }}</button>

                                </div>
                            </div>
                        </li>
                    @else
                        <form action="#" method="post">
                            <button type="button" class="first">{{ __('auth.top') }}</button>
                        </form>
                        <li>
                            <a href="{{ route('login') }}" class="third login">{{ __('auth.login') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="fouth">{{ __('auth.sign_up') }}</a>
                        </li>
                    @endif
                </nav>
            </div>
            <div class="menu-mobile">
                <div class="nav">
                    <a href="" class="toggle-btn" id="toggle">
                        <i class="bx bx-menu"></i>
                    </a>
                    <a href="" class="logo"><img src="{{ asset('/images/Group_155.png') }}" alt="" /></a>
                    <a href="" class="search-btn">
                        <i class="bx bx-search"></i>
                    </a>
                </div>
                <div class="navbar-links">
                    <ul>
                        <li><a href="">T{{ __('auth.top') }}</a></li>
                        <li><a href="{{ route('blogs.create') }}">{{ __('title.create_blog') }}</a></li>
                    </ul>
                </div>
            </div>
        </header>
    </div>
    <div class="center">
        <div class="row ">
            <div class="col-xl-4 col-md-4">
                <div class="row profile">
                    <div class="col-md-6 col-xs-12 image">
                        <img src="{{ auth()->user()->getUserImageURL() }}" class="img-radius" alt="User-Profile-Image">
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="email">
                            <p class="">{{ __('profile.email') }}</p>
                            <div>
                                <p class="">{{ $response['email'] }}</p>
                            </div>
                        </div>
                        <div class="">
                            <h6 class="">{{ __('profile.name') }}</h6>
                            <p class="">{{ $response['name'] }}</p>
                        </div>
                        <div class="func">
                            <a href="{{ route('users.edit') }}" class="btn btn-success">
                                {{ __('profile.edit_profile') }}</a>
                        </div>
                        <div class="func">
                            <a href="{{ route('users.change_password') }}" class="btn btn-primary">
                                {{ __('title.change_password') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-8">
                <div class="navbar">
                    <a href="#" id="show1">{{ __('profile.your_blog') }}</a>
                    <a href="#" id="show2">{{ __('profile.liked') }}</a>
                </div>
                <div class="row row1">
                    @foreach ($myBlogLists as $item)
                        <div class="col-xl-4 tag">
                            <div class="card">
                                <img src="{{ Storage::exists($item->img) ? Storage::url($item->img) : asset($item->img) }}"
                                    class="" alt="{{ __('blog.image_blog') }}" />
                                <div class="card-body">
                                    <div class="category">
                                        <span><i class="bi bi-list"></i></span>
                                        <p>{{ optional($item->category)->name }}</p>
                                    </div>
                                    <a href="{{ route('blogs.show', $item) }}"
                                        class="card-title">{{ $item->title }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row2">
                    <div class="row ">
                        @foreach ($likedBlogLists as $item)
                            <div class="col-xl-4 tag">
                                <div class="card">
                                    <img src="{{ Storage::exists($item->img) ? Storage::url($item->img) : asset($item->img) }}"
                                        class="" alt="{{ __('blog.image_blog') }}" />
                                    <div class="card-body">
                                        <div class="category">
                                            <span><i class="bi bi-list"></i></span>
                                            <p>{{ optional($item->category)->name }}</p>
                                        </div>
                                        <a href="{{ route('blogs.show', $item) }}"
                                            class="card-title">{{ $item->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
