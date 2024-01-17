@extends('layouts.base')
@section('title', __('title.create_blog'))
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
    <header>
        <div class="menu" id="navbar">
            <nav class="left nav-menu">
                <a href="{{ route('home') }}" class="logo"><img class="img" src="{{ asset('/images/Group_155.png') }}"
                        alt="" /></a>
                <div class="form-search">
                    <form class="box" action="{{ route('home') }}" method="GET">
                        <input class="search" type="text" name="search" placeholder="Search..."
                            value="{{ request()->input('search') }}">
                        <button type="submit"><i class="bx bx-search"></i></button>
                    </form>
                </div>
            </nav>
            <nav class="right nav-menu create-blog">
                @if (auth()->check())
                    <a href="{{ route('home') }} "
                        class="first loged {{ Request::routeIs('home') ? 'background' : '' }}">{{ __('auth.top') }}</a>
                    <form action="{{ route('blogs.create') }}" method="post">
                        @csrf
                        @method('get')
                        <button
                            class="second {{ Request::routeIs('blogs.create') ? 'background' : '' }}">{{ __('title.create_blog') }}</button>
                    </form>
                    <li><a class="third">{{ auth()->user()->name }}</a></li>
                    <li>
                        <div class="user-btn">
                            <p class="user"><img src="{{ auth()->user()->getUserImageURL() }}" alt=""></p>
                            <div class="user-list">
                                <a class="size" href="{{ route('users.home') }}">{{ __('auth.my_profile') }}</a>
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="size"
                                    id="logoutBtn">{{ __('auth.logout') }}</button>

                            </div>
                        </div>
                    </li>
                @else
                    <form action="#" method="post">
                        <button type="button" class="first background">{{ __('auth.top') }}</button>
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
                <a href="{{ route('home') }}" class="logo"><img src="{{ asset('/images/Group_155.png') }}"
                        alt="" /></a>
                <a href="" class="search-btn">
                    <i class="bx bx-search"></i>
                </a>
            </div>
            <div class="navbar-links">
                <ul>
                    <li><a href="{{route('home')}}">{{ __('auth.top') }}</a></li>
                    <li><a href="{{ route('blogs.create') }}">{{ __('title.create_blog') }}</a></li>
                </ul>
            </div>
        </div>
    </header>
@endsection
