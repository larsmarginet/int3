<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ProductsDAO.php';
require_once __DIR__ . '/../dao/SubscriptionsDAO.php';

class ProductsController extends Controller {

  private $productDAO;
  private $subscriptionDAO;

  function __construct() {
      $this->productDAO = new ProductDAO();
      $this->subscriptionDAO = new SubscriptionDAO();
    }

  public function index() {
    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'add') {
        $this->_handleAddFavorite();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
      }
      if ($_POST['action'] == 'remove') {
        $this->_handleRemoveFavorite();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
      }
    }

    $category = false;

    if (!empty($_GET['product_category'])) {
      $category = $_GET['product_category'];
    }

    $subscriptions = $this->subscriptionDAO->selectAllSubscriptions();
    $products = $this->productDAO->selectAllProducts($category);

    $this->set('subscriptions', $subscriptions);
    $this->set('products', $products);
    $this->set('title', 'Producten');

    if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
      echo json_encode($products);
      exit();
  }
}








  public function detail() {
    if(empty($_GET['id']) || !$product = $this->productDAO->selectProductById($_GET['id'])) {
      $_SESSION['error'] = 'Er is iets fout gegaan... De product werd niet gevonden. ';
      header('Location: index.php');
    } else {
      if (empty($_SESSION['recentlyViewed'][$_GET['id']])) {
        if (empty($product)) {
          return;
        }
        $_SESSION['recentlyViewed'][$_GET['id']] = array(
          'product' => $product
        );
      } else {
        unset($_SESSION['recentlyViewed'][$_GET['id']]);
        if (empty($product)) {
          return;
        }
        $_SESSION['recentlyViewed'][$_GET['id']] = array(
          'product' => $product
        );
      }
    }



    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'add') {
        $this->_handleAddFavorite();
        header('Location: index.php?page=detail&id=' . $_GET['id']);
        exit();
      }
      if ($_POST['action'] == 'addDiscount') {
        $this->_handleAddDiscount();
        header('Location: index.php?page=detail&id=' . $_POST['id']);
        exit();
      }
      if ($_POST['action'] == 'remove') {
        $this->_handleRemoveFavorite();
        header('Location: index.php?page=detail&id=' . $_GET['id']);
        exit();
      }
    }


    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if ($contentType === "application/json") {
      $content = trim(file_get_contents("php://input"));
      $data = json_decode($content, true); // JSON omzetten naar assoc array
      $insertedComment = $this->productDAO->insertComment($data);
      if(!$insertedComment){
        $errors = $this->productDAO->validate($data);
        $errors['error'] = "Er zijn fouten opgetreden";
        $this->set('errors',$errors);
        echo json_encode($errors);
      }else{
        $comments = $this->productDAO->selectAllReviewsById($data['id']);
        echo json_encode($comments);
      }
      exit();
    }

      if(!empty($_POST['action'])){
          if($_POST['action'] == 'insertComment'){
            $insertedcomment = $this->productDAO->insertComment($_POST);
            if(!$insertedcomment){
              $errors = $this->productDAO->validate($_POST);
              $this->set('errors',$errors);
            }else{
              header('Location:index.php?page=detail&id=' . $_POST['id'] . '#reviews');
              exit();
            }
          }
        }

    $subscriptions = $this->subscriptionDAO->selectAllSubscriptions();
    $product = $this->productDAO->selectProductById($_GET['id']);
    $images = $this->productDAO->selectAllImagesById($_GET['id']);
    $largeImage = $images[0];
    $reviews = $this->productDAO->selectAllReviewsById($_GET['id']);
    $versions = $this->productDAO->selectAllVersionsById($_GET['id']);
    $testimonials = $this->productDAO->selectAllTestimonialsById($_GET['id']);

    $count = 0;
    if(!empty($reviews)){
      foreach($reviews as $review) {
        $count++;
      }
    }

    $average = 0;
    $total = 0;
    if(!empty($reviews)){
      foreach($reviews as $review) {
        $total += $review['score'];
      }
      $average = round($total / count($reviews));
    }

    if(!empty($_GET['image']) && $productImage = $this->productDAO->selectImageById($_GET['image'])) {
      $largeImage = $productImage;
    }
    $date = date('d/m/Y', strtotime(date('Y-m-d'). ' + 2 days'));

    $this->set('subscriptions', $subscriptions);
    $this->set('product', $product);
    $this->set('images', $images);
    $this->set('largeImage', $largeImage);
    $this->set('reviews', $reviews);
    $this->set('count', $count);
    $this->set('average', $average);
    $this->set('versions', $versions);
    $this->set('testimonials', $testimonials);
    $this->set('date', $date);
    $this->set('title', $product['name']);
  }










  public function detailViewingCopy() {
    $product = $this->productDAO->selectProductById($_GET['id']);
    $this->set('title', $product['name']);
    $this->set('product', $product);
  }







  private function _handleAddFavorite() {
    $product = $this->productDAO->selectProductById($_GET['id']);
    if (empty($product)) {
      return;
    }
    $_SESSION['favorite'][$_GET['id']] = array(
      'product' => $product
    );
  }


  private function _handleAddDiscount() {
    if($_POST['discount'] === 'ABCDEF123' && $_POST['id'] == 3 ) {
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



  private function _handleRemoveFavorite() {
    if (isset($_SESSION['favorite'][$_GET['id']])) {
      unset($_SESSION['favorite'][$_GET['id']]);
    }
  }

}


