<?php
session_start();
$isLoggedIn = isset($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>El Rincón del Estudiante</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/62c62d2765.js" crossorigin="anonymous"></script>
</head>

<body>
  <script>
  const usuarioLogueado = <?php echo isset($_SESSION['usuario']) ? 'true' : 'false'; ?>;
  console.log('¿Está logueado?', usuarioLogueado); // 👈 Para verificar
  </script>
  
  <header class="main-header">
    <div class="header-container">
      <div class="logo-container">
        <img src="images/imagenes libreria/logo-final.png" alt="logo" class="logo">
        <h1 class="site-title">Librería El Rincón del Estudiante</h1>
      </div>
      
      <nav class="main-nav">
        <ul class="nav-links">
          <li><a class="Nav1" href="index.php">Inicio</a></li>
          <li><a class="Nav1" href="literatura.php">Literatura</a></li>
          <li><a class="Nav1" href="sobre_nosotros.php">Sobre nosotros</a></li>
        </ul>
      </nav>
      
      <?php if (isset($_SESSION['usuario'])): ?>
        <a href="logout.php" class="btn-login cerrar-sesion">Cerrar Sesión</a>
        <?php else: ?>
          <button class="btn-login" onclick="document.getElementById('login-modal').style.display='block'">
            Iniciar Sesión
          </button>
        <?php endif; ?>
      
      <button class="btn-carrito" id="carrito-btn">
        <img src="./images/imagenes literatura/carrito-logo.png" alt="carrito" width="30">
        <span id="carrito-contador" class="contador-carrito">0</span>
      </button>

    </div>
  </header>
  
  <div id="carrito-modal" class="modal">
    <div class="modal-content">
      <span class="close-btn" id="close-modal">&times;</span>
      <h2>🛒 Tu Carrito</h2>
      <ul id="carrito-list">

      </ul>
      
      <div class="carrito-total">
        <strong>Total:</strong>
        <span id="carrito-modal-total">S/ 0.00</span>
      </div>
      
      <div class="botones-carrito">
        <button class="btn-vaciar">Vaciar Carrito</button>
        <button class="btn-pagar">Pagar</button>
      </div>
    </div>
  </div>
  
  <div id="login-modal" class="modal">
    <div class="modal-content">
      <span onclick="document.getElementById('login-modal').style.display='none'" class="close">&times;</span>
      <h2>Iniciar Sesión</h2>
      
      <form id="login-form">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Contraseña:</label>
        <div style="position: relative;">
          <input type="password" id="password" name="password" required style="width: 100%; padding-right: 40px;">
          <button type="button" id="toggle-password" style="position: absolute; right: 8px; top: 40%; transform: translateY(-50%); background: none; border: none; cursor: pointer;">
            <img src="images/icons/ojoCerrado.png" alt="Mostrar/Ocultar" id="icono-password" style="width: 24px; height: 24px;">
          </button>
        </div>
        
        <button type="submit">Ingresar</button><br>
        
        <p style="margin-top: 20px; font-size: 1rem; font-family: 'Montserrat', sans-serif; color: #333;">
          ¿Eres nuevo por aquí? <strong>Regístrate</strong>
        </p>
        <button type="button" class="btn-modal" onclick="window.location.href='registrar_usuario.html'">Registrarse</button>
      </form>
      <p id="login-error" style="color:red; margin-top:10px;"></p>
    </div>
  </div>
  
  <script>
  document.getElementById("toggle-password").addEventListener("click", function () {
    const passwordInput = document.getElementById("password");
    const icono = document.getElementById("icono-password");
    
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      icono.src = "images/icons/ojoAbierto.png";
    } else {
      passwordInput.type = "password";
      icono.src = "images/icons/ojoCerrado.png";
    }
  });
  </script>
  
  <script>
  document.getElementById("login-form").addEventListener("submit", function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    const errorMsg = document.getElementById("login-error");
    
    fetch("login.php", {
      method: "POST",
      body: formData
    })
    .then(response => response.text())
    .then(data => {
      const response = data.trim();
      if (response === "success") {
        window.location.href = "index.php";
      } else if (response === "Usuario no encontrado") {
        errorMsg.textContent = "⚠️ Usuario inválido";
      } else {
        errorMsg.textContent = "⚠️ " + response;
      }
    })
    .catch(error => {
      console.error("Error:", error);
      errorMsg.textContent = "⚠️ Error en el servidor.";
    });
  });
  </script>
  
  <section class="banner">
    <div class="content-banner">
      <p>Material escolar y más</p>
      <h2>Librería El Rincón<br />del Estudiante</h2>
      <a href="#productos" class="btn btn-dark">Comprar ahora</a>
    </div>
  </section>
  
  <main class="main-content">
    <section class="container container-features">
      <div class="card-feature">
        <i class="fa-solid fa-motorcycle"></i>
        <div class="feature-content">
          <span>Envíos Gratuitos a todo el distrito</span>
          <p>En compras Mayor a S/.100</p>
        </div>
      </div>
      <div class="card-feature">
        <i class="fa-solid fa-wallet"></i>
        <div class="feature-content">
          <span>Targetas de Regalo Especial</span>
          <p>Ofrecemos Bonos de Regalos</p>
        </div>
      </div>
      <div class="card-feature">
        <i class="fa-solid fa-gift"></i>
        <div class="feature-content">
          <span>Reembolsos Con Boleta</span>
          <p>Devolución de dinero 100% garantizada</p>
        </div>
      </div>
      <div class="card-feature">
        <i class="fa-solid fa-headset"></i>
        <div class="feature-content">
          <span>Servicio al cliente 24/7</span>
          <p>Llámenos al 989-908-457</p>
        </div>
      </div>
    </section>
    
    <!-- Continúa el contenido original -->
    <section class="header-content">
      <div class="Lema-txt">
        <br><h4>✨ El Rincón del Estudiante: Todo lo que necesitas para tu éxito académico</h4><br>
      </div>
      
      <div class="header-txt">
        <p><br>
          En El Rincón del Estudiante encontrarás una amplia variedad de artículos escolares pensados para acompañarte en cada etapa de tu formación. Contamos con lapiceros borrables, cuadernos A4, folders manila y lápices escolares, ideales para tus clases del día a día.
          Si lo tuyo es la creatividad, tenemos plumones de colores, témperas escolares, gomas blancas y un práctico set de geometría para todos tus proyectos. También ofrecemos tijeras seguras y cintas adhesivas resistentes, esenciales para tus trabajos manuales.
          Cada producto ha sido seleccionado por su calidad, utilidad y precio accesible, garantizando que tengas siempre a la mano lo mejor para estudiar, crear y crecer.
          📚 Más que útiles escolares, somos tu mejor aliado en el camino al éxito académico.
        </p><br>
      </div>
      
      <main class="Menu_producto" id="productos">
        <div class="Titulo-producto">
          <br><h2>🛍️ Sección de Artículos Escolares</h2><br>
        </div>
        
        <div class="Producto">
          <p><br>
            En El Rincón del Estudiante encontrarás todo lo que necesitas para tu día a día escolar, universitario o
            profesional. Desde útiles escolares, libros y material de oficina, hasta productos de arte y tecnología básica.
            Contamos con artículos de calidad y a los mejores precios, pensados para acompañarte en cada etapa de tu aprendizaje.
            </p><br>
        </div>
        
        <div class="box-container-1">
          <div class="box-1 item">
            <div class="Contenido">
              <h2 class="titulo-item">🖊 Paquete de lapiceros</h2><br>
              <p class="descri">Descripción: Paquete de 4 lapiceros (2 azules, 1 negro y 1 rojo)</p><br>
              <div class="Iconos">
                <span class="precio-item">S/ 4.90</span><br><br>
              </div>
            </div>
        
            <div class="Imagen">
              <img class="img-item img-ajustada" src="images/imagenes libreria/lapiceros.png" alt="Lapiceros">
            </div><br>
            <br><button class="boton-item">Agregar al carrito</button>
          </div>
          
          <div class="box-1 item">
            <div class="Contenido">
              <h2 class="titulo-item">🗂️ Folders Manila A4</h2><br>
              <p class="descri">Descripción: Folder de cartulina manila tamaño A4, ideal para archivar documentos.</p><br>
              <div class="Iconos">
                <span class="precio-item">S/ 0.80</span><br><br>
              </div>
            </div>
            <div class="Imagen">
              <img class="img-item img-ajustada" src="images/imagenes libreria/folder manila.png" alt="Folders">
            </div><br>
            <br><button class="boton-item">Agregar al carrito</button>
          </div>

    <div class="box-1 item">
        <div class="Contenido">
            <h2 class="titulo-item">🧽 Borrador Faber-Castell PVC-Free</h2><br>
            <p class="descri">Descripción: Borrador sin PVC que elimina trazos sin dañar el papel.</p><br>
            <div class="Iconos">
                <span class="precio-item">S/ 1.50</span><br><br>
            </div>
        </div>
        <div class="Imagen">
            <img class="img-item img-ajustada" src="images/imagenes libreria/borrador.png" alt="Borrador Faber-Castell">
        </div><br>
         <br><button class="boton-item">Agregar al carrito</button>
    </div>

    <div class="box-1 item">
        <div class="Contenido">
            <h2 class="titulo-item">📘 Cuadernos Cuadriculados A4</h2><br>
            <p class="descri">Descripción: Cuaderno grapado de 76 hojas cuadriculadas, tamaño A4.</p><br>
            <div class="Iconos">
                <span class="precio-item">S/ 3.51</span><br><br>
              
            </div>
        </div>
        <div class="Imagen">
            <img class="img-item img-ajustada" src="images/imagenes libreria/cuaderno.png" alt="Cuaderno">
        </div><br>
         <br><button class="boton-item">Agregar al carrito</button>
    </div>

    <div class="box-1 item">
        <div class="Contenido">
            <h2 class="titulo-item">📌 Cintas Adhesivas Escolares</h2><br>
            <p class="descri">Descripción: Cinta transparente ideal para uso escolar y de oficina.</p><br>
            <div class="Iconos">
                <span class="precio-item">S/ 1.80</span><br><br>
       
            </div>
        </div>
        <div class="Imagen">
            <img class="img-item img-ajustada" src="images/imagenes libreria/cinta adesiva.png" alt="Cinta">
        </div>
         <br><button class="boton-item">Agregar al carrito</button>
    </div>

    <div class="box-1 item">
        <div class="Contenido">
            <h2 class="titulo-item">🖍️ Plumones Jumbo 10 colores</h2><br>
            <p class="descri">Descripción: Plumones con tinta lavable, seguros para niños y proyectos escolares.</p><br>
            <div class="Iconos">
                <span class="precio-item">S/ 11.90</span><br><br>
            </div>
        </div>
        <div class="Imagen">
            <img class="img-item img-ajustada" src="images/imagenes libreria/plumones.png" alt="Plumones">
        </div><br>
         <br><button class="boton-item">Agregar al carrito</button>
    </div>

    <div class="box-1 item">
        <div class="Contenido">
            <h2 class="titulo-item">✂️ Tijeras Escolares</h2><br>
            <p class="descri">Descripción: Tijera de 5 pulgadas para uso escolar.</p><br>
            <div class="Iconos">
                <span class="precio-item">S/ 3.50</span><br><br>
            </div>
        </div>
        <div class="Imagen">
            <img class="img-item img-ajustada" src="images/imagenes libreria/tijeras.png" alt="Tijeras">
        </div><br>
         <br><button class="boton-item">Agregar al carrito</button>
    </div>

    <div class="box-1 item">
        <div class="Contenido">
            <h2 class="titulo-item">🖍️ Resaltadores Faber-Castell</h2><br>
            <p class="descri">Descripción: Pack de resaltadores con punta biselada, ideales para subrayar textos.</p><br>
            <div class="Iconos">
                <span class="precio-item">S/ 9.90</span><br><br>
            </div>
        </div>
        <div class="Imagen">
            <img class="img-item img-ajustada" src="images/imagenes libreria/resaltador.png" alt="Resaltadores">
        </div><br>
         <br><button class="boton-item">Agregar al carrito</button>
    </div>

    <div class="box-1 item">
        <div class="Contenido">
            <h2 class="titulo-item">🎨 Témperas Escolares</h2><br>
            <p class="descri">Descripción: Set de témperas de 6 colores básicos para trabajos escolares.</p><br>
            <div class="Iconos">
                <span class="precio-item">S/ 6.90</span><br><br>
            </div>
        </div>
        <div class="Imagen">
            <img class="img-item img-ajustada" src="images/imagenes libreria/temperas.png" alt="Temperas">
        </div><br>
         <br><button class="boton-item">Agregar al carrito</button>
    </div>

    <div class="box-1 item">
        <div class="Contenido">
            <h2 class="titulo-item">📐 Set de Geometría</h2><br>
            <p class="descri">Descripción: Incluye regla, escuadra, transportador y cartabón.</p><br>
            <div class="Iconos">
                <span class="precio-item">S/ 4.50</span><br><br>
            </div>
        </div>
        <div class="Imagen">
            <img class="img-item img-ajustada" src="images/imagenes libreria/reglas.png" alt="Reglas">
        </div><br>
         <br><button class="boton-item">Agregar al carrito</button>
    </div>

    <div class="box-1 item">
        <div class="Contenido">
            <h2 class="titulo-item">🧴 Goma Blanca Escolar</h2><br>
            <p class="descri">Descripción: Adhesivo líquido blanco, ideal para papel y cartón.</p><br>
            <div class="Iconos">
                <span class="precio-item">S/ 3.80</span><br><br>
            </div>
        </div>
        <div class="Imagen">
            <img class="img-item img-ajustada" src="images/imagenes libreria/goma.png" alt="Goma">
        </div><br>
         <br><button class="boton-item">Agregar al carrito</button>
    </div>

    <div class="box-1 item">
        <div class="Contenido">
            <h2 class="titulo-item">✏️ Lápices Escolares</h2><br>
            <p class="descri">Descripción: Lápices escolares básicos, ideales para escritura diaria.</p><br>
            <div class="Iconos">
                <span class="precio-item">S/ 8.90</span><br><br>
            </div>
        </div>
        <div class="Imagen">
            <img class="img-item img-ajustada" src="images/imagenes libreria/lapizes.png" alt="Lápices">
        </div><br>
         <br><button class="boton-item">Agregar al carrito</button>
    </div>
