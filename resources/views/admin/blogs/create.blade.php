@include('layouts.header')
<section class="content">
    <div>
        <ul class="breadcrumb">
            <li><a href="{{ route('admins.index') }}">{{ __('title.admin') }}</a></li>
            <li><a class="second-li" href="{{ route('admins.blogs.index') }}">{{ __('title.blog') }}</a></li>
            <li><a>{{ __('title.create_blog') }}</a></li>
        </ul>
    </div>
    <div class="create">
        <h1>{{ __('title.create_blog') }}</h1>
        <form action="{{ route('admins.blogs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-input category">
                <label for="">{{ __('blog.category') }} <span>*</span></label>
                <select name="category_id" id="">
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-input ">
                <label for="">{{ __('blog.title') }} <span>*</span></label>
                <input class="title place" type="text" name="title" placeholder="{{ __('blog.title') }}"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-input upload">
                <label class="first" for="img">{{ __('blog.upload_image') }}</label>
                <label class="second" for="img">{{ __('blog.upload_image') }}</label>
                <input type="file" hidden name="img" id="img">
                <img src="" alt="" id="preview">
                @error('img')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-input description">
                <label for="">{{ __('blog.description') }} <span>*</span></label>
                <textarea class="place" name="content" id="" cols="30" rows="10"
                    placeholder="{{ __('blog.description') }}">{{ old('content') }}</textarea>
                @error('content')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-input">
                <div class="status">
                    <input type="radio" name="status" id="status-1"
                        value="{{ \App\Models\Blog::STATUS_INACTIVE }}">
                    <label for="status-1">INACTIVE</label>
                    <input type="radio" name="status" id="status-2" value="{{ \App\Models\Blog::STATUS_ACTIVE }}">
                    <label for="status-2">ACTIVE</label>
                </div>
                @error('status')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-input submit">
                <button>{{ __('title.create_blog') }}</button>
            </div>
        </form>
    </div>
</section>
<script src="{{ asset('resources/js/app.js') }}"></script>
@include('layouts.footer')
