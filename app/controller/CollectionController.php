<?php
require_once(__ROOT__ . "controller/Controller.php");

class CollectionController extends Controller
{
    public function collection()
    {
        $title= $_REQUEST['title'];
        $price = $_REQUEST['price'];
        $desc = $_REQUEST['description'];
        $image = $_REQUEST['prod_image'];
        $this->model->collectionsSummer($title,$price,$desc,$image);
        $this->model->collectionsWinter($title,$price,$desc,$image);
        $this->model->collectionsBundleAndSave($title,$price,$desc,$image);
    }
    public function getProductById() {
        if (isset($_GET['id'])) {
            $itemId = $_GET['id'];
            $description = $this->model->getProductById($itemId);
            echo $description;
          } else {
            // Handle missing ID case
          }
               

}
}

?>