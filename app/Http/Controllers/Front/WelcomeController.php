<?php

namespace App\Http\Controllers\Front;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    protected function getAvailableTables()
    {
        return Table::where('status', TableStatus::Available)->get();
    }

    public function index(): View
    {
        $tables = $this->getAvailableTables();
        $categories =Category::all();
        return view('welcome', compact('tables', 'categories'));
    }

    public function about(): View
    {
        return view('front.about');
    }

    public function booking(): View
    {
        $tables = $this->getAvailableTables();
        return view('front.booking', compact('tables'));
    }

    public function bookingStore(ReservationStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        Reservation::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'res_date' => $request->res_date,
            'table_id' => $request->table_id,
            'guest_number' => $request->guest_number
        ]);

        return redirect()->back()->with('success', 'You successfully reservation table.');
    }

    public function contact(): View
    {
        return view('front.contact');
    }

    public function menu(): View
    {
        $categories =Category::all();
        return view('front.menu', compact('categories'));
    }

    public function service(): View
    {
        return view('front.service');
    }

    public function team(): View
    {
        return view('front.team');
    }

    public function testimonial(): View
    {
        return view('front.testimonial');
    }
}
