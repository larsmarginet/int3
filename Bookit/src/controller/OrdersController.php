<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/OrdersDAO.php';
require_once __DIR__ . '/../dao/ProductsDAO.php';

class OrdersController extends Controller {

  private $orderDAO;
  private $productDAO;

  function __construct() {
      $this->orderDAO = new OrderDAO();
      $this->productDAO = new ProductDAO();
    }

  public function index() {
    $date = date('d/m/Y', strtotime(date('Y-m-d'). ' + 2 days'));
    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'add') {
        $this->_handleAdd();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
      }
      if ($_POST['action'] == 'empty') {
        $_SESSION['cart'] = array();
      }
      if ($_POST['action'] == 'update') {
        $this->_handleUpdate();
      }
      header('Location: index.php?page=cart');
      exit();
    }
    if (!empty($_POST['remove'])) {
      $this->_handleRemove();
      header('Location: index.php?page=cart');
      exit();
    }



    $this->set('date', $date);
    $this->set('title', 'Winkelmandje');
  }



  private function _handleAdd() {
    if (empty($_SESSION['cart'][$_POST['id']])) {
      $product = $this->productDAO->selectProductById($_POST['id']);
      if (empty($product)) {
        return;
      }
      $_SESSION['cart'][$_POST['id']] = array(
        'product' => $product,
        'quantity' => 0
      );
    }
    $_SESSION['cart'][$_POST['id']]['quantity']++;
  }

  private function _handleRemove() {
    if (isset($_SESSION['cart'][$_POST['remove']])) {
      unset($_SESSION['cart'][$_POST['remove']]);
    }
  }

  private function _handleUpdate() {
    foreach ($_POST['quantity'] as $productId => $quantity) {
      if (!empty($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] = $quantity;
      }
    }
    if(isset($_POST['gift']) && $_POST['gift'] === 'on'){
      $_SESSION['cart']['gift'] = array(
        'product' => 'gift',
        'quantity' => 1
      );
    } else {
      unset($_SESSION['cart']['gift']);
    }
    $this->_removeWhereQuantityIsZero();
  }

  private function _removeWhereQuantityIsZero() {
    foreach($_SESSION['cart'] as $productId => $info) {
      if ($info['quantity'] <= 0) {
        unset($_SESSION['cart'][$productId]);
      }
    }
  }



}
