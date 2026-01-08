<?php return [
//
// Planet buildings requirements
// {{{
    Legacies_Empire::ID_BUILDING_FUSION_REACTOR => [
        Legacies_Empire::ID_BUILDING_DEUTERIUM_SYNTHETISER => 5,
        Legacies_Empire::ID_RESEARCH_ENERGY_TECHNOLOGY     => 3
    ],

    Legacies_Empire::ID_BUILDING_NANITE_FACTORY => [
        Legacies_Empire::ID_BUILDING_ROBOTIC_FACTORY     => 10,
        Legacies_Empire::ID_RESEARCH_COMPUTER_TECHNOLOGY => 10
    ],

    Legacies_Empire::ID_BUILDING_SHIPYARD => [
        Legacies_Empire::ID_BUILDING_ROBOTIC_FACTORY => 2
    ],

    Legacies_Empire::ID_BUILDING_TERRAFORMER => [
        Legacies_Empire::ID_BUILDING_NANITE_FACTORY    => 1,
        Legacies_Empire::ID_RESEARCH_ENERGY_TECHNOLOGY => 12
    ],
// }}}

//
// Moon buildings requirements
// {{{
     Legacies_Empire::ID_BUILDING_SENSOR_PHALANX => [
        Legacies_Empire::ID_BUILDING_LUNAR_BASE => 1
     ],

     Legacies_Empire::ID_BUILDING_JUMP_GATE => [
        Legacies_Empire::ID_BUILDING_LUNAR_BASE            => 1,
        Legacies_Empire::ID_RESEARCH_HYPERSPACE_TECHNOLOGY => 7
     ],
// }}}

//
// Technologies requirements
// {{{
    Legacies_Empire::ID_RESEARCH_ESPIONAGE_TECHNOLOGY => [
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB => 3
    ],

    Legacies_Empire::ID_RESEARCH_COMPUTER_TECHNOLOGY => [
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB => 1
    ],

    Legacies_Empire::ID_RESEARCH_WEAPON_TECHNOLOGY => [
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB => 4
    ],

    Legacies_Empire::ID_RESEARCH_SHIELDING_TECHNOLOGY => [
        Legacies_Empire::ID_RESEARCH_ENERGY_TECHNOLOGY => 3,
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB      => 6
    ],

    Legacies_Empire::ID_RESEARCH_ARMOUR_TECHNOLOGY => [
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB => 2
    ],

    Legacies_Empire::ID_RESEARCH_ENERGY_TECHNOLOGY => [
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB => 1
    ],

    Legacies_Empire::ID_RESEARCH_HYPERSPACE_TECHNOLOGY => [
        Legacies_Empire::ID_RESEARCH_ENERGY_TECHNOLOGY => 5,
        Legacies_Empire::ID_RESEARCH_SHIELDING_TECHNOLOGY  => 5,
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB      => 7
    ],

    Legacies_Empire::ID_RESEARCH_COMBUSTION_DRIVE => [
        Legacies_Empire::ID_RESEARCH_ENERGY_TECHNOLOGY => 1,
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB      => 1
    ],

    Legacies_Empire::ID_RESEARCH_IMPULSE_DRIVE => [
        Legacies_Empire::ID_RESEARCH_ENERGY_TECHNOLOGY => 1,
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB      => 2
    ],

    Legacies_Empire::ID_RESEARCH_HYPERSPACE_DRIVE => [
        Legacies_Empire::ID_RESEARCH_HYPERSPACE_TECHNOLOGY => 3,
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB          => 7
    ],

    Legacies_Empire::ID_RESEARCH_LASER_TECHNOLOGY => [
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB      => 1,
        Legacies_Empire::ID_RESEARCH_ENERGY_TECHNOLOGY => 2
    ],

    Legacies_Empire::ID_RESEARCH_ION_TECHNOLOGY => [
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB      => 4,
        Legacies_Empire::ID_RESEARCH_LASER_TECHNOLOGY  => 5,
        Legacies_Empire::ID_RESEARCH_ENERGY_TECHNOLOGY => 4
    ],

    Legacies_Empire::ID_RESEARCH_PLASMA_TECHNOLOGY => [
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB      => 5,
        Legacies_Empire::ID_RESEARCH_ENERGY_TECHNOLOGY => 8,
        Legacies_Empire::ID_RESEARCH_LASER_TECHNOLOGY  => 10,
        Legacies_Empire::ID_RESEARCH_ION_TECHNOLOGY    => 5
    ],

    Legacies_Empire::ID_RESEARCH_INTERGALACTIC_RESEARCH_NETWORK => [
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB          => 10,
        Legacies_Empire::ID_RESEARCH_COMPUTER_TECHNOLOGY   => 8,
        Legacies_Empire::ID_RESEARCH_HYPERSPACE_TECHNOLOGY => 8
    ],

    Legacies_Empire::ID_RESEARCH_EXPEDITION_TECHNOLOGY => [
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB        => 3,
        Legacies_Empire::ID_RESEARCH_COMPUTER_TECHNOLOGY => 4,
        Legacies_Empire::ID_RESEARCH_IMPULSE_DRIVE       => 3
    ],

    Legacies_Empire::ID_RESEARCH_GRAVITON_TECHNOLOGY => [
        Legacies_Empire::ID_BUILDING_RESEARCH_LAB => 12
    ],
// }}}

//
// Fleets requirements
// {{{
    Legacies_Empire::ID_SHIP_LIGHT_TRANSPORT => [
        Legacies_Empire::ID_BUILDING_SHIPYARD         => 2,
        Legacies_Empire::ID_RESEARCH_COMBUSTION_DRIVE => 2
    ],

    Legacies_Empire::ID_SHIP_LARGE_TRANSPORT => [
        Legacies_Empire::ID_BUILDING_SHIPYARD         => 4,
        Legacies_Empire::ID_RESEARCH_COMBUSTION_DRIVE => 6
    ],

    Legacies_Empire::ID_SHIP_LIGHT_FIGHTER => [
        Legacies_Empire::ID_BUILDING_SHIPYARD         => 1,
        Legacies_Empire::ID_RESEARCH_COMBUSTION_DRIVE => 1
    ],

    Legacies_Empire::ID_SHIP_HEAVY_FIGHTER => [
        Legacies_Empire::ID_BUILDING_SHIPYARD          => 3,
        Legacies_Empire::ID_RESEARCH_ARMOUR_TECHNOLOGY => 2,
        Legacies_Empire::ID_RESEARCH_IMPULSE_DRIVE     => 2
    ],

    Legacies_Empire::ID_SHIP_CRUISER => [
        Legacies_Empire::ID_BUILDING_SHIPYARD       => 5,
        Legacies_Empire::ID_RESEARCH_IMPULSE_DRIVE  => 4,
        Legacies_Empire::ID_RESEARCH_ION_TECHNOLOGY => 2
    ],

    Legacies_Empire::ID_SHIP_BATTLESHIP => [
        Legacies_Empire::ID_BUILDING_SHIPYARD         => 7,
        Legacies_Empire::ID_RESEARCH_HYPERSPACE_DRIVE => 4
    ],

    Legacies_Empire::ID_SHIP_COLONY_SHIP => [
        Legacies_Empire::ID_BUILDING_SHIPYARD      => 4,
        Legacies_Empire::ID_RESEARCH_IMPULSE_DRIVE => 3
    ],

    Legacies_Empire::ID_SHIP_RECYCLER => [
        Legacies_Empire::ID_BUILDING_SHIPYARD             => 4,
        Legacies_Empire::ID_RESEARCH_COMBUSTION_DRIVE     => 6,
        Legacies_Empire::ID_RESEARCH_SHIELDING_TECHNOLOGY => 2
    ],

    Legacies_Empire::ID_SHIP_SPY_DRONE => [
        Legacies_Empire::ID_BUILDING_SHIPYARD             => 3,
        Legacies_Empire::ID_RESEARCH_COMBUSTION_DRIVE     => 3,
        Legacies_Empire::ID_RESEARCH_ESPIONAGE_TECHNOLOGY => 2
    ],

    Legacies_Empire::ID_SHIP_BOMBER => [
        Legacies_Empire::ID_RESEARCH_IMPULSE_DRIVE     => 6,
        Legacies_Empire::ID_BUILDING_SHIPYARD          => 8,
        Legacies_Empire::ID_RESEARCH_PLASMA_TECHNOLOGY => 5
    ],

    Legacies_Empire::ID_SHIP_SOLAR_SATELLITE => [
        Legacies_Empire::ID_BUILDING_SHIPYARD => 1
    ],

    Legacies_Empire::ID_SHIP_DESTRUCTOR => [
        Legacies_Empire::ID_BUILDING_SHIPYARD              => 9,
        Legacies_Empire::ID_RESEARCH_HYPERSPACE_DRIVE      => 6,
        Legacies_Empire::ID_RESEARCH_HYPERSPACE_TECHNOLOGY => 5
    ],

    Legacies_Empire::ID_SHIP_DEATH_STAR => [
        Legacies_Empire::ID_BUILDING_SHIPYARD              => 12,
        Legacies_Empire::ID_RESEARCH_HYPERSPACE_DRIVE      => 7,
        Legacies_Empire::ID_RESEARCH_HYPERSPACE_TECHNOLOGY => 6,
        Legacies_Empire::ID_RESEARCH_GRAVITON_TECHNOLOGY   => 1
    ],

    Legacies_Empire::ID_SHIP_BATTLECRUISER => [
        Legacies_Empire::ID_RESEARCH_HYPERSPACE_TECHNOLOGY => 5,
        Legacies_Empire::ID_RESEARCH_LASER_TECHNOLOGY      => 12,
        Legacies_Empire::ID_RESEARCH_HYPERSPACE_DRIVE      => 5,
        Legacies_Empire::ID_BUILDING_SHIPYARD              => 8
    ],

    Legacies_Empire::ID_SHIP_SUPERNOVA => [
        Legacies_Empire::ID_BUILDING_SHIPYARD              => 25,
        Legacies_Empire::ID_RESEARCH_HYPERSPACE_DRIVE      => 18,
        Legacies_Empire::ID_RESEARCH_HYPERSPACE_TECHNOLOGY => 14,
        Legacies_Empire::ID_RESEARCH_GRAVITON_TECHNOLOGY   => 3
    ],
// }}}

//
// Defenses requirements
// {{{
    Legacies_Empire::ID_DEFENSE_ROCKET_LAUNCHER => [
        Legacies_Empire::ID_BUILDING_SHIPYARD => 1
    ],

    Legacies_Empire::ID_DEFENSE_LIGHT_LASER => [
        Legacies_Empire::ID_RESEARCH_ENERGY_TECHNOLOGY => 1,
        Legacies_Empire::ID_BUILDING_SHIPYARD          => 2,
        Legacies_Empire::ID_RESEARCH_LASER_TECHNOLOGY  => 3
    ],

    Legacies_Empire::ID_DEFENSE_HEAVY_LASER => [
        Legacies_Empire::ID_RESEARCH_ENERGY_TECHNOLOGY => 3,
        Legacies_Empire::ID_BUILDING_SHIPYARD          => 4,
        Legacies_Empire::ID_RESEARCH_LASER_TECHNOLOGY  => 6
    ],

    Legacies_Empire::ID_DEFENSE_ION_CANNON => [
        Legacies_Empire::ID_BUILDING_SHIPYARD             => 6,
        Legacies_Empire::ID_RESEARCH_ENERGY_TECHNOLOGY    => 6,
        Legacies_Empire::ID_RESEARCH_WEAPON_TECHNOLOGY    => 3,
        Legacies_Empire::ID_RESEARCH_SHIELDING_TECHNOLOGY => 1
    ],

    Legacies_Empire::ID_DEFENSE_GAUSS_CANNON => [
        Legacies_Empire::ID_BUILDING_SHIPYARD       => 4,
        Legacies_Empire::ID_RESEARCH_ION_TECHNOLOGY => 4
    ],

    Legacies_Empire::ID_DEFENSE_PLASMA_TURRET => [
        Legacies_Empire::ID_BUILDING_SHIPYARD          => 8,
        Legacies_Empire::ID_RESEARCH_PLASMA_TECHNOLOGY => 7
    ],

    Legacies_Empire::ID_DEFENSE_SMALL_SHIELD_DOME => [
        Legacies_Empire::ID_RESEARCH_SHIELDING_TECHNOLOGY => 2,
        Legacies_Empire::ID_BUILDING_SHIPYARD             => 1
    ],

    Legacies_Empire::ID_DEFENSE_LARGE_SHIELD_DOME => [
        Legacies_Empire::ID_RESEARCH_SHIELDING_TECHNOLOGY => 6,
        Legacies_Empire::ID_BUILDING_SHIPYARD             => 6
    ],

    Legacies_Empire::ID_SPECIAL_ANTIBALLISTIC_MISSILE => [
        Legacies_Empire::ID_BUILDING_MISSILE_SILO => 2
    ],

    Legacies_Empire::ID_SPECIAL_INTERPLANETARY_MISSILE => [
        Legacies_Empire::ID_BUILDING_MISSILE_SILO => 4
    ],
// }}}

//
// Officers requirements
// {{{
    603 => [601 => 5],
    604 => [602 => 5],
    605 => [601 => 10, 603 => 2],
    606 => [601 => 10, 603 => 2],
    607 => [605 => 1],
    608 => [606 => 1],
    609 => [601 => 20, 603 => 10, 605 => 3, 606 => 3, 607 => 2, 608 => 2],
    610 => [602 => 10, 604 => 5],
    611 => [602 => 10, 604 => 5],
    612 => [610 => 1],
    613 => [611 => 1],
    614 => [602 => 20, 604 => 10, 610 => 2, 611 => 2, 612 => 1, 613 => 3],
    615 => [614 => 1, 609 => 1]
];
