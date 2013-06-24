verify.php
================================================================================
PHP常用正则验证  欢迎大家继续补充

用法：include 'Verify.php'

手机号码验证：
Verify::vHandset("8613202018503")


邮箱验证：
Verify::vEmail("245799856@qq.com")


固话验证：
Verify::vEmail("020-38899377-5")


QQ号码验证：
Verify::vEmail("245799856")


日期验证
Verify::vDate("2013-06-24")


日期时间验证
Verify::vDateTime("2013-06-24 12:23:36")


数字验证：
Verify::vIsNumber(35641)


空验证：
Verify::vIsNUll($arr)


长度验证：
Verify::vlength("hello",3,5)


自定义验证：
Verify::vFormat("/\d{3}/i","sdf")
