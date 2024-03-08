<div>
    <form action="{{ route('ideas.comments.store', $idea->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
            @error('content')
                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>

        <hr>
        @forelse ($idea->comments as $comment)
            <div class="d-flex align-items-start">
                <img style="width:50px" class="me-3 avatar-sm rounded-circle" src="{{ $comment->user->getImageUrl() }}"
                    alt="{{ $comment->user->name }}">
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <h6 class="">
                            <a href="{{ route('users.show', $comment->user->id) }}">
                                {{ $comment->user->name }}
                            </a>
                        </h6>
                        <small class="fs-6 fw-light text-muted"> {{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="fs-6 mt-3 fw-light">
                        {{ $comment->content }}
                    </p>
                </div>
            </div>
        @empty
            <p class="text-center mt-4">
                No Comments Found.
            </p>
        @endforelse
    </form>
</div>
