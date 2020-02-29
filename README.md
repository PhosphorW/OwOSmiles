Wordpress OwO 评论框表情包显示

基于网传版 OwO 表情包修改：

- 修改了 `smiley_trans()` 函数，只需将表情图片放入自定义的 `/alu` 文件夹即可，不需要每个表情手动注册每个表情
- 已默认注册到 WP 中的 `commen_form()`
- 在后台 `function.php` 头部调用此文件即可