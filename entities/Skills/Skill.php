<?php

namespace entities\Skills;

//Clase de habilidad o Skill
class Skill {
    private $name;
    private $description;
    private $type;
    private $subType;

    public function __construct($name, $description, $type)
    {
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
    }

    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }


    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getSubType()
    {
        return $this->subType;
    }


    public function setSubType($subType)
    {
        $this->subType = $subType;

        return $this;
    }
}
