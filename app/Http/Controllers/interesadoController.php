<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\interesado;

class interesadoController extends Controller
{
    //
     public function showForm($id){   
    	
        //$interesados=interesado::latest()->paginate(8);  
    	  return view('interesados.formInteresados',[
             'idNoticia' => $id,      
           
        //'noticias'=> $noticias,
            ]);
    }
    
}
