<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagementController extends Controller
{
    public function index()
    {
        // 商品情報をデータベースから所得
        $orders = Order::where('user_id',Auth::id())->get();
        $products = product::where('user_id',Auth::id())->get();
        return view(
            'management_page',
            ['orders' => $orders,'products' => $products]
        );
    }
    public function change_made()
    {
        $id = $_POST['order_id'];
        // statusを2に変更
        Order::where('id', $id)->update(['status' => 2]);
        return back();
    }
    public function change_send()
    {
        $id = $_POST['order_id'];
        // statusを3に変更
        Order::where('id', $id)->update(['status' => 3]);
        return back();
    }
}
