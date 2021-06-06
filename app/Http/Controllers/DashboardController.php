<?php

namespace App\Http\Controllers;

use App\Models\type;
use App\Models\Payment as payment;
use App\Models\Student as student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $studentActive = student::where('status', 'aktif')->get()->count();

        $paids = payment::whereBetween('created_at', ['2021-03-01', '2021-08-31'])->get();

        $totalPaid = 0;
        foreach ($paids as $paid) {
            $totalPaid += $paid->amount;
        }

        $totalCost = 0;
        $types = type::all();
        foreach ($types as $type) {
            $totalCost += $type->cost;
        }

        $totalLack = $totalCost * $studentActive - $totalPaid;

        $collectionPaidPerMonth = DB::table('payments')->select(DB::raw('SUM(amount) as amount'))->whereYear('created_at', date('Y'))->groupByRaw('MONTH(created_at)')->get();

        $paidPerMonth = [];
        foreach ($collectionPaidPerMonth as $key => $value) {
            $paidPerMonth[] = $value->amount;
        }

        return view('dashboard', [
            'title' => 'Dashboard',
            'studentActive' => $studentActive,
            'studentLeave' => student::where('status', 'cuti')->get()->count(),
            'totalPaid' => $totalPaid,
            'totalLack' => $totalLack,
            'paidPerMonth' => json_encode($paidPerMonth)
        ]);
    }
}
