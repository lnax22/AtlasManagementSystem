$(function () {
  $('.school-modal-open').on('click', function () {
    $('.js-modal').fadeIn();  //モーダルを表示する処理が行われます。
    var reserveDate = $(this).attr('reserveDate');
    var reservePart = $(this).attr('reservePart');
    var post_id = $(this).attr('post_id');
    $('.modal-inner-title').val(day);
    $('.modal-inner-body').text(reservePart);
    $('.edit-modal-hidden').val(reserveDate);
    return false;
  });
  $('.js-modal-close').on('click', function () { //モーダルを非表示にする処理が行われます。
    $('.js-modal').fadeOut();
    return false;
  });
});
