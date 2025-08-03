/*document.getElementById('btn-cargar-mas').addEventListener('click', () => {
    const librosActuales = document.getElementById('libros-actuales');
    const librosNuevos = document.getElementById('libros-nuevos');

    // Ocultar libros actuales y mostrar nuevos
    librosActuales.style.display = 'none';
    librosNuevos.style.display = 'block';
});
  */
const btnCargar = document.querySelector('.btn-siguiente');
    let mostrandoExtras = false;

    btnCargar.addEventListener('click', function () {
        const librosPrincipales = document.querySelectorAll('.libro-seccion1');
        const librosExtra = document.querySelectorAll('.libro-extra');

        if (!mostrandoExtras) {
            // Oculta los libros principales
            librosPrincipales.forEach(libro => {
                libro.style.display = 'none';
            });
            // Muestra los libros extra
            librosExtra.forEach(libro => {
                libro.style.display = 'flex';
            });
            btnCargar.textContent = 'Mostrar Libros Anteriores';
        } else {
            // Muestra los libros principales
            librosPrincipales.forEach(libro => {
                libro.style.display = 'flex';
            });
            // Oculta los libros extra
            librosExtra.forEach(libro => {
                libro.style.display = 'none';
            });
            btnCargar.textContent = 'Mostrar Libros Siguientes';
        }

        mostrandoExtras = !mostrandoExtras;
    });