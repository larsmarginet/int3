<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ProductsDAO.php';

class ProductsController extends Controller {

  private $productDAO;

  function __construct() {
      $this->productDAO = new ProductDAO();
    }

  public function index() {
    $category = false;

    if (!empty($_GET['product_category'])) {
      $category = $_GET['product_category'];
    }

    $products = $this->productDAO->selectAllProducts($category);

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
    }

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
    $date = date('d/m/Y', strtotime(date('Y-m-d'). ' + 2 days'));;

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

}
