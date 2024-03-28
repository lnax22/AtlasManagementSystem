$(function () {
  $('.school-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var day = $(this).attr('day');
    var reservePart = $(this).attr('reservePart');
    var post_id = $(this).attr('post_id');
    $('.modal-inner-title input').val(day);
    $('.modal-inner-body text').text(reservePart);
    $('.edit-modal-hidden').val(post_id);
    return false;
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
