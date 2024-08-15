<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product_picture;
use App\Models\Bank_account;
use App\Models\Order_detail;


class BankController extends Controller
{
    public function viewBank()
    {
        $user = Auth::user();
        $bank_accounts = Bank_account::where('user_id', $user->id)->get();

        return view('home.bank_account', compact('user', 'bank_accounts'));
    }

    public function addBank(Request $request)
    {
        $user = Auth::user();

        try {
                $request->validate([
                'bank_name' => 'required|string|max:255',
                'account_number' => 'required|string|max:13|gt:0',
            ]);
        }
        catch (\Exception $e) {
            toastr()->closeButton(true)->timeOut(2000)->error($e->getMessage());
            return redirect()->back();
        }


        $bank = new Bank_account();
        $bank->user_id = $user->id;

        $bank->bank_name = $request->bank_name;
        $bank->account_number = $request->account_number;
        $bank->save();

        toastr()->closeButton(true)->timeOut(2000)->success('bank account added successfully');
        return redirect()->back();
    }

    public function editBank(Request $request, $id)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:13|gt:0',
        ]);

        $bank_account = Bank_account::findOrFail($id);
        $bank_account->bank_name = $request->bank_name;
        $bank_account->account_number = $request->account_number;
        $bank_account->save();

        toastr()->closeButton(true)->timeOut(2000)->success('bank account updated successfully');
        return redirect()->back();
    }

    public function deleteBank($id)
    {
        $bank_account = Bank_account::findOrFail($id);
        $bank_account->delete();

        toastr()->closeButton(true)->timeOut(2000)->info('bank account deleted successfully');
        return redirect()->back();
    }
}
