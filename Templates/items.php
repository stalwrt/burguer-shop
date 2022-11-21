<div class="card">
    <input type="hidden" id="id" value="<?php echo $row['id']; ?>">
    <div class="imagen">
        <img src="data:image/<?php echo $row['tipoimg'] ?>;base64,<?php echo base64_encode($row['img']) ?>">
    </div>
    <div class="contenido">
        <h3><?php echo $row['nombre']; ?></h3>
        <span>$<?php echo $row['precio']; ?> MXN</span>
        <br>
        <button class="btn-add">Agregar al carrito</button>
    </div>
</div>