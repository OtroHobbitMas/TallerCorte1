<?php

namespace entities\Managers;

class PlayableClassManager{

    public static function getPlayableClassName($character) {
        //Devuelve el nombre de la clase
        switch($character->getPlayableClass()){
            case 1:
                return "Mago";
            break;

            case 2:
                return "Pícaro";
            break;

            case 3:
                return "Guerrero";
            break;

            default: return "No tiene clase asignada";
        }

    }
}