<div class="wrapper show">
  <h1> {{ $product->name }} {{ Form::checkbox('is_active', $product->id, $product->is_active , array('class' => 'for-switch', 'data-stateUrl' => 'products/state')) }} </h1>
  <div class="left preview" style="float:left;">
    {{ HTML::image( isset($product->image) ? json_decode($product->image)->modal : 'public/img/no-image-product.jpg', $product->name)}}
  </div>
  <div class="left info" style="float:left">    
    <p class="description">{{ $product->description ?: '' }}</p>
    <div class="bottom">
      <h5>{{ isset($product->category->name) ? $product->category->name : 'Uncategorized'}}</h5>
      <a class="btn btn-large btn-primary show-edit" href="{{ url('admin/products/' . $product->id) . '/edit' }}" data-toggle="modal" title="Edit">Update this product</a>
    </div>
  </div>
</div>
