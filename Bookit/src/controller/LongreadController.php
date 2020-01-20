<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/LongreadDAO.php';

class LongreadController extends Controller {

  private $longreadDAO;

  function __construct() {
      $this->longreadDAO = new LongreadDAO();
    }

  public function longread() {
    $roles = $this->longreadDAO->selectAllRoles();
    $this->set('roles', $roles);
    $this->set('title', 'longread');
  }
}
