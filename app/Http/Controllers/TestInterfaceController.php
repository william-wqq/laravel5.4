<?php

namespace App\Http\Controllers;

use App\Tests\TestInterface;
use App\Http\Controllers\Controller;

/**
 * Class TestController
 * @package App\Http\Controllers
 */
class TestInterfaceController implements TestInterface
{
    public $public = 'public';

    protected $protected = 'protected';

    private static $private = 'private';




    /**
     * @param int $pageSize
     */
    public function index($pageSize = 10)
    {
        // TODO: Implement index() method.


        /*$name = 'MyName';
        //heredoc
        echo <<<EOD
My name is "{$name}". I am printing some {$this->public}.
Now, I am printing some {$this->protected}.
This should not print a capital 'A': x41
EOD;
        echo '<hr/>';

        //nowdoc
        echo <<<'EOT'
My name is "{$name}". I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should not print a capital 'A': x41
EOT;*/
        print_r((array)$this);







    }

    public function save()
    {
        // TODO: Implement save() method.
    }


    /**
     * @param $id
     */
    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    /**
     * @param $id
     */
    public function update($id)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }


}
