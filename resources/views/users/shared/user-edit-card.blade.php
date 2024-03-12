<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}"
                        alt="{{ $user->name }}">
                    <div>
                        <input value="{{ $user->name }}" type="text" name="name" class="form-control">
                        @error('name')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div>
                    @auth
                        @if (Auth::id() === $user->id)
                            <a href="{{ route('users.show', $user->id) }}">{{ __('ideas.cancel') }}</a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="mt-4">
                <label for="image">{{ __('ideas.profile_pic') }}</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> {{ __('ideas.bio') }} : </h5>
                <div class="mb-3">
                    <textarea class="form-control" id="bio" name="bio" rows="3">{{ $user->bio }}</textarea>
                    @error('bio')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <button class="btn btn-dark btn-sm mb-3">
                    {{ __('ideas.update') }}
                </button>
                @include('users.shared.user-stats')
            </div>
        </form>
    </div>
</div>
