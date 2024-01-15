<div class="comment" id="commentSection">
    @foreach ($blog->comments as $item)
        @if ($item->user->status == \App\Models\User::STATUS_ACTIVE)
            <div class="list" data-comment-id="{{ $item->id }}"
                data-update-route="{{ route('comments.update', $item->id) }}">
                <div class="avatar">
                    <img
                        src="{{ Storage::exists($item->user->image) ? Storage::url($item->user->image) : asset($item->user->image) }}">
                </div>
                <div class="name">
                    <h5>{{ $item->user->name }}</h5>
                    <div class="comment-content">
                        <p class="comment-text">
                            {{ $item->content }}
                        </p>
                        <textarea class="edit-input"></textarea>

                        @can('checkUpdateComment', $item)
                            <button class="edit-comment-btn"><i class="bi bi-pen"></i></button>
                        @endcan

                        @can('checkDeleteComment', $item)
                            <button class="delete-comment-btn"><i class="bi bi-trash"></i></button>
                        @endcan

                        <button class="submit-comment-btn"><i class="bi bi-send"></i></button>
                        <button class="cancel-edit-btn"><i class="bi bi-x-circle-fill"></i></button>
                    </div>
                    <p class="time">{{ $item->time_elapsed }}</p>
                </div>
            </div>
        @endif
    @endforeach

</div>
