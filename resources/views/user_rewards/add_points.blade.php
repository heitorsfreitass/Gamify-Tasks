<!-- resources/views/user_rewards/add_points.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Adicionar Pontos para o Usuário {{ $user->name }}</h2>

    <form action="{{ url('user-rewards/'.$user->id.'/add-points') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="points">Pontos</label>
            <input type="number" name="points" id="points" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Adicionar Pontos</button>
    </form>
</div>
@endsection
