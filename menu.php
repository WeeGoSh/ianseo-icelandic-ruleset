<?php

$ret['MODS'][] = MENU_DIVIDER;
$ret['MODS'][] = 'Install IAC rules' . '|' . $CFG->ROOT_DIR . 'Modules/Custom/' . basename(dirname(__FILE__)) . '/install.php';
