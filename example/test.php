<?php

/**
 * php验证插件使用demo
 * 
 * @author 刘松森 <liusongsen@gmail.com>
 */
include '../verify.php';

//验证手机号码
if (Verify::vHandset("13202018503")) {
    echo "验证成功";
} else {
    echo "验证失败";
}

//验证邮箱
if (Verify::vEmail("245799856@qq.com")) {
    echo "验证成功";
} else {
    echo "验证失败";
}



//验证固话
if (Verify::vTel("020-45963414-235")) {
    echo "验证成功";
} else {
    echo "验证失败";
}



//验证QQ号码
if (Verify::vQQCode("245799856")) {
    echo "验证成功";
} else {
    echo "验证失败";
}


//验证日期
if (Verify::vDate("2012-01-31")) {
    echo "验证成功";
} else {
    echo "验证失败";
}


//验证日期时间
if (Verify::vDateTime("2013-06-24 23:59:100")) {
    echo "验证成功";
} else {
    echo "验证失败";
}


//验证数字
if (Verify::vIsNumber(456)) {
    echo "验证成功";
} else {
    echo "验证失败";
}

//验证空字符串
if (Verify::vIsNUll("")) {
    echo "验证成功";
} else {
    echo "验证失败";
}


//验证空字符串
if (Verify::vlength("sdsdf", 8, 10)) {
    echo "验证成功";
} else {
    echo "验证失败";
}

//自定义验证
if (Verify::vFormat("/\d{4}/i", 2245)) {
    echo "验证成功";
} else {
    echo "验证失败";
}

?>
