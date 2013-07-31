{{ Form::open( ['action' => isset($edit) ? 'Products@update' : 'Products@save', 'files' => true, 'class' => 'with-upload form-horizontal', 'id' => 'productsForm']) }}

<div class="wrapper">
  <h4> {{ isset($edit) ? "Edit " : "Add new " }} product </h4>
  
  {{ Notification::showSuccess('<div class="alert alert-success"> :message </div>') }}
  
  <div class="control-group {{ ($errors->has('name') ? 'error' : '' ) }} ">
    <label class="control-label" for="name">Name: <span class="label label-important">Required</span> </label>
    <div class="controls">
      {{ Form::text('name', isset($name) ? $name : '', array('class' => 'span3', 'placeholder' => 'e.g: Tech Tissues 01!')) }}
      <span class="help-inline">{{ $errors->first('name') }}</span>
    </div>
  </div>


  <div class="control-group {{ ($errors->has('description') ? 'error' : '' ) }}">
    <label class="control-label" for="name">Short description:</label>
    <div class="controls">
      {{ Form::textarea('description', isset($description) ? $description : '', array('class' => 'span3', 'row' => '2', 'placeholder' => 'e.g: Clean and white tissue papers')) }}
      <span class="help-inline">{{ $errors->first('description') }}</span>
    </div>
  </div>


  <div class="control-group {{ ($errors->has('image') ? 'error' : '' ) }}">
    <label class="control-label" for="name">Upload image:</label>
    <div class="controls">
      <div class="fileupload fileupload-{{ isset($image) ? 'exists' : 'new' }}" data-provides="fileupload">
        <div class="fileupload-new thumbnail" style="width: 50px; height: 50px;"><img src="http://www.placehold.it/50x50/EFEFEF/AAAAAA" /></div>
        <div class="fileupload-preview fileupload-exists thumbnail" style="width: 50px; height: 50px;">
          {{ HTML::image(isset($image) ?  json_decode($image)->thumb : 'public/img/thumb-no-image-product.jpg' , '') }}
        </div>
        <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>{{ Form::file('image', ['id' => 'image']) }}</span>
        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
        <span class="help-inline">{{ $errors->first('image') }}</span>
      </div>
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" for="name">Assign to Category:</label>
    <div class="controls">
      {{ Form::select('category_id', ['0' => 'Uncategorized'] + Category::lists('name', 'id'), isset($category_id) ? $category_id : '0') }}
    </div>
  </div>
</div>

<div class="modal-footer">
  {{ HMTL::image('public/img/preload.gif', '', ['class' => 'hidden', 'id' => 'preload']) }}

  {{ isset($id) ? Form::hidden('id', $id) : '' }}

  {{ Form::button('Close', array('data-dismiss' => 'modal', 'aria-hidden' => 'true', 'class' => 'btn')) }}
  {{ Form::submit(isset($edit) ? 'Update' : 'Add Product', array('class' => 'btn btn-primary', 'data-refresh' => '.modal-body')) }}
</div>

{{ Form::close() }}