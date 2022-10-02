<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists('WPPB_Translator')){
    class WPPB_Translator {
		  private $_dictionary_by_language;

      function __construct() {
        $this->$_dictionary_by_language = [];
        $dir = new DirectoryIterator(WPPB_DIR_PATH."languages");
        foreach ($dir as $fileinfo) {
          $full_filename = $fileinfo->getFilename();
          $path = $fileinfo->getPath();
          if (strpos($full_filename, ".json") !== false) {
            $content = file_get_contents($path."/".$full_filename);
            $language = explode(".json", $full_filename)[0];
            $this->$_dictionary_by_language[$language] = $content;
          }
        }
      }

      function translate(&$content) {
        $languages = explode(";", $_SERVER["HTTP_ACCEPT_LANGUAGE"])[0];
        $language = explode(",", $languages);
        $selected_language = "";
        foreach($language as $key => $value) {
          if (strlen($value) === 2) {
            $selected_language = $value;
            break;
          }
        }

        if ($selected_language !== "") {
          if (array_key_exists($selected_language, $this->$_dictionary_by_language)) {
            $dictionary = json_decode($this->$_dictionary_by_language[$selected_language], true);
            if (is_array($dictionary)) {
              foreach($dictionary as $key => $value) {
                $content = str_replace(esc_html($key), esc_html($value), $content);
                $content = str_replace($key, esc_html($value), $content);
              }
            }
          }
        }
      }
    }
}

