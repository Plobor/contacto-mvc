<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Formulario de Usuario</h1>
        <form action="/store" method="POST">
            <!-- Campo Nombre -->
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <!-- Campo Apellido -->
            <div class="form-group">
                <label for="lastname">Apellido:</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>

            <!-- Campo Edad -->
            <div class="form-group">
                <label for="age">Edad:</label>
                <input type="number" id="age" name="age" min="0" required>
            </div>

            <!-- Campo Correo Electrónico -->
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Campo Descripción -->
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>

            <!-- Campo URL Imagen de Perfil -->
            <div class="form-group">
                <label for="url_img_profile">URL Imagen de Perfil:</label>
                <input type="url" id="url_img_profile" name="url_img_profile">
            </div>

            <!-- Botón Enviar -->
            <div class="form-group">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</body>
</html>