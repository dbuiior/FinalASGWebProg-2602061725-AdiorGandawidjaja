@extends('layouts.app')

@section('title', 'Shop')

@section('navbar')
    @include('component.navbar')
@endsection

@section('content')
<div class="container-fluid bg-light py-5">
    <div class="row align-items-center justify-content-between">
        <div class="col-lg-3 col-md-4 col-sm-12 mb-4 text-center">
            <img src="{{asset('assets/defaultAvatar.jpg')}}" class="img-fluid rounded-circle border border-primary" alt="User Avatar">
        </div>

        <div class="col-lg-7 col-md-7 col-sm-12 mb-4">
            <h3 class="fw-bold text-dark">Welcome to <span class="text-primary">ConnectFriends</span> Shop, {{ Auth::user()->name }}!</h3>
            <p class="lead text-muted">Browse exclusive avatars to personalize your profile and stand out in the community. Your journey to a unique avatar starts here.</p>
        </div>
    </div>
    <hr class="my-4">

    <section>
        <h4 class="display-6 text-center fw-semibold text-primary">Explore Available Avatars</h4>

        <div class="d-flex flex-wrap justify-content-center gap-4 mt-4">
            @forelse ($avatars as $avatar)
                <div class="card shadow-sm rounded-3" style="width: 14rem; height: 22rem;">
                    <img src="{{ asset($avatar->urlProfile) }}" class="card-img-top rounded-3" alt="Avatar" style="object-fit: cover; height: 150px;">
                    <div class="card-body text-center">
                        <h5 class="fw-bold text-info">{{ $avatar->name }}</h5>
                        <p class="text-muted">{{ $avatar->price }} Coins</p>
                        <form method="POST" action="{{ route('buy-avatar.submit', $avatar->id) }}" onsubmit="return confirmPurchase();">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary w-100">Buy Avatar</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center text-danger">No avatars available for purchase at the moment.</p>
            @endforelse
        </div>
    </section>

    <hr class="my-4">

    <section>
        <h4 class="display-6 text-center fw-semibold text-primary">Your Avatar Collection</h4>

        <div class="d-flex flex-wrap justify-content-center gap-4 mt-4">
            @forelse ($avatarsOwned as $ao)
                <div class="card shadow-sm rounded-3" style="width: 14rem; height: 22rem;">
                    <img src="{{ asset($ao->avatar->urlProfile) }}" class="card-img-top rounded-3" alt="Avatar" style="object-fit: cover; height: 150px;">
                    <div class="card-body text-center">
                        <h5 class="fw-bold text-info m-3">{{ $ao->avatar->name }}</h5>
                        <form method="POST" action="{{ route('equip-avatar.submit', $ao->avatar->id) }}" onsubmit="return confirmEquip();">
                            @csrf
                            <button type="submit" class="btn btn-outline-success w-100">Equip Avatar</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center text-warning">You have not purchased any avatars yet. Start shopping to unlock some cool options!</p>
            @endforelse
        </div>
    </section>
</div>
@endsection

@section('footer')
    @include('component.footer')
@endsection

@section('script')
<script>
    function confirmPurchase() {
        return confirm('Are you sure you want to purchase this avatar?');
    }

    function confirmEquip() {
        return confirm('Are you sure you want to equip this avatar?');
    }

    @if(session('error'))
        alert("{{ session('error') }}");
    @endif

    @if(session('success'))
        alert("{{ session('success') }}");
    @endif
</script>
@endsection
