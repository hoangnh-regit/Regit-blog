@extends('layouts.base')
@section('content')
    <div>
        <header>
            <div class="menu" id="navbar">
                <nav class="left nav-menu">
                    <a href="" class="logo"><img class="img" src="{{ asset('/images/Group_155.png') }}"
                            alt="" /></a>
                </nav>
                <nav class="right nav-menu create-blog">
                    @if (auth()->check())
                        <li><a class="third">{{ auth()->user()->name }}</a></li>
                        <li>
                            <div class="user-btn">
                                <p class="user"><i class="fouth bx bx-user-circle"></i></p>
                                <div class="user-list">
                                    <a href="{{ route('home') }}">{{ __('auth.my_profile') }}</a>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button id="logoutBtn">{{ __('auth.logout') }}</button>
                                    </form>
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
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius"
                                        alt="User-Profile-Image">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600"> {{ __('profile.profile') }} </h6>
                                <div class="">
                                    <p class="m-b-10 f-w-600">{{ __('profile.email') }}</p>
                                    <h6 class="text-muted f-w-400">{{ $response['email'] }}</h6>
                                </div>
                                <div class="">
                                    <p class="m-b-10 f-w-600">{{ __('profile.name') }}</p>
                                    <h6 class="text-muted f-w-400">{{ $response['name'] }}</h6>
                                </div>
                                <div><a href="" class="btn btn-success"> {{ __('profile.edit_profile') }}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-4">
                <div class="navbar">
                    <a href="#" id="show1">{{ __('profile.your_blog') }}</a>
                    <a href="#" id="show2">{{ __('profile.liked') }}</a>
                </div>
                <div class="row row1">
                    @foreach ($getMyBlogs as $item)
                        <div class="col-xl-4 tag">
                            <div class="card">
                                <img src="{{ asset(Storage::url($item->img)) }}" class=""
                                    alt="Hollywood Sign on The Hill" />
                                <div class="card-body">
                                    <p>{{ $item->category->name }}</p>
                                    <a href="{{ route('blogs.show', $item) }}" class="card-title">{{ $item->title }}</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row row2">
                    <div class="col-xl-12 tag">
                        <div class="card">
                            <img src="{{ asset('images/Rectangle_82.png') }}" class=""
                                alt="Hollywood Sign on The Hill" />
                            <div class="card-body">
                                <h5 class="card-title">Lorem ipsum dolor sit amet, adipiscing elit.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 tag">
                        <div class="card">
                            <img src="{{ asset('images/Rectangle_82.png') }}" class=""
                                alt="Hollywood Sign on The Hill" />
                            <div class="card-body">
                                <h5 class="card-title">Lorem ipsum dolor sit amet, adipiscing elit.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 tag">
                        <div class="card">
                            <img src="{{ asset('images/Rectangle_82.png') }}" class=""
                                alt="Hollywood Sign on The Hill" />
                            <div class="card-body">
                                <h5 class="card-title">Lorem ipsum dolor sit amet, adipiscing elit.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
