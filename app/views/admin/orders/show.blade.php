{{ Form::open(array('action' => 'Orders@update', 'method' => 'GET', 'class' => 'ajax form-horizontal')) }}

<div class="wrapper">
  
  {{ Notification::showSuccess('<div class="alert alert-success"> :message </div>') }}

  <h5>Products </h5>

  <table class="table table-condensed">
    <thead>
      <th>&nbsp;</th>
      <th>Product</th>
      <th>Description</th>
      <th>Category</th>
      <th>Quantity</th>
    </thead>
    <tbody>
      <?php $orderedProducts = json_decode($products, true); ?>
      @foreach($orderedProducts['orders'] as $key => $quantity)
      <?php $product = Product::find($key) ?>
        <tr>
          <td> {{ HTML::image(isset($product->image) ? json_decode($product->image)->mini : 'public/img/thumb-no-image-product.jpg', '', array('class' => 'img-polaroid')) }} </td>
          <td><strong> {{ $product->name }} </strong></td>
          <td> {{ $product->description }} </td>
          <td> {{ $product->category->name }} </td>
          <td class="qty"> {{ $quantity }} </td>
        </tr>
      @endforeach
    </tbody>
  </table>


  <div class="manage">

    <h5>Manage </h5>
    
    <div class="control-group">
      {{ Form::label('lookup_status', "Set status", array('class' => 'control-label')) }}
      <div class="controls">
        {{ Form::select('lookup_status', Lookup::orderStatuses()->lists('value', 'id'), $lookup_status) }}
      </div>
    </div>
    <div class="control-group">
      {{ Form::label('agent_id', "Assign Agent", array('class' => 'control-label')) }}
      <div class="controls">
        <?php $agents = array() ?>
        <?php  
          foreach (Agent::where('is_active', TRUE)->get() as $key => $value) {
            $agents[$value->id] =  json_decode($value->information)->full_name;
          }
        ?>
        {{ Form::select('agent_id', array('0' => 'Unassigned') + $agents, isset($agent_id) ? $agent_id : '0' ) }}
      </div>
    </div>  

  </div>
  
</div>

<div class="modal-footer">
  {{ Html::image('public/img/preload.gif', '', array('class' => 'hidden', 'id' => 'preload')) }}

  {{ isset($id) ? Form::hidden('id', $id) : '' }}

  {{ Form::button('Close', array('data-dismiss' => 'modal', 'aria-hidden' => 'true', 'class' => 'btn')) }}
  {{ Form::submit('Save order', array('class' => 'btn btn-primary')) }}
</div>

{{ Form::close() }}
