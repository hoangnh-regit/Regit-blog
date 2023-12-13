@include('layouts.header')
<section class="content">
    <div>
        <ul class="breadcrump">
            <li><a href="">{{ __('title.home') }}</a></li>
            <li><a href="">{{ __('title.detail_blog') }}</a></li>
        </ul>
    </div>
</section>
<div class="detail">
    <div class="title">
        <h1>{{ $blog->title }}</h1>
    </div>
    <div class="author-function">
        <div class="author">
            <div class="avatar">
                <img src="{{ asset('/images/team-1.jpg') }}" alt="">
            </div>
            <div class="name">
                <h5>{{ $blog->user->name }}</h5>
                <p>{{ $blog->updated_at->format('d/m/Y') }}</p>
            </div>
        </div>
        <div class="function">
            
            @can('update', $blog)
                <!-- The Current User Can Update The Post -->
                <div class="approved">
                    <a href="{{ route('blogs.edit', $blog) }}"> Edit</a>
                </div>
            @endcan
            <div class="delete">
                <form action="">
                    <button>{{ __('blog.delete_blog') }}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="image">
        <img src="{{ Storage::url($blog->img) }}" alt="">
    </div>
    <div class="description">
        <p>{{ $blog->content }}</p>
    </div>
    <div class="related">
        <h3>{{ __('blog.related') }}</h3>
    </div>
    <div class="border-hr">
        <hr>
    </div>
    <div class="blog">
        <div class="row row-cols-1 row-cols-md-4">
            @foreach ($relatedBlogs as $item)
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('images/Rectangle_82.png') }}" class="" alt="Image of blog" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <h3>{{ __('blog.comment') }}</h3>
    <div class="border-hr">
        <hr>
    </div>
</div>
<script src="{{ asset('resources/js/app.js') }}"></script>
@include('layouts.footer')
