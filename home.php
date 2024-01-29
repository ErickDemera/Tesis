
<style>
    .carousel-item>img {
        object-fit: fill !important;
        height: 600px !important; /* Aumenta la altura de la imagen */
    }

    #carouselExampleControls .carousel-inner {
        /* La altura ya se ha establecido en 800px */
    }


</style>
<?php 
$brands = isset($_GET['b']) ? json_decode(urldecode($_GET['b'])) : array();
?>
<section class="py-0">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php 
                    $upload_path = "uploads/banner";
                    if (is_dir(base_app . $upload_path)): 
                        $files = scandir(base_app . $upload_path);
                        $first = true; // Para agregar la clase "active" solo a la primera imagen
                        foreach ($files as $img):
                            if (in_array($img, array('.', '..'))) {
                                continue;
                            }
                            ?>
                            <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                                <img src="<?php echo validate_image($upload_path . '/' . $img) ?>" class="d-block w-100" alt="<?php echo $img ?>">
                                <div class="carousel-caption">
                                    <h1></h1>
                                    <p style="color: #ffa43a;"></p>
                                </div>
                                <div class="overlay"></div> <!-- Capa degradante -->
                            </div>
                            <?php
                            $first = false; // Desactivar la clase "active" para las siguientes imágenes
                        endforeach;
                    endif;
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </div>
</div>


           
    </div>
    </div>
</section>
<script>
    function _filter(){
        var brands = []
            $('.brand-item:checked').each(function(){
                brands.push($(this).val())
            })
        _b = JSON.stringify(brands)
        var checked = $('.brand-item:checked').length
        var total = $('.brand-item').length
        if(checked == total)
            location.href="./?";
        else
            location.href="./?b="+encodeURI(_b);
    }
    function check_filter(){
        var checked = $('.brand-item:checked').length
        var total = $('.brand-item').length
        if(checked == total){
            $('#brandAll').attr('checked',true)
        }else{
            $('#brandAll').attr('checked',false)
        }
        if('<?php echo isset($_GET['b']) ?>' == '')
            $('#brandAll,.brand-item').attr('checked',true)
    }
    $(function(){
        check_filter()
        $('#brandAll').change(function(){
            if($(this).is(':checked') == true){
                $('.brand-item').attr('checked',true)
            }else{
                $('.brand-item').attr('checked',false)
            }
            _filter()
        })
        $('.brand-item').change(function(){
            _filter()
        })
    })

</script>