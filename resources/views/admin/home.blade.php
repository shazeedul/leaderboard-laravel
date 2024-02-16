@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in as admin!') }}

                        <div class="row">
                            <div class="col p-2 m-2 border border-dark">
                                <h3>Leader board Count</h3>
                                <p>{{ $leaderBoardCount }}</p>
                            </div>
                            <div class="col p-2 m-2 border border-dark">
                                <h3>Club Count</h3>
                                <p>{{ $clubCount }}</p>
                            </div>
                            <div class="col p-2 m-2 border border-dark">
                                <h3>Member Count</h3>
                                <p>{{ $memberCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
