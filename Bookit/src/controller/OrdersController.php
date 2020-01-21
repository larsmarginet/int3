<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/OrdersDAO.php';
require_once __DIR__ . '/../dao/ProductsDAO.php';
require_once __DIR__ . '/../dao/SubscriptionsDAO.php';

class OrdersController extends Controller {

  private $orderDAO;
  private $productDAO;
  private $subscriptionDAO;

  function __construct() {
      $this->orderDAO = new OrderDAO();
      $this->productDAO = new ProductDAO();
      $this->subscriptionDAO = new SubscriptionDAO();
    }

  public function index() {
    $date = date('d/m/Y', strtotime(date('Y-m-d'). ' + 2 days'));
    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'add') {
        $this->_handleAdd();
        $color = 0;
        if(isset($_GET['color'])){
          $color = $_GET['color'];
        }
        if(strpos($_SERVER['HTTP_REFERER'], '?')){
          header('Location: ' . $_SERVER['HTTP_REFERER'] . '&buy=true&product_id=' . $_POST['id']) . '&color=' . $color;
        } else {
          header('Location: ' . $_SERVER['HTTP_REFERER'] . '?buy=true&product_id=' . $_POST['id']) . '&color=' . $color;
        }

        exit();
      }
      if ($_POST['action'] == 'addDiscount') {
        $this->_handleAddDiscount();
        header('Location: index.php?page=cart');
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
    if (!empty($_POST['order'])) {
      if ($_POST['order'] == 'update-cart') {
        $this->_handleUpdate();
      }
      header('Location: index.php?page=login');
      exit();
    }

    $this->set('date', $date);
    $this->set('title', 'Winkelmandje');
  }





  public function login() {
    $date = date('d/m/Y', strtotime(date('Y-m-d'). ' + 2 days'));
    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'login' && isset($_POST['email']) && isset($_POST['password'])) {
        $this->_handleLogin();
      }
    }
    $this->set('date', $date);
    $this->set('title', 'Gegevens');
  }

  public function data() {
    $date = date('d/m/Y', strtotime(date('Y-m-d'). ' + 2 days'));
    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'data') {
        $this->_handleData();
      }
    }
    $this->set('date', $date);
    $this->set('title', 'Gegevens');
  }

  public function payment() {
    $date = date('d/m/Y', strtotime(date('Y-m-d'). ' + 2 days'));
    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'payment') {
        $this->_handlePayment();
      }
    }
    $this->set('date', $date);
    $this->set('title', 'Betaalmethode');
  }

  public function thanks() {
    $date = date('d/m/Y', strtotime(date('Y-m-d'). ' + 2 days'));
    $this->set('date', $date);
    $this->set('title', 'Bedankt');
  }



  private function _handlePayment() {
    if(isset($_POST['terms']) && $_POST['terms'] == 'on') {
      $_SESSION['orders']['payment'] = $_POST['payment'];
      unset( $_SESSION['cart']);
      header('Location: index.php?page=thanks');
    }
  }



  private function _handleData() {
    $data = array();
    if(isset($_POST['billing']) && $_POST['billing'] == 'on') {
      $data = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'street' => $_POST['street'],
        'number' => $_POST['number'],
        'bus' => $_POST['bus'],
        'zip' => $_POST['zip'],
        'city' => $_POST['city'],
        'billing-street' => $_POST['street'],
        'billing-number' => $_POST['number'],
        'billing-bus' => $_POST['bus'],
        'billing-zip' => $_POST['zip'],
        'billing-city' => $_POST['city']
      );
    } else {
      $data = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'street' => $_POST['street'],
        'number' => $_POST['number'],
        'bus' => $_POST['bus'],
        'zip' => $_POST['zip'],
        'city' => $_POST['city'],
        'billing-street' => $_POST['billing-street'],
        'billing-number' => $_POST['billing-number'],
        'billing-bus' => $_POST['billing-bus'],
        'billing-zip' => $_POST['billing-zip'],
        'billing-city' => $_POST['billing-city']
      );
    }
    $errors = $this->validateBilling($data);
    if(empty($errors)){
      $_SESSION['orders'] = array(
        'orders' => $_SESSION['cart'],
        'info' => $data,
        'payment' => 0
      );
      header('Location: index.php?page=payment');
    } else {
      $this->set('errors',$errors);
    }
  }


  private function validateBilling($data) {
    $errors = [];
    if (empty($data['name'])) {
      $errors['name'] = 'Gelieve een naam in te geven';
    }
    if (empty($data['email'])) {
      $errors['email'] = 'Gelieve een email in te geven';
    }
    if (empty($data['street'])) {
      $errors['street'] = 'Gelieve een straat in te geven';
    }
    if (empty($data['number'])) {
      $errors['number'] = 'Gelieve een number in te geven';
    }
    if (empty($data['zip'])) {
      $errors['zip'] = 'Gelieve een postcode in te geven';
    }
    if (empty($data['city'])) {
      $errors['city'] = 'Gelieve een plaats in te geven';
    }
    if (empty($data['billing-street'])) {
      $errors['billing-street'] = 'Gelieve een factuur straat in te geven';
    }
    if (empty($data['billing-number'])) {
      $errors['billing-number'] = 'Gelieve een factuur number in te geven';
    }
    if (empty($data['billing-zip'])) {
      $errors['billing-zip'] = 'Gelieve een factuur postcode in te geven';
    }
    if (empty($data['billing-city'])) {
      $errors['billing-city'] = 'Gelieve een factuur plaats in te geven';
    }
    return $errors;
  }


  private function _handleLogin() {
    $user = $this->orderDAO->selectUserByEmailAndPassword($_POST['email'], $_POST['password']);
    if (empty($user)) {
      $_SESSION['error'] = 'email of wachtwoord fout';
      return;
    }
    $_SESSION['user']['1']= array(
      'user' => $user
    );
    header('Location: index.php?page=data');
  }



  private function _handleAdd() {
    if (empty($_SESSION['cart'][$_POST['id']])) {
      if($_POST['id']<=28){
        $product = $this->productDAO->selectProductById($_POST['id']);
        if (empty($product)) {
          return;
        }
        if(isset($_GET['color'])){
          $_SESSION['cart'][$_POST['id']] = array(
            'product' => $product,
            'quantity' => 0,
            'color' => $_GET['color']
          );
        } else {
          $_SESSION['cart'][$_POST['id']] = array(
            'product' => $product,
            'quantity' => 0
          );
        }
      } else if(isset($_POST['id']) && !empty($_POST['id'])) {
        $subscription = $this->subscriptionDAO->selectSubscriptionById($_POST['id']);
        if (empty($subscription)) {
          return;
        }
        $_SESSION['cart'][$_POST['id']] = array(
          'product' => $subscription,
          'quantity' => 0
        );
      }
    }
    $_SESSION['cart'][$_POST['id']]['quantity']++;
  }


  private function _handleAddDiscount() {
    if(($_POST['discount'] === 'ABCDEF123'|| $_POST['discount'] === 'HHIENUDDAETOI') && $_POST['id'] == 3 ) {
      $product = $this->productDAO->selectProductById($_POST['id']);
      if (empty($product)) {
        return;
      }
      $_SESSION['discount'][$_POST['id']] = array(
        'product' => $product,
        'discount' => $_POST['discount']
      );
      $_SESSION['info'] = 'De kortingscode is geldig';
    } else {
      $_SESSION['error'] = 'Geen geldige kortingscode';
    }

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
