<?php

/**
 * Key value pair of presets with the name and dimensions to be used
 *
 * 'PRESET_NAME' => array(
 *   'width'  => INT, // in pixels
 *   'height' => INT, // in pixels
 *   'method' => STRING, // 'crop' or 'resize'
 *   'background_color' => '#000000', //  (optional) Used with resize
 * )
 *
 * eg   'presets' => array(
 *        '800x600' => array(
 *          'width' => 800,
 *          'height' => 600,
 *          'method' => 'resize',
 *          'background_color' => '#000000',
 *        )
 *      ),
 *
 */
return array(

  'default' => array(
    'width' => 320,
    'height' => 320,
    'method' => 'resize',
    'background_color' => '#ffffff'
  ),

);
