<?php
/**
 * This file is part of XNova:Legacies
 *
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @see http://www.xnova-ng.org/
 *
 * Copyright (c) 2009-Present, XNova Support Team <http://www.xnova-ng.org>
 * All rights reserved.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *                                --> NOTICE <--
 *  This file is part of the core development branch, changing its contents will
 * make you unable to use the automatic updates manager. Please refer to the
 * documentation for further information about customizing XNova.
 *
 */

function FlyingFleetHandler (&$planet): void
{
	global $resource;

	doquery("LOCK TABLE game_lunas WRITE, game_rw WRITE, game_errors WRITE, game_messages WRITE, game_fleets WRITE, game_planets WRITE, game_galaxy WRITE ,game_users WRITE");

	$QryFleet   = "SELECT * FROM game_fleets ";
	$QryFleet  .= "WHERE (";
	$QryFleet  .= "( ";
	$QryFleet  .= "`fleet_start_galaxy` = ". $planet['galaxy']      ." AND ";
	$QryFleet  .= "`fleet_start_system` = ". $planet['sys']      ." AND ";
	$QryFleet  .= "`fleet_start_planet` = ". $planet['planet']      ." AND ";
	$QryFleet  .= "`fleet_start_type` = ".   $planet['planet_type'] ." ";
	$QryFleet  .= ") OR ( ";
	$QryFleet  .= "`fleet_end_galaxy` = ".   $planet['galaxy']      ." AND ";
	$QryFleet  .= "`fleet_end_system` = ".   $planet['sys']      ." AND ";
	$QryFleet  .= "`fleet_end_planet` = ".   $planet['planet']      ." ) AND ";
	$QryFleet  .= "`fleet_end_type`= ".      $planet['planet_type'] ." ) AND ";
	$QryFleet  .= "( `fleet_start_time` < '". time() ."' OR `fleet_end_time` < '". time() ."' );";
    $fleetquery = doquery($QryFleet);

	while ($CurrentFleet = mysqli_fetch_array($fleetquery)) {
		switch ($CurrentFleet["fleet_mission"]) {
			case 1:
				// Attaquer
				MissionCaseAttack ( $CurrentFleet );
				break;

			case 2:
				// Attaque groupée
				doquery ("DELETE FROM game_fleets WHERE `fleet_id` = '". $CurrentFleet['fleet_id'] ."';");
				break;

			case 3:
				// Transporter
				MissionCaseTransport ( $CurrentFleet );
				break;

			case 4:
				// Stationner
				MissionCaseStay ( $CurrentFleet );
				break;

			case 5:
				// Stationner chez un Allié
			MissionCaseStayAlly ( $CurrentFleet );
				break;

			case 6:
				// Flotte d'espionnage
				MissionCaseSpy ( $CurrentFleet );
				break;

			case 7:
				// Coloniser
				MissionCaseColonisation ( $CurrentFleet );
				break;

			case 8:
				// Recyclage
				MissionCaseRecycling ( $CurrentFleet );
				break;

			case 9:
				// Detruire ??? dans le code ogame c'est 9 !!
				MissionCaseDestruction ( $CurrentFleet );
				break;

			case 10:
				// Missiles !!

				break;

			case 15:
				// Expeditions
				MissionCaseExpedition ( $CurrentFleet );
				break;

			default: {
				doquery("DELETE FROM game_fleets WHERE `fleet_id` = '". $CurrentFleet['fleet_id'] ."';");
			}
		}
	}

	doquery("UNLOCK TABLES", "");
}
