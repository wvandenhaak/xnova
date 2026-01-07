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

function DeleteSelectedUser ( $UserID ): void
{

	//Warning : technologies record will be deleted by MySQL Trigger (BEFORE DROP trigger)
	$TheUser = doquery ( "SELECT * FROM game_users WHERE `id` = '" . $UserID . "';", null, true );
	if ( $TheUser['ally_id'] != 0 ) {
		$TheAlly = doquery ( "SELECT * FROM game_alliance WHERE `id` = '" . $TheUser['ally_id'] . "';", null, true );
		$TheAlly['ally_members'] -= 1;
		if ( $TheAlly['ally_members'] > 0 ) {
			doquery ( "UPDATE game_alliance SET `ally_members` = '" . $TheAlly['ally_members'] . "' WHERE `id` = '" . $TheAlly['id'] . "';");
		} else {
			doquery ( "DELETE FROM game_alliance WHERE `id` = '" . $TheAlly['id'] . "';");
			doquery ( "DELETE FROM game_statpoints WHERE `stat_type` = '2' AND `id_owner` = '" . $TheAlly['id'] . "';");
		}
	}
	doquery ( "DELETE FROM game_statpoints WHERE `stat_type` = '1' AND `id_owner` = '" . $UserID . "';");

	$ThePlanets = doquery ( "SELECT * FROM game_planets WHERE `id_owner` = '" . $UserID . "';");
	while ( $OnePlanet = mysqli_fetch_assoc ( $ThePlanets ) ) {
		if ( $OnePlanet['planet_type'] == 1 ) {
			doquery ( "DELETE FROM game_galaxy WHERE `galaxy` = '" . $OnePlanet['galaxy'] . "' AND `system` = '" . $OnePlanet['system'] . "' AND `planet` = '" . $OnePlanet['planet'] . "';");
		} elseif ( $OnePlanet['planet_type'] == 3 ) {
			doquery ( "DELETE FROM game_lunas WHERE `galaxy` = '" . $OnePlanet['galaxy'] . "' AND `system` = '" . $OnePlanet['system'] . "' AND `lunapos` = '" . $OnePlanet['planet'] . "';");
		}
		doquery ( "DELETE FROM game_planets WHERE `id` = '" . $OnePlanet['id'] . "';");
	}
	doquery ( "DELETE FROM game_messages WHERE `message_sender` = '" . $UserID . "';");
	doquery ( "DELETE FROM game_messages WHERE `message_owner` = '" . $UserID . "';");
	doquery ( "DELETE FROM game_notes WHERE `owner` = '" . $UserID . "';");
	doquery ( "DELETE FROM game_fleets WHERE `fleet_owner` = '" . $UserID . "';");
	doquery ( "DELETE FROM game_rw WHERE `id_owner1` = '" . $UserID . "';");
	doquery ( "DELETE FROM game_rw WHERE `id_owner2` = '" . $UserID . "';");
	doquery ( "DELETE FROM game_buddy WHERE `sender` = '" . $UserID . "';");
	doquery ( "DELETE FROM game_buddy WHERE `owner` = '" . $UserID . "';");
	doquery ( "DELETE FROM game_annonce WHERE `user` = '" . $UserID . "';");
	doquery ( "DELETE FROM game_users WHERE `id` = '" . $UserID . "';");

}