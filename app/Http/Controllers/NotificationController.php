<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Product;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function showForUpdating($product_id, $notification_id)

    {

        $notification = Notification::find($notification_id);
        $notification->status = 'read';
        $notification->color = 'green';
        $notification->update();

        $product = Product::find($product_id);
        return view('sales.products.show', [
            'product' => $product
        ]);
    }
}
