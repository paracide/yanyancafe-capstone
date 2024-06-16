/**
 * Show successful toast message and hide it after 2 seconds
 * @param message
 */
function toastSuccess(message) {
  const toast = $('#toast-info');
  toast.find('span').text(message);
  toast.show().delay(2000).fadeOut();
}

/**
 * Show failure toast message and hide it after 2 seconds
 * @param message
 */
function toastFailure(message) {
  const toast = $('#toast-error');
  toast.find('span').text(message);
  toast.show().delay(2000).fadeOut();
}

/**
 * send ajax request to add food to cart
 * @param menuId
 */
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
