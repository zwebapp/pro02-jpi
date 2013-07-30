<div class="wrapper show">
  <h1> {{ $product->name }}</h1>
  <div class="left preview" style="float:left;">
    {{ HTML::image( isset($product->image) ? json_decode($product->image)->base : 'public/img/thumb-no-image-product.jpg', $product->name)}}
  </div>
  <div class="left info" style="float:left">
    <p class="description">{{ $product->description }}</p>
    <div class="bottom">
      <h5>{{ $product->category->name}}</h5>
      <a class="btn btn-large btn-primary show-edit" href="{{ url('admin/products/' . $product->id) . '/edit' }}" data-toggle="modal" data-target="#modalBox" title="Edit">Update this product</a>
    </div>
  </div>
</div>