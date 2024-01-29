<?php

require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `localizacion` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
	<form action="" id="ubicacion-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<label for="ciudad" class="control-label">Ubicación</label>
			<input type="text" name="ciudad" id="ciudad" class="form-control form-control-sm rounded-0" value="<?php echo isset($ciudad) ? $ciudad : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="ubicacion" class="control-label">Zona</label>
			<input type="text" name="ubicacion" id="ubicacion" class="form-control form-control-sm rounded-0" value="<?php echo isset($ubicacion) ? $ubicacion : ''; ?>"  required/>
		</div>
		<div class="form-group">
			<label for="zona" class="control-label">Ciudad</label>
			<input type="text" name="zona" id="zona" class="form-control form-control-sm rounded-0" value="<?php echo isset($zona) ? $zona : ''; ?>"  required/>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#ubicacion-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_ubicacion",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("Ocurrió un error",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.reload()
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
                            end_loader()
                    }else{
						alert_toast("Ocurrió un error",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

	})
</script>