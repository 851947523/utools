

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

#### 相对于当前时间
~~~
echo Timer::instance('2026-1-25 20:00:00')->fromNow();
//输出 1年11月30日1时1分1秒后
~~~
#### 相对于指定时间
~~~
echo Timer::instance('2026-1-25 20:00:00')->from('2022-1-24 20:00:00');
//输出 4年1日后
~~~

# 请求类

#### post
~~~
 $request = Request::instance()
            ->post('http://127.0.0.1:8888', ['id' => 1, 'name' => 'g33z'],'');
        var_dump($request->send());
~~~
#### get
~~~
 $request = Request::instance()
            ->get('http://127.0.0.1:8888', ['id' => 1, 'name' => 'g33z'],'');
        var_dump($request->send());
~~~
