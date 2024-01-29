<?php 
$brands = isset($_GET['b']) ? json_decode(urldecode($_GET['b'])) : array();

$ciudadesQuery = $conn->query("SELECT DISTINCT meta_value FROM real_estate_meta WHERE meta_field = 'ciudad'");
$ciudades = $ciudadesQuery->fetch_all(MYSQLI_ASSOC);


$ubicacionesQuery = $conn->query("SELECT DISTINCT meta_value FROM real_estate_meta WHERE meta_field = 'ubicacion'");
$ubicaciones = $ubicacionesQuery->fetch_all(MYSQLI_ASSOC);

$zonasQuery = $conn->query("SELECT DISTINCT meta_value FROM real_estate_meta WHERE meta_field = 'zona'");
$zonas = $zonasQuery->fetch_all(MYSQLI_ASSOC);


$ciudadSeleccionada = isset($_GET['ciudad']) ? $_GET['ciudad'] : '';
$ubicacionSeleccionada = isset($_GET['ubicacion']) ? $_GET['ubicacion'] : '';
$zonaSeleccionada = isset($_GET['zona']) ? $_GET['zona'] : '';



$qry = $conn->query("
    SELECT r.*, t.name as rtype 
    FROM `real_estate_list` r 
    INNER JOIN type_list t ON r.type_id = t.id 
    WHERE r.status = 1
    " . ($ciudadSeleccionada ? "AND EXISTS (SELECT 1 FROM real_estate_meta WHERE real_estate_id = r.id AND meta_field = 'ciudad' AND meta_value = '$ciudadSeleccionada')" : "") . "
    " . ($ubicacionSeleccionada ? "AND EXISTS (SELECT 1 FROM real_estate_meta WHERE real_estate_id = r.id AND meta_field = 'ubicacion' AND meta_value = '$ubicacionSeleccionada')" : "") . "
    " . ($zonaSeleccionada ? "AND EXISTS (SELECT 1 FROM real_estate_meta WHERE real_estate_id = r.id AND meta_field = 'zona' AND meta_value = '$zonaSeleccionada')" : "") . "
    ORDER BY r.`name` ASC
");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inmuebles</title>
    <style>
    body {
        /* Establece el degradado como fondo del cuerpo de la página */
        background: linear-gradient(to bottom, #D1D5DD, #D1D5DD);
        /* Otros estilos */
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    </style>



</head>

<body>
    <div class="container px-4 px-lg-5 mt-5">

        <section class="py-0">

            <h3 style="color: #126eb6; font-weight: bold;">Inmuebles Destacados</h3>
            <form id="filterForm">
                <div class="row">
                    <div class="col-md-4">
                        <label for="selectCiudad">Ciudad</label>
                        <select name="selectCiudad" id="selectCiudad" class="form-control">
                            <option value="">seleccionar</option>
                            <?php
                        foreach ($ciudades as $ciudad) {
                            echo "<option value='{$ciudad['meta_value']}'>{$ciudad['meta_value']}</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="selectUbicacion">Ubicación</label>
                        <select name="selectUbicacion" id="selectUbicacion" class="form-control">
                            <option value="">seleccionar</option>
                            <?php
                        foreach ($ubicaciones as $ubicacion) {
                            echo "<option value='{$ubicacion['meta_value']}'>{$ubicacion['meta_value']}</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="selectZona">Zona</label>
                        <select name="selectZona" id="selectZona" class="form-control">
                            <option value="">seleccionar</option>
                            <?php
                        foreach ($zonas as $zona) {
                            echo "<option value='{$zona['meta_value']}'>{$zona['meta_value']}</option>";
                        }
                        ?>
                        </select>
                    </div>
                </div>
            </form>
            <hr style="border-top: 10px solid #4F7BF7; margin-top: 10px;">
            <div class="row gx-4 gx-lg-4 row-cols-md-3 row-cols-xl-4">
                <?php 
                   while($row = $qry->fetch_assoc()):
                    $meta_qry = $conn->query("SELECT * FROM `real_estate_meta` where real_estate_id = '{$row['id']}' ");
                    $meta = array_column($meta_qry->fetch_all(MYSQLI_ASSOC),"meta_value", "meta_field");
                ?>
                <div class="col mb-5">
                    <a class="card product-item text-reset text-decoration-none"
                        href=".?p=view_estate&id=<?php echo ($row['id']) ?>">
                        <!-- Product image-->
                        <div class="overflow-hidden shadow product-holder">
                            <img class="card-img-top w-100 product-cover"
                                src="<?php echo validate_image(isset($meta['thumbnail_path']) ? $meta['thumbnail_path'] : "") ?>"
                                alt="..." />
                        </div>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <h5 class="card-title w-100 font-weight-bolder"><?= $row['name'] ?></h5>
                            <p class="m-0"><?php echo $row['rtype'] ?></small></p>
                            <p class="m-0"><?= isset($meta['purpose']) ? $meta['purpose'] : "" ?></small></p>
                            <p class="m-0"><?= isset($meta['type']) ? $meta['type'] : "" ?></small></p>
                            <p class="m-0">
                                <?= isset($meta['sale_price']) ? format_num($meta['sale_price']) : "" ?></small></p>

                        </div>
                    </a>
                    <button type="button" class="btn btn-white add-favoritos"
                        data-real-estate-id="<?php echo $row['id'] ?>">
                        <i class="fas fa-star text-warning"></i>
                    </button>



                </div>
                <?php endwhile; ?>
            </div>
        </section>
    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

$(function () {
      
        var currentSelections = {
            ciudad: $('#selectCiudad').val(),
            ubicacion: $('#selectUbicacion').val(),
            zona: $('#selectZona').val()
        };

   
        $('#selectCiudad, #selectUbicacion, #selectZona').change(function () {
    
            var ciudadSeleccionada = $('#selectCiudad').val();
            var ubicacionSeleccionada = $('#selectUbicacion').val();
            var zonaSeleccionada = $('#selectZona').val();

            
            var selectionsChanged = ciudadSeleccionada !== currentSelections.ciudad ||
                ubicacionSeleccionada !== currentSelections.ubicacion ||
                zonaSeleccionada !== currentSelections.zona;

            
            currentSelections = {
                ciudad: ciudadSeleccionada,
                ubicacion: ubicacionSeleccionada,
                zona: zonaSeleccionada
            };

    
            var baseUrl = "./?p=inmobiliarios";

    
            var params = {};
            if (ciudadSeleccionada) {
                params.ciudad = ciudadSeleccionada;
            }
            if (ubicacionSeleccionada) {
                params.ubicacion = ubicacionSeleccionada;
            }
            if (zonaSeleccionada) {
                params.zona = zonaSeleccionada;
            }

           
            var allSelected = ciudadSeleccionada && ubicacionSeleccionada && zonaSeleccionada;

           
            if (selectionsChanged && allSelected) {
                if (Object.keys(params).length > 0) {
                    baseUrl += '&' + $.param(params);
                }
                location.href = baseUrl;
            }
        });
    });

function _filter() {
    var brands = []
    $('.brand-item:checked').each(function() {
        brands.push($(this).val())
    })
    _b = JSON.stringify(brands)
    var checked = $('.brand-item:checked').length
    var total = $('.brand-item').length
    if (checked == total)
        location.href = "./?";
    else
        location.href = "./?b=" + encodeURI(_b);
}

function check_filter() {
    var checked = $('.brand-item:checked').length
    var total = $('.brand-item').length
    if (checked == total) {
        $('#brandAll').attr('checked', true)
    } else {
        $('#brandAll').attr('checked', false)
    }
    if ('<?php echo isset($_GET['b']) ?>' == '')
        $('#brandAll,.brand-item').attr('checked', true)
}
$(function() {
    check_filter()
    $('#brandAll').change(function() {
        if ($(this).is(':checked') == true) {
            $('.brand-item').attr('checked', true)
        } else {
            $('.brand-item').attr('checked', false)
        }
        _filter()
    })
    $('.brand-item').change(function() {
        _filter()
    })
})
</script>


<script>
$(function() {
    $('.add-favoritos').click(function() {
        var realEstateId = $(this).data('real-estate-id');

        <?php if (isset($_SESSION['userdata']['id'])) : ?>
        var userId = <?php echo $_SESSION['userdata']['id']; ?>;

        $.ajax({
            url: _base_url_ + "classes/Users.php?f=save_favorito",
            method: 'POST',
            data: {
                realEstateId: realEstateId,
                userId: userId
            },
            success: function(response) {

                console.log(response);

                alert(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
                console.error(status);
                console.error(error);
                alert(
                    'Error al procesar la solicitud. Consulta la consola del navegador para más detalles.'
                );
            },
            complete: function(xhr, status) {
                if (status !== 'success') {
                    alert(
                        'Error al completar la solicitud. Consulta la consola del navegador para más detalles.'
                    );
                }
            }
        });
        <?php else : ?>

        alert('Inicia sesión para agregar a favoritos');
        window.location.href = _base_url_ + 'login.php';

        <?php endif; ?>
    });
});
</script>