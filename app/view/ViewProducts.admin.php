<?php
require_once(__ROOT__ . "view/View.php");

class ViewProducts extends View{
    public function output(){
		$str = "";
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
			$str.="<td class = 'cell'> <img class='table_img' src='../../../public/".$Product->getProdImage()."' alt='".$Product->getTitle()."'/></td> ";
			$str.="<td class = 'cell'>" . $Product->getCategory() ."</td> ";
			$str.="<td class = 'cell'>" . $Product->getAddedAt() ."</td> ";
			// $str.="<td>
			//  <button class = 'buttons' id ='edit'><a href='editProduct.php?update_id='".$Product->getId()."'>Edit</a></button>
			//  <button class = 'buttons' id ='delete'><a href=".$Product->deleteProduct()."?delete_id='".$Product->getId()."'>Delete</a></button>
			// </td> ";
			// $str.="</tr>";
		}
		$str.="</table>";
		//$str.="<a href='profile.php'>Back to Profile </a>";

		return $str;
	}
}
