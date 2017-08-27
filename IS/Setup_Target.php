<?php
/*
Common Setup for "Target" Archery
*/

require_once(dirname(__FILE__).'/lib.php');
require_once(dirname(dirname(__FILE__)).'/lib.php');

// default Divisions
CreateStandardDivisions($TourId, $TourType, $SubRule);

// default Classes
CreateStandardClasses($TourId, $SubRule, $TourType);

// default Subclasses
CreateStandardSubClasses($TourId);

// default Distances
switch($TourType) {
case 3:
    CreateDistance($TourId, $TourType, 'R_', '70 m', '70 m');  // Recurve Open
    CreateDistance($TourId, $TourType, 'RM_', '60 m', '60 m'); // Recurve Master
    CreateDistance($TourId, $TourType, 'RJ_', '70 m', '70 m'); // Recurve Junior
    CreateDistance($TourId, $TourType, 'RC_', '60 m', '60 m'); // Recurve Cadet
    CreateDistance($TourId, $TourType, 'RN_', '40 m', '40 m'); // Recurve Cadet
    CreateDistance($TourId, $TourType, 'RB_', '60 m', '60 m'); // Recurve Beginner

    CreateDistance($TourId, $TourType, 'C_', '50 m', '50 m');  // Compound Open
    CreateDistance($TourId, $TourType, 'CM_', '50 m', '50 m'); // Compound Master
    CreateDistance($TourId, $TourType, 'CJ_', '50 m', '50 m'); // Compound Junior
    CreateDistance($TourId, $TourType, 'CC_', '50 m', '50 m'); // Compound Cadet
    CreateDistance($TourId, $TourType, 'CN_', '40 m', '40 m'); // Compound Nordic Cadet
    CreateDistance($TourId, $TourType, 'CB_', '50 m', '50 m'); // Compound Beginner
    break;
case 6:
    // Indoor
    CreateDistance($TourId, $TourType, 'R_', '18 m', '18 m');  // Recurve Open
    CreateDistance($TourId, $TourType, 'RM_', '18 m', '18 m'); // Recurve Master
    CreateDistance($TourId, $TourType, 'RJ_', '18 m', '18 m'); // Recurve Junior
    CreateDistance($TourId, $TourType, 'RC_', '18 m', '18 m'); // Recurve Cadet
    CreateDistance($TourId, $TourType, 'RN_', '12 m', '12 m'); // Recurve Nordic Cadet
    CreateDistance($TourId, $TourType, 'RB_', '18 m', '18 m'); // Recurve Beginner

    CreateDistance($TourId, $TourType, 'C_', '18 m', '18 m');  // Compound Open
    CreateDistance($TourId, $TourType, 'CM_', '18 m', '18 m'); // Compound Master
    CreateDistance($TourId, $TourType, 'CJ_', '18 m', '18 m'); // Compound Junior
    CreateDistance($TourId, $TourType, 'CC_', '18 m', '18 m'); // Compound Cadet
    CreateDistance($TourId, $TourType, 'CN_', '12 m', '12 m'); // Compound Nordic Cadet
    CreateDistance($TourId, $TourType, 'CB_', '18 m', '18 m'); // Compound Beginner
	break;
}

// default Events
CreateStandardEvents($TourId, $TourType, $SubRule, $tourDetCategory=='1');

// Classes in Events
InsertStandardEvents($TourId, $TourType, $SubRule, $tourDetCategory=='1');

// Finals & TeamFinals
CreateFinals($TourId);

// Default Target
$i=1;
switch($TourType) {
	case 6:
        CreateTargetFace($TourId, $i++, '~Default', '%', '1', 2, 40, 2, 40);
        CreateTargetFace($TourId, $i++, '~DefaultCO', 'C%', '1', 4, 40, 4, 40);
        // optional target faces
        CreateTargetFace($TourId, $i++, '~Option1', 'R%', '',  1, 40, 1, 40);
		break;
}

// create a first distance prototype
CreateDistanceInformation($TourId, $DistanceInfoArray, 10, 2);

// Update Tour details
$tourDetails=array(
    'ToCollation' => $tourCollation,
    'ToTypeName' => $tourDetTypeName,
    'ToNumDist' => $tourDetNumDist,
    'ToNumEnds' => $tourDetNumEnds,
    'ToMaxDistScore' => $tourDetMaxDistScore,
    'ToMaxFinIndScore' => $tourDetMaxFinIndScore,
    'ToMaxFinTeamScore' => $tourDetMaxFinTeamScore,
    'ToCategory' => $tourDetCategory,
    'ToElabTeam' => $tourDetElabTeam,
    'ToElimination' => $tourDetElimination,
    'ToGolds' => $tourDetGolds,
    'ToXNine' => $tourDetXNine,
    'ToGoldsChars' => $tourDetGoldsChars,
    'ToXNineChars' => $tourDetXNineChars,
    'ToDouble' => $tourDetDouble,
    'ToIocCode'	=> $tourDetIocCode,
	);
UpdateTourDetails($TourId, $tourDetails);