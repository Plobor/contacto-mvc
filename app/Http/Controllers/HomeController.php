<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Resources\views;
use App\Models\ContactModel;

class HomeController {
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
    
    return view('home', $data);
  }

  public function about() {
    return view('about');
  }
}
