<?php

    function getMenu()
    {
        try{
        return executeQuery("SELECT * FROM menu");
        }
        catch(PDOException $e)
        {
            writeError($e->getMessage());
        }
    }

?>