$(function () {
  $('.school-modal-open').on('click', function () {
    $('.js-modal').fadeIn();  //モーダルを表示する処理が行われます。
    var day = $(this).attr('day');
    var reservePart = $(this).attr('reservePart');
    var post_id = $(this).attr('post_id');
    $('.modal-inner-title input').val(day);
    $('.modal-inner-body text').text(reservePart);
    $('.school-modal-hidden').val(post_id);
    return false;
  });
  $('.js-modal-close').on('click', function () { //モーダルを非表示にする処理が行われます。
    $('.js-modal').fadeOut();
    return false;
  });
});
