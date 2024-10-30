$ = jQuery
$(document).ready(function () {
  $('img').each(function (index, element) {
    var image = $(this)
    if (image.attr('width') < 400 && image.attr('width') > 220) {
      $(element).not('.boom-fest-images').wrap("<div class='new-addon'></div>")
      $('.new-addon').prepend(
        '<img src="' +
          plugin_url.url +
          'uploads/christmas-hat.png" height="100" width="100" alt="" class="boom-fest-images">',
      )
    }
  })
})