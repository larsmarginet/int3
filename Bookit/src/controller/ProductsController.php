<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ProductsDAO.php';

class ProductsController extends Controller {

  private $productDAO;

  function __construct() {
      $this->productDAO = new ProductDAO();
    }

  public function index() {
    $products = $this->productDAO->selectAllProducts();

    $this->set('products', $products);
    $this->set('title', 'producten');
  }

  public function detail() {

  }

}
