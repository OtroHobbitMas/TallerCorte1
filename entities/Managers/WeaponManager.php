<?php

namespace entities\Managers;

class WeaponManager {
    //Metodo para equipar armas
    public function equipWeapon ($character, $weapon, $hand="right") {
        //Llama al los metodos de esta misma clase para saber si el personaje tiene armas actualmente y si puede equiparse el arma que entra por parametro
        if(self::verifyEquiped($character,$weapon) && self::canEquip($character, $weapon)){
            //El arma de dos manos se usara en la mano derecha
            if($weapon->getTwoHanded()){
                $character->addRightWeapon($weapon);
            //De lo contrario, si el arma no es de dos manos, se compara si se puede equipar en la mano derecha o izquierda
            }else{
                if(strcmp($hand,"right") == 0){
                    $character->addRightWeapon($weapon);
                }else{
                    $character->addLeftWeapon($weapon);
                }
            }
            //Se anuncia el equipo del arma en el personaje
            \entities\GameAnnouncer::announceEquipedWeapon($character,$weapon,$hand);
        //Si no se pudo equipar nada, pues pailas mi viejo... y se anuncia
        }else{
            \entities\GameAnnouncer::invalidWeapon($character);
        }
    }

    //Metodo para desequipar un arma.
    public function unequipWeapon($character,$hand = "right"){
        $weapon = null;
        //Compara ambos strings. Si es Right, desequipa la arma derecha
        if(strcmp($hand,"right") == 0){
            $weapon = $character->getRightWeapon();
            $character->removeRightWeapon();
        //De lo contrario seria la izquierda, asi que la desequipa
        }else{
            $weapon = $character->getLeftWeapon();
            $character->removeLeftWeapon();
        }
        //Anuncia quien se desequipo el arma y de que mano
        \entities\GameAnnouncer::announceUnequipedWeapon($character,$weapon,$hand);
    }

    //Metodo para verificar las armas equipadas. Devuelve false si tiene armas equipadas y true si es al contrario
    public function verifyEquiped($character,$weapon){
        if($character->getPlayableClass() == 1 && $character->numberOfWeapons() > 0){
            return false;
        }else{
            if($weapon->getTwoHanded() && $character->numberOfWeapons() > 0){
                return false;
            }else if($character->numberOfWeapons() > 1){
                return false;
            }
        }
        return true;
    }

    //Metodo para verificar la clase del personaje y si puede equiparse esa arma
    public function canEquip($character, $weapon){
        $canEquip = false;
        //Si su clase es mago
        if($character->getPlayableClass() == 1){
            if($weapon->getType() != 3 && $weapon->getTwoHanded()){
                return False;
            }else{
                if($weapon->getType() != 4){
                    return true;
                }else{
                    return false;
                }
            }

        //Si su clase es picaro
        }else if($character->getPlayableClass() == 2 ){
            if($weapon->getTwoHanded()){
                return False;
            }else{
                if($weapon->getType() != 0 && $weapon->getType() != 3){
                    return true;
                }else{
                    return false;
                }
            }
        //De lo contrario es 3 (Guerrero)
        }else{
            if($weapon->getType() != 0){
                return true;
            }else{
                return false;
            }
        }
        return $canEquip;
    }

    //Metodo para obtener el nombre del arma
    public static function getWeaponName($weapon){
        return $weapon->getName();
    }

    //Metodo para crear un nuevo objeto de Weapon
    public static function forgeWeapon($name, $description, $type, $dmg, $twoHanded){
        $createdWeapon = new \entities\Weapons\Weapon($name, $description, $type, $dmg, $twoHanded);
        \entities\GameAnnouncer::announceNewWeapon($createdWeapon);
        return $createdWeapon;
    }

}