<?php
abstract class Database
{
    abstract public function connect();
}

interface Table 
{
    public function createTbl();   
}
?>