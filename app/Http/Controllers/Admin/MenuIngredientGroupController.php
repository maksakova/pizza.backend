<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuIngredient;
use App\Models\MenuIngredientGroup;
use Illuminate\Http\Request;

class MenuIngredientGroupController extends Controller
{
    private $menuIngredientGroup;

    public function __construct(MenuIngredientGroup $menuIngredientGroup)
    {
        $this->menuIngredientGroup = $menuIngredientGroup;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuIngredientGroups = MenuIngredientGroup::all();

        return view('admin.menu-ingredient-groups.index', [
            'menuIngredientGroups' => $menuIngredientGroups,
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
        $menuIngredientGroup = $this->menuIngredientGroup->whereId($id)->firstOrFail();
        $menuIngredients = MenuIngredient::where('menu_ingredient_group_id', $id)->get();

        return view('admin.menu-ingredient-groups.edit', [
            'menuIngredientGroup' => $menuIngredientGroup,
            'menuIngredients' => $menuIngredients,
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
        $item = MenuIngredientGroup::find($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('admin.menu-ingredient-groups.edit', $item->id)
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
        //
    }
}
