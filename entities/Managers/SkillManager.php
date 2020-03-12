<?php

namespace entities\Managers;

class SkillManager {



    public static function learnSkill ($character,$type,$subType){

        /*La función recibe el personaje, el tipo y subtipo de la habilidad a aprender.
        Llama a la función que verifica si puede aprenderla y si sí puede aprenderla
        la asigna al atributo del personaje y llama al Game Annauncer para que diga que
        el personaje pudo aprender la skill. Si no puede aprenderla llama al game annauncer
        para que éste diga que no puede aprender la skill*/

        //Combina el tipo y el subtipo en una sola variable, que se vuelve el código de la skill

        $typeSubType=(int)($type.$subType);

        if(self::verifySkill($character,$type,$subType)&&!self::hasSkill($character)){

            $character->setLearnedSkill($typeSubType);

            //Llama al game announcer para que diga que el personaje aprendió la skill
            \entities\GameAnnouncer::announceLearnSkill($character);
        }
        else{
            //Llama al game announcer para que diga que el personaje no puede aprender la skill
            \entities\GameAnnouncer::announceCantLearnSkill($character,$typeSubType);
        }

    }


    public static function forgetSkill ($character) {
        //Función para que el personaje olvide la Habilidad

        if(self::hasSkill($character)){
            //Verifica que tenga habilidad para olvidar y la olvida
            $character->setLearnedSkill(0);
            \entities\GameAnnouncer::announceForgetSkill($character);
        //Si no se pudo mi viejo, se anuncia, pailas
        }else{
            \entities\GameAnnouncer::announceCantForgetSkill($character);
        }

    }

    //Metodo que se usa solo con skills que buffean al personaje
    public static function useBuffSkill($character){
        switch($character->getLearnedSkill()){
            case 11:
                //Mágico-Básico: Meditación
                $character->setAgi($character->getAgi()*1.05);
                $character->setIntl($character->getIntl()*1.05);
            break;

            case 24:
            //Físico-Avanzado: Tacticas de Combate
                $character->setStr($character->getStr()*1.05);
                $character->setAgi($character->getAgi()*1.05);
            break;
        }
    }


    public static function getSkillName($num):string{

        //Función: Recibe el "código" de la skill y devuele su nombre

        switch($num){

            case 11:
                return "Meditación";
            break;

            case 12:
                return "Calcinación";
            break;

            case 21:
                return "Golpe con arma";
            break;

            case 22:
                return "Golpe trampero";
            break;

            case 23:
                return "Tajo mortal";
            break;

            case 24:
                return "Tacticas de combate";
            break;

            default:
                return "Ninguna";

        }
        return "Ninguna";
    }

    public static function hasSkill($character) : bool{
        //Verifica si el personaje tiene una skill signada o no

        if($character->getLearnedSkill()==0){
            return false;
        }else{
            return true;
        }
    }

    public static function verifySkill($character,$type,$subType) : bool {
        //Verfica que el personaje puede aprender la skill según la clase del personaje y el tipo/subtipo de la skill

        switch($type){

            case 1://Mágico

                switch($subType){
                    case 1://Básico
                        if(($character->getPlayableClass())==1||($character->getPlayableClass())==2){
                            //Si la clase del personaje es Mago(1) o Pícaro(2)
                            return true;
                        }
                        else return false;
                    break;

                    case 2: //Mágico
                        if($character->getPlayableClass()==1){ //Si la clase del personaje es Mago(1)
                            return true;
                        }else{
                            return false;
                        }
                    break;

                    default: return false;
                }

            break;

            //PlayableClass 1: Mago Clase 2: Pícaro Clase 3: Guerrero

            case 2://Físico

            switch($subType){

                case 1://Físico/Básico
                    if(($character->getPlayableClass())==2||($character->getPlayableClass())==3){
                        //Si la clase del personaje es Pícaro(2) o Guerrero(3)
                        return true;
                    }
                    else return false;
                break;

                case 2://Físico/Pícaro
                    if(($character->getPlayableClass())==2){ //Si es Pícaro (2)
                        return true;
                    }
                    else return false;
                break;

                case 3://Físico/Guerrero
                    if(($character->getPlayableClass())==3){ //Si es Guerrero (3)
                        return true;
                    }
                    else return false;
                break;

                case 4://Físico/Avanzado
                    if(($character->getPlayableClass())==3){ //Si es Guerrero (3)
                        return true;
                    }
                    else return false;
                break;

                default: return false;
            }
          return false;
        }
    }
}