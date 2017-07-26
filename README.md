# yaf + yar 实现配置中心

### 配置

* yaf 开启命名空间
````angular2html
[yaf]
yaf.use_namespace=1
````
* nginx配置
````angular2html
server {  
        listen  80;    
        server_name config.local.domain.cn;    
        set $root_path '/var/www/html/config-center/public/';    
        root $root_path;    
        
        index index.php index.html index.htm;    
        
        try_files $uri $uri/ @rewrite;    
        
        
	if (!-e $request_filename) {
    		rewrite ^/(.*)  /index.php/$1 last;
  	}
        location ~ \.php {    
        
            #fastcgi_pass 127.0.0.1:9000;
	    fastcgi_pass  unix:/var/run/php/php7.0-fpm.sock;    
            fastcgi_index /index.php;    
        
            fastcgi_split_path_info       ^(.+\.php)(/.+)$;    
            fastcgi_param PATH_INFO       $fastcgi_path_info;    
            fastcgi_param PATH_TRANSLATED $document_root$fastcgi_path_info;    
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;    
            include                       fastcgi_params;  
        }    
        
        location ~* ^/(css|img|js|flv|swf|download)/(.+)$ {    
            root $root_path;    
        }    
        
        location ~ /\.ht {    
            deny all;    
        }    
    }  
````

#### test

* http://config.local.domain.cn/ 作为rpc客户端的一个例子

#### 思路
* 如果公司有很多php的项目，有服务有接口就会有很多域名每个项目都需要自己维护一套很麻烦，所以可以用这个配置中心
* 我们这其他的项目大部分是laravel所以可以在各个项目里面引入yac、yar　通过yar来调用配置用yar把配置放入内存
* 在配置文件需要修改的时候调config-center的refresh方法广播给各个服务通知他们重新请求配置
* 优点统一管理、加快项目速度
* 缺点如果配置中心出问题了、项目内存中配置丢失后项目就瘫痪了~