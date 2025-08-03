document.addEventListener('DOMContentLoaded', () => {
    // Botones para abrir los modales
    document.getElementById('btn-delivery').addEventListener('click', (e) => {
        e.preventDefault();
        document.getElementById('modal-delivery').style.display = 'block';
    });

    document.getElementById('btn-privacidad').addEventListener('click', (e) => {
        e.preventDefault();
        document.getElementById('modal-privacidad').style.display = 'block';
    });

    document.getElementById('btn-terminos').addEventListener('click', (e) => {
        e.preventDefault();
        document.getElementById('modal-terminos').style.display = 'block';
    });

    // Botones de cierre (X)
    document.querySelectorAll('.close-info').forEach(btn => {
        btn.addEventListener('click', () => {
            const modalId = btn.getAttribute('data-modal');
            document.getElementById(modalId).style.display = 'none';
        });
    });

    // Cerrar al hacer clic fuera del contenido
    window.addEventListener('click', e => {
        document.querySelectorAll('.modal-info').forEach(modal => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
});
