<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Clientes</title>
    <!-- Enlace a Bootstrap (asegúrate de tener Bootstrap instalado o enlazado correctamente) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+2U+OrCXaRkfjzO4f5f5Xn2lqVpSg9bM2Stqib4yG2F2emDr" crossorigin="anonymous">
    <style>
        /* Estilo para las tarjetas */
        .card {
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease; /* Transición de transformación para suavizar el efecto */
            border: none;
        }

        .card:hover {
            transform: scale(1.05); /* Escalar la tarjeta al pasar el cursor */
        }

        /* Estilo para superponer texto en la imagen */
        .card-text-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7); /* Fondo semi-transparente */
            color: #fff;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease; /* Transición de opacidad para el texto */
        }

        .card:hover .card-text-overlay {
            opacity: 1; /* Mostrar el texto al pasar el cursor */
        }
    </style>
</head>
<body>
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4" style="color: #000000; font-weight: bold;">Nuestros Clientes</h2>
            <div id="carouselClientes" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-md-4 mb-4">
                                <div class="card border border-dark shadow-lg">
                                    <img src="uploads/cliente/client.jpg" alt="Cliente 1" class="card-img-top img-fluid">
                                    <div class="card-text-overlay">
                                        <h5 class="card-title" style="font-weight: bold;">Robert Garcia Suñiga</h5>
                                        <p class="card-text">Firma de propietario, en Guayaquil, Salitre</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card border border-dark shadow-lg">
                                    <img src="uploads/cliente/clie.jpg" alt="Cliente 1" class="card-img-top img-fluid">
                                    <div class="card-text-overlay">
                                        <h5 class="card-title" style="font-weight: bold;">Juan Mera Ordoñez</h5>
                                        <p class="card-text">Entrega de terreno en Naranjal</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card border border-dark shadow-lg">
                                    <img src="uploads/cliente/cliente.jpg" alt="Cliente 1" class="card-img-top img-fluid">
                                    <div class="card-text-overlay">
                                        <h5 class="card-title" style="font-weight: bold;">Carlos Andrade Alava</h5>
                                        <p class="card-text">Entrega de casa, a la familia Lopez, Zaropoto.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Agrega más tarjetas de clientes aquí -->
                        </div>
                    </div>
                    <!-- Agrega más elementos de carrusel aquí -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselClientes" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselClientes" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </section>
    <!-- Enlace a Bootstrap JS (asegúrate de tener Bootstrap instalado o enlazado correctamente) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-+6Q/ih4d7gk7KpP8vQF7fF2tFqAJxqE/2fZO/pXn3I5KfG5P5zU6enw5O4Z+iMs1FV" crossorigin="anonymous"></script>
</body>
</html>
