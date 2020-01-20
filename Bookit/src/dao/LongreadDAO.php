<?php

require_once( __DIR__ . '/DAO.php');

class LongreadDAO extends DAO {
  public function selectAllRoles(){
    $sql = "SELECT * FROM `roles`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
