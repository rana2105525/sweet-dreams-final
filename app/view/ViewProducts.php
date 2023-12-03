<?php

require_once(__ROOT__ . "view/View.php");

class ViewProducts extends View{
    public function output(){
         
    }

    public function showProducts(){
        $str = '<tr>
        <td class ="cell"> #'.$this->model->getId().'</td>
        <td class ="cell">'.$this->model->getTitle().'</td>
        <td class ="cell">'.$this->model->getPrice().'</td>
        <td class ="cell">'.$this->model->getDescription().'</td>
        <td><img class="table_img" src="../../../public/'.$this->model->getProd_image().'"alt='.$this->model->getTitle().'/></td>
        <td class ="cell">'.$this->model->getCategory().'</td>
        <td class ="cell">'.$this->model->getAdded_at().'</td>
        <td>
          <button class = "buttons" id ="edit"><a href="editProduct.php?update_id='.$this->model->getId().'">Edit</a></button>
          <button class = "buttons" id ="delete"><a href=deleteProduct.php?delete_id='.$this->model->getId().'">Delete</a></button>
        </td>
      </tr>';
      return $str;
    }
    
} 