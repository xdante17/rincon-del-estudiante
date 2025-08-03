document.addEventListener('DOMContentLoaded', () => {
    const botonesAgregar = document.querySelectorAll('.boton-item');
    const contenedorCarrito = document.querySelector('#carrito-list'); // UL en el modal
    const totalCarrito = document.querySelector('#carrito-modal-total'); // span para el total
    const modal = document.getElementById('carrito-modal');
    const btnCerrar = document.getElementById('close-modal');
    const btnAbrirModal = document.getElementById('carrito-btn');

    botonesAgregar.forEach(boton => {
        boton.addEventListener('click', function(e) {
            if (typeof usuarioLogueado !== 'undefined' && !usuarioLogueado) {
                e.preventDefault();
                const loginModal = document.getElementById('login-modal');
                if (loginModal) {
                    loginModal.style.display = 'block';
                } else {
                    alert("Primero debes iniciar sesión para agregar productos al carrito.");
                }
                return;
            }
            agregarAlCarrito(e);
        });
    });

    btnAbrirModal.addEventListener('click', () => {
        modal.style.display = 'block';
    });

    btnCerrar.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', e => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    function cargarCarrito() {
        const data = localStorage.getItem('carrito');
        if (!data) return;
        const items = JSON.parse(data);
        items.forEach(item => {
            agregarProductoCarrito(item.titulo, item.precio.replace('S/ ', ''), item.imagen, item.cantidad);           
        });
    }

    function agregarAlCarrito(e) {
        const producto = e.target.closest('.item');
        const titulo = producto.querySelector('.titulo-item').innerText;
        const precio = producto.querySelector('.precio-item').innerText.replace('S/', '').replace('$', '').trim();
        const imagenSrc = producto.querySelector('.img-item').src;

        agregarProductoCarrito(titulo, precio, imagenSrc);
        actualizarTotal();
        actualizarContador();
        guardarCarrito();
    }

    function agregarProductoCarrito(titulo, precio, imagenSrc, cantidad = 1) {
        const nombresProductos = contenedorCarrito.querySelectorAll('.carrito-item-titulo');
    
        for (let nombre of nombresProductos) {
            if (nombre.innerText === titulo) {
                alert("Este producto ya está en el carrito.");
                return;
            }
        }
    
        const itemCarrito = document.createElement('div');
        itemCarrito.classList.add('carrito-item');
        itemCarrito.innerHTML = `
            <img src="${imagenSrc}" width="60" alt="">
            <div class="carrito-item-detalles">
                <span class="carrito-item-titulo">${titulo}</span>
                <span class="carrito-item-precio">S/ ${precio}</span>
                <input type="number" value="${cantidad}" class="carrito-item-cantidad">
            </div>
            <button class="btn-eliminar">X</button>
        `;
    
        contenedorCarrito.append(itemCarrito);
    
        itemCarrito.querySelector('.btn-eliminar').addEventListener('click', eliminarItemCarrito);
        itemCarrito.querySelector('.carrito-item-cantidad').addEventListener('change', cantidadCambiada);
    
        actualizarTotal();
        actualizarContador();
        guardarCarrito(); // 🟢 se guarda cada vez que agregas
    }

    function actualizarTotal() {
        let total = 0;
        const itemsCarrito = contenedorCarrito.querySelectorAll('.carrito-item');
    
        itemsCarrito.forEach(item => {
            const precioTexto = item.querySelector('.carrito-item-precio')?.innerText || 'S/ 0.00';
            const precio = parseFloat(precioTexto.replace('S/', '').trim()) || 0;
            const cantidad = parseInt(item.querySelector('.carrito-item-cantidad')?.value) || 1;
            total += precio * cantidad;
        });
    
        totalCarrito.innerText = 'S/ ' + total.toFixed(2);
    
        const btnPagar = document.querySelector('.btn-pagar');
        btnPagar.style.display = total > 0 ? 'inline-block' : 'none';
    }

    function actualizarContador() {
        const contador = document.getElementById('carrito-contador');
        const cantidadItems = contenedorCarrito.querySelectorAll('.carrito-item').length;
        if (cantidadItems > 0) {
            contador.style.display = 'inline-block';
            contador.innerText = cantidadItems;
        } else {
            contador.style.display = 'none';
            contador.innerText = '0';
        }
    }

    function eliminarItemCarrito(e) {
        e.target.closest('.carrito-item').remove();
        actualizarTotal();
        actualizarContador();
        guardarCarrito(); // 🟢 también al eliminar
    }

    function cantidadCambiada(e) {
        if (e.target.value <= 0) {
            e.target.value = 1;
        }
        actualizarTotal();
        guardarCarrito(); // 🟢 también al cambiar cantidad
    }

    function guardarCarrito() {
        const items = [];
        document.querySelectorAll('.carrito-item').forEach(item => {
            items.push({
                titulo: item.querySelector('.carrito-item-titulo').innerText,
                precio: item.querySelector('.carrito-item-precio').innerText,
                cantidad: item.querySelector('.carrito-item-cantidad').value,
                imagen: item.querySelector('img').src
            });
        });
        localStorage.setItem('carrito', JSON.stringify(items));
    }

    document.querySelector('.btn-pagar').addEventListener('click', () => {
        if (contenedorCarrito.children.length === 0) {
            alert('Tu carrito está vacío.');
            return;
        }
        alert('Gracias por tu compra 🛒');
        contenedorCarrito.innerHTML = '';
        actualizarTotal();
        actualizarContador();
        localStorage.removeItem('carrito'); // 🔴 limpia el storage
    });

    document.querySelector('.btn-vaciar').addEventListener('click', () => {
        if (contenedorCarrito.children.length === 0) {
            alert('El carrito ya está vacío.');
            return;
        }
        if (confirm('¿Deseas vaciar todo el carrito?')) {
            contenedorCarrito.innerHTML = '';
            actualizarTotal();
            actualizarContador();
        }
    });
    cargarCarrito();
});