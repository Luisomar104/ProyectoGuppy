<?php
 
class ciudadModelo 
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

    public function ListarCiudad()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM ciudad");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $ciudad = new ciudad();

                $ciudad->__SET('idCiudad', $r->idCiudad);
                $ciudad->__SET('NombreCiudad', $r->NombreCiudad);

               
                $result[] = $ciudad;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ObtenerCiudad($idCiudad)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM ciudad WHERE idCiudad = ?");
                      

            $stm->execute(array($idCiudad));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $ciudad = new ciudad();

                $ciudad->__SET('idCiudad', $r->idCiudad);
                $ciudad->__SET('NombreCiudad', $r->NombreCiudad);


            return $ciudad;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function EliminarCiudad($idCiudad)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM ciudad WHERE idCiudad = ?");                      

            $stm->execute(array($idCiudad));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function ActualizarCiudad(ciudad $data)
    {
        try 
        {
            $sql = "UPDATE ciudad SET 
                        
                        NombreCiudad           = ?
  
                        
                    WHERE idCiudad = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    
                    $data->__GET('NombreCiudad'), 

                    $data->__GET('idCiudad')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function RegistrarCiudad(ciudad $data)
    {
        try 
        {
        $sql = "INSERT INTO ciudad (idCiudad, NombreCiudad)
                VALUES (?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('idCiudad'), 
				$data->__GET('NombreCiudad'), 

                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>