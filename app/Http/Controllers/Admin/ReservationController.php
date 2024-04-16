<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Http\Requests\ReservationUpdateRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\View\View;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $reservations = Reservation::paginate(10);
        return view('admin_panel.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tables = Table::where('status', TableStatus::Available)->get();

        return view('admin_panel.reservations.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $table = Table::findOrFail($request->table_id);

        if ($request->guest_number > $table->guest_number){
            return back()->with('warning', 'Please choose the table base on guests.');
        }

        $requestDate = Carbon::parse($request->res_date);

        foreach ($table->reservations as $reservation) {
            $reservationDate = Carbon::parse($reservation->res_date);

            if ($reservationDate->format('Y-m-d') === $requestDate->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }

        Reservation::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'res_date' => $request->res_date,
            'guest_number' => $request->guest_number,
            'table_id' => $request->table_id,
        ]);

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation successfully created');
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
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationUpdateRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation): \Illuminate\Http\RedirectResponse
    {
        $reservation->delete();

        return redirect()->route('admin.reservation.index')->with('danger', 'Reservation successfully deleted.');
    }
}
