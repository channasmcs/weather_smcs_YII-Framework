<?php
/**
 * FileDoc: 
 * Widget for wether smcs.
 * !!! ATTENTION !!!
 *  
 * Usage:
 * 
 * 1. Copy wether_smcs directory into the extensions directory
 * 

 * 
 * eg.
 * <?php
        $this->widget('ext.weather_smcs.weather_smcs',
 *
        array(
 *
        'country'=>'srilanka',
 *
        'city'=>'ratnapura',
 *
        )

);
 * ?>
 * 
 * PHP version 5.3
 * 
 * @category Extensions
 * @package  weather_smcs
 * @author   channasmcs@gmail.com || (https://www.channasmcs.blogspot.com)
 *
*/

//Yii::import('ext.wether_smcs.*');

class Weather_smcs extends CWidget
{
//get country from front by channa
    public $country;
//get city  from front by channa
    public $city;
    public function __construct()
    {
        $assets = Yii::app()->getAssetManager()->publish(dirname(__FILE__) . '/asset');
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($assets . '/style.css');

    }
    private function getcurrentwether()
    {

        if(empty($this->country) || empty($this->city))
            {
                echo '
            <h4 class="error"> Warning ...! </h3>
            <p  class="error"> oops..you may not add your country & city to get Weather forecast which you want  </p>
            ';
            }
        else
             {
            //    in action with yahoo wether API by channa
//        return $this->country;
            $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
            $wether_smcs_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$this->city.', '.$this->country.'")';
            $wether_smcs_query_url = $BASE_URL . "?q=" . urlencode($wether_smcs_query) . "&format=json";
//    // Make call with cURL
            $session = curl_init($wether_smcs_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
//    // Convert JSON to PHP object
            $get_wether_smcs =  json_decode($json);

            foreach ($get_wether_smcs as $key => $show_wether_smcs)
                {
                    $result[] = $show_wether_smcs;
                }
                    foreach ($result[0] as $key => $show_wether_smcs2)
                    {
                        $result2[] = $show_wether_smcs2;
                    }
                    foreach ($result2[3] as $key => $show_wether_smcs3)
                    {
                        $result3[] = $show_wether_smcs3;
                    }
                    foreach ($result3[0] as $key => $show_wether_smcs4)
                    {
                        $result4[] = $show_wether_smcs4;
                    }

                        foreach ($result4[6] as $key => $show_wether_smcs6)
                            {
                                $result6[] = $show_wether_smcs6;
                            }
                        foreach ($result4[8] as $key => $show_wether_smcs8)
                            {
                                $result8[] = $show_wether_smcs8;
                            }
                        foreach ($result4[9] as $key => $show_wether_smcs9)
                            {
                                $result9[] = $show_wether_smcs9;
                            }
                        foreach ($result4[10] as $key => $show_wether_smcs10)
                            {
                                $result10[] = $show_wether_smcs10;
                            }
                        foreach ($result4[12] as $key => $show_wether_smcs12)
                            {
                                $result12[] = $show_wether_smcs12;
                            }

                                foreach ($result12[5] as $key => $show_wether_smcs2_5)
                                        {
                                            $result12_5[] = $show_wether_smcs2_5;
                                        }

//            next day

            foreach ($result12[7] as $key => $next_day2)
                {
                    $next_day[]=$next_day2;
                }

//day 2
            foreach ($next_day[1] as $key => $day1)
                    {
                        $day01[]=$day1;
                    }
            foreach ($next_day[2] as $key => $day2)
                    {
                        $day02[]=$day2;
                    }
            foreach ($next_day[3] as $key => $day3)
                    {
                        $day03[]=$day3;
                    }
            foreach ($next_day[4] as $key => $day4)
                    {
                        $day04[]=$day4;
                    }

            ?>

            <div class="wether_smcs_container">
<!--                <div class="wether_smcs_column-center">Column center</div>-->
                <div class="wether_smcs_column-left">
                    <p class="wether_smcs_title">Full weather detail <?php echo $result6[0]; ?> <?php echo $result6[1]; ?>  </p>

                      <p>  <strong> Sun & Moon</strong> &nbsp;&nbsp;   Sunrise : <?php echo $result10[0];?>  &nbsp;&nbsp;  Sunset : <?php echo $result10[1];?></p>
                      <p>  <strong>Wind </strong> &nbsp;&nbsp; : <?php echo $result8[2];?> mph </p>
                      <p>  <strong>Humidity</strong> &nbsp;&nbsp; : <?php echo $result9[0];?> mph </p>
                      <p>  <strong>pressure</strong> &nbsp;&nbsp; : <?php echo $result9[1];?> mph </p>

                    <br/>

                    <p class="wether_smcs_title">Summery next 4 day</p>

                    <p>  <strong>>></strong> &nbsp;&nbsp;  <?php echo $day01[1];?> (<?php echo $day01[2];?>)&nbsp; - &nbsp; <?php echo $day01[5];?> [&nbsp; <?php echo $day01[3];?>  &#8457; ( <?php echo number_format(5/9*($day01[3]-32),1); ?> &#8451; )&nbsp;]</p>
                           <hr style="width: 80%">
                    <p>  <strong>>></strong> &nbsp;&nbsp;  <?php echo $day02[1];?> (<?php echo $day02[2];?>)&nbsp; - &nbsp; <?php echo $day02[5];?> [&nbsp; <?php echo $day02[3];?>  &#8457; ( <?php echo number_format(5/9*($day02[3]-32),1); ?> &#8451; )&nbsp;]</p>
                           <hr style="width: 80%">
                    <p>  <strong>>></strong> &nbsp;&nbsp;  <?php echo $day03[1];?> (<?php echo $day03[2];?>)&nbsp; - &nbsp; <?php echo $day03[5];?> [&nbsp; <?php echo $day03[3];?>  &#8457; ( <?php echo number_format(5/9*($day03[3]-32),1); ?> &#8451; )&nbsp;]</p>
                           <hr style="width: 80%">
                    <p>  <strong>>></strong> &nbsp;&nbsp;  <?php echo $day04[1];?> (<?php echo $day04[2];?>)&nbsp; - &nbsp; <?php echo $day04[5];?> [&nbsp; <?php echo $day04[3];?>  &#8457; ( <?php echo number_format(5/9*($day04[3]-32),1); ?> &#8451; )&nbsp;]</p>
                           <hr style="width: 80%">
                    <br/>
                    <br/>


                    <p style="text-align: center">      <i>Weather_smcs 1.0 Develop by <a href="http//:www.channasmcs.blogspot.com" target="_blank">channasmcs</a></i></p>
                </div>
                <div class="wether_smcs_column-right">
                    <p class="wether_smcs_cont">  <strong><?php echo $result12_5[2];?>  &#8457; ( <?php echo number_format(5/9*($result12_5[2]-32),1); ?> &#8451; ) </strong></p>
                    <p class="wether_smcs_cont" style="font-size: 29px;   margin-top: -29px; color: rgb(129, 132, 132);">  <strong><?php echo $result12_5[3];?>  </strong></p>
                </div>

            </div>


<?php

        }
    }

	public function run()
	{

        print_r($this->getcurrentwether());

	}
}

?>