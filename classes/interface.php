<?php

interface DbConnection
{
    public function createTbl();
    public function getAll();
    public function create($params);
    public function update($params);
    public function delete($params);
    public function search($params);
}
