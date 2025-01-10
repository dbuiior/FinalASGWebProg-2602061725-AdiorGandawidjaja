@extends('layouts.app')

@section('navbar')
    @include('component.navbar')
@endsection

@section('title','Top Up Coins')

@section('css')
    <style>
        .hover-effect:hover {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .coin-image{
            max-width: 100px;
        }
    </style>
@endsection

@section('content')
<div class="container mt-5">
    <h3 class="mt-5">Choose Your Coins Package:</h3>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{asset('assets/coin.jpg')}}" alt="" class="coin-image">
                    <h5 class="card-title">1000 Coins</h5>
                    
                    <button class="btn btn-outline-primary select-coin" data-amount="1000">Select</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{asset('assets/bunchOfCoins.jpg')}}" alt="" class="coin-image">
                    <h5 class="card-title">5000 Coins</h5>
                    <button class="btn btn-outline-primary select-coin" data-amount="5000">Select</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{asset('assets/bunchOfCoins.jpg')}}" alt="" class="coin-image">
                    <h5 class="card-title">10000 Coins</h5>
                    <button class="btn btn-outline-primary select-coin" data-amount="10000">Select</button>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('topUpCoins') }}" class="mt-5" id="topupForm">
        @csrf
        <div class="mb-3">
            <label for="coins" class="form-label">Coins Value</label>
            <input type="number" class="form-control" id="coins" name="coins" value="1000">
        </div>
        <button type="submit" class="btn btn-primary">Purchase</button>
    </form>
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

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.querySelectorAll('.select-coin').forEach(button => {
            button.addEventListener('click', function () {
                const coinAmount = this.getAttribute('data-amount');
                document.getElementById('coins').value = coinAmount;
                });
            });

            document.getElementById('topupForm').addEventListener('submit', function(event) {
            event.preventDefault();  

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, purchase it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('topupForm').submit();
                }
            });
        });
        </script>
@endsection
