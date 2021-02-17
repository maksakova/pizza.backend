<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuIngredient;
use App\Models\MenuIngredientGroup;
use Illuminate\Http\Request;

class MenuIngredientController extends Controller
{
    private $menuIngredient;

    public function __construct(MenuIngredient $menuIngredient)
    {
        $this->menuIngredient = $menuIngredient;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuIngredients = MenuIngredient::with('menuCategory')->get();

        return view('admin.menu-ingredients.index', [
            'menuIngredients' => $menuIngredients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menuIngredient = new MenuIngredient();
        $menuIngredientGroups = MenuIngredientGroup::all();

        return view('admin.menu-ingredients.edit', [
            'menuIngredient' => $menuIngredient,
            'menuIngredientGroups' => $menuIngredientGroups
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

        $menuIngredient = new MenuIngredient($data);
        $menuIngredient->save();

        if ($menuIngredient) {
            return redirect()->route('admin.menu-ingredients.edit', [$menuIngredient->id])
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
        $menuIngredientGroups = MenuIngredientGroup::all();

        return view('admin.menu-ingredients.edit', [
            'menuIngredient'       => $this->menuIngredient->whereId($id)->firstOrFail(),
            'menuIngredientGroups' => $menuIngredientGroups
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
        $item = MenuIngredient::find($id);
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
                ->route('admin.menu-ingredients.edit', $item->id)
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
        $menuIngredient = MenuIngredient::findOrFail($id);
        $menuIngredient->delete();

        $menuIngredientGroups = MenuIngredientGroup::all();

        return view('admin.menu-ingredient-groups.index', [
            'menuIngredientGroups' => $menuIngredientGroups,
        ]);
    }
}
