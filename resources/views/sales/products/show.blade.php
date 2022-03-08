<x-master>
<x-elements.breadcrumb>
      <x-slot name="title">
          Product Details
      </x-slot>
      <li class="breadcrumb-item"><a href={{ route("products.index") }}>Product</a></li>
      <li class="breadcrumb-item active">Product Details</li>
  </x-elements.breadcrumb>
<section class="content">
    <div class="container-fluid">
    <section class="content">

<!-- Default box -->
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3 class="d-inline-block d-sm-none">{{ $product->name }}</h3>
        
        <div class="col-12">
          <img src="{{ asset('storage/images/'.$product->picture) }}" class="product-image" alt="Product Image">
        </div>
        <!-- <div class="col-12 product-image-thumbs">
          <div class="product-image-thumb active"><img src="{{ asset('storage/images/'.$product->picture) }}" alt="Product Image"></div>
          <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
          <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
          <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
          <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
        </div> -->
      </div>
      <div class="col-12 col-sm-6">
        <h3 class="my-3">{{ $product->name }}</h3>
        <a href={{ route("products.edit", ['product'=> $product->id]) }} class="btn btn-warning">Edit</a>
        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
        <p>Quantity: {{ $product->quantity }}</p>
        <p>Box Quantity: {{ $product->box_quantity }}</p>
        
        <hr>
        

        

        <div class="bg-gray py-2 px-3 mt-4">
          <h2 class="mb-0">
          {{ $product->price }}
          </h2>
          <h4 class="mt-0">
            <small>Ex Tax: {{ $product->price }} </small>
          </h4>
        </div>

        <!-- <div class="mt-4">
          <div class="btn btn-primary btn-lg btn-flat">
            <i class="fas fa-cart-plus fa-lg mr-2"></i>
            Add to Cart
          </div>

          <div class="btn btn-default btn-lg btn-flat">
            <i class="fas fa-heart fa-lg mr-2"></i>
            Add to Wishlist
          </div>
        </div> -->

        <!-- <div class="mt-4 product-share">
          <a href="#" class="text-gray">
            <i class="fab fa-facebook-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fab fa-twitter-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fas fa-envelope-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fas fa-rss-square fa-2x"></i>
          </a>
        </div> -->

      </div>
    </div>
    <div class="row mt-4">
      <nav class="w-100">
        <div class="nav nav-tabs" id="product-tab" role="tablist">
          <a class="nav-item nav-link" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="false">Description</a>
        </div>
      </nav>
      <div class="tab-content p-3" id="nav-tabContent">
        
        <div class="tab-pane fade active show" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">{{ $product->description }}</div>
       
      </div>
    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
    </div>
    </section>
</x-master>