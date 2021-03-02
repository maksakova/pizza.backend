<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use App\Models\MenuFilter;
use App\Models\MenuIngredient;
use App\Models\MenuProduct;
use App\Models\MenuProductVariant;
use App\Http\Controllers\Admin\MenuProductController;
use Illuminate\Http\Request;

class MenuProductVariantController extends Controller
{
    private $menuProductVariant;

    public function __construct(MenuProductVariant $menuProductVariant)
    {
        $this->menuProductVariant = $menuProductVariant;
    }

    public function index()
    {
        $menuProductVariants = MenuProductVariant::all();

        return view('admin.menu-product-variants.index', [
            'menuProductVariants'    => $menuProductVariants,
        ]);
    }

    public function create()
    {
        $menuProductVariant = new MenuProductVariant();

        return view('admin.menu-product-variants.edit', [
            'menuProductVariant' => $menuProductVariant
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $menuProductVariant = new MenuProductVariant($data);
        $menuProductVariant->save();

        if ($menuProductVariant) {
            return redirect()->route('admin.menu-product-variants.edit', [$menuProductVariant->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $menuProductVariant = $this->menuProductVariant->whereId($id)->firstOrFail();

        return view('admin.menu-product-variants.edit', [
            'menuProductVariant' => $menuProductVariant
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = MenuProductVariant::find($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('admin.menu-product-variants.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $menuProductVariant = MenuProductVariant::findOrFail($id);
        $product_id = $menuProductVariant->menu_product_id;
        $menuProductVariant->delete();

        $menuProduct = MenuProduct::whereId($product_id)->firstOrFail();
        $menuCategories = MenuCategory::all();
        $menuFilters = MenuFilter::all();
        $menuIngredients = MenuIngredient::all();

        $ingredient_ids = explode(", ", $menuProduct->composition);

        $menuIngredientsTrue = $menuIngredients;
        foreach ($menuIngredients as $menuIngredient) {
            if ($menuIngredient->menu_category_id !== null) {
                $value = str_contains($menuIngredient->menu_category_id, $menuProduct->menu_category_id);
                if (!$value) {
                    $menuIngredientsTrue = $menuIngredientsTrue->except($menuIngredient->id);
                }
            } else {
                $menuIngredientsTrue = $menuIngredientsTrue->except($menuIngredient->id);
            }
        }

        return view('admin.menu-products.edit', [
            'menuProduct'     => $menuProduct,
            'menuCategories'  => $menuCategories,
            'menuFilters'     => $menuFilters,
            'menuIngredients' => $menuIngredientsTrue,
            'ingredient_ids'  => $ingredient_ids
        ]);
    }
}
