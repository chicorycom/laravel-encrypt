<?php
/**
 * Created by IntelliJ IDEA.
 * User: BAOCOM
 * Date: 12/11/2017
 * Time: 16:55
 */

namespace Chicorycom\App;


use Chicorycom\App\inter\InterEncryption;

class Encryption implements InterEncryption
{

        private $EnctyptageKey = null;
        private $Count;
        private $Tmp = "";
        private $Str;
        protected $_Key;

    /**
     * encryption constructor.
     * @param string $key
     * @internal param string $Cle
     */
    public function __construct()
    {
      $this->_Key = config('chencrypt.encrypt');
    }


    /**
     * @param string $Str
     * @param string $EnctyptageKey
     * @return string
     */
    public function GenerationCle(string $Str, string $EnctyptageKey): string
    {

        $this->EnctyptageKey = md5($EnctyptageKey);
        $this->Count=0;
        $this->Tmp = "";
        for ($Ctr=0;$Ctr<strlen($Str);$Ctr++)
        {
            if ($this->Count==strlen($this->EnctyptageKey))
                        $this->Count=0;
            $this->Tmp.= substr($Str,$Ctr,1) ^ substr($this->EnctyptageKey,$this->Count,1);
            $this->Count++;
        }
        return $this->Tmp;
    }


    /**
     * @param string $Str
     * @return string
     */
    public function Crypte(string $Str) : string
    {
        srand((double)microtime()*1000000);
        $this->EnctyptageKey = md5(rand(0,32000) );
        $this->Count=0;
        $this->Tmp = "";
        for ($Ctr=0;$Ctr<strlen($Str);$Ctr++)
        {
            if ($this->Count==strlen($this->EnctyptageKey))
                $this->Count=0;
            $this->Tmp.= substr($this->EnctyptageKey,$this->Count,1).(substr($Str,$Ctr,1) ^ substr($this->EnctyptageKey,$this->Count,1) );
            $this->Count++;
        }
        return base64_encode($this->GenerationCle($this->Tmp,$this->_Key) );
    }


    /**
     * @param string $Str
     * @return string
     */
    public function Decrypte(string $Str) : string
    {
        $this->Str = $this->GenerationCle(base64_decode($Str),$this->_Key);
        $this->Tmp = "";
        for ($Ctr=0;$Ctr<strlen($this->Str);$Ctr++)
        {
            $md5 = substr($this->Str,$Ctr,1);
            $Ctr++;
            $this->Tmp.= (substr($this->Str,$Ctr,1) ^ $md5);
        }
        return $this->Tmp;
    }
}
