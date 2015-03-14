<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class Helper extends Component {
    /**
    * @param string $t {title}
    * @param string $b {body}
    * @param string $color {blue | yellow | red}
    * @param string $type {box | quote|}
    * @param string $quote_info
    * @return string HTML for a box to display
    */
    public Function make_box($t,$b,$color="blue",$type="box",$quote_info=""){
        $imgdir="@web/images/";
        $boxdir=$imgdir."box/";
        $signdir=$imgdir."sign/";
        $box_imgl=$signdir.$color."_sign.png";
        $box_imgr=$box_imgl;

        $box = "
        <div class=\"info_box ".$color."_box\"";
        if($type=="quote"){
            $box .=" style=\"margin-bottom:0px;\"";
        }
        $box .= ">";

        if($color!="blue" || $type!="box"){
            if($type=="quote"){
                $box_imgl=$signdir."left_quote.png";
                $box_imgr=$signdir."right_quote.png";
            }
            $tf="
            <div class=\"info_box_body_center_title ".$color."_box_title_quote\">
                <div class=\"info_box_body_center_title_img_title\">".$t."</div> 
            </div>
            ";
        }
        else{
            $tf=$t;
        }
        $box .="
            <div class=\"info_box_body_center_title_img_left\"><!--img src=\"".$box_imgl."\" alt=\"\" border=\"0\" / --></div>
            <div class=\"info_box_body_center_title_img_right\"><!--img src=\"".$box_imgr."\" alt=\"\" border=\"0\" / --></div>
            <div class=\"info_box_body_center_title ".$color."_box_title\">".$tf."</div>
            <div class=\"info_box_body_center_body ".$color."_box_text\">".$b."</div>";

        $box .="
        </div>";

        if($type=="quote"){
            list($ey,$em,$ed) = preg_split("/-/",$quote_info['expire']);
            list($sy,$sm,$sd) = preg_split("/-/",$quote_info['post']);
            $box .="
            <div class=\"info_box_quote_img\"><img src=\"".$boxdir.$color."_quotebottom2.gif\" alt=\"\" border=\"0\" align=\"top\" /></div>
            <div class=\"info_box_quote_name\">".$quote_info['name']."</div>
            <div class=\"info_box_quote_date\"> wrote on ".$sm."-".$sd."-".$sy."</div>
            <div class=\"info_box_quote_edate\">Message will expire on ".$em."-".$ed."-".$ey."</div>
            <!-- End of make_box -->";
        }
        return $box;
    }
    /**
     * Printy array, used for testing Functions etc.
     * 
     * @param <type> $a 
     */
    Function displayArray($a){
        print "<pre><br />";
        print_r($a);
        print "</pre><br />";
    }
    Function displayArray2($arrayname,$tab="&nbsp&nbsp&nbsp&nbsp",$indent=0) {
     $curtab ="";
     $returnvalues = "";
     while(list($key, $value) = each($arrayname)) {
      for($i=0; $i<$indent; $i++) {
       $curtab .= $tab;
       }
      if (is_array($value)) {
       $returnvalues .= "$curtab$key : Array: <br />$curtab{<br />\n";
       $returnvalues .= Yii::$app->helper->displayArray2($value,$tab,$indent+1)."$curtab}<br />\n";
       }
      else $returnvalues .= "$curtab$key => $value<br />\n";
      $curtab = NULL;
      }
     return $returnvalues;
    }
    
    
}