function toastSuccess(message) {
  const toast = $('#toast-info');
  toast.find('span').text(message);
  toast.show().delay(2000).fadeOut();
}

function toastFailure(message) {
  const toast = $('#toast-error');
  toast.find('span').text(message);
  toast.show().delay(2000).fadeOut();
}

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
        toastSuccess('Added to cart successfully');
      } else {
        toastFailure('Failed to add food to cart');
      }
    },
    error: function (xhr, status, error) {
      toastFailure('Failed to add food to cart');
    },
  });
}
