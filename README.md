verify.php
================================================================================
PHP常用正则验证  
支持批量验证和单个验证，欢迎大家继续补充。
================================================================================

用法：导入verify.php即可

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

if (Verify::vIsNNUll("")) {

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

//验证数组

$data = array(

    array('msg' => '手机号码格式错误', 'value' => "86-13202018503sdfsdf", 'verify' => Verify::IS_HANDWET),
    
    array('msg' => '邮箱格式错误', 'value' => "2457999856@qq.comsdfsdf", 'verify' => Verify::IS_EMAIL),
    
    array('msg' => '固话格式错误', 'value' => "020-56895142-12sdfsdf", 'verify' => Verify::IS_TEL),
    
    array('msg' => 'QQ号码格式错误', 'value' => "125687458asdfasdfasdf", 'verify' => Verify::IS_QQ),
    
    array('msg' => 'QQ昵称输入不能为空', 'value' => "picker", 'verify' => Verify::IS_NNULL),
    
    array('msg' => '邮编要求必须是数字', 'value' => 546874, 'verify' => Verify::IS_NUMBER),
    
    array('msg' => '邮编长度要求>5and<10', 'value' => 54687423234234, 'verify' => Verify::IS_LENGTH, 'len_min' => 6, 'len_max' => 6),
    
    array('msg' => '自定义格式错误', 'value' => "123asfasdf", 'verify' => Verify::IS_FORMAT, 'format' => "/\d{3}/i"),
    
);

Verify::vArr($data)


Verify::vArr特别说明：

$flag == false 的时候，验证第一个不通过的时候，将停止验证，返回错误信息

$flag == true 的时候，将验证完所有规则，最后返回错误列表
