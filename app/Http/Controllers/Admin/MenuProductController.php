<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuProduct;
use App\Models\MenuCategory;
use App\Models\MenuFilter;
use Illuminate\Http\Request;

class MenuProductController extends Controller
{
    private $menuProduct;

    public function __construct(MenuProduct $menuProduct)
    {
        $this->menuProduct = $menuProduct;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuProducts = MenuProduct::with('menuCategory')->get();

        return view('admin.menu-products.index', [
            'menuProducts' => $menuProducts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menuProduct = new MenuProduct();
        $menuCategories = MenuCategory::all();
        $menuFilters = MenuFilter::all();

        return view('admin.menu-products.edit', [
            'menuProduct' => $menuProduct,
            'menuCategories' => $menuCategories,
            'menuFilters'    => $menuFilters
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

        $menuProduct = new menuProduct($data);
        $menuProduct->save();

        if ($menuProduct) {
            return redirect()->route('admin.menu-products.edit', [$menuProduct->id])
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menuCategories = MenuCategory::all();
        $menuFilters = MenuFilter::all();

        return view('admin.menu-products.edit', [
            'menuProduct'    => $this->menuProduct->whereId($id)->firstOrFail(),
            'menuCategories' => $menuCategories,
            'menuFilters'    => $menuFilters
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
        $item = MenuProduct::find($id);
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
                ->route('admin.menu-products.edit', $item->id)
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
        $menuProduct = MenuProduct::findOrFail($id);
        $menuProduct->delete();

        $menuProducts = MenuProduct::all();

        return view('admin.menu-products.index', [
            'menuProducts' => $menuProducts,
        ]);
    }
}
