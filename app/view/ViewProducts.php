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
        $str.="<th class = 'tableHeader'>Color</th>";
        $str.="<th class = 'tableHeader'>Size</th>";
        $str.="<th class = 'tableHeader'>Quantity</th>";
        $str.="<th class = 'tableHeader'>Operation</th>";
        $str.="</tr>";
        $str.="</thead>";
        $str.="<tbody>";

			//   <button class = 'buttons' id ='edit'><a href='editProduct.admin.php?update_id=".$Product->getId()."'>Edit</a></button>

		foreach($this->model->getProducts() as $Product){
			$str.="<tr>";
			$str.="<td class = 'cell'>" . $Product->getId() ."</td> ";
			$str.="<td class = 'cell'>" . $Product->getTitle() ."</td> ";
			$str.="<td class = 'cell'>" . $Product->getPrice() ."</td> ";
			$str.="<td class = 'cell'>" . $Product->getDescription() ."</td> ";
			$str.="<td class = 'cell'> <img class='table_img' src='../public/".$Product->getProdImage()."' alt='".$Product->getTitle()."'/></td> ";
			$str.="<td class = 'cell'>" . $Product->getCategory() ."</td> ";
			$str.="<td class = 'cell'>" . $Product->getColor() ."</td> ";
			$str.="<td class = 'cell'>" . $Product->getSize() ."</td> ";
			$str.="<td class = 'cell'>" . $Product->getQuantity() ."</td> ";
			$str.="<td>
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


  

	public function addProductForm(){
		$str='<div class ="component">';
		echo sidebar();
		$str.='<div class ="content rows">';
		$str.='<section class="container">';
		$str.='<form action="products.admin.php?action=insert" class="form" method="post" enctype= "multipart/form-data">';
		$str.='<div id="header"><h2>Add product</h2></div>';
		
		$str.='<div class="input-box">';
		$str.='<label for ="title">Product Title</label>';
		$str.='<input type="text" id="title" name="title">';
		$str.='</div>';

		$str.='<div class="input-box">';
		$str.='<label for="price" >Product price</label>';
		$str.='<input type="number" step="any" id ="price" name ="price"/>';
		$str.='</div>';

		$str.='<div class="input-box">';
		$str.='<label for ="description">Product description</label>';
		$str.='<textarea id="description" name="description" rows="4" cols="85"></textarea>';
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
		$str .= '<input type="radio" name="category" id="Winter_Collection" value="Winter_Collection">';
		$str.='<label for ="Winter_Collection" >Winter Collection</label>';
		$str.='</div>';
		$str.='<div>';
		$str .= ' <input type="radio" name="category" id="Summer_Collection" value="Summer_Collection">';
		$str.='<label for ="Summer_Collection" >Summer Collection</label>';
		$str.='</div>';
		$str.='<div>';
		$str .= ' <input type="radio" name="category" id="Bundle" value="Bundle">';
		$str.='<label for ="Bundle" >Bundle</label>';
		$str.='</div>';
		$str.='</div>';

		$str.='<div class="input-box">';
		$str.='<label for ="color">Color</label>';
		$str.='</div>';
		$str.='<div>';
		$str.='<div>';
		$str .= '<input type="radio" name="color" id="Orange" value="Orange">';
		$str.='<label for ="Orange" >Orange</label>';
		$str.='</div>';
		$str.='<div>';
		$str .= ' <input type="radio" name="color" id="Blue" value="Blue">';
		$str.='<label for ="Blue" >Blue</label>';
		$str.='</div>';

		$str.='<div class="input-box">';
		$str.='<label for ="size">Size</label>';
		$str.='</div>';
		$str.='<div>';
		$str.='<div>';
		$str .='<input type="radio" name="size" id="0-3" value="0-3">';
		$str.='<label for ="0-3" >0-3</label>';
		$str.='</div>';
		$str.='<div>';
		$str .= '<input type="radio" name="size" id="3-6" value="3-6">';
		$str.='<label for ="3-6" >3-6</label>';
		$str.='</div>';
		$str.='<div>';
		$str .= '<input type="radio" name="size" id="6-12" value="6-12">';
		$str.='<label for ="6-12" >6-12</label>';
		$str.='</div>';
		$str.='<div>';
		$str .= '<input type="radio" name="size" id="12-24" value="12-24">';
		$str.='<label for ="12-24" >12-24</label>';
		$str.='</div>';
	
		$str.='<div class="input-box">';
		$str.='<label for="quantity" >Product quantity</label>';
		$str.='<input type="number" step="any" id ="quantity" name ="quantity"/>';
		$str.='</div>';

		$str.='<button type="submit" name="submit" id="submit-button" value="submit">Add product</button>';
		$str.='</form>';
		$str.='</section>';
		$str.='</div>';
		$str.='</div>';
		return $str;
	}
}
