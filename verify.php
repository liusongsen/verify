<?php

/**
 * PHP验证控件类
 * 
 * @author 刘松森 <liusongsen@gamil.com>
 * @deprecated 可配置支持大部分字段验证 v1.0 2013-06-24 11：57：00
 */
class Verify {

    const REG_HANDSET = "/((86)[\+-]?)?^1\d{10}$/i";
    const REG_EMAIL = "/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/i";
    const REG_TEL = "^/\d{3}-?\d{7,8}(-?\d{1,3})?$/i";
    const REG_QQ_CODE = "/^\d{5,13}$/i";
    const REG_DATE = "^/\d{4}-?((0[1-9])|(1[0-2])|[1-9])-?((0[1-9])|([1-2][0-9])|(3[0-1])|[1-9])$/i";
    const REG_DATETIME = "^\d{4}-?((0[1-9])|(1[0-2])|[1-9])-?((0[1-9])|([1-2][0-9])|(3[0-1])|[1-9])[ ](00?|(1[0-9])|(2[0-4])|[1-9]):(00?|([1-5][0-9])|60|[1-9]):(00|([1-5][0-9])|[1-9])/i";
    const REG_NUMBER = "/^\d+$/i";

    /**
     * 验证手机号码
     * 
     * @param string $input 手机号码
     * @return bool  验证成功后返回true失败后返回false
     */
    public static function vHandset($input) {

        return preg_match(Verify::REG_HANDSET, $input) ? true : false;
    }

    /**
     * 验证邮箱
     * 
     * @param string $input 邮箱
     * @return bool  验证成功后返回true失败后返回false
     */
    public static function vEmail($input) {

        return preg_match(Verify::REG_EMAIL, $input) ? true : false;
    }

    /**
     * 验证固话
     * 
     * @param string $input 固话
     * @return bool  验证成功后返回true失败后返回false
     */
    public static function vTel($input) {

        return preg_match(Verify::REG_TEL, $input) ? true : false;
    }

    /**
     * 验证QQ号码
     * 
     * @param string $input QQ号码
     * @return bool  验证成功后返回true失败后返回false
     */
    public static function vQQCode($input) {

        return preg_match(Verify::REG_QQ_CODE, $input) ? true : false;
    }

    /**
     * 验证日期
     * 
     * @param string $input 日期
     * @return bool  验证成功后返回true失败后返回false
     */
    public static function vDate($input) {

        return preg_match(Verify::REG_DATE, $input) ? true : false;
    }

    /**
     * 验证日期时间
     * 
     * @param string $input 日期时间
     * @return bool  验证成功后返回true失败后返回false
     */
    public static function vDateTime($input) {

        return preg_match(Verify::REG_DATETIME, $input) ? true : false;
    }

    /**
     * 验证数字
     * 
     * @param string $input 数字
     * @return bool  验证成功后返回true失败后返回false
     */
    public static function vIsNumber($input) {

        return preg_match(Verify::REG_NUMBER, $input) ? true : false;
    }

    /**
     * 验证非空
     * 
     * @param string $input 要验证的信息
     * @return bool  验证成功后返回true失败后返回false
     */
    public static function vIsNUll($input) {

        return is_null($input) ? true : false;
    }

    /**
     * 验证长度
     * 
     * @param string $input 要验证的信息
     * @param int $min 最小长度
     * @param int $max 最大长度
     * @return bool  验证成功后返回true失败后返回false
     */
    public static function vlength($input, $min, $max) {

        return (strlen($input) >= $min && strlen($input) <= $max) ? true : false;
    }

    /**
     * 验证格式【自定义格式】
     * 
     * @param string $input 要验证的信息
     * @param string $format 自定义格式
     * @return bool  验证成功后返回true失败后返回false
     */
    public static function vFormat($input, $format) {

        return preg_match($format, $input) ? true : false;
    }

}

?>
