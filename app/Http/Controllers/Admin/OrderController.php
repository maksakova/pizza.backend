<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMethod;
use App\Models\MenuIngredient;
use App\Models\MenuProduct;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->with('status')->get();

        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }

    public function create()
    {
        $order = new order();
        $orderStatuses = OrderStatus::all();
        $menuProducts = MenuProduct::get();
        $deliveryMethods = DeliveryMethod::get();
        $paymentMethods = PaymentMethod::get();

        return view('admin.orders.edit', [
            'order'           => $order,
            'orderStatuses'   => $orderStatuses,
            'menuProducts'    => $menuProducts,
            'deliveryMethods' => $deliveryMethods,
            'paymentMethods'  => $paymentMethods
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->products != null) {

            for ($i = 0; $i < count($request->products); $i++) {
                $products[] = $request->products[$i];
            }

            $products = implode(", ", $products);

            $data['products'] = $products;

        }

        $order = new Order($data);
        $order->save();

        if ($order) {
            return redirect()->route('admin.orders.edit', [$order->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $order = $this->order->whereId($id)->firstOrFail();
        $orderStatuses = OrderStatus::all();
        $menuProducts = MenuProduct::get();
        $deliveryMethods = DeliveryMethod::get();
        $paymentMethods = PaymentMethod::get();
        $menuIngredients = MenuIngredient::all();

        if ($order->products) {
            $orderProducts = json_decode($order->products);
        }

        return view('admin.orders.edit', [
            'order'           => $order,
            'orderProducts'   => $orderProducts,
            'orderStatuses'   => $orderStatuses,
            'menuProducts'    => $menuProducts,
            'deliveryMethods' => $deliveryMethods,
            'paymentMethods'  => $paymentMethods,
            'menuIngredients' => $menuIngredients,
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = Order::find($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        if ($request->products != null) {

            for ($i = 0; $i < count($request->products); $i++) {
                $products[] = $request->products[$i];
            }

            $products = implode(", ", $products);

            $data['products'] = $products;

        }

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('admin.orders.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        $orders = Order::all();

        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }
}
