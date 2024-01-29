<section class="py-5">
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
                <p style="font-size: 18px;"> <!-- Aumentamos el tamaño de fuente -->
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
                <p style="font-size: 18px;"> <!-- Aumentamos el tamaño de fuente -->
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
                                    <h3>Compromiso</h3>
                                    <p>Nos comprometemos a brindar el mejor servicio a nuestros clientes.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                        <div class="value-item text-center">
                            <i class="fas fa-handshake fa-4x mb-3" style="color: #1707fa;"></i>
                            <h3>Confianza</h3>
                            <p>Construimos relaciones de confianza con nuestros clientes y socios.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="value-item text-center">
                            <i class="fas fa-chart-bar fa-4x mb-3" style="color: #1707fa;"></i>
                            <h3>Innovación</h3>
                            <p>Buscamos continuamente la innovación en todo lo que hacemos.</p>
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
