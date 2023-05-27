<?php

include 'Athletes.php';

// initialize class
$athlete = new Athletes();

// established connection to database;
$athlete->createTbl();

// another steps for adding athlete