</div>





 <section class="container blogs">
  <h1 class="heading-1">Últimos Blogs</h1>

  <div class="container-blogs">
    <div class="card-blog">
      <div class="container-img">
        <img src="images/imagenes libreria/blog1.jpg" alt="Imagen Blog 1" />
      </div>
      <div class="content-blog">
        <h3>🧠 Técnicas de Estudio que Realmente Funcionan</h3>
        <span>25 Julio 2025</span>
        <p>
          ¿Estudias mucho pero no logras recordar lo aprendido? No estás solo. Prueba estas técnicas:
          <br><br>
          • <strong>Pomodoro:</strong> estudia 25 minutos y descansa 5.<br>
          • <strong>Mapas mentales:</strong> organiza ideas visualmente.<br>
          • <strong>Autoevaluaciones:</strong> hacer preguntas mejora la retención.<br><br>
          El secreto está en estudiar con intención y constancia.
        </p>
      </div>
    </div>

    <div class="card-blog">
      <div class="container-img">
        <img src="images/imagenes libreria/blog2.jpeg" alt="Imagen Blog 2" />
      </div>
      <div class="content-blog">
        <h3>❌ Errores Comunes al Estudiar (y Cómo Evitarlos)</h3>
        <span>20 Marzo 2025</span>
        <p>
          Estudiar no es solo leer por horas. Aquí algunos errores frecuentes:
          <br><br>
          • <strong>Subrayar todo:</strong> subraya solo lo esencial.<br>
          • <strong>Estudiar sin pausas:</strong> el cerebro necesita descansos.<br>
          • <strong>Descuidar el sueño:</strong> dormir refuerza la memoria.<br><br>
          Corregir estos hábitos mejora notablemente tu rendimiento académico.
        </p>
      </div>
    </div>

    <div class="card-blog">
      <div class="container-img">
        <img src="images/imagenes libreria/blog3.jpg" alt="Imagen Blog 3" />
      </div>
      <div class="content-blog">
        <h3>🎤 ¿Te Tocó Exponer? Consejos para Hablar con Seguridad</h3>
        <span>15 Abril 2025</span>
        <p>
          Exponer no tiene por qué dar miedo. Aquí unos consejos útiles:
          <br><br>
          • Practica frente a un espejo o grábate.<br>
          • Resume tu exposición en 3 ideas clave.<br>
          • Respira profundo antes de hablar.<br><br>
          Recuerda: no necesitas ser perfecto, solo claro y seguro.
        </p>
      </div>
    </div>

    <div class="card-blog">
      <div class="container-img">
        <img src="images/imagenes libreria/blog4.jpg" alt="Imagen Blog 4" />
      </div>
      <div class="content-blog">
        <h3>📘 ¿Por Qué Usar Cuadernos A4 Mejora tu Estudio?</h3>
        <span>10 Mayo 2025</span>
        <p>
          Los cuadernos A4 no solo ofrecen más espacio, también son prácticos:
          <br><br>
          • Permiten tomar apuntes más ordenados.<br>
          • Ideales para mapas mentales y esquemas.<br>
          • Puedes pegar hojas sin recortar.<br><br>
          El formato influye directamente en tu organización y comprensión.
        </p>
      </div>
    </div>
  </div>
