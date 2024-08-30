<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Contacto</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        .contact-details {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .contact-details h2 {
            margin-top: 0;
        }
        .contact-details p {
            font-size: 16px;
        }
        .btn {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        header, footer {
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Detalles del Contacto</h1>
        <nav>
            <ul>
                <li><a href="/">Inicio</a></li>
                <li><a href="/contacts">Contactos</a></li>
                <li><a href="/about">Acerca de</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="contact-details">
            <h2><?php echo htmlspecialchars($contact['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
            <p><strong>ID:</strong> <?php echo htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Correo Electrónico:</strong> <?php echo htmlspecialchars($contact['email'], ENT_QUOTES, 'UTF-8'); ?></p>
            <a href="/contacts/<?php echo htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8'); ?>/edit" class="btn">Editar</a>
            <a href="/contacts" class="btn">Volver a la Lista</a>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Contactos. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
