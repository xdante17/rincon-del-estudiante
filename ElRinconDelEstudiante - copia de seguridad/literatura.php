<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Literatura</title>
    <link rel="stylesheet" href="style-literatura.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/62c62d2765.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="main-header">
        <div class="container header-container">
            <div class="logo-container">
                <img src="images/imagenes libreria/logo-final.png" alt="Logo" class="logo">
                <h1 class="site-title">Literatura</h1>
            </div>
            
            <nav class="main-nav">
                <ul class="nav-links">
                    <li><a class="Nav1" href="index.php">Inicio</a></li>
                    <li><a class="Nav1" href="literatura.php">Literatura</a></li>
                    <li><a class="Nav1" href="sobre_nosotros.php">Sobre nosotros</a></li>
                </ul>
            </nav>
            <button class="btn-pedido" onclick="document.getElementById('login-modal').style.display='block'">
                         Iniciar Sesión
            </button>
            <a href="#" class="btn-carrito" id="carrito-btn">
                <img src="./images/imagenes literatura/carrito-logo.png" alt="carrito" width="30">
                <span id="carrito-contador" class="contador-carrito">0</span>
            </a>
        </div>
    </header>
    
    <!-- Modal para el carrito -->
    <div id="carrito-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn" id="close-modal">&times;</span>
            <h2>🛒 Tu Carrito</h2>
            <ul id="carrito-list">
            
            
            <!-- Aquí se mostrarán los objetos del carrito -->

            

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

    <!-- Modal Login -->
     <div id="login-modal" class="modal">
  <div class="modal-content">
    <span onclick="document.getElementById('login-modal').style.display='none'" class="close">&times;</span>
    <h2>Iniciar Sesión</h2>
    <form id="login-form">
      <label for="username">Usuario:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" required>
 
      <button type="submit">Entrar</button>
    </form>
  </div>
</div>

<script>
document.getElementById("login-form").addEventListener("submit", function(e) {
  e.preventDefault();

  var formData = new FormData(this);

  fetch("login.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    if (data.trim() === "success") {
      window.location.href = "index.html";
    } else {
      alert(data);
    }
  })
  .catch(error => {
    console.error("Error:", error);
  });
});
</script>

<section class="banner-literatura">
  <div class="content-banner">
    <p>Explora mundos imaginarios</p>
    <h2>Descubre nuestra<br />colección de Literatura</h2>
    <a href="#productos">Ver libros</a>
  </div>
