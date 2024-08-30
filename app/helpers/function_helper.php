<?php

function view($view_name, $data = []) {
  // Construye la ruta al archivo de vista
  $view_path = __DIR__ . '/../../Resources/views/' . $view_name . '.php';
  // Verifica si el archivo existe antes de incluirlo
  if (file_exists($view_path)) {
      extract($data); // Extrae el array $data a variables individuales
      include($view_path); // Incluye el archivo de vista
  } else {
      // Maneja el error si el archivo no se encuentra
      echo "Vista no encontrada: $view_path";
  }
}