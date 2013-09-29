<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Andreas Schempp 2009-2011
 * @author     Andreas Schempp <andreas@schempp.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 * @version    $Id: MailUsername.php 240 2011-04-05 19:59:14Z aschempp $
 */


class MailUsername extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
		$this->import('Database');
	}


	public function recordUsername($intId, &$arrData)
	{
	    if (!strlen($arrData['username']))
	    {
	    	$arrData['username'] = $arrData['email'];
	    	$this->Input->setPost('username', $arrData['email']);
	    	$this->Database->prepare("UPDATE tl_member SET username=? WHERE id=?")->execute($arrData['email'], $intId);
	    }
	}


	public function saveMemberEmail($strValue, $dc)
	{
		$this->Database->prepare("UPDATE tl_member SET username=? WHERE id=?")->execute($strValue, $dc->id);
		
		return $strValue;
	}
}

