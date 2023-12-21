<div class="comment" id="commentSection">
    @foreach ($blog->comments as $item)
        <div class="list">
            <div class="avatar">
                <img
                    src="{{ Storage::exists($item->user->image) ? Storage::url($item->user->image) : asset($item->user->image) }}">
            </div>
            <div class="name">
                <h5>{{ $item->user->name }}</h5>
                <div class="comment-content">
                    <p class="comment-text">{!! nl2br(e($item->content)) !!}</p>
                    <input type="text" class="edit-input">
                    <button class="edit-comment-btn">{{ __('blog.edit') }}</button>
                </div>
                <p class="time">{{ $item->time_elapsed }}</p>
            </div>
        </div>
    @endforeach
</div>
