<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12-Nov-18
 * Time: 1:48 PM
 */


$input = $_REQUEST;
$input['slug'] = isset($input['slug']) ? $input['slug'] : '';
$surahList = file_get_contents('https://raw.githubusercontent.com/Redishketch/quran/master/server/surahList.json');
$surahList = json_decode($surahList, true);

$singleSurah = [];
for ($i=0;$i<count($surahList);$i++){
    $eachSurah = $surahList[$i];
    if($eachSurah['slug'] == $input['slug']){
        $singleSurah = $eachSurah;
    }
}

if(isset($singleSurah['slug'])){
    $files = file_get_contents('https://raw.githubusercontent.com/Redishketch/quran/master/APP/surah/'.$singleSurah['slug']);
    $files = json_decode($files, true);
    foreach ($files as $file){
        $singleSurah['verses'][] = 'https://raw.githubusercontent.com/Redishketch/quran/master/APP/surah/'.$singleSurah['slug'].'/'.$file;
    }

}

$rv = $singleSurah;
echo json_encode($rv);
