<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class = "<?= isset($active) && $active == 'home' ? 'active' : ''; ?>"   ><a href="#"><i class = "fas fa-home"></i> Inicio</a></li>
        <li class = "<?= isset($active) && $active == 'inventory' ? 'active' : ''; ?>"><a href="#"><i class = "fas fa-box"></i> Inventario</a></li>
        <li class = "<?= isset($active) && $active == 'product' ? 'active' : ''; ?>"><a href="#"><i class="fas fa-screwdriver"></i> Productos</a></li>
        <li class = "<?= isset($active) && $active == 'home' ? 'active' : ''; ?>"><a href="#"><i class="fas fa-cart-plus"></i> Comprar</a></li>
        <li class = "<?= isset($active) && $active == 'home' ? 'active' : ''; ?>"><a href="#"><i class="fas fa-hand-holding-usd"></i> Vender</a></li>
        <li class = "<?= isset($active) && $active == 'home' ? 'active' : ''; ?>"><a href="#"><i class="fas fa-cog"></i> Configuracion</a></li>
    </ul>
</div>