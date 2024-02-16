function calculatePrice(){
  let quantity = Number(document.getElementById('quantity').value)
  let price = Number(document.getElementById('price').value)

  switch(quantity){
    case 1:
      discount = 0
      break;
    case 2:
      discount = 10
      break;
    case 3:
      discount = 15
      break;
    case 4:
      discount = 20
      break;
    case 5:
      discount = 25
      break;
    default:
      discount = 25
      break;
  }

  let totalPrecio = price - ((discount * price) / 100)
document.getElementById('totalPrecio').innerHTML = totalPrecio
}