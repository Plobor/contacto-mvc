<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Exception;
use Resourceses\views;

class ContactController
{
  public function index() {
    $contactsPerPage = 10; // Número de contactos por página
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $contactsPerPage;
    
    // Obtener total de contactos
    $totalContacts = ContactModel::getTotalContacts();
    
    // Obtener los contactos para la página actual
    $contacts = ContactModel::getContacts($contactsPerPage, $offset);
    
    // Calcular el total de páginas
    $totalPages = ceil($totalContacts / $contactsPerPage);

    $data = [
      'title' => 'Welcome to Contacts Management',
      'contacts' => $contacts,
      'currentPage' => $page,
      'totalPages' => $totalPages,
      'totalContacts' => $totalContacts
    ];

    view('contacts/contacts', $data);
  }

  public function create() {
    view('contacts/create');
  }

  public function store() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $lastname = $_POST['lastname'] ?? '';
        $age = $_POST['age'] ?? '';
        $email = $_POST['email'] ?? '';
        $description = $_POST['description'] ?? '';
        $url_img_profile = $_POST['url_img_profile'] ?? '';


        // Validar los datos aquí si es necesario

        // Almacenar el nuevo contacto en la base de datos
        ContactModel::addContact($name, $lastname, $age, $email,$description, $url_img_profile);

        // Redirigir a la lista de contactos u otra vista
        header('Location: /');
        exit;
    }
  }

  public function show() {
    try {
        // Obtener los detalles del contacto basado en el ID
        $contact = ContactModel::getContactById(1);

        if ($contact === null) {
            // Manejar el caso donde el contacto no se encuentra
            throw new Exception('Contacto no encontrado.');
        }

        // Pasar los datos del contacto a la vista
        return view('contacts/show', ['contact' => $contact]);
    } catch (Exception $e) {
        // Manejar errores y mostrar un mensaje adecuado
        return view('error', ['message' => $e->getMessage()]);
    }
  }
}