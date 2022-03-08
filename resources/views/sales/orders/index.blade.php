<x-master>
    <x-elements.breadcrumb>
        <x-slot name="title">
            Orders
        </x-slot>
        <li class="breadcrumb-item"><a href="#">Orders</a></li>
        <li class="breadcrumb-item active">Orders</li>
    </x-elements.breadcrumb>
<section class="content">
      <div class="container-fluid">
      <div class="card">
    <div class="card-header">
        <!-- {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }} -->
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Create</a>
    </div>
    

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            <!-- {{ trans('cruds.order.fields.id') }} -->
                            Id
                        </th>
                        <th>
                            <!-- {{ trans('cruds.order.fields.customer_name') }} -->
                            Customer Name
                        </th>
                        <th>
                            <!-- {{ trans('cruds.order.fields.customer_email') }} -->
                            Customer Email
                        </th>

                        <th>
                            <!-- {{ trans('cruds.order.fields.customer_email') }} -->
                            Salesperson
                        </th>

                        <th>
                            <!-- {{ trans('cruds.order.fields.customer_email') }} -->
                            Payment Method
                        </th>

                        

                        <th>
                            <!-- {{ trans('cruds.order.fields.products') }} -->
                            Products
                        </th>

                        <th>
                            <!-- {{ trans('cruds.order.fields.products') }} -->
                            Total Amount
                        </th>

                        <th>
                            <!-- {{ trans('cruds.order.fields.customer_email') }} -->
                            Status
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key => $order)
                        <tr data-entry-id="{{ $order->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $order->id ?? '' }}
                            </td>
                            <td>
                                {{ $order->customer_name ?? '' }}
                            </td>
                            <td>
                                {{ $order->customer_email ?? '' }}
                            </td>

                            <td>
                                {{ $order->user->name ?? '' }}
                            </td>

                            <td>
                                {{ $order->payment_method ?? '' }}
                            </td>
                            

                            <td>
                                <ul>
                                @foreach($order->products as $key => $item)
                                    <li>{{ $item->name }} ({{ $item->pivot->quantity }} x ${{ $item->price }})</li>
                                @endforeach
                                </ul>
                            </td>

                            <td>{{ $order->totalAmount }}</td>

                            <td>
                                {{ $order->status ?? '' }}
                            </td>
                            <td>
                            <a href="{{ route('downloadPdf', ['order_id'=>$order->id]) }}" class="btn btn-warning btn-sm">Create Invoice</a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</x-master>