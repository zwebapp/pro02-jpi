function changeModalBody(options) {
  var defaults = {

    target : $('#modalBox'),
    type : 'GET',
    afterAjax: function (){}

  }

  options = $.extend({}, defaults, options);

  options.target.modal('show');

  $.ajax({

    type : options.type,
    url : options.url,
  }).done(function (html) {

    options.target.find('.modal-body').html(html);
    options.target.find('.for-switch').wrap('<div class="switch switch-small" />').parent().bootstrapSwitch();
    options.target.find('.wrapper:not(.show) .switch').on('switch-change', function(e, data){
      $(data.el).val(data.value);
    });
    options.target.find('.show .switch').on('switch-change', function(e, data){

      $.get($(data.el).attr('data-stateUrl'), { id : data.el.val(), is_active : data.value });

    });
    
    // options.target.find('.datePicker').datetimepicker({pickTime: false});

    options.afterAjax();
  });

}

function ajaxFileUpload(options){
  $.ajaxFileUpload ({
    url: options.url + '?' + options.data,
    secureuri: false,
    dataType: 'html',
    fileElementId: options.fileElementId,

    success: function (data, status){
      $('.modal .modal-body').html(data.responseText);
    },

     error: function (data, status, e) {
      $('.modal .modal-body').html(data.responseText);
    }
  })
}


jQuery('document').ready(function($){

    // Global modal functions
    $(document).on("eldarion-ajax:begin", function(evt, $el) {

      $('#preload').removeClass('hidden');

    });    


    $(document).on("eldarion-ajax:success", function(evt, $el, data) {

      $('.modal .modal-body').html(data.responseText);
      $('.for-switch').wrap('<div class="switch switch-small" />').parent().bootstrapSwitch();
      
    });

    $('#modalBox').delegate('input[type="submit"]', 'click', function(ev){
        $('#preload').removeClass('hidden');
    });

    $('#modalBox').on('hide', function () {
      document.location.reload(true);
    });


    $('[data-toggle="modal"]:not([data-target])').click(function(e) {
      e.preventDefault();

      changeModalBody({ 
        url : $(this).attr('href'), 
        afterAjax: function() {
          $('.with-upload').submit(function(e){

            e.preventDefault();

            ajaxFileUpload({
              url : $(this).attr('action'),
              fileElementId: $(this).find('input[type="file"]').attr('id'),
              data: $(this).serialize()
            })

          });
        } 
      });

    });

    $('#modalBox').delegate('.show-edit', 'click', function(e){
      e.preventDefault();
      changeModalBody({ url : $(this).attr('href'), 
        afterAjax: function(){
          $('.with-upload').submit(function(e){

            e.preventDefault();

            ajaxFileUpload({
              url : $(this).attr('action'),
              fileElementId: $(this).find('input[type="file"]').attr('id'),
              data: $(this).serialize()
            })

          });
        } 
      });
    });


    $('#dataTable').find('.name').find('a').click(function(){

      $('#modalBox').addClass($(this).closest('tr').attr('class'));

    });

    $('#modalShow').delegate('.show-edit', 'click', function(){

      $('#modalShow').modal('hide');

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

    $('#modalBox').on('enableUpload','.elements',function(){
      $('#productsForm').fileUpload();
    });

  });