jQuery('document').ready(function($){

    // Global modal functions
    $(document).on("eldarion-ajax:begin", function(evt, $el) {

      $('#preload').removeClass('hidden');

    });    


    $(document).on("eldarion-ajax:success", function(evt, $el, data) {

      $('.modal .modal-body').html(data.responseText);
      
    });

    $('#modalBox').delegate('input[type="submit"]', 'click', function(ev){
        $('#preload').removeClass('hidden');
    });

    $('#modalBox').on('hide', function () {
      document.location.reload(true);
    });

    $('#dataTable').find('.name').find('a').click(function(){

      $('#modalBox').addClass($(this).closest('tr').attr('class'));

    });


    $('#dataTable').find('.delete').click(function(e){
      e.preventDefault();
    });

    $('#dataTable').find('.delete').popover({
      'placement': 'left',
      'html' : true,
      'content' : '<small>Are you sure you want to remove this item? <strong>All the related content under this will be unassigned</strong>.</small><br/>' 
                  + '<small class="text-error">You cannot revert this action!</small>' 
                  + '<div class="op-buttons">' 
                      + '<button type="button" class="btn btn-mini btn-success yep">Yep!</button> ' 
                      + '<button type="button" class="btn btn-mini cancel">Cancel</button> ' 
                  + '</div>'
      
    });

    $('#dataTable').delegate('.cancel', 'click', function(ev){
      $('#dataTable').find('.delete').popover('hide');
    });

    $('#dataTable').delegate('.yep', 'click', function(ev){
      var $item = $(this).closest('tr');

      $.get($item.find('.delete').attr('href'), function(){
        $item.remove();
      });

    });


  });