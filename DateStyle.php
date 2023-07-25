<?php
namespace lulubin\date;

class DateStyle extends \yii\base\Widget
{
    public $sorce_date;
    
    public function run()
    {
        $nowtime = time();
        $timeHtml = '';
        $difference = $nowtime - $this->sorce_date;
        switch($difference){
            case $difference <= '60':
                $timeHtml = date('s',$difference).'秒前';
                break;
            case $difference > '60' && $difference <= '3600' :
                $timeHtml = floor($difference / 60) . '分钟前';
                break;
            case $difference > '3600' && $difference <= '86400' :
                $timeHtml = floor($difference / 3600) . '小时前';
                break;
            //1-3天前
            case $difference > '86400' && $difference <= '259200' :
                $timeHtml = floor($difference / 86400) . '天前';
                break;
            case $difference > '259200':
                $timeHtml = date('Y-m-d',$this->sorce_date);
                break;
        }
        return $timeHtml;
    }
}
