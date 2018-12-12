@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('List threads') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach($threads as $thread)
                            <h1>{{ $thread->title }}</h1>
                            <div>
                                <a href="{{ route('edit-thread', ['id' => $thread->id]) }}" style="color: greenyellow">Edit</a> <a href="{{ route('delete-thread', ['id' => $thread->id]) }}" style="color: firebrick">Delete</a>
                            </div>
                            <div>{{ $thread->content }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection