@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Home Page') }}

                    </div>

                    <div class="">
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input type="submit" value="Logout">
                            </form>
                    </div>

                    <div class="card-body">
                        {{ __('You are logged in!') }}
                        <strong>Role:</strong> {{ $user->role }}
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
