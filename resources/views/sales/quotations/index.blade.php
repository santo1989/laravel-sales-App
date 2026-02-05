<x-master>
    <x-elements.breadcrumb>
        <x-slot name="title">
            Quotations
        </x-slot>
        <li class="breadcrumb-item"><a href="#">Quotations</a></li>
        <li class="breadcrumb-item active">Quotations</li>
    </x-elements.breadcrumb>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0" style="font-weight: 700; font-size: 1.25rem;">
                        <i class="fas fa-file-invoice mr-2"></i>Quotations List
                    </h3>
                    <a href="{{ route('quotations.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus mr-2"></i>Create New
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover datatable datatable-Order">
                            <thead>
                                <tr>
                                    <th width="10"></th>
                                    <th><i class="fas fa-hashtag mr-2"></i>ID</th>
                                    <th><i class="fas fa-user mr-2"></i>Customer Name</th>
                                    <th><i class="fas fa-envelope mr-2"></i>Customer Email</th>
                                    <th><i class="fas fa-map-marker-alt mr-2"></i>Address</th>
                                    <th><i class="fas fa-box mr-2"></i>Products</th>
                                    <th><i class="fas fa-cog mr-2"></i>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quotations as $key => $quotation)
                                    <tr data-entry-id="{{ $quotation->id }}">
                                        <td></td>
                                        <td><span class="badge badge-primary">{{ $quotation->id ?? '' }}</span></td>
                                        <td><strong>{{ $quotation->name ?? '' }}</strong></td>
                                        <td>{{ $quotation->email ?? '' }}</td>
                                        <td>{{ $quotation->address ?? '' }}</td>
                                        <td>
                                            <ul class="list-unstyled mb-0">
                                                @foreach ($quotation->products as $key => $item)
                                                    <li class="mb-1">
                                                        <i class="fas fa-box-open mr-1 text-muted"></i>
                                                        {{ $item->name }}
                                                        <span
                                                            class="badge badge-info">{{ $item->pivot->quantity }}</span>
                                                        ×
                                                        <span
                                                            class="text-success font-weight-bold">${{ $item->price }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                @can('quotation_show')
                                                    <a class="btn btn-sm btn-info"
                                                        href="{{ route('admin.quotations.show', $quotation->id) }}"
                                                        title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                @endcan

                                                @can('quotation_edit')
                                                    <a class="btn btn-sm btn-warning"
                                                        href="{{ route('admin.quotations.edit', $quotation->id) }}"
                                                        title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @endcan

                                                @can('quotation_delete')
                                                    <form action="{{ route('admin.quotations.destroy', $quotation->id) }}"
                                                        method="POST" onsubmit="return confirm('Are you sure?');"
                                                        style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-master>
