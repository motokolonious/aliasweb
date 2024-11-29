<?php
namespace alias\crypt;
require_once('token.php');
require_once('token_validation.php');
class FileTokenCreator
{
    private $tokengen;
    public function __construct($tokengen) {
        $this->tokengen = $tokengen;
    }
    public function create() {
        $token = $this->tokengen->getNew();
        $fp = IValidateToken::FILES_DIRECTORY_NAME . "/$token";
        fopen($fp, 'c');
    }
}
/*$settings = new TokenSettings(5, false, 25);
$gen = new TokenGen($settings);
$creator = new FileTokenCreator($gen);
$creator->create();*/
?>
