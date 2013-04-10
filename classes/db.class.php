<?PHP

/* 
 * The DB Class
 *
 * All Database Calls is made through this Static Object
 * Usage: DB::getInstance()->...()
 *
 */

class DB { 

    private static $objInstance; 
    
    private function __construct() {} 
    
    private function __clone() {} 
    
    public static function getInstance(  ) { 
            
        if(!self::$objInstance){ 
            self::$objInstance = new PDO("pgsql:dbname=risk;host=localhost", "risk", "risk"); 
            self::$objInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } 
        
        return self::$objInstance; 
    
    }
    
} 
?>
