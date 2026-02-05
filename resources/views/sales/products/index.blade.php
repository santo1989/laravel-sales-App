<x-master>

    <x-elements.breadcrumb>
        <x-slot name="title">
            Products
        </x-slot>
        <li class="breadcrumb-item"><a href="#">Product</a></li>
        <li class="breadcrumb-item active">Products</li>
    </x-elements.breadcrumb>

    <section class="content">
        <div class="container-fluid">
            <!-- Header Section -->
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">Product Catalog</h3>
                    <p class="text-gray-600 mt-1">Manage your inventory and product listings</p>
                </div>
                <a href="{{ route('products.create') }}" class="btn btn-primary inline-flex items-center space-x-2">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>Add New Product</span>
                </a>
            </div>

            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show mb-4 rounded-lg shadow-sm border-l-4 border-green-500"
                    role="alert">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <strong>{{ session('message') }}</strong>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Products Grid -->
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 mb-4">
                        <div
                            class="card h-100 border-0 shadow-card hover:shadow-xl transition-all duration-300 rounded-xl overflow-hidden">
                            <div class="card-body p-5">
                                <!-- Product Icon -->
                                <div class="mb-4 flex items-center justify-between">
                                    <div
                                        class="h-12 w-12 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center">
                                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                    </div>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        In Stock
                                    </span>
                                </div>

                                <!-- Product Name -->
                                <h5 class="text-lg font-bold text-gray-900 mb-3 line-clamp-2">{{ $product->name }}</h5>

                                <!-- Product Details -->
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600 font-medium">Price:</span>
                                        <span
                                            class="text-gray-900 font-bold">${{ number_format($product->price, 2) }}</span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600 font-medium">Per Box:</span>
                                        <span class="text-gray-900 font-semibold">{{ $product->box_quantity }}</span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600 font-medium">Stock:</span>
                                        <span class="text-gray-900 font-semibold">{{ $product->quantity }}</span>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex space-x-2 mt-4 pt-4 border-t border-gray-100">
                                    <a href="{{ route('products.show', ['product' => $product->id]) }}"
                                        class="flex-1 btn btn-sm btn-primary text-center rounded-lg">
                                        Details
                                    </a>
                                    <form style="display:inline"
                                        action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                        method="post" class="flex-1">
                                        @csrf
                                        @method('delete')
                                        <button
                                            onclick="return confirm('Are you sure you want to delete this product?')"
                                            class="w-full btn btn-sm btn-danger rounded-lg" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($products->isEmpty())
                <div class="text-center py-12">
                    <div class="inline-flex items-center justify-center h-16 w-16 bg-gray-100 rounded-full mb-4">
                        <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">No products yet</h3>
                    <p class="text-gray-600 mb-4">Get started by adding your first product</p>
                    <a href="{{ route('products.create') }}" class="btn btn-primary inline-flex items-center">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Product
                    </a>
                </div>
            @endif
        </div>
    </section>

</x-master>
