<?php

namespace App\Http\Controllers;


use App\Exports\invoicesExport;
use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice as InvoiceDocument;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Excel;
use PDF;

class OrdertoInvoiceController extends Controller
{
    public function index()
    {
        return view("sales.orders_to_invoice.index");
    }

    public function create()
    {
        return view("sales.orders_to_invoice.create");
    }

    // public function export(Invoice $invoice)
    // {
    //     $invoice->load([
    //         'customer' => function ($query) {
    //             $query->select(['id', 'business_name', 'code', 'address', 'phone']);
    //         },
    //         'products' => function ($query) {
    //             $query->select(['id', 'description', 'price', 'unit'])
    //                 ->withPivot(['quantity', 'discount', 'total']);
    //         },
    //     ]);

    //     $seller = new Party([
    //         'name' => 'Rusmus Army',
    //         'code' => '1230',
    //         'custom_fields' => [
    //             'address' => 'Dhaka, Bangladesh',
    //             'phone' => '+880123456789',
    //         ],
    //     ]);

    //     $customer = new Party([
    //         'name' => $invoice->customer->customer_name,
    //         'email' => $invoice->customer->customer_email,
    //         'address' => $invoice->customer->address,
    //         'phone' => $invoice->customer->phone,
    //     ]);

    //     $items = collect();

    //     $invoice->products->each(function ($product) use (&$items) {
    //         $item = new InvoiceItem();
    //         $item->title($product->description)
    //             ->pricePerUnit($product->price)
    //             ->quantity($product->pivot->quantity)
    //             ->discount($product->pivot->quantity) // Opcional: ->discountByPercent(9)
    //             ->units($product->unit);

    //         $items->push($item);
    //     });

    //     $notes = [
    //         'Invoice note # 1',
    //         'Invoice note # 2',
    //     ];

    //     $notes = implode("<br>", $notes);

    //     $invoiceDocument = InvoiceDocument::make('receipt')
    //         ->series($invoice->prefix)
    //         ->sequence($invoice->number)
    //         ->serialNumberFormat('{SERIES}-{SEQUENCE}')
    //         ->seller($seller)
    //         ->buyer($customer)
    //         ->date($invoice->created_at)
    //         ->dateFormat('m/d/Y')
    //         ->payUntilDays($invoice->due_days)
    //         ->currencySymbol('$')->currencyCode('USD')
    //         ->currencyFormat('{SYMBOL} {VALUE}')
    //         ->currencyThousandsSeparator('.')
    //         ->currencyDecimalPoint(',')
    //         ->filename($invoice->number)
    //         ->addItems($items->toArray())
    //         ->notes($notes)
    //         ->logo(public_path('vendor/invoices/sample-logo.png'))
    //         ->template('invoice'); // Plantilla personalizada
    //     return $invoiceDocument->stream();
    // }

    // // public function Eexport()
    // // {
    // //     return Excel::download(new invoicesExport, 'invoice.xlsx');
    // // }

    // // public function createPdf($order_id)
    // // {
    // //     $order = Order::find($order_id);
    // //     return view('sales.orders_to_invoice.pdf', ['order' => $order]);
    // // }

    public function downloadPdf($order_id)
    {
        $order = Order::find($order_id);
        $pdf = PDF::loadView('sales.orders_to_invoice.pdf', compact('order'));
        return $pdf->download('invoiceNew.pdf');
    }
}
