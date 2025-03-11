<!-- resources/views/user_rewards/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card p-4 text-white" style="background: rgba(0, 0, 0, 0.8); border: 2px solid #00ff00; border-radius: 15px;">
        <div class="card-title">
            <h1 style="font-weight: 600; font-size: 24px; font-family: 'Press Start 2P', cursive; color: #00ff00;">Recompensas do Usuário</h1>
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