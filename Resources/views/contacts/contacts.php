<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contactos</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Asegúrate de que haya un margen suficiente encima de la tabla */
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .message {
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .message.success {
            background-color: #dff0d8;
            border-color: #d0e9c6;
            color: #3c763d;
        }
        .message.error {
            background-color: #f2dede;
            border-color: #ebccd1;
            color: #a94442;
        }
        .btn {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block; /* Asegúrate de que el botón se muestre en línea */
            margin-bottom: 20px; /* Espacio debajo del botón */
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Lista de Contactos</h1>
        <nav>
            <ul>
                <li><a href="/">Inicio</a></li>
                <li><a href="/about">Acerca de</a></li>
            </ul>
        </nav>
        <a href="/create" class="btn">Añadir Nuevo Contacto</a>
    </header>

    <main>
        <?php
        session_start();
        if (isset($_SESSION['message'])): ?>
            <div class="message success">
                <?php
                echo htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8');
                unset($_SESSION['message']); // Elimina el mensaje después de mostrarlo
                ?>
            </div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($contacts)): ?>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($contact['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($contact['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a href="/contacts/<?php echo htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8'); ?>" class="btn">Ver</a>
                                <a href="/contacts/<?php echo htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8'); ?>/edit" class="btn">Editar</a>
                                <a href="/contacts/<?php echo htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8'); ?>/delete" class="btn">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No se encontraron contactos.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Contactos. Todos los derechos reservados.</p>
    </footer>
</body>
</html>