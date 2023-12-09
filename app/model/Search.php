<?php
require_once(__ROOT__ . "model/Model.php");

class Search extends Model {
    private $searchString;

    public function getSearchString() {
        return $this->searchString;
    }

    public function setSearchString($search_string) {
        $this->searchString = $search_string;
    }

    public function searchString($id,$title) {
      $search_string = $_POST['search_string'];
      $sql = "SELECT id, title  FROM products WHERE title LIKE :search_string";
      $stmt = $this->db->prepare($sql);
  
      $stmt->execute(['search_string' => "%$search_string%"]);
  
      while ($row = $stmt->fetch()) {
          echo '<button onclick="location.href=\'?.php?id=' . $row['id'] . '\'">' . $row['title'] . '</button>';
      }

        $stmt->close();
    }
}
?>
