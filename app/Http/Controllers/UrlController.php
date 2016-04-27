<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Url;


class UrlController extends Controller
{
    static $baseString;
    static $base;
    static $indexToCharMap;
    static $charToIndexMap;

    // initializes static varibales (must be called in order for other functions to work!!!)
    public static function init()
    {
        self::$baseString = 'u3JoDrnZyKCSFhz1RiIjdG4Tf8kYOUg9qcEP0N2b7QtsHmXpA6BwvLWM5xeVla';
        self::$base = strlen(UrlController::$baseString);
        self::$indexToCharMap = str_split(self::$baseString);
        self::$charToIndexMap = array_flip(self::$indexToCharMap);
    }

    // converts tiny url code to unique index to search in the DB
    public function urlToIndex($url)
    {
        $result = 0;
        $charArray = str_split($url);
        $length = count($charArray);
        for ($i = 0; $i < $length; $i++) {
            $exponent = $length - $i - 1;
            $result += self::$charToIndexMap[$charArray[$i]] * pow(self::$base, $exponent);
        }
        return $result;
    }

    // converts unique index from the DB to the tiny url code
    public function indexToUrl($num)
    {
        if ($num == 0)
            return 'u';
        $url = '';
        $i = 0;
        while ($num != 0) {
            $remainder = $num % self::$base;
            $num = floor($num / self::$base);
            $url = self::$indexToCharMap[$remainder] . $url;
            $i++;
        }
        return $url;
    }

    public function insert($long_url)
    {

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = Url::all();
	


        return view('urls.index')->with('urls', $urls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $long_url = $request->long_url;
        if (filter_var($long_url, FILTER_VALIDATE_URL) === FALSE) {
            return "NOT VALID URL!";
        }
        $url = new Url(['long_url' => $long_url]);
        $url->save();
        return $this->indexToUrl($url->id);
    }

    /* this function is used when the user is using a generated short url

    example: short url is: http://urlsauce.com/z21

    the id from conversion of "z21" is used to find the long url in the db

    the user is redirected to that url


    */
    public function redirectToUrl($urlCode)
    {
        $paths = explode('/', $urlCode);  
        $id = self::urlToIndex($paths[0]);
        $url = Url::find($id);
        $redirectUrl = $url->long_url;
        
        $length = count($paths);
        if ($length > 1)
        {
            // prevents double slashes if shortened url ends with /
            $redirectUrl = rtrim($redirectUrl, '/');
            for ($i = 1; $i < $length; $i++)
            {
                $redirectUrl .= '/' . $paths[$i];
            }
        }
        
        return redirect()->away($redirectUrl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
UrlController::init();
