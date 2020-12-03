<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Base
{
     

   protected $table = 'menus';
   
   public $timestamps = false;

   protected $guarded = ['id'];

   public function printInput(){
    if($this->area){
        return "<input type='hidden' id='menuareaselected' value='". $this->area ."'>";
    }
    return '';

   }

	public function chilren($menu){
        $html = '';
        $html .= '<ul style="display: none;">'; 
        foreach($menu as $li ):
        $html .='<li class=""><a href="'.$li['slug'].'"> <span>'.$li['name'].'</span></a></li>';
        endforeach;      
        $html .= '</ul>';
        return $html;
    }
    
    public function main_menu(){
        $menu = json_decode( $this->menu , TRUE);
        $html = '';
        $slug  = \Session::get('store').'/category/';
        foreach($menu as $li ):        
        $chilren = ' ';
        if(isset($li['children'])){
            $chilren = $this->chilren($li['children']);
        }        
        $html .='<li class="drop-menu">
                    <a class="" href="'.$li['slug'].'">
                        <span>'.$li['name'].'</span>                        
                    </a>
                    '.$chilren.'
              </li>';
        endforeach;
        
        return $html;
        
    }






}
