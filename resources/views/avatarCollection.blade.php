@extends('layouts.app')


@section('title','Your Avatar Collections')

@section('navbar')
    @include('component.navbar')
@endsection

@section('content')
        <div class="d-flex flex-wrap" style="gap: 20px">
            @forelse ($avatarsOwned as $ao)
                <div class="card mt-2" style="width: 14rem; height: 21rem;">
                    <img src="{{ asset($ao->avatar->urlProfile) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 150px;">

                    <div class="card-body d-flex flex-column" style="flex-grow: 1;">
                        <h6 class="fw-bold">{{$ao->avatar->name}}</h6>
                        <p>You Bought the Avatar at: <span class="fw-bold">{{$ao->avatar->created_at}}</span></p>
                    </div>
                    <form method="POST" action="{{ route('equip-avatar.submit', $ao->avatar->id) }}" onsubmit="return confirmEquip();">
                        @csrf
                        <button type="submit" class="btn btn-primary">Equip Avatar</button>
                    </form>
                </div>
            @empty
                
            @endforelse

        </div>
@endsection


''