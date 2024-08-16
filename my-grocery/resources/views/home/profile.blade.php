@extends('layouts.home')

@section('title', 'Profile')

@section('content')

    {{--
    <!-- Profile Picture -->
        <div class="mb-3">
            <label for="profile_picture" class="form-label">{{ __('Profile Picture') }}</label>
            <input type="file" id="profile_picture"
                class="form-control @error('profile_picture') is-invalid @enderror" name="profile_picture">
            @error('profile_picture')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
    --}}


    <!-- Profile Information -->
    <div class="container">
        <section style="background-color: #eee;">
            <div class="container py-5 ">
                <div class="row">
                    <div class="col-lg-4 ">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <!-- Display avatar -->
                                <img src="{{ $user->avatar ? asset('user-ava/' . $user->avatar) : 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' }}"
                                    alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">{{ $user->name }}</h5>
                                <p class="text-muted mb-1">{{ $user->email }}</p>

                                <!-- Upload avatar form -->
                                <form action="{{ route('add_avatar') }}" method="POST" enctype="multipart/form-data"
                                    class="mt-3">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="file" id="profile_picture"
                                            class="form-control @error('profile_picture') is-invalid @enderror"
                                            name="profile_picture">
                                        @error('profile_picture')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Avatar</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->phone }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
