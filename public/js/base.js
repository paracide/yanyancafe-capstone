function addToCart(menuId) {
  $.ajax({
    url: '/?p=cart_add_process',
    type: 'POST',
    dataType: 'json',
    data: {
      menuId: menuId,
    },
    success: function (response) {
      if (response.success) {
        alert('success');
      } else {
      }
    },
    error: function (xhr, status, error) {
    },
  });
}
