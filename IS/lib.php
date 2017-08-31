<?php

// these go here as it is a "global" definition, used or not
$tourCollation = '';
$tourDetIocCode = 'IS';
if(empty($SubRule)) $SubRule='1';

function CreateStandardDivisions($TourId, $Type=1, $SubRule=0) {
    // Ignoring sub-rules for now
    $i=1;
	CreateDivision($TourId, $i++, 'R', 'Recurve');
	CreateDivision($TourId, $i++, 'C', 'Compound');
    CreateDivision($TourId, $i++, 'B', 'Barebow');
}

function CreateStandardClasses($TourId, $SubRule, $Type) {
    $i=1;
    CreateClass($TourId, $i++, 1, 99, 0, 'M', 'M', 'Men', 1, '');
    CreateClass($TourId, $i++, 1, 99, 1, 'W', 'W', 'Women', 1, '');
    if ($SubRule==1) { // All ClassesB
        CreateClass($TourId, $i++, 50, 99, 0, 'MM', 'MM,M', 'Master Men', 1, '');
        CreateClass($TourId, $i++, 50, 99, 1, 'MW', 'MW,W', 'Master Women', 1, '');
        CreateClass($TourId, $i++, 18, 20, 0, 'JM', 'JM,M', 'Cadet Men', 1, '');
        CreateClass($TourId, $i++, 18, 20, 1, 'JW', 'JW,W', 'Cadet Women', 1, '');
        CreateClass($TourId, $i++, 15, 17, 0, 'CM', 'CM,JM,M', 'Junior Men', 1, '');
        CreateClass($TourId, $i++, 15, 17, 1, 'CW', 'CW,JW,W', 'Junior Women', 1, '');
        CreateClass($TourId, $i++, 1, 14, 0, 'NM', 'NM,CM,JM,M', 'Nordic Cadet Men', 1, '');
        CreateClass($TourId, $i++, 1, 14, 1, 'NW', 'NW,CW,JW,W', 'Nordic Cadet Women', 1, '');
        CreateClass($TourId, $i++, 1, 99, 0, 'BM', 'BM', 'Beginner Men', 1, '');
        CreateClass($TourId, $i++, 1, 99, 1, 'BW', 'BW', 'Beginner Women', 1, '');
    }
}

function CreateStandardSubClasses($TourId) {

}

