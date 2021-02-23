<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMethod;
use Illuminate\Http\Request;

class DeliveryMethodsController extends Controller
{
    private $deliveryMethod;

    public function __construct(DeliveryMethod $deliveryMethod)
    {
        $this->deliveryMethod = $deliveryMethod;
    }

    public function index()
    {
        $deliveryMethods = DeliveryMethod::orderBy('id', 'DESC')->get();

        return view('admin.delivery-methods.index', [
            'deliveryMethods' => $deliveryMethods,
        ]);
    }

    public function create()
    {
        $deliveryMethod = new DeliveryMethod();

        return view('admin.delivery-methods.edit', [
            'deliveryMethod' => $deliveryMethod,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('img') != null) {

            $request->file('img')->move(public_path('img/uploads'), $request->file('img')->getClientOriginalName());

            $data['img'] = '/img/uploads/' . $request->file('img')->getClientOriginalName();

        }

        $deliveryMethod = new DeliveryMethod($data);
        $deliveryMethod->save();

        if ($deliveryMethod) {
            return redirect()->route('admin.delivery-methods.edit', [$deliveryMethod->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function edit($id)
    {
        return view('admin.delivery-methods.edit', [
            'deliveryMethod' => $this->deliveryMethod->whereId($id)->firstOrFail(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = DeliveryMethod::find($id);
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
                ->route('admin.delivery-methods.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $deliveryMethod = DeliveryMethod::findOrFail($id);
        $deliveryMethod->delete();

        $deliveryMethods = DeliveryMethod::all();

        return view('admin.delivery-methods.index', [
            'deliveryMethods' => $deliveryMethods,
        ]);
    }
}