</section>


    <div class="header-content container">
            <div class="header-txt"><br>
                <h2>Tambien Ofrecemos:</h2>
                <p>
                    <br>En El Rincón del Estudiante encontrarás una amplia variedad de libros escolares pensados para acompañarte en tu etapa de aprendizaje.<br>
                    Contamos con los títulos más comunes y útiles en cualquier nivel educativo:<br>
                     •  Cuadernos de ejercicios para practicar lo aprendido.<br>
                     •  Libros de texto organizados por grado y materia (matemáticas, comunicación, ciencias, entre otros).<br>
                     •  Diccionarios y manuales de gramática, ideales para mejorar tu redacción y ortografía.<br>
                     •  Agendas escolares para que no pierdas de vista tus tareas y exámenes.<br>
                     •  Libros de literatura infantil y juvenil, que fomentan tu creatividad y gusto por la lectura.<br>
                    Todo lo que necesitas para estudiar mejor y alcanzar tus metas escolares lo encuentras aquí, en tu espacio de confianza: El Rincón del Estudiante.<br><br>
                </p>
            </div>

           

    <main class="Menu_producto" id="productos">
        <div class="contenedor">
            <div class="Producto">
                <h2 class="Titulo">🛍️ Sé Libre De Elegir</h2>
            </div>

            <div class="pro1 tab-content">
                <div class="box-container-1">
                    <div class="box-1 item libro-seccion1">
                        <div class="Contenido">
                            <h3 class="titulo-item">📚 Ficción: 1984 - George Orwell</h3><br>     
                            <p class="ficcion">Un clásico de la literatura distópica que explora temas de totalitarismo, vigilancia y control social.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/12.90</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>
                        
                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/1994.jpg" alt="">
                        </div>
                    </div>

                    <div class="box-1 item libro-seccion1">
                        <div class="Contenido">
                            <h3 class="titulo-item">📚 No Ficción: Sapiens De animales a dioses</h3><br>
                            <p class="no-ficcion">Un fascinante recorrido por la historia de la humanidad, desde nuestros ancestros hasta el presente.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/10.60</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>

                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/sapiensLibro.jpg" alt="">
                        </div>
                    </div>

                    <div class="box-1 item libro-seccion1">
                        <div class="Contenido">
                            <h3 class="titulo-item">📚 Novela: Cien años de soledad</h3><br>
                            <p class="novela1">Una obra maestra del realismo mágico que narra la historia de la familia Buendía a lo largo de varias generaciones.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/13.50</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>

                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/cienAños.jpg" alt="">
                        </div>
                    </div>

                    <div class="box-1 item libro-seccion1">
                        <div class="Contenido">
                            <h3 class="titulo-item">📚 Cuento: El Aleph - Jorge Luis Borges</h3><br>
                            <p class="cuento">Una colección de cuentos que exploran temas como el infinito, la memoria y la identidad.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/14.20</span><br>
                                <span class="valoracion">★★★★☆</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>

                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/aleph-borgues.jpg" alt="">
                        </div>
                    </div>

                    <div class="box-1 item libro-seccion1">
                        <div class="Contenido">
                            <h3 class="titulo-item">📚 Poesia: Veinte poemas de amor y una canción desesperada</h3><br>
                            <p class="poesia">Una de las obras más emblemáticas de Pablo Neruda, que combina el amor y la melancolía en versos inolvidables.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/9.90</span><br>
                                <span class="valoracion">★★★★☆</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>

                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/veintePoemas.png" alt="">
                        </div>
                    </div>

                    <div class="box-1 item libro-seccion1">
                        <div class="Contenido">
                            <h3 class="titulo-item">📚 Grámatica: Coquito Clásico</h3><br>
                            <p class="gramatica">Un libro de gramática que ofrece una introducción clara y concisa a las reglas del español.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/14.90</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>

                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/coquitoClasicon.jpg" alt="">
                        </div>
                    </div>

                    <div class="box-1 item libro-seccion1">
                        <div class="Contenido">
                            <h3 class="titulo-item">📚 Libro: Solucionario Matematico - 1er Grado</h3><br>
                            <p class="libro1">Un libro de soluciones matemáticas diseñado para ayudar a los estudiantes de primer grado a comprender mejor los conceptos básicos.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/8.90</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>

                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/solucionarioMatematico.png" alt="">
                        </div>
                    </div>

                    <div class="box-1 item libro-seccion1">                   
                        <div class="Contenido">
                            <h3 class="titulo-item">📚 Libro: Diccionario de Lengua Española</h3><br>
                            <p class="libro2">Un diccionario completo que ofrece definiciones, sinónimos y antónimos de palabras en español.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/9.90</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br></br>
                            </div>
                        </div>

                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/lenguaEspanola.jpg" alt="">
                        </div>
                    </div>

                    <div class="box-1 item libro-seccion1">
                        <div class="Contenido">
                            <h3 class="titulo-item">📚 Diccionario: Ingles & Español - COLLINS</h3><br>
                            <p class="diccionario1">Un diccionario bilingüe que facilita la comprensión y traducción entre el inglés y el español.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/10.90</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>

                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/espanoleIngles.jpg" alt="">
                        </div>
                    </div>

                    <div class="box-1 item libro-seccion1">
                        <div class="Contenido">
                            <h3 class="titulo-item">📚 Diccionario: Sinonimos y Antonimos</h3><br>
                            <p class="diccionario2">Un diccionario especializado que ayuda a enriquecer el vocabulario al ofrecer sinónimos y antónimos de palabras comunes.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/9.90</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>

                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/antonimoYSinonimos.jpg" alt="">
                        </div>
                    </div>

                    <div class="box-1 item libro-seccion1">
                        <div class="Contenido">
                            <h3 class="titulo-item">📚 Novela: Don Quijote de la Mancha</h3><br>
                            <p class="novela2">Una de las obras más importantes de la literatura española, que narra las aventuras de un caballero y su fiel escudero.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/15.90</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>

                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/donQuijote.jpg" alt="">
                        </div>
                    </div>

                    <div class="box-1 item libro-seccion1">
                        <div class="Contenido">
                            <h3 class="titulo-item">📚 Fábula: El Principito</h3><br>
                            <p class="fabula">Una hermosa fábula que narra la historia de un joven príncipe que viaja por diferentes planetas y aprende valiosas lecciones sobre la vida.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/10.90</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>

                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/principito.jpg" alt="">
                        </div>
                    </div>

                    <!-- SECCION 2 DE LIBROS -->

                    <div class="box-1 item libro-extra" style="display: none;">
                        <div class="Contenido">
                            <h3 class="titulo-item">📘 Comunicación Integral – 5to Primaria</h3><br>
                            <p class="ficcion">Libro escolar diseñado para fortalecer habilidades de comprensión lectora, redacción y gramática.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/ 12.00</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>
                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="images/imagenes literatura/comunicacionIntegral.png" alt="">
                        </div>
                    </div>
                    
                    <div class="box-1 item libro-extra" style="display: none;">
                        <div class="Contenido">
                            <h3 class="titulo-item">📗 Razonamiento Matemático – Nivel Secundaria</h3><br>
                            <p class="ficcion">Ejercicios de lógica, problemas matemáticos y estrategias de resolución paso a paso.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/ 11.50</span><br>
                                <span class="valoracion">★★★★☆</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>
                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/razonamientoMatematico.png" alt="">
                        </div>
                    </div>
                    
                    <div class="box-1 item libro-extra" style="display: none;">
                        <div class="Contenido">
                            <h3 class="titulo-item">📘 Ortografía y Redacción Práctica</h3><br>
                            <p class="ficcion">Manual práctico con normas ortográficas y ejercicios de redacción creativa.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/ 10.90</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>
                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/ortografiaPractica.jpg" alt="">
                        </div>
                    </div>
                    
                    <div class="box-1 item libro-extra" style="display: none;">
                        <div class="Contenido">
                            <h3 class="titulo-item">📙 Ciencia y Ambiente – 6to Primaria</h3><br>
                            <p class="ficcion">Libro escolar con experimentos, conceptos básicos de biología, física y medio ambiente.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/ 12.50</span><br>
                                <span class="valoracion">★★★★☆</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>
                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/Cyt6to.jpg" alt="">
                        </div>
                    </div>
                    
                    <div class="box-1 item libro-extra" style="display: none;">
                        <div class="Contenido">
                            <h3 class="titulo-item">📕 Historia del Perú Escolar – Resumida</h3><br>
                            <p class="ficcion">Recorrido ilustrado por las etapas históricas del Perú: desde Caral hasta la república actual.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/ 13.90</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>
                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/HdelPeruResumida.jpeg" alt="">
                        </div>
                    </div>
                    
                    <div class="box-1 item libro-extra" style="display: none;">
                        <div class="Contenido">
                            <h3 class="titulo-item">📗 Matemática 3er Grado Primaria</h3><br>
                            <p class="ficcion">Libro básico con sumas, restas, multiplicación, geometría y problemas contextualizados.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/ 9.50</span><br>
                                <span class="valoracion">★★★★☆</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>
                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/matematica3ro.png" alt="">
                        </div>
                    </div>
                    
                    <div class="box-1 item libro-extra" style="display: none;">
                        <div class="Contenido">
                            <h3 class="titulo-item">📘 Formación Ciudadana y Cívica – Secundaria</h3><br>
                            <p class="ficcion">Valores democráticos, ciudadanía activa y derechos humanos adaptados a nivel escolar.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/ 11.90</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>
                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/FCCSecu.jpg" alt="">
                        </div>
                    </div>
                    
                    <div class="box-1 item libro-extra" style="display: none;">
                        <div class="Contenido">
                            <h3 class="titulo-item">📙 Literatura Peruana – Antología Escolar</h3><br>
                            <p class="ficcion">Selección de cuentos, poemas y fragmentos de autores como Arguedas, Vallejo y Palma.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/ 14.00</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>
                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/antologia4.png" alt="">
                        </div>
                    </div>
                    
                    <div class="box-1 item libro-extra" style="display: none;">
                        <div class="Contenido">
                            <h3 class="titulo-item">📕 Comprensión Lectora Nivel Avanzado</h3><br>
                            <p class="ficcion">Lecturas desafiantes con preguntas de análisis, inferencia y deducción.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/ 10.00</span><br>
                                <span class="valoracion">★★★★☆</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>
                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/compresionLectoraAvanzado.jpeg" alt="">
                        </div>
                    </div>
                    
                    <div class="box-1 item libro-extra" style="display: none;">
                        <div class="Contenido">
                            <h3 class="titulo-item">📗 Coquito – Aprendo a Leer</h3><br>
                            <p class="ficcion">Clásico libro peruano para el aprendizaje de la lectura en niños pequeños.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/8.50</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>
                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/coquitoEscritura.png" alt="">
                        </div>
                    </div>
                    
                    <div class="box-1 item libro-extra" style="display: none;">
                        <div class="Contenido">
                            <h3 class="titulo-item">📙 Educación Física – Guía Escolar</h3><br>
                            <p class="ficcion">Ejercicios, calentamientos, rutinas y fundamentos deportivos para estudiantes.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/10.70</span><br>
                                <span class="valoracion">★★★★☆</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>
                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/educacion-fisica.png" alt="">
                        </div>
                    </div>
                    
                    <div class="box-1 item libro-extra" style="display: none;">
                        <div class="Contenido">
                            <h3 class="titulo-item">📕 Atlas Escolar del Perú y del Mundo</h3><br>
                            <p class="ficcion">Mapas actualizados, información geográfica y política adaptada al nivel primario y secundario.</p>
                            <div class="Iconos">
                                <span class="precio-item">S/14.90</span><br>
                                <span class="valoracion">★★★★★</span><br>
                                <button class="boton-item">Agregar al carrito</button><br><br>
                            </div>
                        </div>
                        <div class="Imagen">
                            <img class="img-item img-ajustada" src="./images/imagenes literatura/atlasYMundo.jpg" alt="">
                        </div>
                    </div>                    
                    
                </div>
             
            </div>

            

        </div>
        <div class="siguiente-libros">
        <button class="btn-siguiente">Mostrar Libros Siguientes</button>
        </div>

        <section class="container blogs">
            <h1 class="heading-1">Te Podría Interesar</h1>
        
            <div class="container-blogs">
                <div class="card-blog">
                    <div class="container-img">
                        <img src="./images/imagenes literatura/blog1.jpeg" alt="Imagen Blog 1" />
                    </div>
                    <div class="content-blog">
                        <h3>📖 ¿Por Qué Leer Mejora Tu Aprendizaje?</h3>
                        <span>25 Julio 2025</span>
                        <p>
                            La lectura no solo enriquece el vocabulario, también fortalece la mente:<br><br>
                            • <strong>Estimula la concentración:</strong> mejora tu atención y enfoque.<br>
                            • <strong>Potencia la memoria:</strong> seguir una trama activa tu retención.<br>
                            • <strong>Incrementa tu creatividad:</strong> imaginar escenarios mejora tu pensamiento.<br><br>
                            Leer a diario es una inversión en tu futuro académico y personal.
                        </p>
                    </div>
                </div>
        
                <div class="card-blog">
                    <div class="container-img">
                        <img src="./images/imagenes literatura/blog2.jpeg" alt="Imagen Blog 2" />
                    </div>
                    <div class="content-blog">
                        <h3>📚 Libros Escolares que Todo Estudiante Debería Tener</h3>
                        <span>20 Marzo 2025</span>
                        <p>
                            Algunos libros son esenciales en cualquier mochila escolar:<br><br>
                            • <strong>Diccionario escolar:</strong> indispensable para mejorar tu escritura.<br>
                            • <strong>Cuadernos de comprensión lectora:</strong> para analizar textos.<br>
                            • <strong>Libros de gramática:</strong> fortalecen tu base lingüística.<br><br>
                            Tener buenos libros escolares te prepara mejor para cada clase.
                        </p>
                    </div>
                </div>
        
                <div class="card-blog">
                    <div class="container-img">
                        <img src="./images/imagenes literatura/blog3.jpg" alt="Imagen Blog 3" />
                    </div>
                    <div class="content-blog">
                        <h3>📘 Autores Peruanos que Deberías Leer en Secundaria</h3>
                        <span>15 Abril 2025</span>
                        <p>
                            La literatura peruana está llena de voces poderosas:<br><br>
                            • <strong>César Vallejo:</strong> poesía profunda y revolucionaria.<br>
                            • <strong>José María Arguedas:</strong> relatos del mundo andino.<br>
                            • <strong>Ricardo Palma:</strong> tradiciones con sabor histórico.<br><br>
                            Leer autores peruanos es entender mejor nuestra cultura e identidad.
                        </p>
                    </div>
                </div>
        
                <div class="card-blog">
                    <div class="container-img">
                        <img src="./images/imagenes literatura/blog4.jpg" alt="Imagen Blog 4" />
                    </div>
                    <div class="content-blog">
                        <h3>📗 ¿Cómo Elegir el Libro Perfecto para Estudiar?</h3>
                        <span>10 Mayo 2025</span>
                        <p>
                            No todos los libros son iguales. Aquí te damos algunos consejos:<br><br>
                            • <strong>Fíjate en tu nivel:</strong> elige libros adecuados para tu grado escolar.<br>
                            • <strong>Consulta la malla curricular:</strong> así eliges títulos recomendados.<br>
                            • <strong>Lee la sinopsis:</strong> te dará una idea clara del contenido.<br><br>
                            Un buen libro te motiva a seguir aprendiendo con gusto y enfoque.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer1">
        <div class="container container-footer1">
            <div class="menu-footer1">
                <div class="contact-info1">
                    <p class="title-footer1">Información de Contacto</p>
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
                    <p class="title-footer1">Nuestras redes sociales </p>
                    <div class="social-icons1">
                        <a href="https://www.facebook.com/LibreriaElRinconDelEstudiante" target="_blank" class="facebook">
                    <i class="fa-brands fa-facebook"></i>
                         </a>

                        <a href="https://api.whatsapp.com/send?phone=+51982785587&text=Hola, estoy interesado en comprar productos!" target="_blank" class="WhatsApp">
                    <i class="fa-brands fa-whatsapp"></i>
                         </a>
                    </div>
                </div>

                <div class="information1">
                    <p class="title-footer1">Información</p>
                    <ul>
                        <li><a href="sobre_nosotros.html">Acerca de Nosotros</a></li>
                        <li><a href="#" id="btn-delivery">Información Delivery</a></li>
                        <li><a href="#" id="btn-privacidad">Políticas de Privacidad</a></li>
                        <li><a href="#" id="btn-terminos">Términos y Condiciones</a></li>
                    </ul>                   
                </div>

                


            </div>

            <div class="footer-gif">
                <img src="./images/imagenes literatura/leerFooter.gif" alt="libro animado" width="300">
                <p class="gif-text">¡Nunca dejes de aprender!</p>
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

    

    <!-- Carrito De Compras -->
    <script src="carrito.js"></script>
    <script src="Seccionlibros.js"></script>
    <script src="modales-footer.js"></script>

    <script>   
        window.onclick = function(event) {
         const modal = document.getElementById('login-modal');
             if (event.target == modal) {
             modal.style.display = "none";
             }
            }
            </script>
            
            <script>
        document.querySelector("form").addEventListener("submit", function(e) {
        e.preventDefault(); // Evita el envío tradicional del formulario

        const formData = new FormData(this);

        fetch("login.php", {
        method: "POST",
        body: formData
        })
        .then(response => response.text())
        .then(data => {
        if (data.trim() === "Contraseña correcta") {
        alert("Contraseña correcta");
        window.location.href = "index.html"; // o index.php si usas PHP
        } else {
        alert(data); // Muestra "Contraseña incorrecta" o "Usuario no encontrado"
        }
        })
        .catch(error => {
        console.error("Error en la solicitud:", error);
        alert("Ocurrió un error al iniciar sesión.");
            });
        });
    </script>

</body>
</html>