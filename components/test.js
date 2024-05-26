$(() => {
  $('#logout').click(function (event) {
    event.preventDefault();
    $.post('/?p=logout_process');
  });
});
