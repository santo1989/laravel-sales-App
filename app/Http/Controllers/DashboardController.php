<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Notification;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ordersToday = Order::whereDate('created_at', Carbon::today())->get()->count();
        $newCustomersToday = Customer::whereDate('created_at', Carbon::today())->get()->count();
        $totalEarningToday = Order::whereDate('created_at', Carbon::today())->get()->sum('totalAmount');
        // dd($totalEarningToday);

        // dd($newCustomersToday);
        $totalCustomers = Customer::count();
        $notifications = Notification::all();



        $januaryTotalOrder = Order::whereMonth('created_at', '1')->get()->count();
        $januaryTotalOrderTotalAmount = Order::whereMonth('created_at', '1')->get()->sum('totalAmount');

        $februaryTotalOrder = Order::whereMonth('created_at', '2')->get()->count();
        $februaryTotalOrderTotalAmount = Order::whereMonth('created_at', '2')->get()->sum('totalAmount');

        $marchTotalOrder = Order::whereMonth('created_at', '3')->get()->count();
        $marchTotalOrderTotalAmount = Order::whereMonth('created_at', '3')->get()->sum('totalAmount');

        $aprilTotalOrder = Order::whereMonth('created_at', '4')->get()->count();
        $aprilTotalOrderTotalAmount = Order::whereMonth('created_at', '4')->get()->sum('totalAmount');

        $mayTotalOrder = Order::whereMonth('created_at', '5')->get()->count();
        $mayTotalOrderTotalAmount = Order::whereMonth('created_at', '5')->get()->sum('totalAmount');

        $juneTotalOrder = Order::whereMonth('created_at', '6')->get()->count();
        $juneTotalOrderTotalAmount = Order::whereMonth('created_at', '6')->get()->sum('totalAmount');

        $julyTotalOrder = Order::whereMonth('created_at', '7')->get()->count();
        $julyTotalOrderTotalAmount = Order::whereMonth('created_at', '7')->get()->sum('totalAmount');

        $augustTotalOrder = Order::whereMonth('created_at', '8')->get()->count();
        $augustTotalOrderTotalAmount = Order::whereMonth('created_at', '8')->get()->sum('totalAmount');

        $septemberTotalOrder = Order::whereMonth('created_at', '9')->get()->count();
        $septemberTotalOrderTotalAmount = Order::whereMonth('created_at', '9')->get()->sum('totalAmount');

        $octoberTotalOrder = Order::whereMonth('created_at', '10')->get()->count();
        $octoberTotalOrderTotalAmount = Order::whereMonth('created_at', '10')->get()->sum('totalAmount');

        $novemberTotalOrder = Order::whereMonth('created_at', '11')->get()->count();
        $novemberTotalOrderTotalAmount = Order::whereMonth('created_at', '11')->get()->sum('totalAmount');

        $decemberTotalOrder = Order::whereMonth('created_at', '12')->get()->count();
        $decemberTotalOrderTotalAmount = Order::whereMonth('created_at', '12')->get()->sum('totalAmount');


        // dd($decemberTotalOrder);
        $monthlyDatas = [
            [
                'month' => 'January',
                'totalOrder' => $januaryTotalOrder,
                'totalAmount' => $januaryTotalOrderTotalAmount
            ],
            [
                'month' => 'February',
                'totalOrder' => $februaryTotalOrder,
                'totalAmount' => $februaryTotalOrderTotalAmount
            ],
            [
                'month' => 'March',
                'totalOrder' => $marchTotalOrder,
                'totalAmount' => $marchTotalOrderTotalAmount
            ],
            [
                'month' => 'April',
                'totalOrder' => $aprilTotalOrder,
                'totalAmount' => $aprilTotalOrderTotalAmount
            ],
            [
                'month' => 'May',
                'totalOrder' => $mayTotalOrder,
                'totalAmount' => $mayTotalOrderTotalAmount
            ],
            [
                'month' => 'June',
                'totalOrder' => $juneTotalOrder,
                'totalAmount' => $juneTotalOrderTotalAmount
            ],
            [
                'month' => 'July',
                'totalOrder' => $julyTotalOrder,
                'totalAmount' => $julyTotalOrderTotalAmount
            ],
            [
                'month' => 'August',
                'totalOrder' => $augustTotalOrder,
                'totalAmount' => $augustTotalOrderTotalAmount
            ],
            [
                'month' => 'September',
                'totalOrder' => $septemberTotalOrder,
                'totalAmount' => $septemberTotalOrderTotalAmount
            ],
            [
                'month' => 'October',
                'totalOrder' => $octoberTotalOrder,
                'totalAmount' => $octoberTotalOrderTotalAmount
            ],
            [
                'month' => 'November',
                'totalOrder' => $novemberTotalOrder,
                'totalAmount' => $novemberTotalOrderTotalAmount
            ],
            [
                'month' => 'December',
                'totalOrder' => $decemberTotalOrder,
                'totalAmount' => $decemberTotalOrderTotalAmount
            ]

        ];

        // dd($monthlyDatas);
        return view('sales.landing', ['ordersToday' => $ordersToday, 'newCustomersToday' => $newCustomersToday, 'totalCustomers' => $totalCustomers, 'monthlyDatas' => $monthlyDatas, 'totalEarningToday' => $totalEarningToday, 'notifications' => $notifications]);
    }
}
