<?php
/**
 * Created by PhpStorm.
 * User: dominik
 * Date: 17.04.2019
 * Time: 15:04
 */

namespace DataDog\AuditBundle\Contracts;


interface LogGate
{
    /**
     * Must return function that return true or false
     * 
     * @return callable
     */
    public function getCallback():callable;
}