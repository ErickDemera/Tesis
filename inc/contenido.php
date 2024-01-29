<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Enlace a Bootstrap (asegúrate de tener Bootstrap instalado o enlazado correctamente) -->
    <link href="
https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css
" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        /* Fondo degradado azul */
        body {
            background: linear-gradient(135deg, #CBD6FB, #A5F0FA);
            color: #fff;
        }

        /* Encabezado */ /* prederterminado *100px 0; */
        header {
            text-align: center;
            padding: 100px 0;}
        

        h1 {
            font-size: 3em;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 5px;
        }

        /* Botón con efecto degradado */
        .btn {
            background: linear-gradient(45deg, #021B79, #0575E6);
            border: none;
            color: #fff;
        }

        .btn:hover {
            background: linear-gradient(45deg, #021B79, #0575E6);
            color: #fff;
        }

        /* Sección de contenido */
        .content {
            text-align: center;
            padding: 40px;
        }

        p {
            font-size: 1.2em;
        }

        /* Imagen con efecto de sombra */
        .rounded-img {
            border-radius: 50%;
            box-shadow: 5px -2px 10px 0px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .rounded-img:hover {
            transform: scale(1.1);
        }*/
    </style>
</head>
<body>
    <header>
   
    <h1 style="color: black; font-family: 'Arial', sans-serif; font-size: 36px; font-weight: bold;">Inmobiliaria real estate</h1>
       
        <a href="./?p=inmobiliarios" class="btn btn-lg">Ver Propiedades</a>
    </header>
    
    <section class="content">
        <h2 style="color: #007bff; font-family: 'Arial', sans-serif; font-size: 30px; font-weight: bold;">¡La casa de tus sueños te esta esperando!</h2>
        <p style="color: black; font-family: 'Arial', sans-serif; font-size: 20px; font-weight: bold;">“En este emocionante viaje en busca de un hogar, deseo que encuentres mucho más. Que descubras un lugar donde cada rincón cuente una historia, donde cada habitación esté llena de amor y donde tus sueños se conviertan en realidad. Que tu nuevo inmueble sea un reflejo de tu amor, tus aspiraciones y tus momentos más felices. ¡Que este nuevo capítulo de tu vida esté lleno de alegría y amor en cada paso que des!”</p>
    <img src="uploads/logo-1645233884.jpg" alt="Imagen Llamativa" class="img-fluid rounded-img" width="300" height="300">
    </section>
    
    <section class="content"> <section class="py-5">
    <div class="container">
        <div class="card rounded-0">
            <div class="card-body">
                <!-- Botones de cambio centrados -->
                <div class="text-center mb-4">
                <button id="btn-mission" class="btn" style="background-color: #1707fa; color: #fff;">Misión</button>
                    <button id="btn-vision" class="btn" style="background-color: #1707fa; color: #fff;">Visión</button>
                    <button id="btn-values" class="btn" style="background-color: #1707fa; color: #fff;">Nuestros Valores</button>
                </div>
                <!-- Contenido -->
                <div id="content">
                    <!-- Contenido de Misión -->
                    <div id="mission-content" style="display: none;">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- Ampliamos el ancho de la columna -->
            <div class="value-item text-center">
                <i class="fas fa-bullseye fa-4x mb-3" style="color: #1707fa;"></i>
                <h3 style="color: #1707fa;">Misión</h3> <!-- Cambiamos el color del título -->
                <p style="color: black;" style="font-size: 18px;"> <!-- Aumentamos el tamaño de fuente -->
                    Ser una compañía líder y posicionada en el sector inmobiliario con proyección nacional e internacional de crecimiento exponencial, basado en construir el futuro mediante el desarrollo urbano y mejorar la calidad de vida de la sociedad.
                </p>
            </div>
        </div>
        <!-- Agrega más contenido relacionado con "Misión" aquí -->
    </div>
</div>

<div id="vision-content" style="display: none;">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- Ampliamos el ancho de la columna -->
            <div class="value-item text-center">
                <i class="fas fa-eye fa-4x mb-3" style="color: #1707fa;"></i>
                <h3 style="color: #1707fa;">Visión</h3> <!-- Cambiamos el color del título -->
                <p style="color: black;" style="font-size: 18px;"> <!-- Aumentamos el tamaño de fuente -->
                    Somos Casagrande inmobiliaria, una familia al servicio de quienes buscan cumplir el sueño de la casa propia, o invertir de forma segura, mediante el desarrollo de proyectos inmobiliarios sostenibles que mejoren la calidad de vida y el desarrollo urbano de la población wanka, con responsabilidad social y ambiental, a través de un equipo selecto de profesionales con calidad humana.
                </p>
            </div>
        </div>
        <!-- Agrega más contenido relacionado con "Visión" aquí -->
    </div>
</div>

                    <!-- Contenido de Nuestros Valores -->
                    <div id="values-content" style="display: none;">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="value-item text-center">
                                    <i class="fas fa-heart fa-4x mb-3" style="color: #1707fa;"></i>
                                    <h3 style="color: black;">Compromiso</h3>
                                    <p style="color: black;">Nos comprometemos a brindar el mejor servicio a nuestros clientes.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                        <div class="value-item text-center">
                            <i class="fas fa-handshake fa-4x mb-3" style="color: #1707fa;"></i>
                            <h3 style="color: black;">Confianza</h3>
                            <p style="color: black;">Construimos relaciones de confianza con nuestros clientes y socios.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="value-item text-center">
                            <i class="fas fa-chart-bar fa-4x mb-3" style="color: #1707fa;"></i>
                            <h3 style="color: black;">Innovación</h3>
                            <p style="color: black;">Buscamos continuamente la innovación en todo lo que hacemos.</p>
                        </div>
                    </div>
                            <!-- Agrega más contenido relacionado con "Nuestros Valores" aquí -->
                            <!-- Aquí puedes agregar más contenido similar para más valores -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
        // Función para mostrar u ocultar contenido según el botón presionado
        function toggleContent(contentId) {
        document.getElementById('mission-content').style.display = 'none';
        document.getElementById('vision-content').style.display = 'none';
        document.getElementById('values-content').style.display = 'none';
        document.getElementById(contentId).style.display = 'block';
    }

    // Mostrar contenido de Nuestros Valores por defecto
    toggleContent('values-content');

    // Event listeners para los botones
    document.getElementById('btn-mission').addEventListener('click', function() {
        toggleContent('mission-content');
    });

    document.getElementById('btn-vision').addEventListener('click', function() {
        toggleContent('vision-content');
    });

    document.getElementById('btn-values').addEventListener('click', function() {
        toggleContent('values-content');
    });
</script>

    </section>
    
    <!-- Enlace a Bootstrap JS (asegúrate de tener Bootstrap instalado o enlazado correctamente) -->
    <script src="
https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/js/fontawesome.min.js
"></script>
</body>
</html>