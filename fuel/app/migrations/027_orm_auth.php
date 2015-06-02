<?php

namespace Fuel\Migrations;

class Orm_auth {

    function up() {
        exec('php oil refine migrate --packages=auth', $output);
        print_r($output);
    }

    function down() {
        exec('php oil refine migrate:down --packages=auth', $output);
        print_r($output);
    }

}
