$(function () {
  $('.search_conditions').click(function () {
    $('.search_conditions_inner').slideToggle();
    /*クリックでコンテンツを開閉*/
    $(this).next().slideToggle(200);
    /*矢印の向きを変更*/
    $(this).find('.arrow2').toggleClass("up", 200);
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


// $(".subject_edit_btn").on("click", function () {
//   /*クリックでコンテンツを開閉*/
//   $(this).next().slideToggle(200);
//   /*矢印の向きを変更*/
//   $(this).toggleClass("open", 200);
// });
