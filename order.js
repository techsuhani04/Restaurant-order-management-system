let cart = [];
let total = 0;

function addToCart(item, price) {
  cart.push({ item, price });
  total += price;

  const list = document.getElementById('cartList');
  list.innerHTML += `<li>${item} - ₹${price}</li>`;
  document.getElementById('totalAmount').innerText = total;
  document.getElementById('cartQty').innerText = cart.length;
}

function prepareOrder() {
  const name = document.getElementById("customerNameField").value.trim();
  if (!name) {
    alert("Please enter your name.");
    return false;
  }

  const itemList = cart.map(i => `${i.item} - ₹${i.price}`).join(", ");

  document.getElementById("itemsField").value = itemList;
  document.getElementById("totalField").value = total;
  document.getElementById("quantityField").value = cart.length;

  return true;
}
