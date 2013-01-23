1.前后台是两个独立的配置文件和入口文件。前台是index.php，后台是admin.php。
2.后台是文件夹是manage,样式和图片文件放到manage/style文件下。
3.上传文件应存储在uploads目录下,按上传日期分目录存储，如2012/10/31/filename.jpg,文件名应使用MD5编码。
4.需要由git管理的目录，若为空，请在目录下建立一个内容为空的index.html。