@extends('layouts.app')

@section('navbar')
    @include('component.navbar')
@endsection

@section('css')
    <style>
        
    </style>

@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-white p-5 rounded-lg shadow-md">
                <p class="text-center">Join us now and start your social adventure. Find new friends, create beautiful memories, and make every interaction count.</p>

                    <div class="card-header text-center text-2xl font-semibold text-blue-600">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" onsubmit="return formValidation();">
                            @csrf

                            <div class="row mb-4">
                                <label for="name" class="col-md-4 col-form-label text-md-end text-lg font-medium text-gray-700">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror border-gray-300 focus:ring-blue-500 focus:border-blue-500 p-3 rounded-lg" placeholder="Input your Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="gender" class="col-md-4 col-form-label text-md-end text-lg font-medium text-gray-700">{{ __('Gender') }}</label>
                                <div class="col-md-6">
                                    <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror border-gray-300 focus:ring-blue-500 focus:border-blue-500 p-3 rounded-lg" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <label for="field_of_work" class="col-md-4 col-form-label text-md-end text-lg font-medium text-gray-700">{{ __('Field of Work') }}</label>
                                <div class="col-md-6 d-flex align-items-end">
                                    <div id="field-of-work-container">
                                        <div class="input-group mb-2">
                                            <input type="text" name="works[]" class="form-control p-3 rounded-lg border-gray-300" placeholder="Field of Work Min(3)" required>
                                            <button type="button" class="btn btn-danger text-white rounded-lg py-2 px-4 ml-2">Remove</button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary bg-teal-600 text-white rounded-lg py-2 px-4" id="add-field-of-work">
                                        <i class="fas fa-plus"></i>
                                    </button>

                                    @error('works')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <label for="linkedin" class="col-md-4 col-form-label text-md-end text-lg font-medium text-gray-700">{{ __('LinkedIn') }}</label>
                                <div class="col-md-6">
                                    <input id="linkedin" type="text" class="form-control @error('linkedin') is-invalid @enderror border-gray-300 focus:ring-blue-500 focus:border-blue-500 p-3 rounded-lg" placeholder="https://www.linkedin.com/in/<username>" name="linkedin" required autocomplete="linkedin" autofocus>

                                    @error('linkedin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <label for="mobile_number" class="col-md-4 col-form-label text-md-end text-lg font-medium text-gray-700">{{ __('Mobile Number') }}</label>
                                <div class="col-md-6">
                                    <input id="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror border-gray-300 focus:ring-blue-500 focus:border-blue-500 p-3 rounded-lg" placeholder="+62 895-4013-60072" name="mobile_number" required autocomplete="mobile_number" autofocus>

                                    @error('mobile_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="email" class="col-md-4 col-form-label text-md-end text-lg font-medium text-gray-700">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-gray-300 focus:ring-blue-500 focus:border-blue-500 p-3 rounded-lg" placeholder="Input your Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="password" class="col-md-4 col-form-label text-md-end text-lg font-medium text-gray-700">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-gray-300 focus:ring-blue-500 focus:border-blue-500 p-3 rounded-lg" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="confirm_password" class="col-md-4 col-form-label text-md-end text-lg font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="confirm_password" type="password" class="form-control border-gray-300 focus:ring-blue-500 focus:border-blue-500 p-3 rounded-lg" name="confirm_password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="registration_price" class="col-md-4 col-form-label text-md-end text-lg font-medium text-gray-700">{{ __('Registration Price') }}</label>
                                <div class="col-md-6">
                                    @php
                                        $price = random_int(100000,125000);
                                    @endphp
                                    <h6 class="mt-2 text-xl text-blue-600 font-bold">{{ 'Rp '. number_format($price, 0, ',', '.' )}}</h6>
                                    <input type="hidden" name="registration_price" value="{{ $price }}" hidden>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-success">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('footer')
   @include('component.footer')
@endsection

@section('script')
    <script>
        document.getElementById('add-field-of-work').addEventListener('click', function () {
            const container = document.getElementById('field-of-work-container');

            const inputGroup = document.createElement('div');
            inputGroup.className = 'input-group mb-2';

            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'works[]'; 
            input.className = 'form-control p-3 rounded-lg border-gray-300';
            input.placeholder = 'Enter a field of work';
            input.required = true;

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className = 'btn btn-danger text-white rounded-lg py-2 px-4 ml-2';
            removeButton.textContent = 'Remove';

            removeButton.addEventListener('click', function () {
                container.removeChild(inputGroup);
            });

            inputGroup.appendChild(input);
            inputGroup.appendChild(removeButton);

            container.appendChild(inputGroup);
        });
    </script>
@endsection
