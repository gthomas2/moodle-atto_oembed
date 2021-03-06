<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Atto text editor integration version file.
 *
 * @package    atto_oembed
 * @copyright  Erich M. Wappis, Guy Thomas
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define('AJAX_SCRIPT', true);

require_once(dirname(__FILE__) . '../../../../../../config.php');

use filter_oembed\service\oembed;

global $PAGE;

$context = required_param('context', PARAM_INT);
$PAGE->set_context(context::instance_by_id($context));

$instance = oembed::get_instance();

$text = required_param('text', PARAM_RAW);
$html = '<div data-oembed-href="'.$text.'">'.$instance->html_output($text).'</div>';
$success = $html !== false;
echo json_encode([
    'htmloutput' => $html,
    //'warnings' => $instance->get_warnings(),
    'success' => $success
]);
die;
