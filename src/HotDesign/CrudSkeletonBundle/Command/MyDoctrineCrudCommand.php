<?php

//src/Acme/CrudGeneratorBundle/Command/MyDoctrineCrudCommand.php

namespace HotDesign\CrudSkeletonBundle\Command;

use Sensio\Bundle\GeneratorBundle\Generator\DoctrineCrudGenerator;

class MyDoctrineCrudCommand extends \Sensio\Bundle\GeneratorBundle\Command\GenerateDoctrineCrudCommand {

    protected function configure() {
        parent::configure();
        $this->setName('hotdesign:generate:crud')->setDescription('Generador CRUD de Doctrine usando Skeleton de HotDesign');
    }

    protected function getGenerator() {
        $generator = new DoctrineCrudGenerator($this->getContainer()->get('filesystem'), __DIR__ . '/../Resources/skeleton/crud');
        $this->setGenerator($generator);
        return parent::getGenerator();
    }

}