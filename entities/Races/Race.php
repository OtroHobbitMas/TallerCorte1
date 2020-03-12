<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace entities\Races;

/**
 * Description of Race
 *
 * @author pabhoz
 */


 //Clase raza, para obtener el nombre de esta y las estadisticas de cada una. Basicamente indica con que stats tu personaje va a repartir hostias
abstract class Race implements \interfaces\HumanoidI{
    
    public static function getRaceName() {
        $nameArray = explode('\\',get_called_class());
        return $nameArray[sizeof($nameArray) - 1];
    }

    public abstract function getStats(): Array;

}
