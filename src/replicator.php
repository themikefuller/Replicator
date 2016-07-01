<?php

class Replicator {

    public function __construct($modfile) {
        if (file_exists($modfile)) {
            $mod = json_decode(file_get_contents($modfile),true);
        }
        if ((!$mod) or !isset($mod['owner'])) {
            unset($this);
            return null;
        } else {
            if (!file_exists($mod['dir'])) {
                mkdir($mod['dir']);
            }
            chdir($mod['dir']);
            foreach ($mod['modules'] as $module) {
                $this->GitModule($mod['owner'],$module);
            }
        }
    }

    private function GitModule($owner,$module) {

            if (!file_exists($module)) {
                $command = 'git clone https://github.com/' . $owner . '/' . $module;
                echo $module;
                system($command);
            } else {
                chdir($module);
                $command = 'git pull';
                system($command);
                chdir('..');
            }
        
    }

}
