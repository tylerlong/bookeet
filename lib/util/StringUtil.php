<?php

/*
 * @author: Peter Long  http://peterlong.info
 */

class StringUtil {

  public static function startsWith($haystack, $needle, $case=true) {
    if ($case) {
      return (strcmp(substr($haystack, 0, strlen($needle)), $needle) === 0);
    }
    return (strcasecmp(substr($haystack, 0, strlen($needle)), $needle) === 0);
  }

  public static function endsWith($haystack, $needle, $case=true) {
    if ($case) {
      return (strcmp(substr($haystack, strlen($haystack) - strlen($needle)), $needle) === 0);
    }
    return (strcasecmp(substr($haystack, strlen($haystack) - strlen($needle)), $needle) === 0);
  }

}
