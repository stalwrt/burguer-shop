<nav class="sidebar">
    <div class="sidebar-inner">
        <header class="sidebar-header">
            <button type="button" class="sidebar-burger" onclick="toggleSidebar()"></button>
            <img src="Assets/SVG/menu.svg" class="sidebar-logo">
        </header>
        <nav class="sidebar-menu">
            <!-- Inicio  -->
            <button type="button" class="has-border" onclick="location.href='/burger_shop/'">
                <img src="Assets/SVG/house.svg">
                <span>Inicio</span>
            </button>
            <!-- Menu  -->
            <button type="button" class="has-border">
                <img src="Assets/SVG/book.svg">
                <span>Menú</span>
            </button>
            <!-- Usuario  -->
            <button type="button" class="has-border" onclick="location.href='sesion.php'">
                <img src="Assets/SVG/user.svg">
                <span>Sesión</span>
            </button>
            <!-- carrito  -->
            <button type="button" class="has-border" onclick="location.href='carrito.php'">
                <img src="Assets/SVG/bag.svg">
                <span>Carrito</span>
            </button>
            <!-- sobre la empresa  -->
            <button type="button" class="has-border" onclick="location.href='about.php'">
                <img src="Assets/SVG/question.svg">
                <span>Sobre nosotros</span>
            </button>
        </nav>
    </div>
</nav>