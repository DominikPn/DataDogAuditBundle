<?php
/**
 * Created by PhpStorm.
 * User: dominik
 * Date: 18.04.2019
 * Time: 12:18
 */

namespace DataDog\AuditBundle\Labeler;

use Doctrine\ORM\EntityManager;
use DataDog\AuditBundle\Contracts\Labeler;

class DefaultLabeler implements Labeler
{
    /** @var EntityManager */
    protected $em;

    public function getLabel($entity): string
    {
        return $this->defaultLabel($entity);
    }

    public function setEm(EntityManager $em)
    {
        $this->em = $em;
    }

    public function defaultLabel($entity):string
    {
        if($this->em != null){
            $meta = $this->em->getClassMetadata(get_class($entity));
            switch (true) {
                case $meta->hasField('title'):
                    return $meta->getReflectionProperty('title')->getValue($entity);
                case $meta->hasField('name'):
                    return $meta->getReflectionProperty('name')->getValue($entity);
                case $meta->hasField('label'):
                    return $meta->getReflectionProperty('label')->getValue($entity);
                case $meta->getReflectionClass()->hasMethod('__toString'):
                    return (string)$entity;
                default:
                    return "Unlabeled";
            }
        }

        return "Unlabeled";
    }

}