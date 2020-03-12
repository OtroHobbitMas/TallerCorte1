<?php

require './config.php';


$Steve = \entities\Managers\CharacterManager::create("Steve",1,1,\entities\Races\Elf::class,1,array("left" => "","right" => ""));
$SteveWeapon = \entities\Managers\WeaponManager::forgeWeapon("Baston de Chocolate", "Me gusta el chocolate", 3, 40, true);

\entities\Managers\SkillManager::forgetSkill($Steve);
\entities\Managers\SkillManager::learnSkill($Steve,1,2);

//\entities\Managers\SkillManager::forgetSkill($Steve);
\entities\Managers\WeaponManager::equipWeapon($Steve,$SteveWeapon);
\entities\Managers\WeaponManager::equipWeapon($Steve,$SteveWeapon);
$damage = \entities\Managers\DamageManager::attack($Steve);
\entities\GameAnnouncer::characterAttack($Steve,$damage);
\entities\Managers\DamageManager::takeDamage($Steve,200,1);

$Mauricio = \entities\Managers\CharacterManager::create("Mauricio",1,1,\entities\Races\Elf::class,3,array("left" => "","right" => ""));
$MauricioWeapon = \entities\Managers\WeaponManager::forgeWeapon("Espadon Chingon", "Se Muriooo!", 1, 30, true);
\entities\Managers\SkillManager::learnSkill($Mauricio,2,3);
\entities\Managers\WeaponManager::equipWeapon($Mauricio,$MauricioWeapon);
$damageMauricio = \entities\Managers\DamageManager::attack($Mauricio);
\entities\GameAnnouncer::characterAttack($Mauricio,$damageMauricio);
$Mauricio->setAgi(110);
$critDamageMauricio = \entities\Managers\DamageManager::attack($Mauricio);
\entities\GameAnnouncer::characterAttack($Mauricio,$critDamageMauricio);

$Patricio = \entities\Managers\CharacterManager::create("Patricio",1,1,\entities\Races\Orc::class,2,array("left" => "","right" => ""));
$PatricioWeapon = \entities\Managers\WeaponManager::forgeWeapon("Daga super venenosa", "Mas toxica que tu ex", 2, 15, false);
\entities\Managers\SkillManager::learnSkill($Patricio,2,2);
\entities\Managers\WeaponManager::equipWeapon($Patricio,$PatricioWeapon);
\entities\Managers\WeaponManager::equipWeapon($Patricio,$PatricioWeapon,"left");
$damagePatricio = \entities\Managers\DamageManager::attack($Patricio);
\entities\GameAnnouncer::characterAttack($Patricio,$damagePatricio);

$Daniel = \entities\Managers\CharacterManager::create("Daniel",1,2,\entities\Races\Dwarf::class,2,array("left" => "","right" => "",));
$DanielWeapon = \entities\Managers\WeaponManager::forgeWeapon("Daga invisible", "Es bien pinche invulnerable a la vista", 2, 15, false);
\entities\Managers\SkillManager::learnSkill($Daniel,2,1);
\entities\Managers\WeaponManager::equipWeapon($Daniel,$DanielWeapon,"left");
$damageDaniel = \entities\Managers\DamageManager::attack($Daniel);
\entities\GameAnnouncer::characterAttack($Daniel,$damageDaniel);
\entities\Managers\WeaponManager::unEquipWeapon($Daniel, "left");
\entities\Managers\WeaponManager::equipWeapon($Daniel,$DanielWeapon,"right");
$damageDaniel2 = \entities\Managers\DamageManager::attack($Daniel);
\entities\GameAnnouncer::characterAttack($Daniel,$damageDaniel2);
\entities\Managers\XPManager::xpUpdater(505000,$Daniel);


//cho ("Baja mucho xp </br>");
\entities\Managers\XPManager::xpUpdater(-505000,$Daniel);




