// you need to add the sortable class to the tbody or nothing is going to happen
jQuery(function($) {
  $(function() {
    // retrieve the ids of root pages so we can POST them along
    function data_callback(even, ui) {
      var item_array = $("tbody.ui-sortable-container").sortable("toArray");
      $.post(window.location.href + "/order", {
        items: item_array,
        csrf_hash_name: $.cookie(pyro.csrf_cookie_name)
      });
    }
    $("tbody.ui-sortable-container").sortable({
      opacity: 0.7,
      // placeholder: 'ui-state-highlight',
      forcePlaceholderSize: true,
      items: 'tr',
      cursor: "move",
      scroll: false,
      update: function(event, ui) {
        data_callback();
      }
    }).disableSelection();
  });
});