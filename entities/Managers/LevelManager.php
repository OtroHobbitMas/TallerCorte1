<?php

namespace entities\Managers;

class LevelManager {
    //Set de max y min Nivel que puede alcanzar
    private static $maxLevel = 100;
    private static $minLevel = 1;

    public static function levelUp($character) {
        //El personaje aumenta un nivel

        if($character->getLevel()<self::$maxLevel){
            $character->setLevel($character->getLevel()+1);
            \entities\GameAnnouncer::announceLevel($character);
        }else if($character->getLevel()==self::$maxLevel){
            //Si llegó al max de niveles, no puede subir más
            \entities\GameAnnouncer::announceMaxLevel($character);
        }
    }

    public static function levelDown($character) {
        //El personaje disminuye un nivel
        if($character->getLevel()>self::$minLevel){
            $character->setLevel(($character->getLevel())-1);
            \entities\GameAnnouncer::announceLevel($character);
        }else{
            //Si llegó al min de niveles, no puede bajar más
            \entities\GameAnnouncer::announceMinLevel($character);
        }
    }
}
