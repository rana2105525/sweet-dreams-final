<?php
require_once(__ROOT__ . "view/View.php");

class ViewProducts extends View{
    public function output(){
		$str="<div class='component'>";
	 	include 'partials/sidebar.admin.php';
		$str.= "<div class='content'>
		<div id='header'><h2>All Products</h2></div>";
		$str.="<div class='tablecont'>";
		$str.="<table>";
        $str.="<thead class='tablehead'>";
		$str.="<tr>";
        $str.="<th class = 'tableHeader'>#ID</th>";
        $str.="<th class = 'tableHeader'>Title</th>";
        $str.="<th class = 'tableHeader'>Price</th>";
        $str.="<th class = 'tableHeader'>Description</th>";
        $str.="<th class = 'tableHeader'>Product &nbsp; Image</th>";
        $str.="<th class = 'tableHeader'>Category</th>";
        $str.="<th class = 'tableHeader'>Added &nbsp; at</th>";
        $str.="<th class = 'tableHeader'>Operation</th>";
        $str.="</tr>";
        $str.="</thead>";
        $str.="<tbody>";


		foreach($this->model->getProducts() as $Product){
			$str.="<tr>";
			$str.="<td class = 'cell'>" . $Product->getId() ."</td> ";
			$str.="<td class = 'cell'>" . $Product->getTitle() ."</td> ";
			$str.="<td class = 'cell'>" . $Product->getPrice() ."</td> ";
			$str.="<td class = 'cell'>" . $Product->getDescription() ."</td> ";
			$str.="<td class = 'cell'> <img class='table_img' src='../public/".$Product->getProdImage()."' alt='".$Product->getTitle()."'/></td> ";
			$str.="<td class = 'cell'>" . $Product->getCategory() ."</td> ";
			$str.="<td class = 'cell'>" . $Product->getAddedAt() ."</td> ";
			$str.="<td>
			  <button class = 'buttons' id ='edit'><a href='product.php?update_id='".$Product->getId()."'>Edit</a></button>
			  <button class = 'buttons' id ='delete'><a href='products.admin.php?action=delete&id=".$Product->getId()."'>Delete</a></button>
			</td> "; 
			$str.="</tr>";
		}
        $str.="</tbody>";
		$str.="</table>";
        $str.="</div>";
        $str.="</div>";
        $str.="</div>";

		//$str.="<a href='profile.php'>Back to Profile </a>";

		return $str;
	}
}
