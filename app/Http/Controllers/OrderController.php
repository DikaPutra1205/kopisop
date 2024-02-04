<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->id_level == 3) {
            $orders = Order::where('created_by', $user->id)->get();
        } else {
            $orders = Order::all();
        }
        $menus = Menu::all();

        return view('pages.order.index', ['order' => $orders, 'menus' => $menus]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_meja' => 'required|string|max:255',
        ]);
        $user = Auth::user();

        $order = Order::create([
            'nomor_meja' => $validatedData['nomor_meja'],
            'total' => 0,
            'created_by' => $user->id,
        ]);

        $id = $order->id;

        if (auth()->check() && auth()->user()->id_level == 3) {
            LogActivity::create([
                'user_id' => auth()->user()->id,
                'activity' => 'Created Order',
            ]);
        }

        return redirect()->route('detail-order', ['id' => $id]);
    }

    public function order(string $id)
    {
        $menus = Menu::all();
        $order = Order::findOrFail($id); // Gantilah dengan model dan kolom yang sesuai
        $detailOrders = $order->detailOrders; // Pastikan ada relasi di model Order

        return view('pages.order.detail', compact('menus', 'order', 'detailOrders'));
    }

    public function submitOrder(Request $request, $id)
    {
        // Validasi request sesuai kebutuhan
        $request->validate([
            'menu_id' => 'required|exists:menu,id',
            'qty' => 'required|integer|min:1',
        ]);

        // Buat atau update detail order
        $order = Order::findOrFail($id);
        $menuId = $request->input('menu_id');
        $qty = $request->input('qty');

        // Perbarui atau tambahkan detail order
        $order->menus()->sync([$menuId => ['qty' => $qty]], false);

        // Hitung total harga
        $totalHarga = $order->menus->sum(function ($menu) {
            return $menu->harga * $menu->pivot->qty;
        });

        // Update total harga di tabel orders
        $order->update(['total' => $totalHarga]);

        return redirect()->route('detail-order', ['id' => $id])->with('success', 'Order submitted successfully!');
    }


    public function viewOrderDetail($id)
    {
        $order = Order::with('menus')->findOrFail($id);

        return view('pages.order.viewdetail', ['order' => $order]);
    }

    public function deleteMenu($orderId, $menuId)
    {
        $order = Order::findOrFail($orderId);
        $order->menus()->detach($menuId);

        return redirect()->back()->with('success', 'Menu deleted successfully!');
    }
}
