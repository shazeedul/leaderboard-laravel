@extends('layouts.app')
@push('styles')
    <style>
        input[type="radio"] {
            -webkit-appearance: none;
        }

        label .badge {
            border: 6px solid #3787ff;
            margin: auto;
            border-radius: 10px;
            position: relative;
            transition: 0.5s;
        }

        input[name="badge_id"]:checked+label {
            background-color: #3787ff;
            box-shadow: 0 15px 45px #3787ff;
            font-size: 12px;
        }

        .iti {
            display: block !important;
        }

        .password,
        .password__confirmation {
            display: flex;
        }

        .password__input,
        .password__confirmation__input {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            text-align: center;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .password__input:last-child,
        .password__confirmation__input:last-child {
            margin-right: 0;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@19.2.19/build/css/intlTelInput.css">
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Individual Account') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register.post') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="badge_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Choose Your Preferred Membership') }}</label>

                                <div class="col-md-6">
                                    @foreach ($badges as $badge)
                                        <input type="radio" name="badge_id" id="{{ $badge->name }}"
                                            value="{{ $badge->id }}" {{ $loop->first ? 'checked' : '' }}>
                                        <label for="{{ $badge->name }}" class="badge">
                                            <i class="fa-solid fa-certificate"></i>
                                            <span class="text-black">{{ $badge->name }} -
                                                {{ $badge->currency }}{{ $badge->price }}</span>
                                        </label>
                                    @endforeach

                                    @error('badge_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

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
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="tel"
                                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        value="{{ old('phone_number') }}" required autocomplete="phone-number">

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @error('full_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="club_status"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Club Status') }}</label>

                                <div class="col-md-6">
                                    <select id="club_status" class="form-select @error('club_status') is-invalid @enderror"
                                        name="club_status" required>
                                        <option value="">Select Your Club Status</option>
                                        <option value="Coach">Coach</option>
                                        <option value="Player">Player</option>
                                        <option value="Supporter">Fan/Supporter</option>
                                    </select>

                                    @error('club_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gender"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                                <div class="col-md-6">
                                    <select id="gender" class="form-select @error('gender') is-invalid @enderror"
                                        name="gender" required>
                                        <option value="">Select Your Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="affiliation_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Affiliation') }}</label>

                                <div class="col-md-6">
                                    <select id="affiliation_id"
                                        class="form-select @error('affiliation_id') is-invalid @enderror"
                                        name="affiliation_id" required>
                                        <option value="">Select Your Football Association</option>
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
                                <label for="date_of_birth"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="date_of_birth" type="date"
                                        class="form-control @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth" value="{{ old('date_of_birth') }}" required
                                        autocomplete="date-of-birth">

                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="country_of_origin"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Country of Origin') }}</label>

                                <div class="col-md-6">
                                    <select id="country_of_origin"
                                        class="form-select @error('country_of_origin') is-invalid @enderror"
                                        name="country_of_origin" required>
                                        <option value=""></option>
                                    </select>

                                    @error('country_of_origin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nationality"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nationality') }}</label>

                                <div class="col-md-6">
                                    <input id="nationality" type="text"
                                        class="form-control @error('nationality') is-invalid @enderror" name="nationality"
                                        value="{{ old('nationality') }}" required autocomplete="nationality" autofocus>

                                    @error('nationality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="passport_number"
                                    class="col-md-4 col-form-label text-md-end">{{ __('ID/Passport number') }}</label>

                                <div class="col-md-6">
                                    <input id="passport_number" type="text"
                                        class="form-control @error('passport_number') is-invalid @enderror"
                                        name="passport_number" value="{{ old('passport_number') }}" required
                                        autocomplete="passport_number" autofocus>

                                    @error('passport_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="passport_date_of_issue"
                                    class="col-md-4 col-form-label text-md-end">{{ __('ID/passport date of issue') }}</label>

                                <div class="col-md-6">
                                    <input id="passport_date_of_issue" type="date"
                                        class="form-control @error('passport_date_of_issue') is-invalid @enderror"
                                        name="passport_date_of_issue" value="{{ old('passport_date_of_issue') }}"
                                        required autocomplete="passport_date_of_issue">

                                    @error('passport_date_of_issue')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Passcode') }}</label>

                                <div class="col-md-6">
                                    {{-- <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password"> --}}
                                    <div class="password">
                                        <input type="text" class="password__input" maxlength="1" />
                                        <input type="text" class="password__input" maxlength="1" />
                                        <input type="text" class="password__input" maxlength="1" />
                                        <input type="text" class="password__input" maxlength="1" />
                                        <input type="text" class="password__input" maxlength="1" />
                                        <input type="hidden" id="password" name="password">
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Passcode') }}</label>

                                <div class="col-md-6">
                                    {{-- <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"> --}}
                                    <div class="password__confirmation">
                                        <input type="text" class="password__confirmation__input" maxlength="1" />
                                        <input type="text" class="password__confirmation__input" maxlength="1" />
                                        <input type="text" class="password__confirmation__input" maxlength="1" />
                                        <input type="text" class="password__confirmation__input" maxlength="1" />
                                        <input type="text" class="password__confirmation__input" maxlength="1" />
                                        <input type="hidden" id="password_confirmation" name="password_confirmation">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>

                                    @if (Route::has('club.register'))
                                        <a class="btn btn-link" href="{{ route('club.register') }}">
                                            {{ __('Register as Club/Academy/Association?') }}
                                        </a>
                                    @endif
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
            $('#password').attr('maxlength', 5);
            $('#password-confirm').attr('maxlength', 5);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@19.2.19/build/js/intlTelInput.min.js"></script>
    <script>
        const input = document.querySelector("#phone_number");
        window.intlTelInput(input, {
            initialCountry: "us",
            hiddenInput: () => "full_number",
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@19.2.19/build/js/utils.js",
        });
    </script>
    <script>
        // select2 search country select by route search.country
        $(document).ready(function() {
            $('#country_of_origin').select2({
                placeholder: 'Select Your Country of Origin',
                allowClear: true,
                minimumInputLength: 3,
                ajax: {
                    url: '{{ route('search.country') }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                templateResult: function(data) {
                    if (!data.id) {
                        // If no id is provided, we assume it's a placeholder option
                        return data.text;
                    }
                    // Format the data for display with flag and name
                    var $result = $('<span><img src="' + (data.flag ? data.flag :
                            'https://ui-avatars.com/api/?name=' + data.name +
                            '&color=7F9CF5&background=EBF4FF') +
                        '" style="width: 20px; height: 20px; margin-right: 5px;">' + data.name +
                        '</span>');
                    return $result;
                },
                escapeMarkup: function(markup) {
                    return markup;
                },
                templateSelection: function(data) {
                    if (!data.id) {
                        return data.text;
                    }
                    return data.name;
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const passwordInputs = document.querySelectorAll('.password__input');
            const passwordConfirmationInputs = document.querySelectorAll('.password__confirmation__input');
            const fullPasswordInput = document.getElementById('password');
            const fullPasswordConfirmationInput = document.getElementById('password_confirmation');

            function focusNextInput(inputs, currentIndex) {
                const nextIndex = currentIndex + 1;
                if (nextIndex < inputs.length) {
                    inputs[nextIndex].focus();
                }
            }

            function focusPreviousInput(inputs, currentIndex) {
                const prevIndex = currentIndex - 1;
                if (prevIndex >= 0) {
                    inputs[prevIndex].focus();
                }
            }

            function updateFullPassword(inputs, fullPasswordInput) {
                let fullPassword = '';
                inputs.forEach((input) => {
                    fullPassword += input.value;
                });
                fullPasswordInput.value = fullPassword;
            }

            passwordInputs.forEach((input, index) => {
                input.addEventListener('input', () => {
                    if (input.value.length >= input.maxLength) {
                        focusNextInput(passwordInputs, index);
                    }
                    updateFullPassword(passwordInputs, fullPasswordInput);
                });

                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && input.value.length === 0) {
                        focusPreviousInput(passwordInputs, index);
                    }
                });
            });

            passwordConfirmationInputs.forEach((input, index) => {
                input.addEventListener('input', () => {
                    if (input.value.length >= input.maxLength) {
                        focusNextInput(passwordConfirmationInputs, index);
                    }
                    updateFullPassword(passwordConfirmationInputs, fullPasswordConfirmationInput);
                });

                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && input.value.length === 0) {
                        focusPreviousInput(passwordConfirmationInputs, index);
                    }
                });
            });
        });
    </script>
@endpush
