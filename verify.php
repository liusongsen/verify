<?php

/**
 * PHP验证控件类
 * 
 * @author 刘松森 <liusongsen@gamil.com>
 * @deprecated 可配置支持大部分字段验证 v1.0 2013-06-24 11：57：00
 */
class Verify {

    const IS_HANDWET = 1;
    const IS_EMAIL = 2;
    const IS_TEL = 3;
    const IS_QQ = 4;
    const IS_DATE = 5;
    const IS_DATETIME = 6;
    const IS_NUMBER = 7;
    const IS_NNULL = 8;
    const IS_LENGTH = 9;
    const IS_FORMAT = 10;
    const REG_HANDSET = "/^((86)[\+-]?)?^1\d{10}$/i";
    const REG_EMAIL = "/^[_\.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,4}$/i";
    const REG_TEL = "/^\d{3}-?\d{7,8}(-?\d{1,3})?$/i";
    const REG_QQ_CODE = "/^\d{5,13}$/i";
    const REG_DATE = "/^\d{4}-?((0[1-9])|(1[0-2])|[1-9])-?((0[1-9])|([1-2][0-9])|(3[0-1])|[1-9])$/i";
    const REG_DATETIME = "/^\d{4}-?((0[1-9])|(1[0-2])|[1-9])-?((0[1-9])|([1-2][0-9])|(3[0-1])|[1-9])[ ]((00?)|(1[0-9])|(2[0-4])|([1-9])):((00?)|([1-5][0-9])|(60)|([1-9])):((00?)|([1-5][0-9])|(60)|([1-9]))$/i";
    const REG_NUMBER = "/^\d+$/i";

    /**
     * 判断两个值是否相等【值和类型都必须相等】
     * 
     * @param string $str1 
     * @param string $str2
     * @return bool  验证成功后返回true失败后返回false
     */
    public static function vEqual($str1, $str2) {

        return ($str1 === $str2) ? true : false;
    }

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
    public static function vIsNNUll($input) {

        return strlen($input) > 0 ? true : false;
    }

    /**
     * 验证长度
     * 
     * @param string $input 要验证的信息
     * @param int $min 最小长度
     * @param int $max 最大长度
     * @return bool  验证成功后返回true失败后返回false
     */
    public static function vlength($input, $min = 5, $max = 12) {

        return (strlen($input) >= $min && strlen($input) <= $max) ? true : false;
    }

    /**
     * 验证格式【自定义格式】
     * 
     * @param string $format 自定义格式
     * @param string $input 要验证的信息
     * @return bool  验证成功后返回true失败后返回false
     */
    public static function vFormat($format, $input) {

        return preg_match($format, $input) ? true : false;
    }

    /**
     * 验证数组【有结构】
     * 
     * @param array $arr 带结构的数组 array(array('msg'=>'手机号码格式错误','value'=>'zhangsan','verify'=>Verivy::IS_HANDWET),array('msg'=>'QQ昵称格式错误最小3最大5','value'=>'算法斯','verify'=>Verify::IS_LENGTH,'len_min'=>3,'len_max'=>10))
     * @param bool  $flag 验证失败后是否继续验证 
     * @reutrn mix[bool|string|array]  验证成功后返回true失败后返回验证不通过的结果
     */
    public static function vArr($arr, $flag = true) {

        $result = array();
        if ($arr) {
            foreach ($arr as $v) {
                if ($v['verify'] == 1) {
                    if (Verify::vHandset($v['value'])) {
                        continue;
                    } else {
                        if (!$flag) {
                            return $v['msg'];
                            break;
                        } else {
                            $result[] = $v['msg'];
                        }
                    }
                } elseif ($v['verify'] == 2) {
                    if (Verify::vEmail($v['value'])) {
                        continue;
                    } else {
                        if (!$flag) {
                            return $v['msg'];
                            break;
                        } else {
                            $result[] = $v['msg'];
                        }
                    }
                } elseif ($v['verify'] == 3) {
                    if (Verify::vTel($v['value'])) {
                        continue;
                    } else {
                        if (!$flag) {
                            return $v['msg'];
                            break;
                        } else {
                            $result[] = $v['msg'];
                        }
                    }
                } elseif ($v['verify'] == 4) {
                    if (Verify::vQQCode($v['value'])) {
                        continue;
                    } else {
                        if (!$flag) {
                            return $v['msg'];
                            break;
                        } else {
                            $result[] = $v['msg'];
                        }
                    }
                } elseif ($v['verify'] == 5) {
                    if (Verify::vDate($v['value'])) {
                        continue;
                    } else {
                        if (!$flag) {
                            return $v['msg'];
                            break;
                        } else {
                            $result[] = $v['msg'];
                        }
                    }
                } elseif ($v['verify'] == 6) {
                    if (Verify::vDateTime($v['value'])) {
                        continue;
                    } else {
                        if (!$flag) {
                            return $v['msg'];
                            break;
                        } else {
                            $result[] = $v['msg'];
                        }
                    }
                } elseif ($v['verify'] == 7) {
                    if (Verify::vIsNumber($v['value'])) {
                        continue;
                    } else {
                        if (!$flag) {
                            return $v['msg'];
                            break;
                        } else {
                            $result[] = $v['msg'];
                        }
                    }
                } elseif ($v['verify'] == 8) {
                    if (Verify::vIsNNUll($v['value'])) {
                        continue;
                    } else {
                        if (!$flag) {
                            return $v['msg'];
                            break;
                        } else {
                            $result[] = $v['msg'];
                        }
                    }
                } elseif ($v['verify'] == 9) {
                    $min = $v['len_min'];
                    $max = $v['len_max'];
                    if (Verify::vlength($v['value'], $min, $max)) {
                        continue;
                    } else {
                        if (!$flag) {
                            return $v['msg'];
                            break;
                        } else {
                            $result[] = $v['msg'];
                        }
                    }
                } elseif ($v['verify'] == 10) {
                    $format = $v['format'];
                    if (Verify::vFormat($format, $v['value'])) {
                        continue;
                    } else {
                        if (!$flag) {
                            return $v['msg'];
                            break;
                        } else {
                            $result[] = $v['msg'];
                        }
                    }
                }
            }
        }
        return $result ? $result : false;
    }

}

?>
