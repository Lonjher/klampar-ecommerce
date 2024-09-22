<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $orders = $user->reservation()->paginate(10);

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'description' => 'required|min:10',
            'quantity' => 'required|numeric|min:1',
            'deadline' => 'required|date'
        ]);

        $validData['sample'] = $request->file('sample')->store('reservations');
        $validData['user_id'] = Auth::user()->id;
        $validData['penjual_id'] = $request->penjual_id;
        $validData['deadline'] = Carbon::parse($request->deadline)->translatedFormat('Y-m-d');;
        Reservation::create($validData);
        return redirect()->back()->with('success', 'Data Pesanan berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('shops.reservation', [
            'title' => 'Pemesanan',
            'user' => $user
        ]);
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
        $order = Reservation::findOrFail($id);

        Storage::delete($order->sample);
        $order->delete();
        return redirect()->back()->with('success', 'Data Pemesan berhasil dihapus');
    }

    public function hapus(string $id)
    {
        $order = Reservation::findOrFail($id);

        Storage::delete($order->sample);
        $order->delete();
        return redirect()->back('/')->with('success', 'Data Pemesan berhasil dihapus');
    }
}
