$('#form').on("submit", (e) => {
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: 'proveedor/insertarProveedor.php',
    data: $('#form').serialize(),
    beforeSend: () => {
      alert("Bienvenido a Mochon Articulos!!!!!!!!!!!!!!!");
    },
    success: () => {
      alert('Felicidades, nuevo proveedor añadido');
    },
    error: (error) => {
      alert('Error al añadir al nuevo proveedor ' + error.status);
    },
  });
});