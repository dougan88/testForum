@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('All threads') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach($threads as $thread)
                            <h1>{{ $thread->title }}</h1>
                            <div>
                                <a href="{{ route('reply-thread', ['id' => $thread->id]) }}" style="color: cornflowerblue">Reply</a>
                                <a href="{{ route('view-thread', ['id' => $thread->id]) }}" style="color: purple">View</a>
                            </div>
                            <div>{{ $thread->content }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection