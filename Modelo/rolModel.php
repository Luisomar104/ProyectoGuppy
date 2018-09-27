<?php
class Rolmodel
{
	private $pdo;
	
	public function __CONSTRUCT()
	{
		try{
			$this->pdo= database::conectar();
		}catch(Exception $ex){
			die($e->getMessage());
		}
	}	
public function Registrar_Rol(Rol $data)
{
	try
	{
		$sql = "INSERT INTO rol (idRol, EstadoRol)
				VALUES(?, ?)";
				
		$this->pdo->prepare($sql)
			 ->execute(
			array(
				$data->__GET('idRol'),
				$data->__GET('EstadoRol')
				)
			);
	}catch (Exception $e)
	{
		die($e->getMessage());
	}
}

public function Listar_Rol()
{
	try
	{
		$result = array();
		$stm = $this->pdo->prepare("SELECT * FROM rol");
		$stm->execute();
		
		foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
		{
			$rol = new Rol();
			
			$rol->__SET('idRol', $r->idRol);
			$rol->__SET('EstadoRol', $r->EstadoRol);
			
		$result[] = $rol;
		}
		return $result;
	}
	catch(Exception $e)
	{
		die($e->getMessage());
	}
}

public function Obtener_Rol($idRol)
{
	try
	{
		$stm = $this->pdo
				->prepare("SELECT * FROM rol WHERE idRol = ?");
				
		$stm->execute(array($idRol));
		$r = $stm->fetch(PDO::FETCH_OBJ);
		
		$rol = new Rol();
		
		
			$rol->__SET('idRol', $r->idRol);
			$rol->__SET('EstadoRol', $r->EstadoRol);
			
		return $rol;
	}catch(Exception $e)
	{
		die($e->getMessage());
	}
}

public function Actualizar_Rol(Rol $data)
{
	try
	{
		$sql = "UPDATE rol SET
					idRol				=?,
					EstadoRol		=?
				WHERE idRol			=?";
				
		$this->pdo->prepare($sql)
			 ->execute(
			 array(
			 
				$data->__GET('Rol2'),
				$data->__GET('EstadoRol'),
				$data->__GET('idRol')
				
				)
			);
	}catch(Exception $e)
	{
		die($e->getMessage());
	}
}

public function Eliminar_Rol($idRol)
{
	try
	{
		$stm = $this->pdo
				   ->prepare("DELETE FROM rol WHERE idRol = ?");
				   
		$stm->execute(array($idRol));
	}catch(Exception $e)
	{
		die($e->getMessage());
	}
}
}
?>