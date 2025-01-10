@extends('layouts.app')

@section('title','Visibility')

@section('navbar')
    @include('component.navbar')
@endsection

@section('content')
<div class="container mt-5">
    <h4 class="display-4 text-center mb-4">Change your Visibility now!</h4>

    @if(Auth::user()->is_active == 1)
        <div class="card shadow-sm border-primary mb-4">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Activate Visibility</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('change-visibility.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="input" class="form-label">Purchase Payment</label>
                        <input type="number" class="form-control" id="input" placeholder="100 Coins" readonly>
                        <div id="emailHelp" class="form-text text-muted">Please consider all the terms and conditions. No Refund!</div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">
                        <i class="bi bi-check-circle"></i> Purchase Visibility
                    </button>
                </form>
            </div>
        </div>
    @else
        <div class="card shadow-sm border-danger mb-4">
            <div class="card-header bg-danger text-white">
                <h3 class="card-title">Deactivate Visibility</h3>
            </div>
            <div class="card-body">
                <p class="lead text-center mb-4">Click the button below to change visibility!</p>
                <form method="POST" action="{{ route('change-visibility2.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="input" class="form-label">Purchase Payment</label>
                        <input type="number" class="form-control" id="input" placeholder="5 Coins" readonly>
                        <div id="emailHelp" class="form-text text-muted">Please consider all the terms and conditions. No Refund!</div>
                    </div>
                    <button type="submit" class="btn btn-outline-danger btn-lg w-100 mt-4">
                        <i class="bi bi-x-circle"></i> Deactivate Visibility
                    </button>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection

@section('footer')
    @include('component.footer')
@endsection


@section('script')
        @if(session('error'))
            alert("{{ session('error') }}");
        @endif

        @if(session('success'))
            alert("{{ session('success') }}");
        @endif
@endsection