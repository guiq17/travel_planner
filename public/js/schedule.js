$(function(){
  $('.icon').on('click', function() {
    if ($(this).prop('checked')){
      // 一旦全てをクリアして再チェックする
      $('.icon').prop('checked', false);
      $(this).prop('checked', true);
    }
  });
});
