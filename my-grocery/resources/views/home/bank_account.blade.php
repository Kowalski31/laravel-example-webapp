<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

</head>

<body>
    <!-- Header -->
    @include('home.header')
    <!-- End Header -->

    <!-- Navigation -->
    @include('home.nav')
    <!-- End Navigation -->

    <!-- Bank Account -->
    <div class="container mt-5">
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

                            <button class="btn btn-danger btn-sm" type="submit" >Delete</button>
                        </td>
                    </tr>

                    <!-- Edit Bank Account Modal -->
                    <div class="modal fade" id="editBankAccountModal-{{ $account->id }}" tabindex="-1"
                        aria-labelledby="editBankAccountModalLabel-{{ $account->id }}" aria-hidden="true">
                        <div class="modal-dialog">
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
            <div class="modal-dialog">
                <div class="modal-content">
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

    <!-- Footer -->
    @include('home.footer')
    <!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('home-js/home_index.js') }}"></script>
</body>

</html>
