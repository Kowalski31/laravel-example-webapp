document.addEventListener('DOMContentLoaded', function () {
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        card.addEventListener('click', function (event) {
            // Prevent navigation if 'Add to Cart' button is clicked
            if (event.target.classList.contains('add-to-cart-btn')) {
                return;
            }

            const productId = card.getAttribute('data-product-id');
            window.location.href = `product_detail/${productId}`;

        });
    });
});
