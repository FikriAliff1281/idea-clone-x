@extends('layout.app')

@section('content')

    <body>
        <div class="row">
            <div class="col-3">
                @include('shared.left-side-bar')

            </div>
            <div class="col-6">
                @include('shared.success-message')
                <hr>
                <div class="mt-3">
                    @include('users.shared.user-edit-card')
                </div>
                <hr>
                @forelse ($ideas as $idea)
                    <div class="mt-3">
                        @include('ideas.shared.idea-card')
                    </div>
                @empty
                    <p class="text-center mt-4">
                        No Results Found.
                    </p>
                @endforelse
            </div>
            <div class="col-3">
                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>
        </div>
    </body>
@endsection