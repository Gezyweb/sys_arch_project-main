const categoryButtons = document.querySelectorAll('.category-button');

categoryButtons.forEach(button => {
  button.addEventListener('click', function() {
    const productContainer = document.querySelector(`.product-container[data-product-container="${this.dataset.productContainer}"]`);
    
    // Deactivate all product containers
    document.querySelectorAll('.product-container').forEach(container => container.classList.remove('active'));
    
    // Activate the clicked product container
    productContainer.classList.add('active');
    
    // (Optional) Remove active class from other category buttons
    document.querySelectorAll('.category-button.active').forEach(button => button.classList.remove('active'));
    // Add active class to the clicked button
    this.classList.add('active');
  });
});