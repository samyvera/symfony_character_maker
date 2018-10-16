<?php

namespace App\DataFixtures;

use App\Entity\Stats;
use App\Entity\StatsModifier;
use App\Entity\UnitClass;
use App\Entity\Unit;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $knightStatsModifier = new StatsModifier();
        $knightStatsModifier->setHealthModifier("1.5");
        $knightStatsModifier->setAttackModifier("1.6");
        $knightStatsModifier->setMagicModifier("1.3");
        $knightStatsModifier->setDefenseModifier("1.4");
        $knightStatsModifier->setResistanceModifier("1.2");

        $thiefStatsModifier = new StatsModifier();
        $thiefStatsModifier->setHealthModifier("1.4");
        $thiefStatsModifier->setAttackModifier("1.7");
        $thiefStatsModifier->setMagicModifier("1.4");
        $thiefStatsModifier->setDefenseModifier("1.2");
        $thiefStatsModifier->setResistanceModifier("1.4");

        $mageStatsModifier = new StatsModifier();
        $mageStatsModifier->setHealthModifier("1.2");
        $mageStatsModifier->setAttackModifier("1.4");
        $mageStatsModifier->setMagicModifier("1.7");
        $mageStatsModifier->setDefenseModifier("1.2");
        $mageStatsModifier->setResistanceModifier("1.6");

        $gipsyStatsModifier = new StatsModifier();
        $gipsyStatsModifier->setHealthModifier("1.5");
        $gipsyStatsModifier->setAttackModifier("1.8");
        $gipsyStatsModifier->setMagicModifier("1.0");
        $gipsyStatsModifier->setDefenseModifier("1.6");
        $gipsyStatsModifier->setResistanceModifier("1.2");

        $knightUnitClass = new UnitClass();
        $knightUnitClass->setName("Knight");
        $knightUnitClass->setStatsModifier($knightStatsModifier);
        $knightStatsModifier->setUnitClass($knightUnitClass);
        
        $thiefUnitClass = new UnitClass();
        $thiefUnitClass->setName("Thief");
        $thiefUnitClass->setStatsModifier($thiefStatsModifier);
        $thiefStatsModifier->setUnitClass($thiefUnitClass);

        $mageUnitClass = new UnitClass();
        $mageUnitClass->setName("Mage");
        $mageUnitClass->setStatsModifier($mageStatsModifier);
        $mageStatsModifier->setUnitClass($mageUnitClass);

        $gipsyUnitClass = new UnitClass();
        $gipsyUnitClass->setName("Gispy");
        $gipsyUnitClass->setStatsModifier($gipsyStatsModifier);
        $gipsyStatsModifier->setUnitClass($gipsyUnitClass);

        $unit01Stats = new Stats();
        $unit01Stats->setHealth("20");
        $unit01Stats->setAttack("6");
        $unit01Stats->setMagic("3");
        $unit01Stats->setDefense("4");
        $unit01Stats->setResistance("2");
        
        $unit02Stats = new Stats();
        $unit02Stats->setHealth("15");
        $unit02Stats->setAttack("7");
        $unit02Stats->setMagic("4");
        $unit02Stats->setDefense("2");
        $unit02Stats->setResistance("3");

        $unit01 = new Unit();
        $unit01->setName('Pedro');
        $unit01->setSex(true);
        $unit01->setMugshot('img/mug01.png');
        $unit01->setLevel('1');
        $unit01->setUnitClass($knightUnitClass);
        $unit01->setStats($unit01Stats);
        $unit01Stats->setUnit($unit01);

        $unit02 = new Unit();
        $unit02->setName('Catria');
        $unit02->setSex(false);
        $unit02->setMugshot('img/mug02.png');
        $unit02->setLevel('1');
        $unit02->setUnitClass($thiefUnitClass);
        $unit02->setStats($unit02Stats);
        $unit02Stats->setUnit($unit02);

        $manager->persist($mageStatsModifier);
        $manager->persist($mageUnitClass);
        $manager->persist($gipsyStatsModifier);
        $manager->persist($gipsyUnitClass);
        $manager->persist($knightStatsModifier);
        $manager->persist($knightUnitClass);
        $manager->persist($unit01Stats);
        $manager->persist($unit01);
        $manager->persist($thiefStatsModifier);
        $manager->persist($thiefUnitClass);
        $manager->persist($unit02Stats);
        $manager->persist($unit02);
        $manager->flush();
    }
}
