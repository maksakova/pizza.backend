<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    private $discount;

    public function __construct(Discount $discount)
    {
        $this->discount = $discount;
    }

    public function index()
    {
        $discounts = Discount::orderBy('id', 'DESC')->get();

        return view('admin.discounts.index', [
            'discounts' => $discounts,
        ]);
    }

    public function create()
    {
        $discount = new Discount();

        return view('admin.discounts.edit', [
            'discount' => $discount,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('img') != null) {

            $request->file('img')->move(public_path('img/uploads'), $request->file('img')->getClientOriginalName());

            $data['img'] = '/img/uploads/' . $request->file('img')->getClientOriginalName();

        }

        $discount = new Discount($data);
        $discount->save();

        if ($discount) {
            return redirect()->route('admin.discounts.edit', [$discount->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function edit($id)
    {
        return view('admin.discounts.edit', [
            'discount' => $this->discount->whereId($id)->firstOrFail(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = Discount::find($id);
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
                ->route('admin.discounts.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        $discounts = Discount::all();

        return view('admin.discounts.index', [
            'discounts' => $discounts,
        ]);
    }
}
