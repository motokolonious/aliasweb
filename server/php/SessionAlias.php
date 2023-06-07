<?php
  # Designed to be a singleton and encapsulate all active session aliases
  # I think this doesn't work because the session alias map gets deallocated or deleted at the end of the php script
  class SessionAlias {
    private static $aliases = ['Lonious', 'Azerim', 'Azerah', 'Motoko', 'Mikasa', 'Bronn'];
    private static $session_alias_map = [];
    private static $instance;
    private function __constructor() {}
    public static function GetInstance() {
      if (self::$instance)
        return self::$instance;
      else {
        self::$instance = new SessionAlias();
        return self::$instance;
      }
    }
    public function GetAlias($session_id) {
      if (array_key_exists($session_id, self::$session_alias_map)) {
        return self::$session_alias_map[$session_id];
      } else {
        $rand_alias_index = array_rand(self::$aliases);
        self::$session_alias_map[$session_id] = self::$aliases[$rand_alias_index];
        return self::$session_alias_map[$session_id];
      }
    }
  }
?>