</section>

    </main>

    

    <footer class="footer">
			<div class="container container-footer">
				<div class="menu-footer">
					<div class="contact-info">
						<p class="title-footer">Información de Contacto</p>
						<ul>
							 <p><strong>Dirección: </strong>Av. Los Ciruelos Mz "C" Lt "30" Canto Rey, Lima, Perú</p>
            <p><strong>Teléfono: </strong>+51 982 785 587
                        <a href="https://api.whatsapp.com/send?phone=+51982785587&text=Hola, estoy interesado en comprar productos!" target="_blank">
                            Escríbenos por WhatsApp
                        </a>
                    </p>
                    <p><strong>Email: </strong>elrincondelestudiante.contacto@gmail.com</p>
                    <p><strong>Horario: </strong>Lunes a Sábado, 7:00 am - 7:30 pm</p>
						</ul>
                        <p class="title-footer">Nuestras redes sociales </p>
						<div class="social-icons">
                            <a href="https://www.facebook.com/LibreriaElRinconDelEstudiante" target="_blank" class="facebook">
                        <i class="fa-brands fa-facebook"></i>
                             </a>
    
                            <a href="https://api.whatsapp.com/send?phone=+51982785587&text=Hola, estoy interesado en comprar productos!" target="_blank" class="WhatsApp">
                        <i class="fa-brands fa-whatsapp"></i>
                             </a>
                        </div>
					</div>

					<div class="information">
						<p class="title-footer">Información</p>
						<ul>
							<li><a href="sobre_nosotros.html">Acerca de Nosotros</a></li>
							<li><a href="#" id="btn-delivery">Información Delivery</a></li>
              <li><a href="#" id="btn-privacidad">Políticas de Privacidad</a></li>
              <li><a href="#" id="btn-terminos">Términos y Condiciones</a></li>
						</ul>
					</div>
				</div>

				<div class="copyright">
					<p>
						© 2025 El Rincón del Estudiante. Angel Dante Rodrigo Equipo N°1. Todos los derechos reservados.
					</p>

					<img src="images/imagenes libreria/payment.png" alt="Pagos">
				</div>
			</div>
		</footer>

    <!-- Modal: Información Delivery -->
    <div id="modal-delivery" class="modal-info">
      <div class="modal-content-info">
       <span class="close-info" data-modal="modal-delivery">&times;</span>
       <h2>Información Delivery</h2>
          <p>
              Realizamos entregas a todo Lima y provincias. Los pedidos confirmados antes de las 3:00 pm se despachan el mismo día hábil. El tiempo de llegada depende del destino:
              <br><br>
              • <strong>Lima Metropolitana:</strong> 24 a 48 horas.<br>
              • <strong>Provincias:</strong> 3 a 5 días hábiles vía agencia de transporte.<br><br>
        
              <strong>Costos de envío aproximados:</strong><br>
              • Lima: S/ 6.00 – S/ 10.00 según distrito.<br>
              • Provincias: desde S/ 10.00 vía Olva Courier u otra agencia.<br><br>
        
              <strong>Horarios de entrega:</strong><br>
              • Lunes a Sábado: 9:00 am a 6:00 pm.<br>
              (No realizamos entregas domingos ni feriados)<br><br>
        
              <strong>Seguimiento:</strong><br>
              Te notificaremos por WhatsApp o email cuando tu pedido haya sido enviado, junto con el número de seguimiento si aplica.<br><br>
        
              <strong>Recomendación:</strong> Verifica tus datos de dirección y contacto antes de confirmar tu compra. No nos hacemos responsables por entregas fallidas debido a datos incorrectos.
          </p>
      </div>
    </div>

    <!-- Modal: Políticas de Privacidad -->
   <div id="modal-privacidad" class="modal-info">
      <div class="modal-content-info">
          <span class="close-info" data-modal="modal-privacidad">&times;</span>
          <h2>Políticas de Privacidad</h2>
          <p>
              En El Rincón del Estudiante tu privacidad es una prioridad. Recopilamos datos mínimos necesarios para garantizar un buen servicio. Esto incluye:
              <br><br>
              • Nombre completo<br>
              • Teléfono y correo electrónico<br>
              • Dirección de entrega<br><br>
            
              <strong>¿Para qué usamos tu información?</strong><br>
              • Procesar y entregar tus pedidos.<br>
              • Enviarte confirmaciones, actualizaciones o promociones (solo si lo permites).<br>
              • Atender consultas o reclamos relacionados con tus compras.<br><br>
            
              <strong>Seguridad:</strong><br>
              Toda la información se guarda en servidores protegidos. No compartimos tus datos con terceros, salvo que sea necesario para cumplir con obligaciones legales o de entrega.<br><br>
            
              <strong>Derechos del usuario:</strong><br>
              Tienes derecho a acceder, modificar o eliminar tus datos personales en cualquier momento. Para hacerlo, contáctanos a:<br>
              <strong>elrincondelestudiante.contacto@gmail.com</strong><br><br>
            
              Tu confianza es lo más importante. Por eso manejamos tu información con total transparencia y responsabilidad.
          </p>
      </div>
    </div>

            <!-- Modal: Términos y Condiciones -->
    <div id="modal-terminos" class="modal-info">
      <div class="modal-content-info">
          <span class="close-info" data-modal="modal-terminos">&times;</span>
          <h2>Términos y Condiciones</h2>
          <p>
              Al realizar una compra en nuestro sitio aceptas estos términos:
              <br><br>
            
              <strong>1. Precios y disponibilidad:</strong><br>
              Todos los precios están en soles peruanos (S/). Los productos están sujetos a disponibilidad de stock y pueden variar sin previo aviso.<br><br>
            
              <strong>2. Confirmación de pedidos:</strong><br>
              Todo pedido será confirmado por un asesor vía WhatsApp o email. Si no se obtiene respuesta dentro de 48 h, puede ser cancelado automáticamente.<br><br>
            
              <strong>3. Métodos de pago aceptados:</strong><br>
              - Yape / Plin<br>
              - Transferencia bancaria (Interbank / BCP)<br>
              - Contra entrega (Lima)<br><br>
            
              <strong>4. Cambios y devoluciones:</strong><br>
              Solo se aceptan cambios por error de producto o daños de fábrica. El cliente tiene 48 horas tras la recepción para reportarlo. El producto debe estar sin uso y en buen estado.<br><br>
            
              <strong>5. Propiedad intelectual:</strong><br>
              Todo el contenido de esta web, incluyendo logos, textos y productos, pertenece a El Rincón del Estudiante y no puede ser usado sin autorización previa.<br><br>
            
              Para cualquier consulta legal o reclamo, escríbenos a nuestro email de contacto.
          </p>
      </div>
    </div>
    
    <script src="carrito.js"></script>
    <script src="modales-footer.js"></script>
    
    <script>
    window.onclick = function(event) {
      const modal = document.getElementById('login-modal');
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>
</body>
</html>