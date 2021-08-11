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
 * Liquidus Google tracker.
 *
 * @package   local_liquidus
 * @copyright Copyright (c) 2020 Open LMS
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace local_liquidus\api;

defined('MOODLE_INTERNAL') || die();

/**
 * @inheritdoc
 */
class google extends analytics {
    /**
     * @inheritdoc
     */
    public static function get_tracker_info($config) {
        $res = [];
        if (empty($config->googlesiteid)) {
            debugging(get_string('trackernotconfigured', 'local_liquidus', 'google'));
            debugging(get_string('trackermissingfield', 'local_liquidus', 'googlesiteid'));
            return $res;
        }

        $siteid = $config->googlesiteid;

        if (!empty($siteid) && self::should_track($config)) {
            $res['trackerId'] = 'google';
            $res['siteid'] = $siteid;
        }

        return $res;
    }

    /**
     * {@inheritDoc}
     */
    public static function get_config_settings() {
        return ['googlesiteid'];
    }
}
