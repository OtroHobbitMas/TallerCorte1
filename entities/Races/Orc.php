<?php

namespace entities\Races;

//Raza de Orco!! Feroces, brutales y resistentes, estos si que te mandan a volar de una hostia
class Orc extends \entities\Races\Race {
    public function getStats() : Array {
        return [BASE_HP * 1.05, BASE_STR * 1.08, BASE_INTL * 0.95, BASE_AGI, BASE_PDEF, BASE_MDEF];
    }
}
