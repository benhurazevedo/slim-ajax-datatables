<?php 
namespace dbService;
use \PDO;
use \Slim\Container;

class connService
{
	private $c;
	function __construct(Container $c)
	{
		$this->c = $c;		
	}
	public function getConn()
	{
		global $conn;
		if ($conn == null) 
		{
			try{
				$conn = new PDO($this->c['settings']['DSN'], $this->c['settings']['DATABASE_USER'], $this->c['settings']['DB_PASSWORD']);
				$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			} catch (\Exception $e)
			{
				throw new DbConnException("Banco de dados não disponível");
			}
		}
		return $conn;
	}
}
?>