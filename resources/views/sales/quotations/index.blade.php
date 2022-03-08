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
    <div class="card-header">
        <!-- {{ trans('cruds.quotation.title_singular') }} {{ trans('global.list') }} -->
        <a href="{{ route('quotations.create') }}" class="btn btn-primary">Create</a>
    </div>
    

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bquotationed table-striped table-hover datatable datatable-Order">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            <!-- {{ trans('cruds.quotation.fields.id') }} -->
                            Id
                        </th>
                        <th>
                            <!-- {{ trans('cruds.quotation.fields.name') }} -->
                            Customer Name
                        </th>
                        <th>
                            <!-- {{ trans('cruds.quotation.fields.email') }} -->
                            Customer Email
                        </th>

                        <th>
                            <!-- {{ trans('cruds.quotation.fields.address') }} -->
                           Address
                           
                        </th>
                        <th>
                            <!-- {{ trans('cruds.quotation.fields.products') }} -->
                            Products
                        </th>
                         <th>
                            Actions
                        </th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotations as $key => $quotation)
                        <tr data-entry-id="{{ $quotation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $quotation->id ?? '' }}
                            </td>
                            <td>
                                {{ $quotation->name ?? '' }}
                            </td>
                            <td>
                                {{ $quotation->email ?? '' }}
                            </td>

                            <td>
                                {{ $quotation->address ?? '' }}
                            </td>
                            <td>
                                <ul>
                                    @foreach($quotation->products as $key => $item)
                                    <li>{{ $item->name }} ({{ $item->pivot->quantity }} x ${{ $item->price }})</li>
                                @endforeach
                                </ul>
                            </td>

                             <td>
                                @can('quotation_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.quotations.show', $quotation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('quotation_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.quotations.edit', $quotation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('quotation_delete')
                                    <form action="{{ route('admin.quotations.destroy', $quotation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

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