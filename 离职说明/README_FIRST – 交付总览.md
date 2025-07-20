## README\_FIRST – 交付总览 / Delivery Overview

**项目名称 / Project:** Sinli WordPress B2B & B2C Webshop
**交付日期 / Date:** 2025‑07‑20
**版本 / Version:** v1.0 – Final (Convenience Termination)

---

### 1. 项目状态 / Project Status

| 里程碑                     | 完成情况                    | 说明                                        |
| ----------------------- | ----------------------- | ----------------------------------------- |
| **M1 – B2B 订单流**        | ✅ 已在 2025‑07‑17 由前联系人验收 | 用户可“下单不付款”并进入后台手动开票                       |
| **M1 – Visma Sync**     | ⏸ *待雇主上传全部商品后自行联系客服*     | Visma 官方建议网站完工后再连；详见《Visma‑Precheck.pdf》  |
| **M2 – 商品批量上传**         | 部署好了完整脚本；实际数据由雇主自行上传    | WebToffee + 自写脚本演示通过                      |
| **M3 – B2C Sandbox 支付** | ✅ 已在 2025‑07‑17 沙盒通过验收  |                                           |

> **免责声明 / Disclaimer**
> 根据 § 14.3 （承包方便利性终止）本合同已于本文件随附的《终止通知》中终止；所有代码、脚本、配置 **“AS‑IS”** 交付，§ 7 所列 6 个月质保义务同步失效。

---

### 2. 文件结构 / Package Structure

| 路径                          | 内容                                                                             | 关键用途     |
| --------------------------- | ------------------------------------------------------------------------------ | -------- |
| `/source-code/`             | 子主题 `woodmart-child`、`functions.php`、B2B v2 插件、批量改链接脚本                         | 二次开发参考   |
| `/db-export/`               | `google drive 的密码，里面包含了网站备份`、`521.zip,入职前的网站备份` 、`721.zip,离职前的网站备份`                                  | 一键还原当前站点 |
| `/docs/操作手册/`               | `B2B_B2C_CN_EN.pdf`、`Bulk_Upload_Workflow_CN_EN .pdf`、`Visma‑Precheck.pdf` | 操作与前置条件  |
| `/licenses/`                | AI 图片插件 12 个月授权、WPML 授权                                                        | 所有权已转雇主  |
| `/logs/`                    | 2025‑07‑06 \~ 07‑18 工作日志                                                       | 工时证明     |
| `/checksums/`               | `SHA256_manifest.txt`                                                          | 文件校验     |
| `Invoice_8000kr.pdf`        | 已收首款发票                                                                         | 会计对账     |
| `Mutual_Release_Signed.pdf` | 互不追偿确认书                                                                        | 彻底免除后续索赔 |

---

### 3. 快速操作指南 / Quick‑Start Manuals

#### 3.1 B2B 用户角色

1. **Users** → 选择目标用户（需先 *Approve*）
2. **Change role to …** → **B2B customer** → **Change**
3. 新建订单时系统将跳过付款并留在后台待人工处理

#### 3.2 B2C 用户角色

1. 同上，角色选 **Customer**
2. 默认结账需在线付款；流程已在沙盒测试通过

#### 3.3 批量上传 + 图片优化

1. 填写 WB‑模板 → 导出 CSV
2. **WebToffee Import / Export** → *Import* → 预存模板 `update and import new`
3. 上传后在 **Products → Bulk actions → unify with Elementor AI** 批量生成白底图

> **配额：** AI 插件月度 50 000 积分；一张图片≈33 积分。授权已转客户邮箱，自动续费已关闭。

#### 3.4 Visma Sync 前置 checklist

* wordpresstest2025@gmail.com 里查看与客服的联系邮件有写

---

### 4. 账号与安全 / Accounts & Security

> **请在 72 小时内重设所有密码；否则安全责任自负。**

| 系统                       | 账号                                   | 初始密码                       | 备注          |
| ------------------------ | ------------------------------------ | -------------------------- | ----------- |
| WordPress                | `sinli_admin`                        | `Fish‑Foot‑Produce‑Winter` | Super Admin |
| Gmail / Elementor        | `wordpresstest2025@gmail.com`        | 同上                         | 用于插件登录      |
| WPML                     | `tommy@sinlitrading.se` / `tommyZ-2` | `c%!!AQuYU@YICAM1`         | 主邮箱已转       |
| Automatisera Mera Portal | 同 Gmail                              | `3%Gb12j1`                 | Visma 连接    |
| One.com                  | —                                    | —                          | 请老板自行创建     |

---

### 5. 终止与免责 / Termination & Disclaimer

1. **合同终止**：已按照 § 14.3 履行交付并终止，雇主 7 天内如无书面异议即视为确认。
2. **质保失效**：自终止日起 § 7 免费保修条款不再适用；若需支持以 800 kr/h 另签新约。
3. **责任封顶**：依据 § 12，最大赔偿不超过已收 8 000 kr；间接损失不承担。

---

### 6. 后续建议 / Next Steps

| 优先级 | 动作                                | 负责人                    |
| --- | --------------------------------- | ---------------------- |
| 🔴  | 指定新项目联系人并完成密码更改                   | 雇主                     |
| 🔴  | 确认 Visma Sync 安装时间（完成 Precheck 表） | 雇主 & Automatisera Mera |
| 🟠  | 批量上传首批 100 产品、测试 AI 图片            | 雇主团队                   |
| 🟡  | 审核并补全 GDPR & 过敏信息                 | 雇主                     |
| 🟡  | 决定 12 个月后是否续费 AI 插件               | 雇主                     |

---

### 7. 联系方式 / Contact

*Xingyi Chen* (前端 & 集成顾问)

> 📧 [wordpresstest2025@gmail.com](mailto:wordpresstest2025@gmail.com)  📆 支持时段：已离职，仅限新合同

---

\> **End of README (AS‑IS).** 若需技术支持，请通过新合同另行约定。
*(Generated on 2025‑07‑20 / SHA‑256 manifest attached in package)*
