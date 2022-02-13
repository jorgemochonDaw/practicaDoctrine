$('#fomrArticulo').on("submit", (e) => {
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: 'articulo/insertarArticulo.php',
    data: $('#fomrArticulo').serialize(),
    success: () => {
      alert('Felicidades, nuevo articulo añadido');
    },
    error: (error) => {
      alert('Error al añadir el nuevo articulo ' + error.status);
    },
  });
});