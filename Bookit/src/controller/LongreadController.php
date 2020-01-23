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

    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'submit') {
        $this->_handleSubmit();
        header('Location: index.php?page=longread#12');
      }
    }

    $this->set('roles', $roles);
    $this->set('title', 'longread');

    if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
      echo json_encode($roles);
      exit();
    }
  }





  private function _handleSubmit() {
    $totalScore = 0;
    foreach($_POST as $answer) {
      if(is_numeric($answer)) {
        $totalScore += $answer;
      }
    }
    if($_POST['9'] == 3) {
      $_SESSION['role'] = $this->longreadDAO->selectRoleById(10);
    } else if ($_POST['9'] == 2) {
      if($totalScore <= 8) {
        $_SESSION['role'] = $this->longreadDAO->selectRoleById(6);
      } else {
        $_SESSION['role'] = $this->longreadDAO->selectRoleById(8);
      }
    } else {
      if($totalScore <= 8) {
        $_SESSION['role'] = $this->longreadDAO->selectRoleById(1);
      } else {
        $_SESSION['role'] = $this->longreadDAO->selectRoleById(4);
      }
    }
  }
}
