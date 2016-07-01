<?php

// This test fetches Replicator from GitHub and saves into the child directory modules/
// Kind of meta isn't it?

// Modify mod.json to change which repositories you want to clone/pull.

chdir(__DIR__);
require_once '../src/replicator.php';
new Replicator('mod.json');
