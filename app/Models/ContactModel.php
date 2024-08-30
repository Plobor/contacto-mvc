<?php

namespace App\Models;

use PDO;
use PDOException;

class ContactModel {
  // Configuración de la base de datos
  private static $pdo;

  // Establece la conexión a la base de datos
  private static function getConnection() {
      if (self::$pdo === null) {
          try {
              self::$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '');
              self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
              die('Error al conectar a la base de datos: ' . $e->getMessage());
          }
      }
      return self::$pdo;
  }

  // Obtiene el número total de contactos
  public static function getTotalContacts() {
      $pdo = self::getConnection();
      $stmt = $pdo->query('SELECT COUNT(*) FROM contact');
      return $stmt->fetchColumn();
  }

  // Obtiene los contactos para una página específica
  public static function getContacts($limit, $offset) {
      $pdo = self::getConnection();
      $stmt = $pdo->prepare('SELECT * FROM contact LIMIT :limit OFFSET :offset');
      $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
      $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function addContact($name, $lastname, $age, $email, $description, $url_img_profile) {
    $pdo = self::getConnection();

    // Preparar la consulta SQL para insertar un nuevo contacto
    $sql = "INSERT INTO contact (name, last_name, age, email, description, url_img_profile) VALUES (:name, :lastname, :age, :email, :description, :url_img_profile)";
    $stmt = $pdo->prepare($sql);

    // Ejecutar la consulta con los datos proporcionados
    try {
        $stmt->execute([
            ':name' => $name,
            ':lastname' => $lastname,
            ':age' => $age,
            ':email' => $email,
            ':description' => $description,
            ':url_img_profile' => $url_img_profile
        ]);
    } catch (PDOException $e) {
        // Manejar errores de ejecución
        die('Error al agregar el contacto: ' . $e->getMessage());
    }
    }

    public static function getContactById($id) {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM contact WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve el contacto como un array asociativo
    }
}