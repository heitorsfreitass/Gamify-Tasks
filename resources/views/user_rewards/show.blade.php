<!-- resources/views/user_rewards/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card p-4 text-white bg-dark">
        <div class="card-title">
            <h1 style="font-weight: 600; font-size:18px;">Recompensas do Usuário</h1>
        </div>
        <div class="card-body">
            @isset($userReward)
                <p><strong>Pontos:</strong> {{ $userReward->points }}</p>
                <p><strong>Medalha:</strong> {{ $userReward->medal ?? 'Nenhuma medalha' }}</p>
            @else
                <p>{{ $message }}</p>
            @endisset
        </div>
    </div>
</div>
@endsection
