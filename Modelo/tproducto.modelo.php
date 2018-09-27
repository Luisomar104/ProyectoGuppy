<?php

class tproductoModelo
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=guppy', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM tipoproducto");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new tproducto();

                $alm->__SET('IdTipoProducto', $r->IdTipoProducto);
                $alm->__SET('DescripcionTipoProducto', $r->DescripcionTipoProducto);



                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($IdTipoProducto)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM tipoproducto WHERE IdTipoProducto = ?");
                      

            $stm->execute(array($IdTipoProducto));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new tproducto();

                $alm->__SET('IdTipoProducto', $r->IdTipoProducto);
                $alm->__SET('DescripcionTipoProducto', $r->DescripcionTipoProducto);


            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($IdTipoProducto)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM tipoproducto WHERE IdTipoProducto = ?");                      

            $stm->execute(array($IdTipoProducto));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(tproducto $data)
    {
        try 
        {
            $sql = "UPDATE tipoproducto SET 
                        
                        DescripcionTipoProducto         = ?
                        
                    WHERE IdTipoProducto = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    
                    $data->__GET('DescripcionTipoProducto'),
                    $data->__GET('IdTipoProducto')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(tproducto $data)
    {
        try 
        {
        $sql = "INSERT INTO tipoproducto (IdTipoProducto, DescripcionTipoProducto) 
                VALUES (?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('IdTipoProducto'),
                $data->__GET('DescripcionTipoProducto'),
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>
