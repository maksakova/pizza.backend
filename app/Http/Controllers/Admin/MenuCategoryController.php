<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use App\Models\MenuProduct;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    private $menuCategory;

    public function __construct(MenuCategory $menuCategory)
    {
        $this->menuCategory = $menuCategory;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuCategories = MenuCategory::all();

        return view('admin.menu-categories.index', [
            'menuCategories' => $menuCategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menuCategory = new MenuCategory();

        return view('admin.menu-categories.edit', [
            'menuCategory' => $menuCategory,
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
        $data = $request->all();

        if ($request->file('img') != null) {

            $request->file('img')->move(public_path('img/uploads'), $request->file('img')->getClientOriginalName());

            $data['img'] = '/img/uploads/' . $request->file('img')->getClientOriginalName();

        }

        $menuCategory = new MenuCategory($data);
        $menuCategory->save();

        if ($menuCategory) {
            return redirect()->route('admin.menu-categories.edit', [$menuCategory->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menuProducts = MenuProduct::where('menu_category_id', $id)->get();

        return view('admin.menu-categories.show', [
            'menuProducts' => $menuProducts,
            'menuCategory' => $this->menuCategory->whereId($id)->firstOrFail(),
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
        return view('admin.menu-categories.edit', [
            'menuCategory' => $this->menuCategory->whereId($id)->firstOrFail(),
        ]);
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
        $item = MenuCategory::find($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        if ($request->file('img') != null) {

            $request->file('img')->move(public_path('img/uploads'), $request->file('img')->getClientOriginalName());

            $data['img'] = '/img/uploads/' . $request->file('img')->getClientOriginalName();

        }

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('admin.menu-categories.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menuCategory = MenuCategory::findOrFail($id);
        $menuCategory->delete();

        $menuCategories = MenuCategory::all();

        return view('admin.menu-categories.index', [
            'menuCategories' => $menuCategories,
        ]);
    }
}
