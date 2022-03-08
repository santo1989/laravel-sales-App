<x-master>
    <x-elements.breadcrumb>
        <x-slot name="title">
            Create Order
        </x-slot>
        <li class="breadcrumb-item"><a href="#">Orders</a></li>
        <li class="breadcrumb-item active">Orders List</li>
        <li class="breadcrumb-item active">New Order</li>
    </x-elements.breadcrumb>

    <section class="content">
  
    <div class="container-fluid">


    <!-- @if(isset($found) && $found==1)
        <h1>hello</h1>
    @endif -->

    <form action="{{ route('orders.search') }}" method="get">
        <div class="form-group">
            <label for="search">Search Customer:</label>
            <input class="form-control" id="search" type="text" name="email">
            <button type="submit" class="btn btn-warning">Search</button>
        </div>            
    </form>

    @if(!isset($customer) && $check == 1)
    <div class="p-3 mb-2 bg-warning text-dark">This is a new customer</div>
    @endif

    <div class="card">
    <!-- <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
    </div> -->

    <div class="card-body">
        
        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            
            @if(isset($found) && $found==1)
            <input type="hidden" name="newCustomer" value="1">
            @endif


            <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : '' }}">
                <!-- <label for="customer_name">{{ trans('cruds.order.fields.customer_name') }}*</label> -->
                <label for="customer_email">Customer Name</label>
                
                @if(!isset($customer))
                <input type="text" id="customer_name" name="customer_name" class="form-control" value="{{ old('customer_name', isset($order) ? $order->customer_name : '') }}" required>

                @else

                <input type="text" id="customer_name" name="customer_name" class="form-control" value="{{ $customer->name }}" required>
                @endif
                
                
                
                @if($errors->has('customer_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('customer_name') }}
                    </em>
                @endif
                <!-- <p class="helper-block">
                    {{ trans('cruds.order.fields.customer_name_helper') }}
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('customer_email') ? 'has-error' : '' }}">
                <!-- <label for="customer_email">{{ trans('cruds.order.fields.customer_email') }}</label> -->
                <label for="customer_email">Customer Email</label>

                @if(!isset($customer))
                <input type="email" id="customer_email" name="customer_email" class="form-control" value="{{ old('customer_email', isset($order) ? $order->customer_email : '') }}">
                @else
                <input type="email" id="customer_email" name="customer_email" class="form-control" value="{{ $customer->email }}">
                @endif
                @if($errors->has('customer_email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('customer_email') }}
                    </em>
                @endif
                <!-- <p class="helper-block">
                    {{ trans('cruds.order.fields.customer_email_helper') }}
                </p> -->
            </div>

            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    <!-- <label for="customer_name">{{ trans('cruds.order.fields.customer_name') }}*</label> -->
                    <label for="address">Address</label>
                    @if(!isset($customer))
                    <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($order) ? $order->address : '') }}" required>
                    @else
                    <input type="text" id="address" name="address" class="form-control" value="{{ $customer->address }}" required>
                    @endif

                    @if($errors->has('address'))
                        <em class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </em>
                    @endif
                    <!-- <p class="helper-block">
                        {{ trans('cruds.order.fields.customer_name_helper') }}
                    </p> -->
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <!-- <label for="customer_name">{{ trans('cruds.order.fields.customer_name') }}*</label> -->
                    <label for="phone">Phone</label>

                    @if(!isset($customer))
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($order) ? $order->phone : '') }}" required>
                    @else
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ $customer->phone }}" required>
                    @endif

                    @if($errors->has('phone'))
                        <em class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </em>
                    @endif
                    <!-- <p class="helper-block">
                        {{ trans('cruds.order.fields.customer_name_helper') }}
                    </p> -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <!-- <label for="customer_name">{{ trans('cruds.order.fields.customer_name') }}*</label> -->
                    <label for="status">Status</label>
                    <!-- <input type="text" id="status" name="status" class="form-control" value="{{ old('status', isset($order) ? $order->status : '') }}" required> -->

                    <div class="input-group mb-3">
                    <select class="custom-select" id="status" name="status">
                        <option selected>Choose...</option>
                        <option value="Pending">Pending</option>
                        <option value="Confirmed">Confirmed</option>
                        <option value="Delivered">Delivered</option>
                    </select>
                    <!-- <div class="input-group-append">
                        <label class="input-group-text" for="status">Options</label>
                    </div> -->
                    </div>
                    
                    @if($errors->has('status'))
                        <em class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </em>
                    @endif
                    <!-- <p class="helper-block">
                        {{ trans('cruds.order.fields.customer_name_helper') }}
                    </p> -->
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('payment_method') ? 'has-error' : '' }}">
                    <!-- <label for="customer_name">{{ trans('cruds.order.fields.customer_name') }}*</label> -->
                    <label for="payment_method">Payment Method</label>
                    <!-- <input type="text" id="status" name="status" class="form-control" value="{{ old('status', isset($order) ? $order->status : '') }}" required> -->

                    <div class="input-group mb-3">
                    <select class="custom-select" id="payment_method" name="payment_method">
                        <option selected>Choose...</option>
                        <option value="Cash">Cash</option>
                        <option value="Card">Card</option>
                        <option value="Online">Online</option>
                    </select>
                    <!-- <div class="input-group-append">
                        <label class="input-group-text" for="status">Options</label>
                    </div> -->
                    </div>
                    
                    @if($errors->has('payment_method'))
                        <em class="invalid-feedback">
                            {{ $errors->first('payment_method') }}
                        </em>
                    @endif
                    <!-- <p class="helper-block">
                        {{ trans('cruds.order.fields.customer_name_helper') }}
                    </p> -->
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Products
                </div>

                <div class="card-body">
                    <table class="table" id="products_table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (old('products', ['']) as $index => $oldProduct)
                                <tr id="product{{ $index }}">
                                    <td>
                                        <select name="products[]" class="form-control">
                                            <option value="">-- choose product --</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}"{{ $oldProduct == $product->id ? ' selected' : '' }}>
                                                    {{ $product->name }} (${{ number_format($product->price, 2) }}) ({{ number_format($product->quantity, 2) }}pcs)
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="quantities[]" class="form-control" value="{{ old('quantities.' . $index) ?? '1' }}" />
                                    </td>
                                </tr>
                            @endforeach
                            <tr id="product{{ count(old('products', [''])) }}"></tr>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                            <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                        </div>
                    </div>
                </div>
            </div>
             
            <div>
                <!-- <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}"> -->
                <input class="btn btn-danger" type="submit" value="Save">
            </div>
        </form>


    </div>
</div>
    </div>
</section>


</x-master>
