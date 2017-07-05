<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Requests\TestRequest;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Http\Controllers\ExampleController;

class TestController extends Controller
{
    //
    public $test;

    public $test1;

    public function __construct()
    {
        //$this->test = $var;
        //$this->test1 = $var1

    }

    public function sendMail(){


        //dd(11);
        $to = '1160735344@qq.com';

        try{
            \Mail::to($to)->send(new SendMail());
            echo  'succ';
        }catch(\Exception $e){
            throw $e;
        }


    }


    public static function test(TestRequest $request){

        $name = config('test.conf.name');

        $type = $request->method();
        $route = route('test.string');

        echo $route;
        //echo 'controller';
    }


    public function index(){


        //$arr = serialize($this);

        //$object = unserialize($arr);

        //dd($object);

        //$class = new self;
//dd($class);
        //echo $class;

        //$a = new self;
        //eval('$b = ' . var_export($a, true) . ';');

        //var_dump($b);

//var_dump(new TestController(13, 14));
        //var_dump();




//        try{
//            trigger_error("Cannot divide by zero", E_USER_ERROR);
//        }catch(\Exception $e){
//            //
//            //throw $e;
//            echo $e->getMessage();
//        }finally{
//            echo 'first finally';
//        }




//        $arr = [
//            'a'=>['id'=>1, 'name'=>'wua', 'age'=>'10'],
//            'b'=>['id'=>2, 'name'=>'wub', 'age'=>'20'],
//            'c'=>['id'=>3, 'name'=>'wuc', 'age'=>'30'],
//            'd'=>['id'=>4, 'name'=>'wud', 'age'=>'40'],
//        ];
//        $map = array_map(function($element){
//            return $element['name'];
//        }, $arr);
//
//        dd(array_column($arr, 'age'));
//        $sum = array_reduce(array_column($arr, 'age'), function($pre, $next){
//            return $pre+$next;
//        });
//
//        $sum = array_reduce($arr, function($pre, $next){
//            return $pre+$next['age'];
//        }, 'no data');
//
//        array_walk($arr, function(&$element){
//            return $element['age'] = 100;
//        });
//
//        $filter = array_filter($arr, function($item) {
//            return $item['id'] == 1;
//        });

        //dd($filter);


//        $a = 1;
//        if($a == 1):
//            echo 'if';
//        elseif($a == 2):
//            echo 'elseif';
//        endif;
//
//        $result = 0;
//        for($i=0; $i<=10; $i++):
//            $result += $i;
//        endfor;


//        $array = array('1'=>'one', '2'=>'two', '3'=>'two');
//        $arr = array_flip($array);
//        dd($arr);

//        list($key, $value) = each($array);
//        list($key, $value) = each($array);
//        dd($key.$value);

//        $a = 'origin';
//        $my_array = array("a" => "Cat","b" => "Dog", "c" => "Horse");
//        extract($my_array, EXTR_PREFIX_SAME, 'cp');
//        echo "\$a = $a; \$b = $b; \$c = $c; \$cp_a = $cp_a";
        //$this->console_log($arr);

//        $var1 = 'one';
//        $var2 = 'two';
//
//        $result = compact('var1', 'var2');
//        var_dump($result);

        $input = array("a", "b", "c", "d", "e");

        $output = array_slice($input, -2, 1);
        //var_dump($output);

//        $input = array("red", "green", "blue", "yellow");
//        array_splice($input, 2);
//
//        $b = array_fill(-7, 4, 'pear');



//        $a = array('green', 'red', 'yellow');
//        $b = array('avocado', 'apple', 'banana');
//        $c = array_combine($a, $b);

//        array_push($b, 'orange');
//
//        array_pop($b);
//
//        var_dump(array_pop($b));

//        $shift = array_shift($input);
//        var_dump($input);
//        var_dump($shift);

//        $unshift = array_unshift($input, 'hello');
//
//        dd($unshift);

        $input = array("a", "b", "c", "d", "f", 'e');

//        $array1 = $array2 = array("img12.png", "img10.png", "img2.png", "img1.png");
//
//        asort($array1);
//        echo "Standard sorting\n";
//        print_r($array1);
//
//        natsort($array2);
//        echo "\nNatural order sorting\n";
//        print_r($array2);


        $arr1 = array('a'=>'apple', 'b'=>'banana');
        $arr2 = array('a'=>'app');
        //print_r(array_merge($arr1, $arr2));
        //print_r(($arr1 + $arr2));


//        $arr3 = array(1 => 'apple', 2 => 'banana');
//        $arr4 = array(1 => 'app');
//        print_r(array_merge($arr3, $arr4));
//        print_r(($arr3 + $arr4));


       // var_dump($input);

        //dd(array_reverse($input, true));



//        echo lcfirst("Hello ,World");
//
//        echo ucfirst('hello ,World');
//
//        echo ucwords("hello  world");
//
//        echo strtolower('HELLO, WORLD');
//
//        echo strtoupper('hello, world');

        //var_dump(substr('abcdef', -1, -1));

        //echo strchr('usr\wqq\index.html', '\\');

        //echo strstr('name@qq.com', '@', true);

        //var_dump(strpos('aba abcdae', 'a' ,1));

        $str = 'abcdefgabc';

        var_dump(count_chars($str, 1));
        $i = 0;
        $arr = [];
        for(; $i< strlen($str); $i++){
            if(isset($arr[$str[$i]]))
                $arr[$str[$i]]++;
            else
                $arr[$str[$i]] = 1;
        }

       print(3);
        echo 2;
        var_dump(2);


//        $arr2 = count_chars($str, 1);
//        $arr3 = array_keys($arr2);
//        //print_r($arr3);
//        $arr1 = array_map(function($n, $m){
//
//            //return chr($m);
//            return  array(chr($m) => $n);
//
//        },$arr2, $arr3);
//
//        print_r($arr1);









        //print_r($arr);
        //print_r(array_count_values($arr));


        //$arr = explode('', $str);
        //print_r($arr);

        //$arrNew = array_unique($arr);
        //print_r($arrNew);



//        array_map(function(){
//            return
//        }, $arrNew);



    }



//    public function testString(){
//
//        $addc = addcslashes('1wqq ws', 'w');
//
//        //echo $addc;
//
//    }
//
//
//
//    public static function className(){
//        return  __CLASS__;
//    }
//
//
//
//
//
//    public function method($param){
//        return $param;
//    }
//
//    public function __call($name, $arguments)
//    {
//        // 注意: $name 的值区分大小写
//        echo "Calling object method '$name' "
//            . implode(', ', $arguments). "\n";
//    }
//
//    /**  PHP 5.3.0之后版本  */
////    public static function __callStatic($name, $arguments)
////    {
////        // 注意: $name 的值区分大小写
////        echo "Calling static method '$name' "
////            . implode(', ', $arguments). "\n";
////        //return parent::getTest();
////    }
//
//    function __set($name, $value)
//    {
//        // TODO: Implement __set() method.
//
//        return parent::setV($value);
//        //echo 'set';
//    }
//
//    function __get($name)
//    {
//        // TODO: Implement __get() method.
//
//        return parent::getV();
//    }
//
//
//
//
//
//    function __sleep()
//    {
//        //echo 'sleep';
//        // TODO: Implement __sleep() method.
//        return array('test', 'test1');
//    }
//
//    function __wakeup()
//    {
//        //echo 'wakeup';
//        // TODO: Implement __wakeup() method.
//    }
//
//    function __toString()
//    {
//        // TODO: Implement __toString() method.
//        return 'object of '.__CLASS__;
//    }
//
//    function __invoke($x)
//    {
//        // TODO: Implement __invoke() method.
//
//        var_dump($x);
//    }
//
//    static function __set_state($an_array)
//    {
//        // TODO: Implement __set_state() method.
//        $obj = new self;
//        $obj->test = $an_array['test'];
//        $obj->test1 = $an_array['test1'];
//
//        return $obj;
//
//    }
//
//    /*function __debugInfo()
//    {
//        // TODO: Implement __debugInfo() method.
//        return ['square'=> ($this->test)*($this->test1)];
//    }*/
//
//    public function console_log($data){
////        echo "<script>";
////        echo "console.log(" . json_encode($data) . ")";
////        echo "</script>";
//        $data = json_encode($data);
//
//        $data = <<<EOD
//<script>console.log($data)</script>
//EOD;
//        echo $data;
//    }




}