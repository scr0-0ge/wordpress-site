# 项目日志（优化版）
> Tidsperiod: 2025-06-17 → 2025-07-25


## 2025-07-25  ✅
### 进展
1. 跟新插件时网站炸了，重新回档后重新做Product categories，下面就是步骤

第一步 :appearance 进 widgets， 里面Product categories错位，要拉到 shop page widget area.
这步后正常显示但是实际点击后页面会显示404

第二步 :woocommece 到 setting再到products, Shop page 改到购物页面，现在只有英文模式有实际的商店页面，所以先绑了Assortment,至此英文页面的Product categories完全能用了

第三步 : 瑞典语界面的分类非常麻烦，这一步会很长，处理错误会导致页面出问题

- 首先Product permalinks 里的 几个选项永远要选Shop base，要不然会出Error 503 VCL failed
- How to translate product permalinks 那个选项打开后跳转到WooCommerce Multilingual & Multicurrency ，点开里面的 status，把WooCommerce Store Pages 里面的瑞典语页面实际做了。
- 给分类基做“多语言 slug”， 前往 WPML → 设置 → Taxonomies Translation，把Categories (category) 里面的瑞典语写成kategorier， 把Translatable 改成use translation if available or fallback to default language。
  至此就完事了


2.搜索功能就是个样子货只能搜blog，产品搜不了
后台 → Woodmart ▸ Header Builder
在 Headers builder 列表里，找到带 黄色星标（⭐ Default header layout）的那一行并且点修改,进去后找到放大镜图标并且点它上方的铅笔按钮。
Search result里面把AJAX开了，Post type改成product.
这么改了后其实还是在搜blog模式，但是能搜到产品了，也不美观，但是能用





## 2025-07-24  ✅
### 进展
1. 把网站的Product categories做完了，现在英文瑞典语都行了， 弄了差不多4个多小时，7月25号一点半才完事





## 2025-07-18  ✅

### 进展

- **visma客服同意在网站没完成的情况下做链接**
  1. 公司联系人告诉我希望尽快做好链接这样就能测试订单同步功能，于是我昨天就给visma的客服发了邮件说要求链接尽快开始，哪怕网站并没有完全做完，哪怕后面出问题了再花钱请他们看，今天他们回复说没事可以开始。预约时间下周三或者周四

- **删除有版权风险的产品**
  1. 由于老板不想抄袭图片了，我就把之前网站上抄袭的产品图相关的产品全删除了



---

## 2025-07-17  ✅

### 进展

- **成功验收**
  1. b2b不付款下单已经通过验收
  2. b2c付款在沙盒模式下已经通过验收

- **成功添加WPML并且已经付款**
  1. 可以开始翻译英语页面

- **委托人说不抄袭图片，但是抄袭其他网站的产品内容表**

---


## 2025-07-16  ✅

### 进展
- **成功添加b2b v2 版本**
  1. 可以多语
  2. 可以避免apple pay
`https://github.com/scr0-0ge/wordpress-site/blob/main/plugin/b2b%20v2.php`

### 问题
- **根据合同还是得上传500个产品，哪怕他们不提供产品信息**
  1. 如题，还是得自己找东西，起码180多个


---


## 2025-07-14  ✅

### 进展
- **visma 回复**
  1. Stock management 上传时必须打开，或者网站里批量edit也行
  2. 最好先上传800个产品之后再同步，不建议我们在网站产品做了一半的情况下做链接

- **成功添加attribute并且让批量上传时也显示**


---

## 2025-07-11  ✅

### 进展
- **批量上传产品图片**  
  1. 将图片在 Google Drive 设为“所有人可见”并获取分享链接  
     `https://drive.google.com/file/d/…/view?usp=drive_link`  
  2. 把链接改成下载格式  
     `https://drive.google.com/uc?export=download&id=…`  
  3. 解决图片随 CSV 上传失败的问题  
- **批量设置 Product Categories**  
  - 在产品列表 → **Bulk actions › Edit**，勾选商品后点击 **Apply**  
- **自动改链接脚本试验成功**  
  - 参考仓库 <https://github.com/scr0-0ge/wordpress-site/blob/main/plugin/%E6%89%B9%E9%87%8F%E7%BB%99%E6%9B%B4%E6%94%B9%E9%93%BE%E6%8E%A5%20excel>

### 问题 / 解决
- **HEIF（苹果截图）上传异常**  
  1. 仍使用下载链接格式  
  2. 读取预览图 → 截为 JPG → 存入 Drive  
  3. 再分享并生成下载链接  
- 参考仓库3.0版本 <https://github.com/scr0-0ge/wordpress-site/blob/main/plugin/%E6%89%B9%E9%87%8F%E7%BB%99%E6%9B%B4%E6%94%B9%E9%93%BE%E6%8E%A5%20excel>

