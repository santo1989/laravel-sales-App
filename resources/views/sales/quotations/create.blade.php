<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sales</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route("welcome") }}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route("quotations.create") }}">Order your Quotation</a>
                  </li>
                  <li>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                  </li>
             <li >
                    @if (Route::has('login'))
                        {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> --}}
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                @endif
                            @endauth
                        {{-- </div> --}}
                    @endif
                    </li>
                </ul>
                
              </div>
            </nav>
    
<div class="container">

    <h1>Quatation</h1>
<div class="card">
    <!-- <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.quotation.title_singular') }}
    </div> -->

    <div class="card-body">
        
        <form action="{{ route('quotations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group" >

            
            @if(isset($found) && $found==1)
            <input type="hidden" name="newCustomer" value="1">
            @endif


            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <!-- <label for="name">{{ trans('cruds.quotation.fields.name') }}*</label> -->
                <label for="email">Customer Name</label>
                
                @if(!isset($customer))
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($quotation) ? $quotation->name : '') }}" required>

                @else

                <input type="text" id="name" name="name" class="form-control" value="{{ $customer->name }}" required>
                @endif
                
                
                
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <!-- <p class="helper-block">
                    {{ trans('cruds.quotation.fields.name_helper') }}
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <!-- <label for="email">{{ trans('cruds.quotation.fields.email') }}</label> -->
                <label for="email">Customer Email</label>

                @if(!isset($customer))
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($quotation) ? $quotation->email : '') }}">
                @else
                <input type="email" id="email" name="email" class="form-control" value="{{ $customer->email }}">
                @endif
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <!-- <p class="helper-block">
                    {{ trans('cruds.quotation.fields.email_helper') }}
                </p> -->
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    <!-- <label for="name">{{ trans('cruds.quotation.fields.name') }}*</label> -->
                    <label for="address">Address</label>
                    @if(!isset($customer))
                    <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($quotation) ? $quotation->address : '') }}" required>
                    @else
                    <input type="text" id="address" name="address" class="form-control" value="{{ $customer->address }}" required>
                    @endif

                    @if($errors->has('address'))
                        <em class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </em>
                    @endif
                    <!-- <p class="helper-block">
                        {{ trans('cruds.quotation.fields.name_helper') }}
                    </p> -->
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <!-- <label for="name">{{ trans('cruds.quotation.fields.name') }}*</label> -->
                    <label for="phone">Phone</label>

                    @if(!isset($customer))
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($quotation) ? $quotation->phone : '') }}" required>
                    @else
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ $customer->phone }}" required>
                    @endif

                    @if($errors->has('phone'))
                        <em class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </em>
                    @endif
                    <!-- <p class="helper-block">
                        {{ trans('cruds.quotation.fields.name_helper') }}
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
    

    
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      </a>
      <span class="text-muted">&copy; 2022 Rasmus Army</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
    </ul>
  </footer>
</div>
</body>
</html>


