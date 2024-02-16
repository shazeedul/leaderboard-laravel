@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>{{ __('Leader Board Create') }}</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('leaderboard.create.post') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="start_time"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Start Date') }}</label>

                                <div class="col-md-6">
                                    <input id="start_time" type="datetime-local"
                                        class="form-control @error('start_time') is-invalid @enderror" name="start_time"
                                        value="{{ old('start_time') }}" required autocomplete="start_time" autofocus>

                                    @error('start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="end_time"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Close Date') }}</label>

                                <div class="col-md-6">
                                    <input id="end_time" type="datetime-local"
                                        class="form-control @error('end_time') is-invalid @enderror" name="end_time"
                                        value="{{ old('end_time') }}" required autocomplete="end_time" autofocus>

                                    @error('end_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="clubs"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Participant Clubs') }}</label>
                                <div class="col-md-6">
                                    <!-- Select all checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="select-all">
                                        <label class="form-check-label" for="select-all">
                                            Select All
                                        </label>
                                    </div>

                                    <!-- Individual checkboxes for clubs -->
                                    <div class="row">
                                        @foreach ($clubs as $club)
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="club{{ $club->id }}" name="clubs[]"
                                                        value="{{ $club->id }}">
                                                    <label class="form-check-label"
                                                        for="club{{ $club->id }}">{{ $club->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    @error('clubs')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#select-all').click(function() {
                $('input[name="clubs[]"]').prop('checked', $(this).prop('checked'));
            });
        });
    </script>
@endpush
