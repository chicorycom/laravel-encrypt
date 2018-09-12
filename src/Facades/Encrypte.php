<?php
/**
 * Created by IntelliJ IDEA.
 * User: CHICORYCOM
 * Date: 12/11/2017
 * Time: 17:40
 */

namespace Chicorycom\Facades;


use Illuminate\Support\Facades\Facade;

class Encrypte extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'chicorycom';
    }

}