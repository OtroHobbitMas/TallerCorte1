<?php

namespace entities\Weapons;

//Clase arma o Weapon
class Weapon {
	private $name;
	private $description;
    private $type; // 0 - varitas, 1 - espadas, 2 - dagas, 3 - bastones, 4 - hachas.
    private $dmg;
    private $twoHanded;

    public function __construct($name, $description, $type, $dmg, $twoHanded){
		$this->name = $name;
		$this->description = $description;
        $this->type = $type;
        $this->dmg = $dmg;
        $this->twoHanded = $twoHanded;
    }

    public function getName(){
		return $this->name;
	}

	public function setName($name){
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

	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
		return $this;
	}

	public function getDmg(){
		return $this->dmg;
	}

	public function setDmg($dmg){
		$this->dmg = $dmg;
		return $this;
	}

	public function getTwoHanded(){
		return $this->twoHanded;
	}

	public function setTwoHanded($twoHanded){
		$this->twoHanded = $twoHanded;
		return $this;
	}
}
