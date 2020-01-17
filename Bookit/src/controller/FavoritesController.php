<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/FavoritesDAO.php';
require_once __DIR__ . '/../dao/SubscriptionsDAO.php';

class FavoritesController extends Controller {

  private $favoriteDAO;
  private $subscriptionDAO;

  function __construct() {
      $this->favoriteDAO = new FavoriteDAO();
      $this->subscriptionDAO = new SubscriptionDAO();
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

    if(isset($_SESSION['favorite'])){
      foreach($_SESSION['favorite'] as $favorite){
        array_push($ids, $favorite['product']['id']);
      }
    }

    $subscriptions = $this->subscriptionDAO->selectAllSubscriptions();
    $products = $this->favoriteDAO->selectAllProductsWIthId($ids);

    $this->set('subscriptions', $subscriptions);
    $this->set('products',  $products);
    $this->set('title', 'Verlanglijstje');
  }


  private function _handleRemoveFavorite() {
    if (isset($_SESSION['favorite'][$_GET['id']])) {
      unset($_SESSION['favorite'][$_GET['id']]);
    }
  }
}
