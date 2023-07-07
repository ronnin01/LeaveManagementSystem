import './bootstrap';

$(document).ready(function(){
  $('.sub-btn').click(function(){
      $(this).next('.sub-menu').slideToggle();
      $(this).find('.down-arrow').toggleClass('rotate');
  })
  $('.menu-bar-btn').click(function(){
      $('.sidebar').toggleClass('toggle-sidebar');
      $('.main-content').toggleClass('toggle-main-content');
  })
});
