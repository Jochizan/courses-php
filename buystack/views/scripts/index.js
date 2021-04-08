let fileName = window.location.pathname;
let valueName = "";
for (let i = fileName.length - 1; i >= 0; i--) {
  if (fileName[i] !== "/") {
    if (valueName === "php.") {
      valueName = "";
    }
    valueName += fileName[i];
  } else {
    break;
  }
}
valueName = valueName.split("");
valueName = valueName.reverse();
valueName = valueName.join("");

const carShopHeader = () => {
  $.ajax({
    type: "POST",
    url: "../api/api-carrito.php?action=mostrar",
    contentType: false,
    processData: false,
    success: (data) => {
      console.log(data);
      data = JSON.parse(data);
      console.log(data.DOM);
      $("#count-car").html(data.info.count);
      if (data.info.count > 0) {
        document.getElementById("cant-car").innerHTML
          += `<div class="qty">${data.info.count}</div>`;
        document.getElementById("cart-summary").innerHTML
          = `<small id="cant-summary"></small>
            <h5 id="price-subtotal"></h5>`;
      } else {
        document.getElementById("cant-car").innerHTML =
          `<i class="fa fa-shopping-cart"></i>
                    <span>Tu carrito</span>`;
        document.getElementById("cart-summary").innerHTML
          += `<p style="font-size: 18px; font-weight: bold;">Tu carrito esta vacío</p>`
      }
      if (data.info.total > 0) {
        $("#price-subtotal").html("Total: S/." + data.info.total);
        $("#price-subtotal").css("font-size", "20px");
        $("#price-subtotal").css("margin-left", "22.5%");
      } else {
        $("#price-subtotal").html("");
      }
      $("#cart-list").html(data.DOMheader);
      $("#buyToTal").html("S/. " + data.info.total);
      $("#orders").html(data.DOM);
    }
  })
}

const listAll = () => {
  $.ajax({
    type: "POST",
    url: "../ajax/articulo.php?op=listarIndex",
    contentType: false,
    processData: false,
    success: (data) => {
      data = JSON.parse(data);
      console.log(data.DOM);
      let todo = "";
      for (let i = 0; i < data.DOM.length; i++) {
        todo += data.DOM[i];
      }
      $("#listIndex").html(todo);
    }
  })
}

const addCar = (articulo) => {
  bootbox.prompt({
    size: "50",
    value: "number",
    inputType: "number",
    title: "¿Cuál es la cantidad que quiere agregar a su carro?",
    callback: (result) => {
      if (result) {
        $.post(`../api/api-carrito.php?action=addTheNumber&id=${articulo}&cantidad=${result}`,
          (e) => {
            bootbox.alert(e);
            if (valueName === "car") {
              table.ajax.reload();
            }
            carShopHeader();
          });
      }
    }
  })
  $("#main-body").css("padding", "0");
}

const removeCar = (articulo) => {
  bootbox.prompt({
    size: "50",
    value: "number",
    inputType: "number",
    title: "¿Cuál es la cantidad que quiere quitar de su carro?",
    callback: (result) => {
      if (result) {
        $.post(`../api/api-carrito.php?action=removeTheNumber&id=${articulo}&cantidad=${result}`,
          (e) => {
            bootbox.alert(e);
            if (valueName === "car") {
              table.ajax.reload();
            }
            carShopHeader();
          });
      }
    }
  })
  $("#main-body").css("padding", "0");
}

const addCarOne = (articulo) => {
  bootbox.confirm("¿Esta seguro de agregar este articulo?",
    (result) => {
      if (result) {
        $.post(`../api/api-carrito.php?action=add&id=${articulo}`,
          (e) => {
            bootbox.alert(e);
            carShopHeader();
          });
      }
    }
  )
  $("#main-body").css("padding", "0");
}

const removeCarOne = (articulo) => {
  bootbox.confirm("¿Esta seguro de quitar este articulo?",
    (result) => {
      if (result) {
        $.post(`../api/api-carrito.php?action=remove&id=${articulo}`,
          (e) => {
            bootbox.alert(e);
            carShopHeader();
          });
      }
    })
  $("#main-body").css("padding", "0");
}

const limpiarCarrito = () => {
  $.ajax({
    type: "GET",
    url: '../api/api-carrito.php?action=emptyCar',
    success: (data) => {
      console.log(data);
    }
  })
}

if (valueName === "index") {
  listAll();
}

if (valueName === "verificador") {
  limpiarCarrito();
}

carShopHeader();
