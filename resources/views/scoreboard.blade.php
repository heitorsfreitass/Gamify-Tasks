@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-5">
                <h2 class="display-6 text-center">Here it is!</h2>
                <p>Total Points: <strong>{{ Auth::user()->points }}</strong></p>
            </div>
            
            <div class="card text-center">
                <div class="card-header">
                    <h2 class="fw-bold" style="font-size: 24px;">Scoreboard</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Total Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->points }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="/user-rewards/{{ Auth::user()->id }}" class="btn btn-primary">See Rewards</a>
            </div>
        </div>
    </div>
</div>
@endsection
