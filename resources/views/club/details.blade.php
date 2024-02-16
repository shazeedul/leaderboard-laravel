@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header text-danger fs-5">
                        {{ __('Please Fill The Club/Team Details For Your Membership') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('club.details.post') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Club  Name') }} :
                                </label>
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
                                <label for="affiliation_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Football Association Affiliation') }}
                                    :
                                </label>
                                <div class="col-md-6">
                                    <select id="affiliation_id"
                                        class="form-control @error('affiliation_id') is-invalid @enderror"
                                        name="affiliation_id" required>
                                        <option value="">Select Football Association</option>
                                        @foreach ($affiliations as $affiliation)
                                            <option value="{{ $affiliation->id }}">{{ $affiliation->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('affiliation_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="type"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Club/Type Registration Type') }} :
                                </label>
                                <div class="col-md-6">
                                    <select id="type" class="form-control @error('type') is-invalid @enderror"
                                        name="type" required>
                                        <option value="">Select Registration Type</option>
                                        <option value="Non-profit Organization">Non-profit Organization</option>
                                        <option value="Non-profit Company">Non-profit Company</option>
                                        <option value="Private Company">Private Company</option>
                                    </select>

                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="trading_as" class="col-md-4 col-form-label text-md-end">{{ __('Trading As') }}
                                    :
                                </label>
                                <div class="col-md-6">
                                    <input id="trading_as" type="text"
                                        class="form-control @error('trading_as') is-invalid @enderror" name="trading_as"
                                        value="{{ old('trading_as') }}" required autocomplete="trading_as" autofocus>

                                    @error('trading_as')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="registration_number"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Club/Team Registration number') }} :
                                </label>
                                <div class="col-md-6">
                                    <input id="registration_number" type="text"
                                        class="form-control @error('registration_number') is-invalid @enderror"
                                        name="registration_number" value="{{ old('registration_number') }}" required
                                        autocomplete="registration_number" autofocus>

                                    @error('registration_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Club/Team Physical Address') }} :
                                </label>
                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="number_of_players"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Number Of Registered Players') }}:
                                </label>
                                <div class="col-md-6">
                                    <input id="number_of_players" type="number" min="1"
                                        class="form-control @error('number_of_players') is-invalid @enderror"
                                        name="number_of_players" value="{{ old('number_of_players') }}" required
                                        autocomplete="number_of_players" autofocus>

                                    @error('number_of_players')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="logo"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Club/Team Logo') }} :
                                </label>
                                <div class="col-md-6">
                                    <input id="logo" type="file"
                                        class="form-control @error('logo') is-invalid @enderror" name="logo"
                                        value="{{ old('logo') }}" autocomplete="logo" autofocus>

                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
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
    </div>
@endsection
