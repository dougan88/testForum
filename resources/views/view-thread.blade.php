@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('View thread') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h5 style="color: orange;">{{ $thread->title }}</h5>
                        <div>
                            {{ $thread->content }}
                        </div>

                            @foreach($thread->threadResponses as $response)
                                <div><span style="color: orange;">{{$response->user->name}}:</span> {{ $response->content }}</div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection