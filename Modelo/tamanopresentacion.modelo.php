<?php

class tamanopresentacionModelo
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



    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM tamanopresentacion");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new tamanopresentacion();

                $alm->__SET('IdTamanoPresentacion', $r->IdTamanoPresentacion);
                $alm->__SET('DescripcionTP', $r->DescripcionTP);

               
                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($tamanopresentacion)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM tamanopresentacion WHERE IdTamanoPresentacion = ?");
                      

            $stm->execute(array($tamanopresentacion));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new tamanopresentacion();

                $alm->__SET('IdTamanoPresentacion', $r->IdTamanoPresentacion);
                $alm->__SET('DescripcionTP', $r->DescripcionTP);


            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());

        }
    }

    public function Eliminar($tamanopresentacion)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM tamanopresentacion WHERE IdTamanoPresentacion = ?");                      

            $stm->execute(array($tamanopresentacion));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(tamanopresentacion $data)
    {
        try 
        {
            $sql = "UPDATE tamanopresentacion SET                       
                        DescripcionTP           = ?     
                    WHERE IdTamanoPresentacion = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    
                    $data->__GET('DescripcionTP'), 
                    $data->__GET('IdTamanoPresentacion')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(tamanopresentacion $data)
    {
        try 
        {
        $sql = "INSERT INTO tamanopresentacion (IdTamanoPresentacion, DescripcionTP)
                VALUES (?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('IdTamanoPresentacion'), 
				$data->__GET('DescripcionTP'), 

                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>