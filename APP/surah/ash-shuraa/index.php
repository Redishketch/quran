<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12-Nov-18
 * Time: 2:01 PM
 */


$files = glob("*.mp3");
echo json_encode($files, true);