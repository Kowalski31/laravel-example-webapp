@extends('layouts.home')

@section('title', 'Profile')

@section('content')
    <div>
        <a href="{{ route('view_bank') }}">Bank</a>
    </div>

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
@endsection
