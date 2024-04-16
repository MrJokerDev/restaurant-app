<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $menus = Menu::all();
        return view('admin_panel.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('admin_panel.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request): RedirectResponse
    {
        $image = $request->file('image')->store('public/menus');

        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);

        if ($request->has('categories')){
            $menu->categories()->attach($request->categories);
        }

        return redirect()->route('admin.menus.index')->with('success', 'Menu successfully created!');
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
    public function edit(Menu $menu): View
    {
        $categories = Category::all();
        return view('admin_panel.menus.edit', compact('menu','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuUpdateRequest $request, Menu $menu): RedirectResponse
    {
        $image = $menu->image;

        if ($request->hasFile('image')){
            Storage::delete($menu->image);
            $image = $request->file('image')->store('public/image');
        }

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);

        if ($request->has('categories')){
            $menu->categories()->sync($request->categories);
        } else {
            $menu->categories()->detach();
        }

        return redirect()->route('admin.menus.index')->with('success', 'Menu successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu): RedirectResponse
    {
        Storage::delete($menu->image);
        $menu->categories()->detach();
        $menu->delete();

        return redirect()->route('admin.menus.index')->with('danger', 'Menu successfully destroy.');
    }
}
