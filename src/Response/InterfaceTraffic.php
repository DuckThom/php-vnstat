<?php

namespace Luna\Vnstat\Response;

use Carbon\Carbon;
use Luna\Vnstat\Traits\ToJson;

/**
 * Class InterfaceTraffic
 *
 * @package     Luna\Vnstat
 * @subpackage  Response
 * @author      Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class InterfaceTraffic
{
    use ToJson;

    /**
     * @var TrafficData
     */
    public $total;

    /**
     * @var array
     */
    public $days = [];

    /**
     * @var array
     */
    public $months = [];

    /**
     * @var array
     */
    public $tops = [];

    /**
     * @var array
     */
    public $hours = [];

    /**
     * InterfaceTraffic constructor.
     *
     * @param  \stdClass  $traffic
     */
    public function __construct($traffic)
    {
        $this->total = new TrafficData($traffic->total->tx, $traffic->total->rx);

        foreach ($traffic->days as $day) {
            $this->days[] = [
                'date' => Carbon::create($day->date->year, $day->date->month, $day->date->day),
                'data' => new TrafficData($day->tx, $day->rx)
            ];
        }
    }
}
