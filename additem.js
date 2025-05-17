document.addEventListener("DOMContentLoaded", function () {
    const addToCartButtons = document.querySelectorAll(".add-to-cart");
  
    addToCartButtons.forEach(button => {
      button.addEventListener("click", function (e) {
        e.preventDefault();
  
        const itemName = this.getAttribute("data-item-name");
        const itemPrice = this.getAttribute("data-price");
  
        // Create item object
        const item = {
          name: itemName,
          price: itemPrice,
          image: './assets/images/guntur.jpg', // adjust if dynamic
          description: 'Fiery dry chicken fry made with the famous Guntur red chilies.'
        };
  
        // Get existing items or empty array
        let items = JSON.parse(localStorage.getItem("cartItems")) || [];
  
        // Add new item
        items.push(item);
  
        // Save to localStorage
        localStorage.setItem("cartItems", JSON.stringify(items));
  
        // Redirect to item.html
        window.location.href = "addcart.html";
      });
    });
  });
  