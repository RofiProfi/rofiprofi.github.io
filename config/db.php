<?php
class DB{
    private static $factory;

    public static function createInstance($config = null)
    {/* //konekcija za mysql preko localhost-a
        $settings['dbname'] = 'kozmolend';
        $settings['dbhost'] = '127.0.0.1';
        $settings['dbuser'] = 'root';
        $settings['dbpass'] = '';
	try{
            $dsn = 'mysql:dbname=' . $settings['dbname'] . ';host=' . $settings['dbhost'];
            $pdo = new PDO($dsn, $settings['dbuser'], $settings['dbpass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
*/
        $host="ec2-54-247-122-209.eu-west-1.compute.amazonaws.com";
        $user="vfvwpqwscrjmpt";
        $password="346c9358cc42f99542d08c0eb971385cddd0ea15184cefe4fcf703ff99612a13";
        $dbname="dfv2eet43gqv6n";
        $port="5432";
        try{
			$dsn="pgsql:host=".$host.";port=".$port.";dbname=".$dbname.";user=".$user.";password=".$password.";";
         $pdo = new PDO($dsn,$user,$password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            self::$factory[$config] = $pdo;

            return self::$factory[$config];
        }
        catch (PDOException $e) {
            die ('Connection failed: ' . $e->getMessage());
        }
    }
}
?>
