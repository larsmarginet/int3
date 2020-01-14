<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/FavoritesDAO.php';

class FavoritesController extends Controller {

  private $favoriteDAO;

  function __construct() {
      $this->favoriteDAO = new FavoriteDAO();
    }

  public function index() {
    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'remove') {
        $this->_handleRemoveFavorite();
        header('Location: index.php?page=favorites');
        exit();
      }
    }
    $ids = [''];

    foreach($_SESSION['favorite'] as $favorite){
      array_push($ids, $favorite['product']['id']);
    }

    $products = $this->favoriteDAO->selectAllProductsWIthId($ids);

    $this->set('products',  $products);
    $this->set('title', 'Verlanglijstje');
  }


  private function _handleRemoveFavorite() {
    if (isset($_SESSION['favorite'][$_GET['id']])) {
      unset($_SESSION['favorite'][$_GET['id']]);
    }
  }
}