### 未知问题
结尾时某次测试转为jpg失败，并且导致drive里的heif原图变成4bit的错误版，原版大小应该是2mb，有可能是权限给了更改导致的问题，现在改成了仅读取应该不会出问题，但是以防万一还是留个心眼，不要一次性上传一大堆图片，万一出问题原图都没了就完蛋了 

### 批量上传模板
有两个模板，一个是老的不知道怎么删除，新的是add new only, 切记这个只添加新产品不更改老产品，理论上来说更保险

---

## 2025-07-10  ✅

### 进展
- **WebToffee Import / Export** 成功批量导入，比 WooCommerce 内置更顺手  
  - 每列需手动映射，尤其 `attribute:*` 字段  
- **属性字段贴士**  
  - `attribute:pa_country` ➡︎ 显示国旗  
  - 避免 `attribute_data:*` 字段（不会渲染）  
- 已验证图片、分类亦可批量上传（待完善流程）

### 风险
- 雇主不提供大部分食品数据 → 需自行搜集，工作量显著增加  

---

## 2025-07-09  ✅

### 进展
- 获得 one.com 登录权限，成功恢复并更新测试站插件  
- 正式站更新 Elementor 出警告但运行正常；Elementor 图片工具可用于后续优化

### 待办
- **WPML** 缺授权无法更新/做双语，需老板处理  
- Visma 付款接口待次日排查  

---

## 2025-07-08  ⚠️

### 进展
- one.com 确认错误或源于子主题；需服务器层面修复  
- 已整理部分商品图片

### 阻碍
- 服务器登录信息仍待前负责人提供；若继续拖延 → 按合同考虑终止并结算  

---

## 2025-07-07  ⚠️

### Visma 同步机制
1. 订单创建于 WooCommerce  
2. 同步至 Visma  
3. 100 % 客户名匹配才归档，否则新建客户  
4. 建议在 Woo 端 `meta` 字段写入唯一 **客户 ID**，保证后续匹配

### 紧急
- 站点更新后前/后台均崩溃，登录受阻  
- 已联系 one.com 寻求找回信息  

---

## 2025-07-06  ✅

### 进展
- 订购 AI 图片优化服务：2500 kr → 优惠价约 2300 kr

### 技术
- Visma ID 同步大概率需服务器脚本支持  

---

## 2025-07-03  ✅

### 合同与需求
- 与雇主正式签约  
- **Visma 要求**  
  - 保留本地 Visma Administration 1000  
  - 通过 automatiseramera 插件同步订单 + 客户  
- **商品数量**：855 件（根据合同只上传500件），瑞/英双语约 1710 SKU → 尽快上传
- 已获批删除无效用户；确认法律责任范围

### 风险
- 待确认 Visma 是否可同步 SKU / 价格 / 过敏信息等属性  
- 数据同步应遵循 **Visma → 网站** 防止误删  

---

## 2025-07-02  ✅

### 沟通
- 与 **Spiris** + **automatiseramera** 对接，本地 Visma 直连网站方案可行  
- 次日签合同

---

## 2025-06-25  ✅

### 计划调整
- 退款 Wetail → 更换 **Spiris**（含“一条龙”服务）  
- 费用评估：  
  - 本地直连 1000 单/月≈ 850 kr  
  - 服务器中转≈ 350 kr

---

## 2025-06-23  ✅

### 进展
- 购买并配置 Wetail Visma 插件（待老板登录 Visma 账号）  
- AI 抠图生成透明背景

### 限制
- AI 抠图次数有限，建议升级  
- 约 1900 件商品仅 500 有图、100 有完整属性；简介工作延后  

---

## 2025-06-21  ✅

### 数据处理
- 手写 25 件完整商品简介（≈ 8 min/件）  
- CSV 自动导入 & 手动补足缺失数据（≈ 25 min/件）

### 注意
- 缺失信息涉及法律责任，需雇主审核  
- Woo 默认体积单位为 **kg**，如 640 ml 被识别为 640 kg → 需修正  

---

## 2025-06-19  ✅

### 用户管理
- 修复 B2B 结算多语言  
- 备份并删除疑似机器人账户

### 待解决
- 注册邮件未发送；公司码验证过于宽松 → 考虑自动校验  

---

## 2025-06-17  ✅

### 首日成果
- 重置密码，安装用户分组插件，清理测试账户  
- 建立 B2B 用户组；开放商品浏览 (**WooCommerce › Settings › Site visibility › Live**)  
- 自定义“询价”空壳网关完成 B2B 下单测试

### 历史问题
- 非管理用户看不见商品（已修复）  
- 主题更新导致站点崩溃（已回档）  
- B2B 支付方式屏蔽 v1.0 失败，后续需优化
