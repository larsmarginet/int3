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
    $this->set('title', 'producten');

    if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
      echo json_encode($products);
      exit();
  }
  }

  public function detail() {

  }

}
