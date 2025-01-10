@extends('layouts.app')

@section('title','Friend')

@section('navbar')
    @include('component.navbar')
@endsection

@section('content')
<div class="container">
    <div class="col-12 text-center mb-4">
        <h3 class="display-5 fw-bold text-dark">Discover Your Friend List at <span class="text-primary">ConnectFriend!</span></h3>
        <hr class="my-4">
    </div>

    <!-- Active Friends -->
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="fw-semibold text-secondary">Active Friend List</h4>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($activeFriends as $af)
            @php
                $friendId = ($af->user_id == Auth::user()->id) ? $af->friend_id : $af->user_id;
            @endphp
        
            @if($af->is_active == 1)
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-3">
                        <img src="{{ asset($af->profile_picture) }}" class="card-img-top" alt="..." style="height: 180px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $af->name }}</h5>
                            <p class="card-text"><strong>Profession</strong>: {{ $af->profession }}</p>
                            <p class="card-text"><strong>Gender</strong>: {{ $af->gender }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="https://www.linkedin.com/in/adior-gandawidjaja-8212ab293" class="btn btn-link text-primary">LinkedIn</a>
                                <form method="POST" action="{{ route('delete-friend.submit', $friendId) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center" role="alert">
                    No active friends found.
                </div>
            </div>
        @endforelse
    </div>

    <hr class="my-4">

    <!-- Pending Friends -->
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="fw-semibold text-secondary">Pending Friend Requests</h4>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($pendingFriends as $pf)
            @if($pf->is_active == 0)
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-3">
                        <img src="{{ asset($pf->profile_picture) }}" class="card-img-top" alt="..." style="height: 180px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $pf->name }}</h5>
                            <p class="card-text"><strong>Profession</strong>: {{ $pf->profession }}</p>
                            <p class="card-text"><strong>Gender</strong>: {{ $pf->gender }}</p>
                            <form method="POST" action="{{ route('delete-request.submit', $pf->friend_id) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100 mt-3">Delete Request</button>
                            </form> 
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center" role="alert">
                    No pending requests found.
                </div>
            </div>
        @endforelse
    </div>

    <hr class="my-4">

    <!-- Friend Requests from Others -->
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="fw-semibold text-secondary">Requesting Friend Requests</h4>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($friendRequestFromOtherUser as $fr)
            @if($fr->is_active == 0)
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-3">
                        <img src="{{ asset($fr->profile_picture) }}" class="card-img-top" alt="..." style="height: 180px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $fr->name }}</h5>
                            <p class="card-text"><strong>Profession</strong>: {{ $fr->profession }}</p>
                            <p class="card-text"><strong>Gender</strong>: {{ $fr->gender }}</p>
                            <div class="d-flex justify-content-between">
                                <form method="POST" action="{{ route('accept-friend-request.submit', $fr->user_id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success w-100">Accept Request</button>
                                </form>
                                <form method="POST" action="{{ route('delete-friend-request.submit', $fr->user_id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger w-100">Reject Request</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center" role="alert">
                    No requests found.
                </div>
            </div>
        @endforelse
    </div>

</div>

@endsection

@section('footer')
    @include('component.footer')
@endsection
