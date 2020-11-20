# MDT-For-Typecho

<p align="center">
<img src='https://gitee.com/heyos/mdt-for-typecho/badge/star.svg?theme=white' alt='Gitee Star'>
<img src='https://gitee.com/heyos/mdt-for-typecho/badge/fork.svg?theme=white' alt='Gitee Fork'>
<br/>
<img src="https://badgen.net/github/stars/oCoke/MDT-For-Typecho" alt="GitHub Star">
<img src="https://badgen.net/github/forks/oCoke/MDT-For-Typecho" alt="GitHub Fork">
<img src="https://badgen.net/github/last-commit/oCoke/MDT-For-Typecho/dev" alt="GitHub Commit">
<img src="https://badgen.net/github/release/oCoke/MDT-For-Typecho" alt="GitHub Release">
<img src="https://badgen.net/badge/For/Typecho/red" alt="For Typecho">
<img src="https://badgen.net/badge/License/SATA/blue" alt="SATA">
</p>

## 简介

简洁，专注阅读的 Typecho 博客主题。

最新版本：`Beta-V0.5`。

版本更新历史请见：[CHANGELOG.md](https://github.com/oCoke/MDT-For-Typecho/blob/master/CHANGELOG.md)

文档：[https://heyos.gitee.io/mdt-docs](https://heyos.gitee.io/mdt-docs)

预览站：[https://mdt.hifun.site](https://mdt.hifun.site)

## 特性

- 图片懒加载
- 自动代码高亮
- 自动分割中英文
- 简洁，适合阅读的文章页面
- 顶部菜单栏
- 侧边菜单栏
- 简洁的评论页面
- 顺滑滚动
- 基于 [MDUI](https://www.mdui.org)
- 前台加载文件仅 `277 KB` <sup>[1]</sup>
- 不错的兼容性
- 响应式 / 自适应设计
- 开发者设置
- 大多数浏览器的**阅读器支持**
- 文章目录树
- 阅读优化



## 使用

1. Star 本项目（遵循 SATA 开源协议）
2. 下载**最新的 [Release](https://github.com/oCoke/MDT-For-Typecho/releases)**
3. 确保自身 PHP 环境在 7.1.0 及以上版本（过低的版本不受支持）
4. 解压后，**确认目录名为`MDT`（大写）**
5. 将文件夹放入 Typecho 根目录下的`usr/themes/`
6. 到后台-外观-可用的主题中，启用主题
7. **根据 [文档](https://heyos.gitee.io/mdt-docs)** 配置主题

---

### 使用开发版
直接下载仓库，或者使用 git 命令行进行克隆。

```bash
git clone https://github.com/oCoke/MDT-For-Typecho.git
```

OR:

```bash
npm init && npm i mdt-for-typecho --save
```

> 如果使用 NPM 安装，主题文件在 `node_module/mdt-for-typecho` 中。

> 非常不推荐使用开发版，因为可能有不确定的不稳定因素，并且不一定有有利改动。<br>如果你使用开发版出现任何问题，欢迎通过 [Issues](https://github.com/oCoke/MDT-For-Typecho/issues) 反馈。

---

### 遇到问题

如果在使用过程中遇到了任何问题，可以先阅读本主题的 [文档](https://heyos.gitee.io/mdt-docs)，并进行一些简单的确认：清理浏览器缓存，更换网络环境，确保 Console 内没有提示访问不到文件等自身原因。

如果你无法靠自己解决问题，可以尝试联系作者，但请您记住**开发者没有为你解决问题的义务，只是出于好心的帮助。** 

在确认你遇到的现象确实是一个 Bug 后，请在 [Issues](https://github.com/oCoke/MDT-For-Typecho/issues) 提交问题，并为该问题尽可能的描述清楚，谢谢。

---

### 协议

本主题基于 [SATA](https://github.com/oCoke/MDT-For-Typecho/blob/master/LICENSE) 协议开源。

根据协议，使用前你需要给这个项目点一个 **Star**，使用或转发时**请保留版权信息**，禁止倒卖。若需二次开发后发布，请先联系我。

删除版权的用户**不会在遇到问题时受到任何来自作者的帮助**！




## 鸣谢

### 开源项目

- [zdhxiong/mdui](https://github.com/zdhxiong/mdui)
- [aFarkas/lazysizes](https://github.com/aFarkas/lazysizes)
- [linclancey/pangu.php](https://github.com/linclancey/pangu.php)
- [gblazex/smoothscroll-for-websites](https://github.com/gblazex/smoothscroll-for-websites)
- [PrismJS/prism](https://github.com/PrismJS/prism)

### 参考

- [BigCoke233/miracles](https://github.com/BigCoke233/miracles) 
- [EAimTY/materiality-typecho-theme](https://github.com/EAimTY/materiality-typecho-theme)

### 说明

<sup>[1]</sup> : 本数据仅供参考，包含字体文件。
