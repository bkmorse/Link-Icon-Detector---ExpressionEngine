<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  /**
  * ExpressionEngine Loop Plugin
  *
  * @package		Link Icon Detector
  * @subpackage	Plugins
  * @category		Plugins
  * @author		  Brad Morse
  * @link			  http://github.com/bkmorse
  */

  $plugin_info = array(
    'pi_name'			    => 'Link Icon Detector',
    'pi_version'	  	=> '1.0.0',
    'pi_author'		    => 'Brad Morse',
    'pi_author_url'	  => 'http://twitter.com/bkmorse',
    'pi_description'	=> 'Adds an icon to the right of link, that it detects',
    'pi_usage'		    => Link_icon::usage()
  );

  class Link_icon {

    var $return_data;

    // -- Constructor -- //
    function Link_icon() {
    // make a local reference to the ExpressionEngine super object
    $this->EE =& get_instance();
    $this->EE->load->helper('url');
    $file_url = strtolower($this->EE->TMPL->tagdata);
    $link_title = ($this->EE->TMPL->fetch_param('link_title') !== false) ? $this->EE->TMPL->fetch_param('link_title') : $file_url;
    $alt_tag = ($this->EE->TMPL->fetch_param('alt_tag') !== false) ? $this->EE->TMPL->fetch_param('alt_tag') : "Icon";

    switch(pathinfo($file_url, PATHINFO_EXTENSION)) {
      case "pdf":
      $icon = "pdf.png";
      break;

      case "doc":
      $icon = "word_processor.png";
      break;

      case "docx":
      $icon = "word_processor.png";
      break;

      case "xls":
      $icon = "spread_sheet.png";
      break;

      case "xlsx":
      $icon = "spread_sheet.png";
      break;

      case "ppt":
      $icon = "ppt.png";
      break;

      case "pptx":
      $icon = "ppt.png";
      break;

      case "mp3":
      $icon = "audio.png";
      break;

      case "wav":
      $icon = "audio.png";
      break;

      case "txt":
      $icon = "txt.png";
      break;

      case "rss":
      $icon = "feed.png";
      break;

      case "zip":
      $icon = "zip.png";
      break;

      case "ics":
      $icon = "ics.png";
      break;

      case "psd":
      $icon = "psd.png";
      break;

      case "mov":
      $icon = "film.png";
      break;

      case "mp4":
      $icon = "film.png";
      break;

      case "mpg":
      $icon = "film.png";
      break;

      case "avi":
      $icon = "film.png";
      break;

      default:
      $icon = FALSE;
      break;
    }

    $icon_img = ' <img src="./images/icons/'.$icon.'" alt="'.$alt_tag.'">';

    if($icon) {
      $return_data = anchor($file_url, $link_title.$icon_img, 'title="'.$link_title.'"');
    } else {
      $return_data = anchor($file_url, $link_title, 'title="'.$link_title.'"');
    }

    $this->return_data = $return_data;
  }
  /* END */


  // ----------------------------------------
  //  Plugin Usage
  // ----------------------------------------

  // This function describes how the plugin is used.
  //  Make sure and use output buffering

  function usage() {
    ob_start(); 
    ?>
    Use as follows:

    {exp:link_icon link_title="" alt_tag=""}{custom_field_url}{/exp:link_icon}

    link_title and alt_tag parameters are optional

    Detects following extensions: 

    pdf, doc, docx, ppt, pptx, xls, xlsx, mp3, wav, txt, rss, ics, mov, mpg, mp4, avi, psd

    If it does not recognize the extension, it still links it, just does not add an icon to the right of it.

    <?php
    $buffer = ob_get_contents();

    ob_end_clean(); 

    return $buffer;
  }
  /* END */


  }
  // END CLASS

  /* End of file pi.link_icon.php */
  /* Location: ./system/expressionengine/third_party/link_icon/pi.link_icon.php */
?>