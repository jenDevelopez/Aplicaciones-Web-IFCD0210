function generarBebida() {

  const bebidas = [
    "Café con leche",
    "Té verde con miel",
    "Chocolate caliente a la taza",
    "Mate cocido",
    "Infusion de manzanilla",
    "Chai latte",
    "Té de jengibre y limón",
    "Café americano",
    "Capuchino",
    "Té negro con leche",
    "Agua mineral con gas",
    "Limonada",
    "Zumo de naranja natural",
    "Smoothie de frutas tropicales",
    "Granizado de café",
    "Cerveza fría",
    "Refresco de cola",
    "Té helado",
    "Agua de coco",
    "Batido de chocolate",
    "Sangría",
    "Cóctel Margarita",
    "Mojito"
  ]
  const container = document.querySelector('.container')

  const opcion = Number(document.getElementById("opcion").value)
  const ol = document.createElement("ol");
  const li = document.createElement("li");
  container.appendChild(ol);

  for (let i = 0; i < bebidas.length; i++) {
    if (i === opcion -1) {
      ol.appendChild(li);
      li.innerHTML = "Tu bebida es " + bebidas[i];
    }
  }


}