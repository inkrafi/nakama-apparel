<?php

namespace App\Http\Controllers;

use App\Models\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $income = Transaction::where('transaction_status', 'LUNAS')->sum('transaction_total');
        $sales = Transaction::count();
        $items = Transaction::with('details')->orderBy('id', 'DESC')->take(5)->get();
        $pie = [
            'pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'gagal' => Transaction::where('transaction_status', 'GAGAL')->count(),
            'lunas' => Transaction::where('transaction_status', 'LUNAS')->count()
        ];

        return view('pages.dashboard')->with([
            'income' => $income,
            'sales' => $sales,
            'items' => $items,
            'pie' => $pie
        ]);
    }
}