function CreateStandardEvents($TourId, $TourType, $SubRule, $Outdoor=true) {
    $TargetR=($Outdoor ? TGT_OUT_FULL : TGT_IND_6_big10);
    $TargetC=($Outdoor ? TGT_OUT_5_big10 : TGT_IND_6_small10);
    $TargetSizeR=($Outdoor ? 122 : 40);
    $TargetSizeC=($Outdoor ? 80 : 40);
    $DistanceR=($Outdoor ? 70 : 18);
    $DistanceC=($Outdoor ? 50 : 18);

    // Master
    $TargetRM=($Outdoor ? TGT_OUT_FULL : TGT_IND_6_big10);
    $TargetCM=($Outdoor ? TGT_OUT_5_big10 : TGT_IND_6_small10);
    $TargetSizeRM=($Outdoor ? 122 : 40);
    $TargetSizeCM=($Outdoor ? 80 : 40);
    $DistanceRM=($Outdoor ? 60 : 18);
    $DistanceCM=($Outdoor ? 50 : 18);

    // Junior
    $TargetRJ=($Outdoor ? TGT_OUT_FULL : TGT_IND_6_big10);
    $TargetCJ=($Outdoor ? TGT_OUT_5_big10 : TGT_IND_6_big10);
    $TargetSizeRJ=($Outdoor ? 122 : 40);
    $TargetSizeCJ=($Outdoor ? 80 : 40);
    $DistanceRJ=($Outdoor ? 70 : 18);
    $DistanceCJ=($Outdoor ? 50 : 18);

    // Cadet
    $TargetRC=($Outdoor ? TGT_OUT_FULL : TGT_IND_6_big10);
    $TargetCC=($Outdoor ? TGT_OUT_5_big10 : TGT_IND_6_big10);
    $TargetSizeRC=($Outdoor ? 122 : 40);
    $TargetSizeCC=($Outdoor ? 80 : 40);
    $DistanceRC=($Outdoor ? 60 : 18);
    $DistanceCC=($Outdoor ? 50 : 18);

    // Nordic Cadet
    $TargetRN=($Outdoor ? TGT_OUT_FULL : TGT_IND_1_big10);
    $TargetCN=($Outdoor ? TGT_OUT_FULL : TGT_IND_1_big10);
    $TargetSizeRN=($Outdoor ? 122 : 60);
    $TargetSizeCN=($Outdoor ? 122 : 60);
    $DistanceRN=($Outdoor ? 40 : 12);
    $DistanceCN=($Outdoor ? 40 : 12);

    // Beginner
    $TargetRB=($Outdoor ? TGT_OUT_FULL : TGT_IND_1_big10);
    $TargetCB=($Outdoor ? TGT_OUT_5_big10 : TGT_IND_1_big10);
    $TargetSizeRB=($Outdoor ? 122 : 40);
    $TargetSizeCB=($Outdoor ? 80 : 40);
    $DistanceRB=($Outdoor ? 60 : 18);
    $DistanceCB=($Outdoor ? 50 : 18);

    $Phase=8;
    $i=0;

    // Only open class
    CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetR, 5, 3, 1, 5, 3, 1, 'RM',  'Recurve Men', 1, 240, 255, 0, 0, '', '', $TargetSizeR, $DistanceR);
    CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetR, 5, 3, 1, 5, 3, 1, 'RW',  'Recurve Women', 1, 240, 255, 0, 0, '', '', $TargetSizeR, $DistanceR);
    if ($SubRule==1) {
        // All classes
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetRM, 5, 3, 1, 5, 3, 1, 'RMM',  'Recurve Master Men', 1, 240, 255, 0, 0, '', '', $TargetSizeRM, $DistanceRM);
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetRM, 5, 3, 1, 5, 3, 1, 'RMW',  'Recurve Master Women', 1, 240, 255, 0, 0, '', '', $TargetSizeRM, $DistanceRM);
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetRJ, 5, 3, 1, 5, 3, 1, 'RJM',  'Recurve Junior Men', 1, 240, 255, 0, 0, '', '', $TargetSizeRJ, $DistanceRJ);
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetRJ, 5, 3, 1, 5, 3, 1, 'RJW',  'Recurve Junior Women', 1, 240, 255, 0, 0, '', '', $TargetSizeRJ, $DistanceRJ);
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetRC, 5, 3, 1, 5, 3, 1, 'RCM',  'Recurve Cadet Men', 1, 240, 255, 0, 0, '', '', $TargetSizeRC, $DistanceRC);
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetRC, 5, 3, 1, 5, 3, 1, 'RCW',  'Recurve Cadet Women', 1, 240, 255, 0, 0, '', '', $TargetSizeRC, $DistanceRC);
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetRB, 5, 3, 1, 5, 3, 1, 'RBM',  'Recurve Beginner Men', 1, 240, 255, 0, 0, '', '', $TargetSizeRB, $DistanceRB);
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetRB, 5, 3, 1, 5, 3, 1, 'RBW',  'Recurve Beginner Women', 1, 240, 255, 0, 0, '', '', $TargetSizeRB, $DistanceRB);
    }

    CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetC, 5, 3, 1, 5, 3, 1, 'CM',  'Compound Men', 0, 240, 255, 0, 0, '', '', $TargetSizeC, $DistanceC);
    CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetC, 5, 3, 1, 5, 3, 1, 'CW',  'Compound Women', 0, 240, 255, 0, 0, '', '', $TargetSizeC, $DistanceC);
    if ($SubRule==1) {
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetCM, 5, 3, 1, 5, 3, 1, 'CMM', 'Compound Master Men', 0, 240, 255, 0, 0, '', '', $TargetSizeCM, $DistanceCM);
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetCM, 5, 3, 1, 5, 3, 1, 'CMW', 'Compound Master Women', 0, 240, 255, 0, 0, '', '', $TargetSizeRM, $DistanceCM);
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetCJ, 5, 3, 1, 5, 3, 1, 'CJM', 'Compound Junior Men', 0, 240, 255, 0, 0, '', '', $TargetSizeCJ, $DistanceCJ);
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetCJ, 5, 3, 1, 5, 3, 1, 'CJW', 'Compound Junior Women', 0, 240, 255, 0, 0, '', '', $TargetSizeCJ, $DistanceCJ);
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetCC, 5, 3, 1, 5, 3, 1, 'CCM', 'Compound Cadet Men', 0, 240, 255, 0, 0, '', '', $TargetSizeCC, $DistanceCC);
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetCC, 5, 3, 1, 5, 3, 1, 'CCW', 'Compound Cadet Women', 0, 240, 255, 0, 0, '', '', $TargetSizeCC, $DistanceCC);
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetCB, 5, 3, 1, 5, 3, 1, 'CBM', 'Compound Beginner Men', 0, 240, 255, 0, 0, '', '', $TargetSizeCB, $DistanceCB);
        CreateEvent($TourId, $i++, 0, 0, $Phase, $TargetCB, 5, 3, 1, 5, 3, 1, 'CBW', 'Compound Beginner Women', 0, 240, 255, 0, 0, '', '', $TargetSizeCB, $DistanceCB);

    }

    // Team Finals
    $i=0;
    CreateEvent($TourId, $i++, 1, 1, $Phase, $TargetR, 5, 3, 1, 5, 3, 1, 'RX', 'Recurve Mixed Team', 1, 240, 255, 0, 0, '', '', $TargetSizeR, $DistanceR);
    CreateEvent($TourId, $i++, 1, 1, $Phase, $TargetRN, 5, 3, 1, 5, 3, 1, 'RNX', 'Recurve Nordic Cadet Mixed Team', 1, 240, 255, 0, 0, '', '', $TargetSizeRN, $DistanceCN);
    CreateEvent($TourId, $i++, 1, 1, $Phase, $TargetC, 5, 3, 1, 5, 3, 1, 'CX', 'Compound Mixed Team', 0, 240, 255, 0, 0, '', '', $TargetSizeR, $DistanceR);
    CreateEvent($TourId, $i++, 1, 1, $Phase, $TargetCN, 5, 3, 1, 5, 3, 1, 'CNX', 'Compound Nordic Cadet Mixed Team', 0, 240, 255, 0, 0, '', '', $TargetSizeCN, $DistanceCN);
}

