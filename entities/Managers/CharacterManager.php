<?php

namespace entities\Managers;

class CharacterManager{

    public static function create($name, $sex, $bodyType,$race, $playableClass){
        //Este metodo permite crear el personaje con los stats segun la raza que sea
        [$maxHealthPoints, $str,$intl,$agi,$pDef,$mDef] = $race::getStats();
        $learnedSkill=0;
        $xp = 0;
        $weapons = array(
            "left" => "",
            "right" => "",
        );
        // Al ser creado el personaje tiene tantos puntos de vida actuales
        // como el máximo que puede tener

        $healthPoints = $maxHealthPoints;
        $level = 1;
        $isAlive = true;
        $character = new \entities\Character($name, $sex, $bodyType, $race, $playableClass, $str, $intl ,$agi ,$pDef ,
                $mDef ,$xp, $healthPoints,$maxHealthPoints, $level,$isAlive,$learnedSkill, $weapons);

        //Anuncia que el personaje ha sido creado
        \entities\GameAnnouncer::presentCharacter($character);
        return  $character;
    }

}