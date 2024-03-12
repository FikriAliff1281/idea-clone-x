<form action="{{ route('ideas.update', $idea->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
        <textarea class="form-control" id="content" name="content" rows="3">{{ $idea->content }}</textarea>
        @error('content')
            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
        @enderror
    </div>
    <div class="">
        <button type="submit" class="btn btn-dark mb-2 btn-sm"> {{ __('ideas.update') }} </button>
        <a href="{{ route('ideas.show', $idea->id) }}" class="btn btn-danger mb-2 btn-sm"> {{ __('ideas.cancel') }} </a>
    </div>
</form>