function InsertStandardEvents($TourId, $TourType, $SubRule, $Outdoor=true) {
    InsertClassEvent($TourId, 0, 1, 'RM',  'R', 'M');
    InsertClassEvent($TourId, 0, 1, 'RW',  'R', 'W');
    InsertClassEvent($TourId, 0, 1, 'CM',  'C', 'M');
    InsertClassEvent($TourId, 0, 1, 'CW',  'C', 'W');

    InsertClassEvent($TourId, 0, 1, 'RMM',  'R', 'MM');
    InsertClassEvent($TourId, 0, 1, 'RMW',  'R', 'MW');
    InsertClassEvent($TourId, 0, 1, 'CMM',  'C', 'MM');
    InsertClassEvent($TourId, 0, 1, 'CMW',  'C', 'MW');

    InsertClassEvent($TourId, 0, 1, 'RJM',  'R', 'JM');
    InsertClassEvent($TourId, 0, 1, 'RJW',  'R', 'JW');
    InsertClassEvent($TourId, 0, 1, 'CJM',  'C', 'JM');
    InsertClassEvent($TourId, 0, 1, 'CJW',  'C', 'JW');

    InsertClassEvent($TourId, 0, 1, 'RCM',  'R', 'CM');
    InsertClassEvent($TourId, 0, 1, 'RCW',  'R', 'CW');
    InsertClassEvent($TourId, 0, 1, 'CCM',  'C', 'CM');
    InsertClassEvent($TourId, 0, 1, 'CCW',  'C', 'CW');

    InsertClassEvent($TourId, 0, 1, 'RNM',  'R', 'NM');
    InsertClassEvent($TourId, 0, 1, 'RNW',  'R', 'NW');
    InsertClassEvent($TourId, 0, 1, 'CNM',  'C', 'NM');
    InsertClassEvent($TourId, 0, 1, 'CNW',  'C', 'NW');

    InsertClassEvent($TourId, 0, 1, 'RBM',  'R', 'BM');
    InsertClassEvent($TourId, 0, 1, 'RBW',  'R', 'BW');
    InsertClassEvent($TourId, 0, 1, 'CBM',  'C', 'BM');
    InsertClassEvent($TourId, 0, 1, 'CBW',  'C', 'BW');

    InsertClassEvent($TourId, 1, 3, 'RX', 'R', 'M');
    InsertClassEvent($TourId, 1, 3, 'RX', 'R', 'W');
    InsertClassEvent($TourId, 1, 3, 'RX', 'R', 'MM');
    InsertClassEvent($TourId, 1, 3, 'RX', 'R', 'MW');
    InsertClassEvent($TourId, 1, 3, 'RX', 'R', 'JM');
    InsertClassEvent($TourId, 1, 3, 'RX', 'R', 'JW');
    InsertClassEvent($TourId, 1, 3, 'RX', 'R', 'CM');
    InsertClassEvent($TourId, 1, 3, 'RX', 'R', 'CW');

    InsertClassEvent($TourId, 1, 3, 'RX', 'R', 'BM');
    InsertClassEvent($TourId, 1, 3, 'RX', 'R', 'BW');

    InsertClassEvent($TourId, 1, 3, 'CX', 'C', 'M');
    InsertClassEvent($TourId, 1, 3, 'CX', 'C', 'W');
    InsertClassEvent($TourId, 1, 3, 'CX', 'C', 'MM');
    InsertClassEvent($TourId, 1, 3, 'CX', 'C', 'MW');
    InsertClassEvent($TourId, 1, 3, 'CX', 'C', 'JM');
    InsertClassEvent($TourId, 1, 3, 'CX', 'C', 'JW');
    InsertClassEvent($TourId, 1, 3, 'CX', 'C', 'CM');
    InsertClassEvent($TourId, 1, 3, 'CX', 'C', 'CW');
    InsertClassEvent($TourId, 1, 3, 'CX', 'C', 'BM');
    InsertClassEvent($TourId, 1, 3, 'CX', 'C', 'BW');

    InsertClassEvent($TourId, 1, 3, 'RNX', 'R', 'NM');
    InsertClassEvent($TourId, 1, 3, 'RNX', 'R', 'NW');

    InsertClassEvent($TourId, 1, 3, 'CNX', 'C', 'NM');
    InsertClassEvent($TourId, 1, 3, 'CNX', 'C', 'NW');
}

