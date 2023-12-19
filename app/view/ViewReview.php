<?php
require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "view/partials/sidebar.admin.php");
require_once(__ROOT__ . "view/partials/footer.php");


class ViewReview extends View{
  public function output(){

  }


  public function displayInAdmin(){
    $str='<div class="component">';
		echo sidebar();
    $str.='<div class="content">';
    $str.='<div id="header"><h2>Customers Reviews</h2></div>';
    $str.='<div class="tablecont">';
    $str.='<table>';
    $str.='<thead class="tablehead">';
    $str.='<tr>';
    $str.='<th class = "tableHeader">#ID</th>';
    $str.='<th class = "tableHeader">User ID</th>';
    $str.='<th class = "tableHeader">User Name</th>';
    $str.='<th class = "tableHeader">Product ID</th>';
    $str.='<th class = "tableHeader">Product Title</th>';
    $str.='<th class = "tableHeader">Reveiw</th>';
    $str.='<th class = "tableHeader">Operation</th>';
    $str.='</tr>';
    $str.='</thead>';
    $str.='<tbody>';
		foreach($this->model->getReviews() as $Review){
      $str.="<tr>";
      $str.="<td class = 'cell'>" . $Review->getId() ."</td> ";
      $str.="<td class = 'cell'>" . $Review->getUserId() ."</td> ";
      $str.="<td class = 'cell'>" . $Review->getUserName() ."</td> ";
      $str.="<td class = 'cell'>" . $Review->getProductId() ."</td> ";
      $str.="<td class = 'cell'>" . $Review->getProductTitle() ."</td> ";
      $str.="<td class = 'cell'>" . $Review->getReview() ."</td> ";
      $str.="<td>
        <button class = 'buttons' id ='delete'><a href='reviews.admin.php?action=delete&id=".$Review->getId()."'>Delete</a></button>
      </td> "; 
      $str.="</tr>";
    }

    $str.='</tbody>';
    $str.='</table>';
    $str.='</div>';
    $str.='</div>';
    $str.='</div>';
    return $str;
  }
  public function footer()
  {
    echo footer();
  }

}
?>