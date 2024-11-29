<?php
interface IValidateToken
{
    public function validate($token);
    public const FILES_DIRECTORY_NAME = "token_files";
}
class FileTokenValidator implements IValidateToken
{
    public function validate($token)
    {
        //Relative paths work fine? Getting full paths is unnecessary?
        /*$cwd = getcwd();
        if ($cwd === false)
        {
            error_log("TOKEN_ERROR: Unable to get the current working directory.");
            return false;
        }*/
        if (!file_exists(IValidateToken::FILES_DIRECTORY_NAME))
        {
            error_log("TOKEN_ERROR: The token directory does not exist.");
            return false;
        }
        //Do I need to check for a maximum system file name length here? Trim?
        $fp = IValidateToken::FILES_DIRECTORY_NAME . "/$token";
        if (file_exists($fp)) return true;
        return false;
    }
}
/*$validator = new FileTokenValidator();
$isValid = $validator->validate("FAKE_TOKEN");
if ($isValid) echo "YEPP\n";
else echo "NOPE\n";*/
?>
