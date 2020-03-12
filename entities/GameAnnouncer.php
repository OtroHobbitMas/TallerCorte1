<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ 

namespace entities;

//Clase la cual anuncia todas las actualizaciones de las interacciones entre personajes
class GameAnnouncer {

    public static function presentCharacter(\entities\Character $character){
        //Anuncia al personaje nuevo con sus caracteristicas y stats
        echo "</br>";
        echo $character->getName()." se ha unido al mundo</br>";
        echo $character->getName()." es un ".$character->getRace()::getRaceName()."</br>";
        echo "Las estadísticas de ".$character->getName()." son:</br>";
        echo "HP Max: ".$character->getMaxHealthPoints()."</br>";
        echo "XP:".$character->getXp()."</br>";
        echo "Level: ".$character->getLevel()."</br>";
        echo "Str: ".$character->getStr()."</br>";
        echo "Intl: ".$character->getIntl()."</br>";
        echo "Agi: ".$character->getAgi()."</br>";
        echo "PDef: ".$character->getPDef()."</br>";
        echo "MDef: ".$character->getMDef()."</br></br>";
    }

    public static function announceDeath($character){
        //Verifica si el personaje ha muerto y lo anuncia
        if(!$character->getIsAlive()){
            echo $character->getName()." ha muerto</br>";
        }else{
            echo $character->getName(). " no ha muerto WTF</br>";
        }
    }

    public static function announceRevive($character){
        //Anuncia al personaje que ha sido revivido
        echo $character->getName()." ha sido revivido con ".$character->getHealthPoints()." puntos de vida</br>";
    }

    public static function announceLevel($character){
        //Anuncia el nivel actual del personaje
        echo $character->getName()." es ahora nivel: ".$character->getLevel()."</br>";
    }

    public static function announceMaxLevel($character){
        //Anuncia que el personaje ha llegado al nivel maximo
        echo $character->getName()." ha alcanzado el máximo de niveles</br></br>";
    }

    public static function announceMinLevel($character){
        //Anuncia que el personaje ha llegado al nivel minimo
        echo $character->getName()." ha alcanzado el mínimo de niveles</br>";
    }

    public static function announceLearnSkill($character){
        //Anuncia la habilidad aprendida
        echo $character->getName()." ha aprendido la habilidad: ".\entities\Managers\SkillManager::getSkillName($character->getLearnedSkill())."</br>";
    }

    public static function announceCantLearnSkill($character,$typeSubtype){
        //Anuncia la habilidad que no puede aprender
        echo $character->getName()." no puede aprender la habilidad: ".\entities\Managers\SkillManager::getSkillName($typeSubtype)."</br>";
    }

    public static function announceForgetSkill($character){
        //Anuncia que el personaje ha olvidado la habilidad
        echo $character->getName()." ha olvidado su habilidad </br>";
    }

    public static function announceCantForgetSkill($character){
        //Anuncia que no tiene habilidad para olvidar
        echo $character->getName()." no tiene ninguna habilidad para olvidar </br>";
    }

    public static function announceNewWeapon($weapon){
        //Anuncia la creacion de una nueva arma
        echo "Se ha forjado el arma: ".$weapon->getName(). ", contemplen su poder!</br>";
    }

    public static function announceEquipedWeapon($character, $weapon, $hand){
        //anuncia el arma con el que se ha equipado el personaje
        if($weapon->getTwoHanded()){
            echo $character->getName()." se ha equipado con la arma: ".\entities\Managers\WeaponManager::getWeaponName($weapon)." => '".$weapon->getDescription()."' en las dos manos</br>";
        }else{
            echo $character->getName()." se ha equipado con la arma: ".\entities\Managers\WeaponManager::getWeaponName($weapon)." => '".$weapon->getDescription()."' en la mano ".self::translateHand($hand)."</br>";
        }
    }

    public static function announceUnequipedWeapon($character, $weapon, $hand){
        //anuncia el arma que se ha desequipado el personaje
        if($weapon->getTwoHanded()){
            echo $character->getName()." se ha desequipado con la arma: ".\entities\Managers\WeaponManager::getWeaponName($weapon)." de las dos manos</br>";
        }else{
            echo $character->getName()." se ha desequipado del arma: ".\entities\Managers\WeaponManager::getWeaponName($weapon)." de la mano ".self::translateHand($hand)."</br>";
        }
    }


    public static function characterGotDamage($character, $damage){
        //anuncia la cantidad de daño que ha sufrido el personaje
        echo $character->getName()." ha sufrido: ".$damage." puntos de daño</br>";
    }

    //CREO QUE ESTA FUNCIÓN HAY QUE QUITARLA JEEE pero no sé si la esté usando xd
    public static function invalidSkill(){
        echo("Has tratado de usar un skill que no conoces (Announcer)"."</br>");
    }

    public static function invalidWeapon($character){
        //Anuncia que el personaje trata de equipar un arma que no puede equipar
        echo($character->getName()." ha tratado de equipar un arma que no puede usar o no se puede equipar con más armas"."</br>");
    }

    public static function characterAttack($character, $damage){
        //Anuncia que el personaje ha hecho n puntos de danho
        echo($character->getName()." ha hecho ".$damage." puntos de daño"."</br>");
    }


    public static function criticAttack($character){
        //Anuncia que el personaje ha asestado un golpe critico
        echo($character->getName()." ha hecho un golpe critico!!! <3"."</br>");
    }

    public static function announceUsedSkill($character){
        //Anuncia que el personaje ha usado x habilidad
        echo ($character->getName()." ha usado la habilidad: ".\entities\Managers\SkillManager::getSkillName($character->getLearnedSkill())."</br>");
    }

    //Se comparan dos strings, si son iguales, la mano es derecha, si son diferentes, es izquierda
    public static function translateHand($hand){
        if(strcmp("right",$hand) == 0){
            return "Derecha";
        }else{
            return "Izquierda";
        }
    }
}
