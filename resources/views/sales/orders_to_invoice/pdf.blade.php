<head>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    
</head>
<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
    <div class="card">
        <div class="card-header p-4">
            <a class="pt-2 d-inline-block" href="#" data-abc="true">Rasmus's Sales</a>
            <div class="float-right">
                <h3 class="mb-0">Invoice #BBB10234</h3>
                <?php echo date("d-m-Y") ?>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h5 class="mb-3">From:</h5>
                    <h3 class="text-dark mb-1">{{ $order->user->name }}</h3>
                    <div>Rabindra Sharani</div>
                    <div>Sector- 7, Azompur, Dhaka</div>
                    <div>Email: contact@rasmus.com</div>
                    <div>Phone: +8801746611428</div>
                </div>
                <div class="col-sm-6 ">
                    <h5 class="mb-3">To:</h5>
                    <h3 class="text-dark mb-1">{{ $order->customer_name }}</h3>
                    <div>{{ $order->address }}</div>
                    <div>{{ $order->customer_email }}</div>
                    <div>Phone: {{ $order->phone }}</div>
                </div>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th class="right">Price</th>
                            <th class="center">Qty</th>
                            <th class="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 0; @endphp
                        @foreach($order->products as $key => $item)
                        @php
                        $qty = $item->pivot->quantity;
                        $price = $item->price;
                        $total = $item->price * $item->pivot->quantity;
                        @endphp

                        <tr>
                            <td class="center">{{ ++$sl }}</td>
                            <td class="left strong">{{ $item->name }}</td>
                            <td class="left">{{ $item->description }}</td>
                            <td class="right">{{ $item->price  }}</td>
                            <td class="center">{{ $item->pivot->quantity }}</td>
                            <td class="right">{{ $total }}</td>

                        </tr>

                        @endforeach


                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">
                </div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                            @php
                            $subTotal = $order->totalAmount;
                            $vat = $subTotal * 0.05;
                            $discount = $subTotal * 0;
                            $total = $subTotal - $discount + $vat;
                            @endphp
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Subtotal</strong>
                                </td>
                                <td class="right">{{ $subTotal }}</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Discount (0%)</strong>
                                </td>

                                <td class="right">{{ $discount }}</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">VAT (5%)</strong>
                                </td>
                                <td class="right">{{ $vat }}</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Total</strong>
                                </td>
                                <td class="right">
                                    <strong class="text-dark">{{ $total }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white">
            <p class="mb-0">rasmussale.com, Sector#7, Uttara, Dhaka, 1230</p>
        </div>
    </div>
</div>