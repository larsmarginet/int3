<?php

require_once( __DIR__ . '/DAO.php');

class ProductDAO extends DAO {

  public function selectAllProducts($category = false){
    $sql = "SELECT `products`.*, AVG(`reviews`.`score`) AS `averagescore`, COUNT(`reviews`.`score`) AS `countscore` FROM `products` LEFT JOIN `reviews` ON `products`.`id` = `reviews`.`product_id` WHERE `products`.`is_default` = 1";

    $bindValues = array();

    if (!empty($category)) {
      $categoryParams = "";
      foreach($category as $index => $value){
          $categoryParams .= ":category_id_".$index.",";
          $bindValues[":category_id_".$index] = $value;
      }
      $categoryParams = rtrim($categoryParams,",");
      $sql .= " AND `products`.`product_category` IN ($categoryParams)";
    }

    $sql .= " GROUP BY `products`.`id`";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($bindValues);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectProductById($id){
    $sql = "SELECT * FROM `products` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectAllImagesById($id){
    $sql = "SELECT * FROM `images` WHERE `product_id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectImageById($id){
    $sql = "SELECT * FROM `images` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectAllVersionsById($id){
    $sql = "SELECT * FROM `versions` WHERE `is_default_id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllTestimonialsById($id){
    $sql = "SELECT * FROM `testimonials` WHERE `product_id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllReviewsById($id){
    $sql = "SELECT * FROM `reviews` WHERE `product_id` = :id GROUP BY `id`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectReviewById($id){
    $sql = "SELECT * FROM `reviews` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function insertComment($data){
    $errors = $this->validate($data);
    if(empty($errors)){
      $sql = "INSERT INTO `reviews` (`product_id`,`author`,`score`,`comment`) VALUES(:product_id,:author,:score,:comment)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':product_id',$data['id']);
      $stmt->bindValue(':author',$data['name']);
      $stmt->bindValue(':score',$data['review']);
      $stmt->bindValue(':comment',$data['message']);
      if($stmt->execute()){
        return $this->selectReviewById($this->pdo->lastInsertId());
      }
    }
    return false;
  }

  public function validate($data){
    $errors = [];
    if (empty($data['message'])) {
      $errors['message'] = 'Gelieve een comment in te geven';
    }
    if (empty($data['name'])) {
      $errors['name'] = 'Gelieve een name in te geven';
    }
    if (empty($data['review'])) {
      $errors['review'] = 'Gelieve een score in te geven';
    }
    return $errors;
  }

}
