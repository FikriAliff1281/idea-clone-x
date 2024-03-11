<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-3 avatar-sm rounded-circle" src="{{ $idea->user->getImageUrl() }}"
                    alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            @if (!$editing)
                <div class="d-flex">
                    <a class="mt-1" href="{{ route('ideas.show', $idea->id) }}">View</a>
                    @auth()
                        @can('update', $idea)
                            <a class="mx-2 mt-1" href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                            <form method="POST" action="{{ route('ideas.destroy', $idea->id) }}">
                                @csrf
                                @method('delete')
                                <button class="ms-1 btn btn-danger btn-sm">X</button>
                            </form>
                        @endcan
                    @endauth
                </div>
            @else
                <div class="d-flex">
                    @auth()
                        @can('update', $idea)
                            <form method="POST" action="{{ route('ideas.destroy', $idea->id) }}">
                                @csrf
                                @method('delete')
                                <button class="ms-1 btn btn-danger btn-sm">X</button>
                            </form>
                        @endcan
                    @endauth
                </div>
            @endif

        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            @include('ideas.shared.update-idea')
        @else
            <p class="fs-4 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('ideas.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>
        @include('ideas.shared.comments-box')
    </div>
</div>
