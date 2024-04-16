<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use App\Http\Requests\TableUpdateRequest;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tables = Table::all();
        return view('admin_panel.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin_panel.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location
        ]);

        return redirect()->route('admin.tables.index')->with('success', 'Table successfully created');
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
    public function edit(Table $table): View
    {
        return view('admin_panel.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableUpdateRequest $request, Table $table): \Illuminate\Http\RedirectResponse
    {
        $table->update([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location
        ]);

        return redirect()->route('admin.tables.index')->with('success', 'Table successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table): \Illuminate\Http\RedirectResponse
    {
        $table->delete();
        $table->reservations()->delete();

        return redirect()->route('admin.tables.index')->with('danger', 'Table successfully destroy.');
    }
}
