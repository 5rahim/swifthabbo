$(document).ready(function () {
  $(function() {
    $('#sortableWidget').sortable({
        axis: 'y',
        revert: 50,
        tolerance: 'pointer',
        cursor: 'move',
        opacity: 0.7,
        handle: 'span',
        update: function(event, ui) {
          var list_sortable = $(this).sortable('toArray').toString();
          console.log({list_order:list_sortable});

          $.ajax({

              url: 'setOrderWidget.php',
              type: 'POST',
              data: {list_order:list_sortable},

              success: function(data) {
                
              }
          });
        }
    });
  });
});