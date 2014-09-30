<?php
HTML::macro('tr', function($status)
{
  switch ($status) {
    	case 'pending':
    		$build = "<tr class = 'warning'>";
    		break;
    	case 'taken':
    		$build = "<tr class = 'success'>";
    		break;
    	case 'rejected':
    		$build = "<tr class = 'danger'>";
    		break;
    }  
    
    
  return $build;
});

//Specials buttons

/*
    Ej: {{HTML::create_button($name,$url,$class)}}
        {{HTML::create_button('admin','admins.create')}}
 */
    HTML::macro('create_button', function($object, $url = "null", $class = "btn-primary"){

    if($url == 'null'){
        $url = $object.'s.create'; 
    }

    $build = '<a class="btn '.$class.'" href="'.URL::route($url).'">
                <i class="fa fa-plus"></i> Crear '.$object.'
             </a>';

    return $build;
});
