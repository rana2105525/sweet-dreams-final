<?php
require_once(__ROOT__ . "controller/Controller.php");
 
class SearchController extends Controller{
public function search(){

  $id=$_REQUEST['id'];
  $title=$_REQUEST['title'];

  $this->model->searchString($id,$title);
}
}
?>