<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Reservation::all();

        return view('dashboard.reservation', [
            'title' => 'Pemesanan',
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shops.reservation', [
            'title' => 'Pemesanan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'description' => 'required|min:10',
            'quantity' => 'required|numeric|min:1',
            'deadline' => 'required|date|after:tomorrow'
        ]);

        $validData['sample'] = $request->file('sample')->store('reservations');
        $validData['user_id'] = 1;
        $validData['deadline'] = Carbon::parse($request->deadline)->translatedFormat('Y-m-d');;
        Reservation::create($validData);
        return back()->with('success', 'Data Pesanan berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Product::findOrFail($id_product);

        Storage::delete($order->sample);
        $order->delete();
        return back()->with('success', 'Data Pemesan berhasil dihapus');
    }
}
