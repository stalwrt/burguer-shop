<div class="card">
    <input type="hidden" id="id" value="<?php echo $item['id']; ?>">
    <div class="imagen">
        <img src="Images/<?php echo $item['img']; ?>">
    </div>
    <div class="contenido">
        <h3><?php echo $item['nombre']; ?></h3>
        <p><?php echo $item['descripcion']; ?></p>
        <span>$<?php echo $item['precio']; ?> MXN</span>
        <br>
        <button class="btn-add">Agregar al carrito</button>
    </div>
</div>