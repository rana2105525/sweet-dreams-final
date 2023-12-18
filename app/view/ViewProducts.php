<?php
require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/ProductsController.php");
require_once(__ROOT__ . "view/partials/sidebar.admin.php");

class ViewProducts extends View{
	private $editId;

    public function output(){
		$str="<div class='component'>";
		echo sidebar();
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
			  <button class = 'buttons' id ='edit'><a href='editProduct.admin.php?update_id=".$Product->getId()."'>Edit</a></button>
			  <button class = 'buttons' id ='delete'><a href='products.admin.php?action=delete&id=".$Product->getId()."'>Delete</a></button>
			</td> "; 
			$str.="</tr>"; 
		}
        $str.="</tbody>";
		$str.="</table>";
        $str.="</div>";
        $str.="</div>";
        $str.="</div>";
		return $str;
	}


	public function editProductForm(){
		$this->editId =$_GET['update_id'];
		foreach($this->model->getProducts() as $Product){
			if($Product->getId() == $this->editId){
				$str='<div class ="component">';
				//echo sidebar();
				$str.='<div class ="content rows">';
				$str.='<section class="container">';
				$str.='<form action="" class="form" method="post" enctype= "multipart/form-data">';
				$str.='<div id="header"><h2>Edit product</h2></div>';
				
				$str.='<div class="input-box">';
				$str.='<label for ="title">Product Title</label>';
				$str.='<input type="text" id="title" name="title" value="'. $Product->getTitle().'" >';
				$str.='</div>';

				$str.='<div class="input-box">';
				$str.='<label for="price" >Product price</label>';
				$str.='<input type="number" step="any" id ="price" name ="price" value="'. $Product->getPrice().'" />';
				$str.='</div>';

				$str.='<div class="input-box">';
				$str.='<label for ="description">Product description</label>';
				$str.='<textarea id="description" name="description" rows="4" cols="85">'. $Product->getTitle().'</textarea>';
				$str.='</div>';

				$str.='<div class="input-box">';
				$str.='<label for="prod_image">Product image</label>';
				$str.='<input type="file" id="prod_image" name="prod_image" accept =".png,.jpg,.jpeg"/>';
				$str.='</div>';

				$str.='<div class="input-box">';
				$str.='<label for ="category">Category</label>';
				$str.='</div>';
				$str.='<div>';
				$str.='<div>';
				$str .= '<input type="radio" name="category" id="Winter_Collection" value="Winter_Collection"';
				if ($Product->getCategory() == "Winter_Collection") {
				 	$str.='checked="checked"';
				}
				$str.= '>';
				$str.='<label for ="Winter_Collection" >Winter Collection</label>';
				$str.='</div>';
				$str.='<div>';
				$str .= ' <input type="radio" name="category" id="Summer_Collection" value="Summer_Collection"';
				if ($Product->getCategory() == "Summer_Collection") {
				  $str.='checked="checked"';
				}
				$str .= '>';
				$str.='<label for ="Summer_Collection" >Summer Collection</label>';
				$str.='</div>';
				$str.='<div>';
				$str .= ' <input type="radio" name="category" id="Bundle" value="Bundle"';
				if ($Product->getCategory() == "Bundle") {
				  $str.= 'checked="checked"'; 
				}
				$str .= '>';
				$str.='<label for ="Bundle" >Bundle</label>';
				$str.='</div>';
				$str.='</div>';
				$str.='<button name="edit" class = "buttons"><a href="products.admin.php?action=edit&id='.$this->editId .'">Update Product</a></button>';
				$str.='</form>';
				$str.='</section>';
				$str.='</div>';
				$str.='</div>';
				return $str;
			}
			else continue;
		}
	}
}
