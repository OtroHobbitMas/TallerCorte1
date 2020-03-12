<?php

namespace entities\Managers;

class DamageManager{
	//Metodo para que un personaje muera. Comprueba primero si su variable $isAlive esta en true, si lo esta, ha muerto y convoca al GameAnnouncer
	public static function die($character) {
		if($character->getIsAlive()){
			$character->setIsAlive(false);
			\entities\GameAnnouncer::announceDeath($character);
		}
	}

	//Metodo para revivir a un personaje. Comprueba primero su variable $isAlive, si esta en false, lo revive con 10% de healthpoints
	public static function revive($character) {
		if(!$character->getIsAlive()){
			$character->setIsAlive(true);
			$character->setHealthPoints( $character->getMaxHealthPoints() * 0.1);
			\entities\GameAnnouncer::announceRevive($character);
		}
	}
	
	//Metodo para atacar, se pasa por parametro al personaje que sera atacado y que recibe ese danho
	public static function attack($character) {
			
			$additionalPDamage = ($character->getStr()/10 *2)/100;
			$additionalMDamage = ($character->getIntl()/10 *2)/100;
			$critPercentaje = ($character->getAgi()/100);


			switch($character->getLearnedSkill()){
				case 11:
					//Si es Mágico-Básico
					\entities\Managers\SkillManager::useBuffSkill($character);
					\entities\GameAnnouncer::announceUsedSkill($character);
					return 0;

				break;

				case 12:
				//Si es Mágico-Mágico
					\entities\GameAnnouncer::announceUsedSkill($character);
					$initdamage = $character->getIntl()*0.4;
					$damage = $initdamage + ($initdamage*$additionalMDamage);
					if($critPercentaje >= 1){
						$damage = $damage * 1.5;
						\entities\GameAnnouncer::criticAttack($character);
					}
					return round($damage,0);
				break;

				case 21:
				//Si es Físico-Básico
					\entities\GameAnnouncer::announceUsedSkill($character);
					$rightWeapon = null;
					if($character->hasRightWeapon()){
						$rightWeapon =  $character->getRightWeapon();
					}

					$leftWeapon = null;

					if($character->hasLeftWeapon()){
						$leftWeapon = $character->getLeftWeapon();
					}

					$initdamage;
					if(!empty($rightWeapon)){
						$initdamage = $rightWeapon->getDmg();
					}
					if(!empty($leftWeapon)){
						$initdamage = $leftWeapon->getDmg()*0.7;
					}
					$damage = $initdamage + ($initdamage*$additionalPDamage);
					if($critPercentaje >= 1){
						$damage = $damage * 1.5;
						\entities\GameAnnouncer::criticAttack($character);
					}
					return round($damage,0);
				break;

				case 22:
					//Si es Físico-Pícaro
					\entities\GameAnnouncer::announceUsedSkill($character);
					$rightWeapon;
					if($character->hasRightWeapon()){
						$rightWeapon =  $character->getRightWeapon();
					}
					$leftWeapon;
					if($character->hasLeftWeapon()){
						$leftWeapon = $character->getLeftWeapon();
					}
					$initdamage;
					if(!empty($rightWeapon)){
						$initdamage = $rightWeapon->getDmg();
					}
					if(!empty($leftWeapon)){
						$initdamage = $initdamage + $leftWeapon->getDmg();
					}
					$initdamage = $initdamage * 1.5;
					$damage = $initdamage + ($initdamage*$additionalPDamage);
					if($critPercentaje >= 1){
						$damage = $damage * 1.5;
						\entities\GameAnnouncer::criticAttack($character);
					}
					return round($damage,0);
				break;

				case 23:
					//Si es Físico/Guerrero
					\entities\GameAnnouncer::announceUsedSkill($character);
					$rightWeapon;
					if($character->hasRightWeapon()){
						$rightWeapon = $character->getRightWeapon();
					}
					$leftWeapon;
					if($character->hasLeftWeapon()){
						$leftWeapon = $character->getLeftWeapon();
					}
					$initdamage;
					if(!empty($rightWeapon)){
						$initdamage = $rightWeapon->getDmg();
					}
					if(!empty($leftWeapon)){
						$initdamage = $initdamage + $leftWeapon->getDmg();
					}
					$initdamage = $initdamage * 2;
					$damage = $initdamage + ($initdamage*$additionalPDamage);
					if($critPercentaje >= 1){
						$damage = $damage * 1.5;
						\entities\GameAnnouncer::criticAttack($character);
					}
					return round($damage,0);
				break;

				case 24:
					//Si es Físico-Avanzado
					\entities\Managers\SkillManager::useBuffSkill($character);
					\entities\GameAnnouncer::announceUsedSkill($character);
					return 0;
				break;

				default:
				return 0;
			}
	}
	
	//Metodo para recibir danho, este actualiza los healthpoints de un personaje si se pierden. Tiene en cuenta su defensa si el danho es fisico o magico
	public static function takeDamage($character, $damage, $typeofDamage) {
		if($typeofDamage == 0){ //Daño magico
			$armor = $character->getMDef()/100;
			$finalDamage = ($damage - ($damage * $armor));
			$life = round($character->getHealthPoints() - $finalDamage, 0);
			\entities\GameAnnouncer::characterGotDamage($character,$finalDamage);
			if($life < 0){
				$character->setHealthPoints(0);
				self::die($character);
			}else{
				$character->setHealthPoints($life);
			}
		}else{//Daño fisico
			$armor = $character->getPDef()/100;
			$finalDamage = round(($damage - ($damage * $armor)),0);
			$life = $character->getHealthPoints() - $finalDamage;
			\entities\GameAnnouncer::characterGotDamage($character,$finalDamage);
			if($life < 0){
				$character->setHealthPoints(0);
				self::die($character);
			}else{
				$character->setHealthPoints($life);
			}
		}
	}
}
