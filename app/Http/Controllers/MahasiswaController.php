<?php

namespace App\Http\Controllers;

use App\Models\type;
use App\Models\Payment as payment;
use App\Models\Student as student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(->toArray());
        return view('mahasiswa.index', [
            'title' => 'Mahasiswa',
            'students' => student::with('program_faculty.program')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create', [
            'title' => 'Tambah Pembayaran',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = new payment;
        $payment->npm = request()->segment('3');
        $payment->amount = $request->amount;
        $payment->type_id = 1;
        $payment->save();

        return redirect()->route('dashboard.mahasiswa.show', request()->segment('3'))->with('success', 'Pembayaran berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $npm
     * @return \Illuminate\Http\Response
     */
    public function show($npm)
    {
        $student = student::where('npm', $npm)->firstOrFail();
        $semester = $student->semester;
        $payments = payment::where('npm', $npm)->get();
        $totalCost = 0;
        $types = type::all();
        foreach ($types as $type) {
            $totalCost += $type->cost;
        }

        $totalPayment = 0;
        foreach ($payments as $payment) {
            $totalPayment += $payment->amount;
        }

        $remaining = $totalCost * $semester - $totalPayment;

        return view('mahasiswa.show', [
            'title' => 'Detail Pembayaran',
            'student' => $student,
            'remaining' => $remaining,
            'payments' => payment::where('npm', $npm)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 
    }
}
