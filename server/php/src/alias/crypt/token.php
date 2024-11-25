<?php
namespace alias\crypt;
class TokenSettings
{
    public $wordlen;
    public $hyphenate;
    public $maxlen;
    public function __construct($wordlen, $hyphenate, $maxlen) {
        if (is_numeric($wordlen)) $this->wordlen = $wordlen;
        else $this->wordlen = 10;
        if ($hyphenate !== false) $this->hyphenate = true;
        else $this->hyphenate = false;
        if (is_numeric($maxlen)) $this->maxlen = $maxlen;
        else $this->maxlen = 50;
    }
}
class TokenGen
{
    private $randomizer;
    private $settings;
    public function __construct($settings) {
        $gen = new \Random\Engine\Secure();
        $this->randomizer = new \Random\Randomizer($gen);
        $this->settings = $settings;
    }
    private function getWord() {
        $word = "";
        for ($i = 0; $i < $this->settings->wordlen; $i++)
        {
            //65 to 90 is the ALL CAPS ASCII range
            $n = $this->randomizer->getInt(65, 90);
            $c = chr($n);
            $word = $word . $c;
        }
        return $word;
    }
    public function getNew() {
        $token = "";
        $wordcount = ceil($this->settings->maxlen / $this->settings->wordlen);
        for ($i = 0; $i < $wordcount; $i++)
        {
            $word = $this->getWord();
            if ($this->settings->hyphenate and $i != ($wordcount - 1)) $token = $token . $word . "-";
            else $token = $token . $word;
        }
        return $token;
    }
}
/*
$settings = new TokenSettings(10, true, 100);
$tg = new TokenGen($settings);
$token = $tg->getNew();
echo $token;
*/
?>
