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

      function translate(&$obj) {
        $languages = explode(";", $_SERVER["HTTP_ACCEPT_LANGUAGE"])[0];
        $language = explode(",", $languages);
        $selected_language = "";
        foreach($language as $key => $value) {
          if (strlen($value) === 2) {
            $selected_language = $value;
            break;
          }
        }

        if (array_key_exists($selected_language, $this->$_dictionary_by_language)) {
          $dictionary = json_decode($this->$_dictionary_by_language[$selected_language], true);
          if (is_array($dictionary)) {
            $this->_translate($obj, $dictionary);
            $this->_translate($obj, $dictionary);
          }
        }

      }

      private function _translate(&$obj, $dictionary) {
        foreach($obj as $key => &$value) {
          if (is_string($value)) {
            if (array_key_exists($value, $dictionary)) {
              console_log("translating");
              console_log($obj[$key]);
              
              $obj[$key] = $dictionary[$value];
              console_log($obj[$key]);
            }
          } else if (is_object($value) || is_array($value)) {
            $this->_translate($value, $dictionary);
          }
        }
        
      }
    }
}
