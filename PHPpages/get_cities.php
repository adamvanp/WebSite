<?php
    switch($_REQUEST['state'])
    {
        case "tas":
        $cities = array('Please Select City',  'Hobart', 'Launceston');
        break;
        
		case "vic":
        $cities = array('Please Select City', 'Melbourne');
        break;
        
        case "qld":
        $cities = array('Please Select City', 'Brisbane');
        break;

        case "nt":
        $cities = array('Please Select City', 'Darwin';
        break;
         
        case "nsw":
        $cities = array('Please Select City', 'Sydney');
        break; 
        
        case "wa":
        $cities = array('Please Select City', 'Perth');
        break;
         
        case "act":
        $cities = array('Please Select City', 'Canberra');
        break; 
        
        case "sa":
        $cities = array('Please Select City', 'Adelaide');
        break;   
        
        default :
        $cities = false;
        break;
    }
    if(!$cities) echo "Please Select City First";
    else echo "<select name='city'><option>".
            implode('</option><option>',$cities).
            '</option></select>';
?>



		