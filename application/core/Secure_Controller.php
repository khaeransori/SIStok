<?php if (!defined('BASEPATH')) die();
/* 
 * Copyright (C) 2013 Khaer Ansori
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
 */

/**
 * Description of Secure_Controller
 *
 * @author Khaer Ansori
 */
class Secure_Controller extends MY_Controller {
    function __construct() {
        parent::__construct();
        if($this->session->userdata("logged_in")=="") {
            redirect("auth");
        }
    }
}

/* End of file Secure_Controller.php */
/* Location: ./application/controllers/Secure_Controller.php */
