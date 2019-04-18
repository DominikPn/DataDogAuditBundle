<?php
/**
 * Created by PhpStorm.
 * User: dominik
 * Date: 18.04.2019
 * Time: 12:14
 */

namespace DataDog\AuditBundle\Contracts;


interface Labeler
{
    public function getLabel($entity):string;
}