<?php

namespace entities;

//Clase personaje
class Character {
    private $name = "";
    private $sex;
    private $learnedSkill;
    private $weapons = array();
    private $bodyType;
    private $healthPoints;
    private $maxHealthPoints;
    private $level;
    private $str;
    private $intl;
    private $agi;
    private $pDef;
    private $mDef;
    private $xp;
    private $race;
    private $playableClass;
    private $isAlive = true;

 //private $skills = array();

    public function __construct( $name, $sex, $bodyType, $race, $playableClass, $str, $intl ,$agi ,$pDef ,$mDef ,$xp, $healthPoints,$maxHealthPoints, $level, $isAlive, $learnedSkill, $weapons)
    {


        $this->name = $name;
        $this->sex = $sex;
        $this->bodyType = $bodyType;
        $this->healthPoints = $healthPoints;
        $this->maxHealthPoints = $maxHealthPoints;
        $this->level = $level;
        $this->str = $str;
        $this->intl = $intl;
        $this->agi = $agi;
        $this->pDef = $pDef;
        $this->mDef = $mDef;
        $this->xp = $xp;
        $this->race = $race;
        $this->playableClass = $playableClass;
        $this->isAlive = $isAlive;
        $this->learnedSkill = $learnedSkill;
        $this->weapons = $weapons;

    }

    public function getLearnedSkill()
    {
		return $this->learnedSkill;
	}

    public function setLearnedSkill($learnedSkill)
    {
        $this->learnedSkill = $learnedSkill;

        return $this;
    }

    public function getWeapons()
    {
		return $this->weapons;
    }
    
    public function getLeftWeapon()
    {
		return $this->weapons['left'];
    }

    public function hasLeftWeapon()
    {
		return $this->weapons['left'] instanceof \entities\Weapons\Weapon;
    }

    public function hasRightWeapon()
    {
		return $this->weapons['right'] instanceof \entities\Weapons\Weapon;
    }

    public function getRightWeapon()
    {
		return $this->weapons['right'];
    }
    
    public function addLeftWeapon($weapon)
    {
        $this->weapons["left"] = $weapon;
        return $this;
    }

    public function removeLeftWeapon()
    {
        $this->weapons["left"] = "";
        return $this;
    }

    public function addRightWeapon($weapon)
    {
        $this->weapons["right"] = $weapon;
        return $this;
    }

    public function removeRightWeapon()
    {
        $this->weapons["right"] = "";
        return $this;
    }

    public function setWeapons($weapons)
    {
        $this->weapons = $weapons;
        return $this;
    }

    public function numberOfWeapons()
    {
        $count = 0;
        if(self::hasRightWeapon()){
            $count = $count + 1;
        }
        if(self::hasLeftWeapon()){
            $count = $count + 1;
        }
        return $count;
    }

    public function hasWeapons()
    {
        return self::hasRightWeapon() || self::hasLeftWeapon();
    }


    public function getIsAlive()
    {
		return $this->isAlive;
	}

    public function setIsAlive($isAlive)
    {
        $this->isAlive = $isAlive;

        return $this;
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

    public function getSex()
    {
        return $this->sex;
    }


    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }


    public function getBodyType()
    {
        return $this->bodyType;
    }


    public function setBodyType($bodyType)
    {
        $this->bodyType = $bodyType;

        return $this;
    }


    public function getHealthPoints()
    {
        return $this->healthPoints;
    }

    public function setHealthPoints($healthPoints)
    {
        $this->healthPoints = $healthPoints;

        return $this;
    }


    public function getMaxHealthPoints()
    {
        return $this->maxHealthPoints;
    }


    public function setMaxHealthPoints($maxHealthPoints)
    {
        $this->maxHealthPoints = $maxHealthPoints;

        return $this;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }


    public function getStr()
    {
        return $this->str;
    }


    public function setStr($str)
    {
        $this->str = $str;

        return $this;
    }


    public function getIntl()
    {
        return $this->intl;
    }

    public function setIntl($intl)
    {
        $this->intl = $intl;

        return $this;
    }

    public function getAgi()
    {
        return $this->agi;
    }


    public function setAgi($agi)
    {
        $this->agi = $agi;

        return $this;
    }


    public function getPDef()
    {
        return $this->pDef;
    }

 
    public function setPDef($pDef)
    {
        $this->pDef = $pDef;

        return $this;
    }


    public function getMDef()
    {
        return $this->mDef;
    }


    public function setMDef($mDef)
    {
        $this->mDef = $mDef;

        return $this;
    }

    public function getXp()
    {
        return $this->xp;
    }


    public function setXp($xp)
    {
        $this->xp = $xp;

        return $this;
    }

    public function getRace()
    {
        return $this->race;
    }

    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }


    public function getPlayableClass()
    {
        return $this->playableClass;
    }


    public function setPlayableClass($playableClass)
    {
        $this->playableClass = $playableClass;

        return $this;
    }
}
