<?php 

namespace Route;

use Model\DatabaseInteractionModel AS Model;
use Libraries\Validations;

class Page extends Model {

    #Returns Validations methods object
    use Validations;

     /**
	 * Displays HTML Document
	 *
	 * @param string $page filename
	 * @param array|object $data The data to pass to the document
	 * @return void
	 */    

    public function Route()
    {       
        $file = $_GET['page'] ?? 'enduser';

        if (file_exists(APP.'Controllers/'.$file.'.php')) {
            
            $fullClassName = 'Controllers\\'.$file;

			$class = new $fullClassName();

            if (method_exists($class, $file)) {
                
                $class->$file();

            } else { 

                error("Page you are looking for might have been removed or it's temporarily unavailable: ".$file);
            }

        } else {

            error("Page you are looking for might have been removed or it's temporarily unavailable: ".$file);
        }
    }


    /**
	 * Displays HTML Document
	 *
	 * @param string $page filename
	 * @param array|object $data The data to pass to the document
	 * @return void
	 */
	public function view($page, $data = NULL)
	{
		if (!file_exists(VIEWS.$page.'.php')) {
			
			error("Page you are looking for might have been removed or it's temporarily unavailable.");

		} else {

			sleep(1);
			require VIEWS.$page.'.php';
		} 
	}

	public function redirect_url($page)
	{
		header('location:index.php?page='.$page);
	}
}