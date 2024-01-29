<?php 
$brands = isset($_GET['b']) ? json_decode(urldecode($_GET['b'])) : array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu título aquí</title>
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
            <h3 style="color: #126eb6; font-weight: bold;">Mis inmuebles favoritos</h3>
            <hr style="border-top: 10px solid #4F7BF7; margin-top: 10px;">
            <div class="row gx-4 gx-lg-4 row-cols-md-3 row-cols-xl-4">
                <?php 
                
                    if (isset($_SESSION['userdata']['id'])) {
                   
                        $userId = $_SESSION['userdata']['id'];

                   
                        $favQry = $conn->query("SELECT r.*, t.name as rtype FROM `real_estate_list` r 
                                                INNER JOIN type_list t ON r.type_id = t.id 
                                                INNER JOIN favoritos f ON r.id = f.state_id 
                                                WHERE r.status = 1 AND f.cliente_id = $userId
                                                ORDER BY r.`name` ASC");

                      
                        while($row = $favQry->fetch_assoc()):
                            $meta_qry = $conn->query("SELECT * FROM `real_estate_meta` WHERE real_estate_id = '{$row['id']}' ");
                            $meta = array_column($meta_qry->fetch_all(MYSQLI_ASSOC), "meta_value", "meta_field");
                ?>
                            <div class="col mb-5">
                                <a class="card product-item text-reset text-decoration-none"
                                    href=".?p=view_estate&id=<?php echo ($row['id']) ?>">
                                    <div class="overflow-hidden shadow product-holder">
                                        <img class="card-img-top w-100 product-cover"
                                            src="<?php echo validate_image(isset($meta['thumbnail_path']) ? $meta['thumbnail_path'] : "") ?>"
                                            alt="..." />
                                    </div>
                                    <div class="card-body p-4">
                                        <h5 class="card-title w-100 font-weight-bolder"><?= $row['name'] ?></h5>
                                        <p class="m-0"><?php echo $row['rtype'] ?></small></p>
                                        <p class="m-0"><?= isset($meta['purpose']) ? $meta['purpose'] : "" ?></small></p>
                                        <p class="m-0"><?= isset($meta['type']) ? $meta['type'] : "" ?></small></p>
                                        <p class="m-0"><?= isset($meta['sale_price']) ? format_num($meta['sale_price']) : "" ?></small></p>
                                    </div>
                                </a>
                            </div>
                <?php 
                        endwhile;
                    } else {
                        
                        echo "Inicia sesión para ver tus inmuebles favoritos.";
             
                    }
                ?>
            </div>
        </section>
    </div>
</body>

</html>

<script>
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