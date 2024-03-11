@extends('layout.app')

@if (!$editing)
    @section('title', 'View Idea')
@else
    @section('title', 'Edit Idea')
@endif

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
                    @include('ideas.shared.idea-card')
                </div>
            </div>
            <div class="col-3">
                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>
        </div>
    </body>
@endsection
