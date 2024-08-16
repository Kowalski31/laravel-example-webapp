@extends('layouts.home')

@section('title', 'Bank Account')

@section('content')

<!-- Bank Account -->
    <div class="container mt-5 mb-5">
        <h1 class="text-center mb-4">Bank Accounts</h1>


        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBankAccountModal">Add Bank
            Account</button>

            
        <table class="table table-bordered">
            <thead class="table-info">
                <tr>
                    <th>ID</th>
                    <th>Bank Name</th>
                    <th>Account Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bank_accounts as $account)
                    <tr>
                        <td>{{ $account->id }}</td>
                        <td>{{ $account->bank_name }}</td>
                        <td>{{ $account->account_number }}</td>
                        <td>
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editBankAccountModal-{{ $account->id }}">Edit</button>

                            <a href="{{ route('delete_bank', $account->id) }}" class="btn btn-danger btn-sm"
                                onclick="confirmation(event)">Delete</a>

                        </td>
                    </tr>

                    <!-- Edit Bank Account Modal -->
                    <div class="modal fade" id="editBankAccountModal-{{ $account->id }}" tabindex="-1"
                        aria-labelledby="editBankAccountModalLabel-{{ $account->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editBankAccountModalLabel-{{ $account->id }}">Edit Bank
                                        Account</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('edit_bank', $account->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="bank_name" class="form-label">Bank Name</label>
                                            <input type="text" class="form-control" id="bank_name" name="bank_name"
                                                value="{{ $account->bank_name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="account_number" class="form-label">Account Number</label>
                                            <input type="number" class="form-control" id="account_number"
                                                name="account_number" value="{{ $account->account_number }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>

        <!-- Add Bank Account Modal -->
        <div class="modal fade" id="addBankAccountModal" tabindex="-1" aria-labelledby="addBankAccountModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBankAccountModalLabel">Add Bank Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add_bank') }}   " method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="bank_name" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name" required>
                            </div>

                            <div class="mb-3">
                                <label for="account_number" class="form-label">Account Number</label>
                                <input type="number" class="form-control" id="account_number" name="account_number"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Bank Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Bank Account -->

@endsection
