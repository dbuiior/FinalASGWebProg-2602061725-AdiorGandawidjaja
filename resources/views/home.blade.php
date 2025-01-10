@extends('layouts.app')

@section('title', 'Home Page')

@section('navbar')
    @include('component.navbar')
@endsection

@section('content')
    <div class="container">
        <!-- User Profile Section -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-2 col-md-3 col-sm-4 col-4 mt-3">
                <img src="{{ asset(Auth::user()->profile_picture) }}" class="img-thumbnail rounded-circle" alt="..." style="height: 80px; width: 80px;">
            </div>

            <div class="col-lg-10 col-md-9 col-sm-8 col-8">
                <h3 class="mt-3">Welcome to Connect Friend, {{Auth::user()->name}}!</h3>
            </div>
        </div>

        <!-- Search Filters -->
        <form method="GET" action="{{ route('search-users') }}">
            <div class="row justify-content-start mb-4">
                <!-- Gender Dropdown -->
                <div class="col-md-3 mb-3">
                    <label class="form-label" for="gender">Gender</label>
                    <select class="form-select" id="gender" name="gender">
                        <option value="1" selected>All</option>
                        <option value="2">Male</option>
                        <option value="3">Female</option>
                    </select>
                </div>

                <!-- Profession Input -->
                <div class="col-md-4 mb-3">
                    <label class="form-label" for="profession">Job Title</label>
                    <input type="text" class="form-control" id="profession" name="profession" placeholder="Data Science, Doctor">
                </div>

                <!-- Search Button -->
                <div class="col-md-2 mb-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-outline-primary w-100">Search</button>
                </div>
            </div>
        </form>

        <!-- Displaying Users -->
        <div class="row d-flex flex-wrap justify-content-center gap-3">
            @forelse ($users as $user)
                @if(Auth::user()->id != $user->id && $user->is_active == 1)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset($user->profile_picture) }}" class="card-img-top" alt="User Profile" style="object-fit: cover; height: 150px;">
        
                            <div class="card-body d-flex flex-column">
                                <h6 class="fw-bold">{{$user->name}}</h6>
                                <p class="mt-0 mb-0"><span class="fw-bold">Profession</span>: {{$user->profession}}</p>
                                <p class="mt-1 mb-1"><span class="fw-bold">Gender</span>: {{$user->gender}}</p>
                                <p><span class="fw-bold">Related Works</span>: 
                                    @foreach ($user->works as $work)
                                        {{$work->name}}@if (!$loop->last), @endif
                                    @endforeach
                                </p>
                                
                                <form method="POST" action="{{route('send-friend-request.submit', $user->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success mt-2">Add Friend</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <p class="text-center">No users found.</p>
            @endforelse
        </div>
        
        <hr>
    </div>
@endsection

@section('footer')
    @include('component.footer')
@endsection

@section('script')
    <script>
        @if(session('error'))
            alert("{{ session('error') }}");
        @endif

        @if(session('success'))
            alert("{{ session('success') }}");
        @endif
    </script>
@endsection
