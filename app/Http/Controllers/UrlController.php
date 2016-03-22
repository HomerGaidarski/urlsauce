<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Url;

class UrlController extends Controller
{
    /*
                // randomized 0-9, a-z, A-Z
    static $baseString = 'K3JoDrnZyuCSFhz1RiIjdG4Tf8kYOUg9qcEP0N2b7QtsHmXpA6BwvLWM5xeVla';
    static $base = strlen($baseString);
    static $indexToCharMap = str_split($baseString);
    static $charToIndexMap = array_flip($indexToCharMap);

    // converts tiny url code to unique index to search in the DB
    public function urlToIndex($url)
    {
        global $charToIndexMap, $base;
        $result = 0;
        $charArray = str_split($url);
        $length = count($charArray);
        for ($i = 0; $i < $length; $i++)
        {
            $exponent = $length - $i - 1;
            $result += $charToIndexMap[$charArray[$i]] * pow($base, $exponent);
        }
        return $result;
    }

    // converts unique index from the DB to the tiny url code
    public function indexToUrl($num)
    {
        if ($num == 0)
            return 'K';
        global $indexToCharMap, $base;
        $url = '';
        $i = 0;
        while ($num != 0)
        {
            $remainder = $num % $base;
            $num =  floor($num / $base);
            $url = $indexToCharMap[$remainder] . $url;
            $i++;
        }
        return $url;
    }
*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = Url::all();
	
		$url = new Url;
		$url->long_url = 'aldjfalksjfdklajsfdlk234lk234j234';
		$url->save();

        return view('urls.index')->with('urls', $urls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
