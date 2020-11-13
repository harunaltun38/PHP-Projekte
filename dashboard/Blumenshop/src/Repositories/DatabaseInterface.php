<?php
namespace MyBlumenshopApp\Repositories;

interface DatabaseInterface
{
    public function query($sql);
    public function prepare($sql);
}