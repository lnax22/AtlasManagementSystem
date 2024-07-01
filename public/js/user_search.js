$(function () {
  $('.search_conditions').click(function () {
    /*クリックでコンテンツを開閉*/
    $('.search_conditions_inner').slideToggle(200);
    /*矢印の向きを変更*/
    $(this).find('.arrow2').toggleClass("up");
  });
  });

  $(function () {
    $(".accordion-header").on("click", function () {
      /*クリックでコンテンツを開閉*/
      $(this).next().slideToggle(200);
      /*矢印の向きを変更*/
      $(this).find('.arrow').toggleClass("up", 200);
    });
  });
