<?php
/**
 * Tis file is part of XNova:Legacies
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

use Xmke\Xnova\Common\Constants;

define('INSIDE' , true);
define('INSTALL' , false);
define('IN_ADMIN', true);
require_once dirname(dirname(__FILE__)) .'/common.php';

includeLang('admin/interface');

function XNovaResetUnivers ( $CurrentUser ) {
	global $lang;

	if (in_array($CurrentUser['authlevel'], array(Constants::LEVEL_ADMIN))) {

		// Copier la table users et planets vers des tables de replis !
		doquery( "RENAME TABLE game_planets TO game_planets_s");
		doquery( "RENAME TABLE game_users TO game_users_s");
		doquery( "RENAME TABLE game_galaxy TO game_galaxy_s");
		doquery( "RENAME TABLE game_banned TO game_banned_s");

		// Recreer la structure des tables renommées
		doquery( "CREATE  TABLE IF NOT EXISTS game_planets ( LIKE game_planets_s );");
		doquery( "CREATE  TABLE IF NOT EXISTS game_users ( LIKE game_users_s );");
		doquery( "CREATE  TABLE IF NOT EXISTS game_galaxy ( LIKE game_galaxy_s );");
		doquery( "CREATE  TABLE IF NOT EXISTS game_banned ( LIKE game_banned_s );");

		// Vider toutes les tables !
		doquery( "TRUNCATE TABLE game_aks");
		doquery( "TRUNCATE TABLE game_alliance");
		doquery( "TRUNCATE TABLE game_annonce");
		doquery( "TRUNCATE TABLE game_banned");
		doquery( "TRUNCATE TABLE game_buddy");
		doquery( "TRUNCATE TABLE game_galaxy");
		doquery( "TRUNCATE TABLE game_errors");
		doquery( "TRUNCATE TABLE game_fleets");
		doquery( "TRUNCATE TABLE game_iraks");
		doquery( "TRUNCATE TABLE game_lunas");
		doquery( "TRUNCATE TABLE game_messages");
		doquery( "TRUNCATE TABLE game_notes");
		doquery( "TRUNCATE TABLE game_rw");
		doquery( "TRUNCATE TABLE game_statpoints");

		$AllUsers  = doquery ("SELECT `username`,`password`,`email`, `authlevel`,`galaxy`,`system`,`planet`, `onlinetime`, `register_time`, `id_planet` FROM game_users_s WHERE 1;");
		$LimitTime = time() - (15 * (24 * (60 * 60)));
		$TransUser = 0;
		while ( $TheUser = mysqli_fetch_assoc($AllUsers) ) {
			if ( $TheUser['onlinetime'] > $LimitTime ) {
				$UserPlanet     = doquery ("SELECT `name` FROM game_planets_s WHERE `id` = '". $TheUser['id_planet']."';", null, true);
				if ($UserPlanet['name'] != "") {
					// Creation de l'utilisateur
					$QryInsertUser  = "INSERT INTO game_users SET ";
					$QryInsertUser .= "`username` = '".      $TheUser['username']      ."', ";
					$QryInsertUser .= "`email` = '".         $TheUser['email']         ."', ";
					$QryInsertUser .= "`id_planet` = '0', ";
					$QryInsertUser .= "`authlevel` = '".     $TheUser['authlevel']     ."', ";
					$QryInsertUser .= "`galaxy` = '".        $TheUser['galaxy']        ."', ";
					$QryInsertUser .= "`system` = '".        $TheUser['system']        ."', ";
					$QryInsertUser .= "`planet` = '".        $TheUser['planet']        ."', ";
					$QryInsertUser .= "`register_time` = '". $TheUser['register_time'] ."', ";
					$QryInsertUser .= "`password` = '".      $TheUser['password']      ."';";
                    doquery($QryInsertUser);

					// On cherche le numero d'enregistrement de l'utilisateur fraichement cr��
					$NewUser        = doquery("SELECT `id` FROM game_users WHERE `username` = '". $TheUser['username'] ."' LIMIT 1;", null, true);

					CreateOnePlanetRecord ($TheUser['galaxy'], $TheUser['system'], $TheUser['planet'], $NewUser['id'], $UserPlanet['name'], true);
					// Recherche de la reference de la nouvelle planete (qui est unique normalement !
					$PlanetID       = doquery("SELECT `id` FROM game_planets WHERE `id_owner` = '". $NewUser['id'] ."' LIMIT 1;", null, true);

					// Mise a jour de l'enregistrement utilisateur avec les infos de sa planete mere
					$QryUpdateUser  = "UPDATE game_users SET ";
					$QryUpdateUser .= "`id_planet` = '".      $PlanetID['id'] ."', ";
					$QryUpdateUser .= "`current_planet` = '". $PlanetID['id'] ."' ";
					$QryUpdateUser .= "WHERE ";
					$QryUpdateUser .= "`id` = '".             $NewUser['id']  ."';";
                    doquery($QryUpdateUser);

					$TransUser++;
				}
			}
		} // while
		// Mise a jour du nombre de joueurs inscripts
		doquery("UPDATE game_config SET `config_value` = '". $TransUser ."' WHERE `config_name` = 'users_amount' LIMIT 1;");

		// Menage on vire les tables transitoires
		doquery("DROP TABLE game_planets_s");
		doquery("DROP TABLE game_users_s");

		AdminMessage ( $TransUser . $lang['adm_rz_done'], $lang['adm_rz_ttle'] );
	} else {
		AdminMessage ( $lang['sys_noalloaw'], $lang['sys_noaccess'] );
	}
	die;
}

	$mode      = $_POST['mode'];
	$PageTpl   = gettemplate("admin/reset_body");
	$parse     = $lang;

	if ($mode == 'reset') {
		XNovaResetUnivers ( $user );
	} else {
		$Page = $MustacheEngine->render($PageTpl, $parse);
		display ($Page, $lang['Reset'], false, true);
	}
