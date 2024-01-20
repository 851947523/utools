

> 工具完善中
# 时间类
## 操作/更新
#### 时间加/减
~~~
Timer::instance("2023-02-10")
            ->inc(1,'m') 
            ->dec(2,'d')
            ->end();
//输出 2023-03-08     
~~~

## 显示
#### diff比较两个日期
~~~
 ## 算两个日期相差 年 月 日
 $res = Timer::instance()->diffDate("2023-01-02");
 //返回array(6) { ["y"]=> int(0) ["m"]=> int(1) ["d"]=> int(1) ["h"]=> int(0) ["i"]=> int(0) ["s"]=> int(0) }
~~~

#### unix时间戳
~~~
Timer::instance("2023-01-02")->unix();
~~~

#### 获取月天数
~~~
Timer::instance("2023-01-02")->daysInMonth();
// (int)28
~~~

# 请求类
