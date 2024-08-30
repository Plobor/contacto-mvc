<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/contacts">Contactos</a></li>
            <li><a href="/about">Acerca de</a></li>
        </ul>
    </nav>
    
    <main>
        <h2>Sus Contactos</h2>
        <p>Bienvenido al sistema de gestión de contactos. Aquí puede ver y gestionar sus contactos.</p>
        
        <a href="/create" class="btn">Añadir Nuevo Contacto</a>
        
        <?php if (!empty($contacts)): ?>
            <ul>
                <?php foreach ($contacts as $contact): ?>
                    <li>
                        <?php echo htmlspecialchars($contact['name'], ENT_QUOTES, 'UTF-8'); ?> - 
                        <?php echo htmlspecialchars($contact['email'], ENT_QUOTES, 'UTF-8'); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No se encontraron contactos.</p>
        <?php endif; ?>
        
        <!-- Controles de Paginación -->
        <div class="pagination">
            <?php if ($currentPage > 1): ?>
                <a href="?page=<?php echo $currentPage - 1; ?>" class="prev">Anterior</a>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" class="<?php echo $i == $currentPage ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
            
            <?php if ($currentPage < $totalPages): ?>
                <a href="?page=<?php echo $currentPage + 1; ?>" class="next">Siguiente</a>
            <?php endif; ?>
        </div>
    </main>
    
    <footer>
        <p>&copy; 2024 Sistema de Gestión de Contactos</p>
    </footer>
</body>
</html>   