document.addEventListener('DOMContentLoaded', function () {

    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // Xử lý cập nhật số lượng sản phẩm
    document.querySelectorAll('.item-quantity').forEach(function (input) {
        input.addEventListener('change', function () {
            var cartItem = this.closest('.cart-item');
            var itemId = cartItem.getAttribute('data-id');
            var quantity = this.value;

            // Đảm bảo số lượng không nhỏ hơn 1
            if (quantity < 1) {
                quantity = 1;
                this.value = 1;
            }

            // Gửi yêu cầu AJAX để cập nhật số lượng
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/cart/update-quantity/' + itemId, true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

            xhr.onload = function () {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    cartItem.querySelector('.item-total').textContent = '$' + response.itemTotal;
                    document.getElementById('subtotal').textContent = '$' + response.subtotal;
                    document.getElementById('total').textContent = '$' + response.total;
                } else {
                    console.error("Error updating quantity");
                }
            };

            xhr.send(JSON.stringify({
                quantity: quantity
            }));
        });
    });


    // Xử lý xóa sản phẩm khỏi giỏ hàng
    document.querySelectorAll('.remove-item').forEach(function (button) {
        button.addEventListener('click', function () {
            var cartItem = this.closest('.cart-item');
            var itemId = this.getAttribute('data-id');

            // Gửi yêu cầu AJAX để xóa sản phẩm
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/cart/delete/' + itemId, true); // Sử dụng đường dẫn của bạn
            xhr.setRequestHeader('X-CSRF-TOKEN',
                '{{ csrf_token() }}'); // Đảm bảo bạn đã bao gồm token CSRF

            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Xử lý phản hồi từ server và cập nhật giao diện người dùng
                    cartItem.remove();
                    // Cập nhật lại tổng số và thông báo nếu giỏ hàng trống
                    // Bạn có thể thêm mã để cập nhật subtotal và total ở đây
                    var response = JSON.parse(xhr.responseText);
                    document.getElementById('subtotal').textContent = '$' + response
                        .subtotal;
                    document.getElementById('total').textContent = '$' + response.total;
                    console.log(response.cartCount);
                    if (response.cartCount == 0) {
                        var cartItems = document.getElementById('cart-items');
                        var cartTotals = document.getElementById('cart-totals');

                        // Kiểm tra nếu `cartItems` tồn tại
                        if (cartItems) {
                            // Tạo thông báo giỏ hàng trống
                            var emptyCart = document.createElement('div');
                            emptyCart.className = 'col-md-8';
                            emptyCart.innerHTML = `
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-center">Your cart is empty</h4>
                                    </div>
                                </div>
                            `;
                            // Thêm CSS height: 32.7vh cho class .col-md-8
                            emptyCart.style.height = '32.7vh';

                            // Thay thế phần hiển thị sản phẩm bằng thông báo giỏ hàng trống
                            cartItems.replaceWith(emptyCart);
                        }

                        // Kiểm tra nếu `cartTotals` tồn tại
                        if (cartTotals) {
                            cartTotals.remove();
                        }
                    }
                } else {
                    console.error("Error removing item");
                }
            };

            xhr.send();
        });
    });
});
