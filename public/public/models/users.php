<?php 

require_once 'config/config.php';

class Users {

	private $table = 'usuarios';
	private $conection;
    private $date = constant("CURRENT_DATE");
    private $played = 0;

	public function __construct() {
		
	}

	/* Set conection */
	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/* Get all notes */
	public function getAll(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table." ORDER BY user ASC";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Get note by id */
	public function getUserById($id){
		if(is_null($id)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$id]);

		return $stmt->fetch();
	}

	/* Save note */
	public function save($param){
		$this->getConection();

		/* Set default values */
		$title = $content = "";

		/* Received values */
		if(isset($param["user"])) $user = $param["user"];
		if(isset($param["plataforma"])) $platf = $param["plataforma"];

		/* Database operations */
		$sql = "INSERT INTO ".$this->table. " (user, plataforma, fecha, jugado) values(?, ?, ?, ?)";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$user, $platf, $this->date, $this->played]);
		$id = $this->conection->lastInsertId();

		return $id;	

	}

	/* Delete note by id */
	public function deleteUserById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

}

?>