<?php

namespace entities\Managers;

class XPManager{
    //Tenemos una constante de experiencia base que vale 100
    private static $baseExp = 100;

    //Metodo que recibe un valor de actualizacion para los XP del personaje.
    public static function xpUpdater($update,$character){
        $character->setXp($character->getXp()+$update);
        //Si es mayor, sube los niveles necesarios
        if($update>0){
            self::xpCompareUp($character);
        //Si es menor, baja los niveles necesarios
        }else{
            self::xpCompareDown($character);
        }
    }

    //Metodo que revisa si la experiencia actual es mayor a la que necesita para subir de nivel, si esto se cumple, sube un nivel
    public static function xpCompareUp($character){
        while($character->getXp()>= self::getExpForLevel($character)){
            $character->setXp($character->getXp()-self::getExpForLevel($character));
            \entities\Managers\LevelManager::levelUp($character);
        }
    }

    //Metodo que revisa la experiencia en 0 o negativa, si esto se cumple, el personaje reduce su nivel y se reubica sus XP
    public static function xpCompareDown($character){
        while($character->getXp()<= 0){
            $character->setXp($character->getXp()+self::getExpForLevel($character));
            \entities\Managers\LevelManager::levelDown($character);
        }
    }

    //Metodo que se llama para actualizar la cantidad de experiencia que necesita para subir de nivel, segun su nivel actual
    public static function getExpForLevel($character) {
        return ($character->getLevel() * self::$baseExp);
    }
}