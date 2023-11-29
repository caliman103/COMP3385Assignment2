<?php

if(!defined("ROOT_FULL_PATH")) {
   define ("ROOT_FULL_PATH", "C:/wamp64/www/COMP3385_Frameworks/Assignment_2");
    define ("ROOT_DIR", "/COMP3385_Frameworks/Assignment_2");
    define ("APP_DIR", "C:/COMP3385_Assigment_2/400005037/app");
    define ("FRAMEWORK_DIR", "C:/COMP3385_Assigment_2/400005037/framework");
    define ("TPL_DIR", "C:/COMP3385_Assigment_2/400005037/tpl");
    define ("AUTOLOADER", "C:/COMP3385_Assigment_2/400005037/framework/autoloader.php"); 
}


spl_autoload_register(function($class) {
/*         printer('+++++++++++++++++++++++++++++++++++++++++++++++');
        printer($class);
        printer('------------------'); */
        $directories = [APP_DIR, FRAMEWORK_DIR, TPL_DIR, ROOT_FULL_PATH];
        foreach($directories as $directory) {
            if(checkDirectory($class,$directory)) return; 
        }
        trigger_error('Autoloader cannot find ' . lcfirst($class) . '.php', E_USER_ERROR);
    });


    /**
     * This is supposed to check all of the directories within the root of the 
     */
    function checkDirectory($class,$directory) {
        foreach(scandir($directory) as $direc) {
/*             printer($directory.'/'.$direc); */
                if(is_dir($directory.'/'.$direc) && (!preg_match("/^\./",$direc))) {
                    if(checkDirectory($class, $directory.'/'.$direc)) return true;
                } else if(file_exists($directory.'/'.$direc.'/'.lcfirst($class).'.php')) {
/*                     printer($directory.'/'.$direc.'/'.lcfirst($class).'.php'." ==> FOUND");
                    printer('+++++++++++++++++++++++++++++++++++++++++++++++'); */
                    require_once $directory.'/'.$direc.'/'.lcfirst($class).'.php';
                    return true;
                }
        }
    }

function printer($thing) {
    echo $thing . '<br><br>';
}

function dump_printer($thing) {
    echo var_dump($thing).'<br><br>'; 
}
