<?php
class conteoVisitasModelo
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
public function ListarConteo()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM conteo_visitas");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $conteo = new conteo_visitas();

                $conteo->__SET('IdConteoVisitas', $r->IdConteoVisitas);
                $conteo->__SET('Visitas', $r->Visitas);
				$conteo->__SET('FKUsuario', $r->FKUsuario);
				               
                $result[] = $conteo;
            }


            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ObtenerConteo($IdConteoVisitas)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM conteo_visitas WHERE IdConteoVisitas = ?");
                      

            $stm->execute(array($IdConteoVisitas));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $conteo = new conteo_visitas();

                $conteo->__SET('IdConteoVisitas', $r->IdConteoVisitas);
                $conteo->__SET('Visitas', $r->Visitas);
                $conteo->__SET('FKUsuario', $r->FKUsuario);



            return $conteo;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function EliminarConteo($IdConteoVisitas)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM conteo_visitas WHERE IdConteoVisitas = ?");                      

            $stm->execute(array($IdConteoVisitas));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function ActualizarConteo(conteo_visitas $data)
    {
        try 
        {
            $sql = "UPDATE conteo_visitas SET  
                        Visitas 					= ?,
                        FKUsuario					= ?


                    WHERE IdConteoVisitas = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(    
                    $data->__GET('Visitas'),
					$data->__GET('FKUsuario'),
					$data->__GET('IdConteoVisitas')

                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function RegistrarConteo(conteo_visitas $data)
    {
        try 
        {
        $sql = "INSERT INTO conteo_visitas (IdConteoVisitas, Visitas, FKUsuario)
                VALUES (?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('IdConteoVisitas'), 
				$data->__GET('Visitas'), 
                $data->__GET('FKUsuario')
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>