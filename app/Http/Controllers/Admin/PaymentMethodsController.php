<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodsController extends Controller
{
    private $paymentMethod;

    public function __construct(PaymentMethod $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function index()
    {
        $paymentMethods = PaymentMethod::orderBy('id', 'DESC')->get();

        return view('admin.payment-methods.index', [
            'paymentMethods' => $paymentMethods,
        ]);
    }

    public function create()
    {
        $paymentMethod = new PaymentMethod();

        return view('admin.payment-methods.edit', [
            'paymentMethod' => $paymentMethod,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('img') != null) {

            $request->file('img')->move(public_path('img/uploads'), $request->file('img')->getClientOriginalName());

            $data['img'] = '/img/uploads/' . $request->file('img')->getClientOriginalName();

        }

        $paymentMethod = new PaymentMethod($data);
        $paymentMethod->save();

        if ($paymentMethod) {
            return redirect()->route('admin.payment-methods.edit', [$paymentMethod->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function edit($id)
    {
        return view('admin.payment-methods.edit', [
            'paymentMethod' => $this->paymentMethod->whereId($id)->firstOrFail(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = PaymentMethod::find($id);
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
                ->route('admin.payment-methods.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->delete();

        $paymentMethods = PaymentMethod::all();

        return view('admin.payment-methods.index', [
            'paymentMethods' => $paymentMethods,
        ]);
    }
}
