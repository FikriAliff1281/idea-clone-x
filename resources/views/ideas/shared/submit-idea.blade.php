@auth
    <h4> {{ __('ideas.share_ideas') }} </h4> {{-- Use underscore for translation --}}
    <div class="row">
        <form action="{{ route('ideas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                @error('content')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> {{ __('ideas.share') }} </button>
            </div>
        </form>
    </div>
@endauth
@guest
    <h4> {{ trans('ideas.login_to_share') }}</h4> {{-- Call trans method for translation --}}
@endguest
