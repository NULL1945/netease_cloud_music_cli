# 网易云音乐下载 For Linux 命令行  
Netease Cloud Music For Linux Command Line Interface  

> 在网易云音乐上，遇到喜爱的音乐怎么办，从现在起你不需要登录下载了。  
> Linux 下一条简单的命令就可以帮助你寻找出歌曲链接！  

![Netease Cloud Music For Linux CLI](https://github.com/NULL1945/netease_cloud_music_cli/blob/master/music.png)

### 获取 wangyi 命令  
获取项目中 `wangyi`、` netease_cloud_music.php` 两个文件，复制到当前用户目录。  
```
su  
cp wangyi /bin  
cp netease_cloud_music.php /bin  
cd /bin  
chmod 777 wangyi  
chmod 777 netease_cloud_music.php  
```

### wangyi 命令用法
> 歌曲：义勇军进行曲 ─ 中华人民共和国国歌 合唱版  
> http://music.163.com/#/song?id=5275429  
> 对应的歌曲 ID 为 5275429  

输入命令 `wangyi 5275429`：  
```
[user@host]$ wangyi 5275429  

ID: 5275429	义勇军进行曲 ─ 中华人民共和国国歌 合唱版  
H:	http://m1.music.126.net/sa4_FJdaon7UMbcuB-WlXQ==/5660285859869515.mp3  
M:	http://m1.music.126.net/EyPoGM1rMj0fOpe2JjSNJg==/5691072185443196.mp3  
L:	http://m1.music.126.net/wjLiLsNXC0juqmUPVrqccA==/2810351720640027.mp3  

```
 
如需下载，请使用 `curl` 命令。  

```
[user@host]$ curl -o 义勇军进行曲.mp3 http://m1.music.126.net/sa4_FJdaon7UMbcuB-WlXQ==/5660285859869515.mp3  
```
避免文件名中的空格影响 `curl` 命令，如文件名中遇到空格请在空格前加 `\`：
```
[user@host]$ curl -o 义勇军进行曲\ -\ 中华人民共和国国歌\ 合唱版.mp3 http://m1.music.126.net/sa4_FJdaon7UMbcuB-WlXQ==/5660285859869515.mp3  
```

### 参考链接：
[网易云音乐高音质支持](https://greasyfork.org/scripts/10582)  
[有道词典 For Linux命令行](https://github.com/elekids/youdao-cli/)  
[命令行执行带参数的php脚本，并取得参数](http://blog.csdn.net/eldn__/article/details/9197505)  

### License

The Netease Cloud Music For Linux CLI is open-sourced software licensed under the MIT license.  
