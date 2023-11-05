function deleteCart(cart_id) {
  if (confirm("Are you sure you want to delete this record?")) {
    document.getElementById(`deleteCart-${cart_id}`).submit();
  }
}
