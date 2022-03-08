<x-master>
    <x-elements.breadcrumb>
        <x-slot name="title">
            Create Order
        </x-slot>
        <li class="breadcrumb-item"><a href="#">Orders</a></li>
        <li class="breadcrumb-item active">Orders List</li>
        <li class="breadcrumb-item active">New Order</li>
    </x-elements.breadcrumb>

<div class="container">
#quotation to order data transfer
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Order</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Customer</label>
                                    <select name="customer_id" class="form-control">
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Quotation</label>
                                    <select name="quotation_id" class="form-control">
                                        @foreach ($quotations as $quotation)
                                            <option value="{{ $quotation->id }}">{{ $quotation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Order Date</label>
                                    <input type="date" name="order_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Order Status</label>
                                    <select name="order_status" class="form-control">
                                        <option value="pending">Pending</option>
                                        <option value="processing">Processing</option>

    
</div>


</x-master>