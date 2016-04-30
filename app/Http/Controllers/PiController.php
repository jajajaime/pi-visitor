<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Pi;

use Torann\GeoIP\GeoIPFacade as GeoIP;

class PiController extends Controller
{
    public function index()
    {
        $visitor = Pi::count();
        $pi = Pi::orderBy('id', 'DESC')->first();

        if( ! $visitor )
        {
            list($pi, $num, $k) = $this->bcpi(++$visitor);
        }
        else
        {
            list($pi, $num, $k) = $this->bcpi(++$visitor, $pi->num, $pi->k);
        }

        $new_pi = new Pi;
        $new_pi->num = $num;
        $new_pi->k = $k;
        $new_pi->country = GeoIP::getLocation()['country'];
        $new_pi->ip = GeoIP::getLocation()['ip'];
        $new_pi->save();

        $countries = DB::table('pis')
                     ->select(DB::raw('count(*) as country_count, country'))
                     ->groupBy('country')
                     ->orderBy('country_count', 'DESC')
                     ->get();

        $visitor = $this->ordinal($visitor);

        return view('index', compact('visitor', 'pi', 'countries'));
    }
    

    private function bcpi($precision, $num = '', $k = 0){
        if($precision < 11)
        {
            $num = '';
            $k = 0;
        }

        bcscale($precision + 3);

        $limit = ($precision + 3)/14;

        while($k < $limit){
            $num = bcadd($num, bcdiv(bcmul(bcadd('13591409', bcmul('545140134', $k)), bcmul(bcpow(-1, $k), $this->bcfact(6 * $k))), bcmul(bcmul(bcpow('640320', 3 * $k + 1), bcsqrt('640320')), bcmul($this->bcfact(3 * $k), bcpow($this->bcfact($k), 3)))));

            ++$k;
        }

        return [bcdiv(1, bcmul(12, $num), $precision), $num, $k];
    }


    private function bcfact($n){
      return ($n == 0 || $n == 1) ? 1 : bcmul($n, $this->bcfact($n - 1));
    }


    private function ordinal($num)
    {
        // Special case "teenth"
        if ( ($num / 10) % 10 != 1 )
        {
            // Handle 1st, 2nd, 3rd
            switch( $num % 10 )
            {
                case 1: return $num . 'st';
                case 2: return $num . 'nd';
                case 3: return $num . 'rd';  
            }
        }
        // Everything else is "nth"
        return $num . 'th';
    }
}
