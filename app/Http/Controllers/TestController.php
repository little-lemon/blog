<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Redis; 
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Facades\Cache;

use App\Good;
use App\Category;
use App\User;
use App\Post;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        /* Cache::store('redis')->put('bar', 'baz', 10);    
        if(Cache::has('bar')){
            $value = Cache::get('bar');
            return $value;
        }
        Cache::put('key', 'fang', 10);
        $value = Cache::get('key');
        return $value; */
        $key = 'user:name:6';
        $user = User::find(6);
        if($user){
            //将用户名存储到Redis中
            Redis::set($key,$user->name);
        }
       /*  //判断指定键是否存在
        if(Redis::exists($key)){
            //根据键名获取键值
            dd(Redis::get($key));
        } */
        $key = 'posts:title';
        
        $posts = Post::all();
        foreach ($posts as $post) {
            //将文章标题存放到集合中
            Redis::sadd($key,$post->title);
        }
        
        //获取集合元素总数(如果指定键不存在返回0)
        $nums = Redis::scard($key);
        if($nums>0){
            //从指定集合中随机获取三个标题
            $post_titles = Redis::srandmember($key,3);
            dd($post_titles);
        }
    }

    public function goodadd()
    {
        //$categoryId  = ['11','22','13'];
        //$categoryId  = ['mysql','php','javascript'];
        $categoryId = [
            "num"=>123,  
            "arr"=>[1, 2],   
            "obj"=>
            [
                "a"=>3,
                "b"=>4
            ]
        ];
        $data = json_encode($categoryId);
        $data = json_decode($data);
        // dd($data);
        //dd((object)$categoryId);
        $good = new Good;
        $good->category_id = $categoryId;
        $good->save();
    }

    public function goodsearch(){
       DB::connection()->enableQueryLog(); // 开启查询日志  
        $categoryId  = 2;
        $good = new Good;
        // $data = $good->whereRaw("JSON_CONTAINS(category_id,'[$categoryId]')")->get();
        //$data = $good->whereRaw("JSON_SEARCH(category_id, 'all', '1%') IS NOT NULL")->get();
        //$data = $good->where('id',33)->update(['category_id'=>json_encode([1,2])]);
        $data = $good->where('id',33)->update(DB::raw("JSON_MERGE(category_id,'[3]')"));
        var_dump($data);


        //$data = $good->find(40);
        
        //$data = $good->select(DB::raw("category_id->'$[0]' as 'cate'"))->get();

        //$data = $good::query()->whereRaw("JSON_SEARCH(category_id, 'all', 'my%')  IS NOT NULL")->get();

        $queries = DB::getQueryLog(); // 获取查询日志  
        print_r($queries); // 即可查看执行的sql，传入的参数等等  
    }

    //标量类型声明
    function sum(int ...$ints) {
        return array_sum($ints);
     }

    //返回类型声明
    function returnIntValue(int $value):int{
        return $value + 1.0;
    }

    public function newphp(){
       
       /*  function arraysSum(array ...$arrays): array{   
            return array_map(function(array $array): int {     
                return array_sum($array);   
            }, $arrays); 
        } 
        print_r(arraysSum([1,2,3], [4,5,6], [7,8,9])); 
        
        function sumOfInts(int ...$ints) 
        {   
            return array_sum($ints); 
        }
         var_dump(sumOfInts(2, '3', 4.1));  */

         /* function foo($a) : int {   return $a; }          
         print_r(foo(1.0)); */

         $username = $_GET['username'] ?? 'not passed';
         print($username);
         print("<br/>");

        //integer comparison
        print( 1 <=> 1);print("<br/>");
        print( 1 <=> 2);print("<br/>");
        print( 2 <=> 1);print("<br/>");
        print("<br/>");
        //float comparison
        print( 1.5 <=> 1.5);print("<br/>");
        print( 1.5 <=> 2.5);print("<br/>");
        print( 2.5 <=> 1.5);print("<br/>");
        print("<br/>");
        //string comparison
        print( "a" <=> "a");print("<br/>");
        print( "a" <=> "b");print("<br/>");
        print( "b" <=> "a");print("<br/>");

        define('animals', [
            'dog',
            'cat',
            'bird'
         ]);
         print(animals[1]);

         $res = $this->sum(2, '3', 4.1);
         $res = $this->returnIntValue(5);
        
         print($res);
        
    }

    function sumOfInts(int ...$ints)
    {
        return array_sum($ints);
    }
    
    function arraysSum(array ...$arrays): array
    {
        return array_map(function(array $array): int {
            return array_sum($array);
        }, $arrays);
    }
    
    public function test(){
       return view('test.test');
       /*var_dump(number_format(-0.01));
       var_dump(
            count(1), // integers are not countable
            count('abc'), // strings are not countable
            //count(new stdclass), // objects not implementing the Countable interface are not countable
            count([1,2]) // arrays are countable
        );*/
    }

    public function shiwu()
    {
        //$good = new Good;
        // $data = 123;
        // DB::transaction(function ()  use($good,$data){
        //     $good->where('id',40)->update(['name' => 'good_40']);
        //     var_dump($data);
        // });

        /*$numberPlusOne = array_map(function ($number) {
            return $number += 1;
        }, [1, 2, 3]);
        
        print_r($numberPlusOne);*/

        /*$good->chunk(5, function ($goods) {
           dd($goods->toarray());
        });*/

        $category = new Category;
        $data = $category->find(1)->goods();
       //$data = $data ? $data->toarray() : [];
       dd($data);

    }

    public function expression()
    {
       /*  preg_match_all("|<[^>]+>(.*)</[^>]+>|U",
        "<b>example: </b><div align=left>this is a test</div>",
            $out, PREG_PATTERN_ORDER);
        dd($out);die;
        echo $out[0][0] . ", " . $out[0][1] . "\n";
        echo $out[1][0] . ", " . $out[1][1] . "\n"; */

        preg_match_all("|<[^>]+>(.*)</[^>]+>|U",
        "<b>example: </b><div align=\"left\">this is a test</div>",
        $out, PREG_SET_ORDER);
        //var_dump($out);
       // echo $out[0][0] . ", " . $out[0][1] . "\n";
       // echo $out[1][0] . ", " . $out[1][1] . "\n";

       preg_match_all("/\(?  (\d{3})?  \)?  (?(1)  [\-\s] ) \d{3}-\d{4}/x",
       "Call 555-1212 or 1-800-555-1212", $phones);
       var_dump($phones);

       $str = <<<FOO
       a: 1
       b: 2
       c: 3
FOO;
       preg_match_all('/(?P<name>\w+): (?P<digit>\d+)/', $str, $matches);
       var_dump($matches);
    }


}