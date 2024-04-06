$(function () {
  $('.school-modal-open').on('click', function () {
    $('.js-modal').fadeIn();  //モーダルを表示する処理が行われます。
    //日付取得
    var value = $(this).attr('value');
    //this＝school-modal-open
    //時間取得
    var reservePart = $(this).attr('reserve_part');


    //日付をブラウザに表示
    $('.modal-inner-body p').text("予約日:"+value);
    //時間をブラウザに表示
    $('.modal-inner-title p').text("時間:"+reservePart);
    // $('.edit-modal-hidden').val(reserveDate);
    return false;
  });
  $('.js-modal-close').on('click', function () { //モーダルを非表示にする処理が行われます。
    $('.js-modal').fadeOut();
    return false;
  });
});
