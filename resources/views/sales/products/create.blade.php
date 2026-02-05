<x-master>
    <x-elements.breadcrumb>
        <x-slot name="title">
            Create Product
        </x-slot>
        <li class="breadcrumb-item"><a href="#">Product</a></li>
        <li class="breadcrumb-item active">Product</li>
        <li class="breadcrumb-item active">Create New</li>
    </x-elements.breadcrumb>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-card rounded-xl">
                        <div
                            class="card-header bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-t-xl border-0">
                            <div class="flex items-center">
                                <svg class="h-6 w-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                <h3 class="card-title m-0 font-semibold text-lg">Create New Product</h3>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger m-4 rounded-lg border-l-4 border-red-500">
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-red-600 mr-3 mt-0.5" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <div>
                                        <strong class="font-semibold">Please correct the following errors:</strong>
                                        <ul class="mt-2 ml-4 list-disc">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="card-body p-6">
                                <!-- Product Name -->
                                <div class="form-group mb-5">
                                    <label for="name"
                                        class="form-label font-semibold text-gray-700 mb-2 flex items-center">
                                        <svg class="h-4 w-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        Product Name
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-lg rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                        id="name" placeholder="Enter product name" name="name" required>
                                </div>

                                <!-- Description -->
                                <div class="form-group mb-5">
                                    <label class="form-label font-semibold text-gray-700 mb-2 flex items-center">
                                        <svg class="h-4 w-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h7" />
                                        </svg>
                                        Description
                                    </label>
                                    <textarea class="form-control rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                        rows="4" placeholder="Enter product description" name="description"></textarea>
                                </div>

                                <!-- Price and Quantity Row -->
                                <div class="row mb-5">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <div class="form-group">
                                            <label
                                                class="form-label font-semibold text-gray-700 mb-2 flex items-center">
                                                <svg class="h-4 w-4 mr-2 text-gray-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Price
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span
                                                        class="input-group-text bg-gray-100 border-gray-300 rounded-l-lg">$</span>
                                                </div>
                                                <input type="number" step="0.01"
                                                    class="form-control rounded-r-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                                    placeholder="0.00" name="price" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                class="form-label font-semibold text-gray-700 mb-2 flex items-center">
                                                <svg class="h-4 w-4 mr-2 text-gray-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                                </svg>
                                                Quantity
                                            </label>
                                            <input type="number"
                                                class="form-control rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                                placeholder="Enter quantity" name="quantity" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Box Quantity and Image Row -->
                                <div class="row">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <div class="form-group">
                                            <label
                                                class="form-label font-semibold text-gray-700 mb-2 flex items-center">
                                                <svg class="h-4 w-4 mr-2 text-gray-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                </svg>
                                                Box Quantity
                                            </label>
                                            <input type="number"
                                                class="form-control rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                                                placeholder="Units per box" name="box_quantity">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="picture"
                                                class="form-label font-semibold text-gray-700 mb-2 flex items-center">
                                                <svg class="h-4 w-4 mr-2 text-gray-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Product Image
                                            </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input rounded-lg"
                                                    id="picture" name="picture" accept="image/*">
                                                <label class="custom-file-label rounded-lg border-gray-300"
                                                    for="picture">Choose image file</label>
                                            </div>
                                            <small class="text-gray-500 mt-1 d-block">Accepted formats: JPG, PNG, GIF
                                                (Max: 2MB)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="card-footer bg-gray-50 border-t border-gray-200 rounded-b-xl p-4">
                                <div class="flex items-center justify-between">
                                    <a href="{{ route('products.index') }}"
                                        class="btn btn-secondary rounded-lg px-6 inline-flex items-center">
                                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                        </svg>
                                        Cancel
                                    </a>
                                    <button type="submit"
                                        class="btn btn-primary rounded-lg px-8 inline-flex items-center">
                                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        Create Product
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master>

<script>
    // File input label update
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = e.target.files[0]?.name || 'Choose image file';
        var label = e.target.nextElementSibling;
        label.textContent = fileName;
    });
</script>
