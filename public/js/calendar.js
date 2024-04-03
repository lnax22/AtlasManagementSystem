$(function () {
  $('.school-modal-open').on('click', function () {
    $('.js-modal').fadeIn();  //モーダルを表示する処理が行われます。
    //日付取得
    var value = $(this).attr('value');
    //時間取得
    var reservePart = $(this).attr('reservePart');


    //日付をブラウザに表示
    $('.modal-inner-body').val(value);
    //時間をブラウザに表示
    $('.modal-inner-title').val(reservePart);
    // $('.edit-modal-hidden').val(reserveDate);
    return false;
  });
  $('.js-modal-close').on('click', function () { //モーダルを非表示にする処理が行われます。
    $('.js-modal').fadeOut();
    return false;
  });
});
