<!DOCTYPE html>
<html lang="zh-TW">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>大事記</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    :root {
      --brand: #1B2E5E;
      --brand-dark: #111E3F;
      --gold: #C9A84C;
      --bg: #F7F8FA;
      --white: #FFFFFF;
      --text: #1A1A2E;
      --text-muted: #6B7280;
      --border: #E5E7EB;
      --radius: 8px;
      --shadow: 0 2px 12px rgba(27, 46, 94, .08);
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Noto Sans TC', sans-serif;
      background: var(--bg);
      color: var(--text);
      font-size: 15px;
      line-height: 1.7;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    .d-top {
      height: 36px;
      background: var(--brand-dark);
      display: flex;
      align-items: center;
      padding: 0 32px;
      justify-content: flex-end;
      gap: 16px;
      font-size: 13px;
      color: rgba(255, 255, 255, .7);
    }

    .d-top a {
      color: rgba(255, 255, 255, .7);
    }

    .d-nav {
      position: sticky;
      top: 0;
      z-index: 100;
      height: 64px;
      background: #fff;
      border-bottom: 2px solid var(--gold);
      display: flex;
      align-items: center;
      padding: 0 32px;
      box-shadow: var(--shadow);
    }

    .d-nav .lb {
      width: 38px;
      height: 38px;
      background: var(--brand);
      border-radius: 6px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--gold);
      font-size: 18px;
      font-weight: 700;
      margin-right: 10px;
    }

    .d-nav .brand {
      font-size: 17px;
      font-weight: 700;
      color: var(--brand);
      margin-right: 32px;
    }

    .d-nav .links {
      display: flex;
      gap: 2px;
    }

    .d-nav .links a {
      padding: 0 14px;
      height: 64px;
      display: flex;
      align-items: center;
      font-size: 14px;
      font-weight: 500;
      color: var(--text);
      transition: color .2s;
    }

    .d-nav .links a.active {
      color: var(--brand);
      border-bottom: 2px solid var(--gold);
    }

    .d-nav .cart {
      margin-left: auto;
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 0 16px;
      height: 38px;
      border: 1.5px solid var(--brand);
      border-radius: 20px;
      color: var(--brand);
      font-size: 14px;
      font-weight: 500;
      position: relative;
      transition: all .2s;
    }

    .d-nav .cart:hover {
      background: var(--brand);
      color: #fff;
    }

    .cart-badge {
      position: absolute;
      top: -7px;
      right: -7px;
      background: #dc2626;
      color: #fff;
      font-size: 11px;
      font-weight: 700;
      min-width: 18px;
      height: 18px;
      border-radius: 9px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0 4px;
    }

    .page-hero {
      background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%);
      padding: 52px 32px 44px;
      color: #fff;
    }

    .page-hero h1 {
      font-size: 28px;
      font-weight: 700;
    }

    .page-hero .bc {
      margin-top: 8px;
      font-size: 13px;
      color: rgba(255, 255, 255, .6);
      display: flex;
      gap: 8px;
      align-items: center;
    }

    .page-hero .bc a {
      color: rgba(255, 255, 255, .8);
    }

    .container {
      max-width: 960px;
      margin: 0 auto;
      padding: 0 24px;
    }

    .section {
      padding: 64px 0;
    }

    /* ===== Timeline ===== */
    .timeline {
      position: relative;
      padding: 0 0 40px;
    }

    /* 中央軸線 */
    .timeline::before {
      content: '';
      position: absolute;
      top: 0;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 2px;
      background: linear-gradient(to bottom, var(--gold), rgba(201, 168, 76, .15));
    }

    /* Year marker */
    .year-marker {
      position: relative;
      z-index: 2;
      display: flex;
      justify-content: center;
      margin: 40px 0 20px;
    }

    .year-marker:first-child {
      margin-top: 0;
    }

    .year-marker .year-pill {
      background: var(--brand);
      color: var(--gold);
      font-size: 20px;
      font-weight: 700;
      font-family: 'Inter', sans-serif;
      padding: 8px 28px;
      border-radius: 30px;
      letter-spacing: 2px;
      box-shadow: 0 4px 16px rgba(27, 46, 94, .25);
      position: relative;
      z-index: 2;
    }

    /* Event item */
    .event {
      display: flex;
      gap: 0;
      margin-bottom: 0;
      position: relative;
    }

    .event.left {
      flex-direction: row-reverse;
    }

    .event.right {
      flex-direction: row;
    }

    .event-content {
      width: calc(50% - 36px);
      background: #fff;
      border-radius: 10px;
      box-shadow: var(--shadow);
      padding: 20px 22px;
      position: relative;
      margin-bottom: 24px;
    }

    .event.left .event-content {
      margin-right: 36px;
    }

    .event.right .event-content {
      margin-left: 36px;
    }

    /* Arrow */
    .event.right .event-content::before {
      content: '';
      position: absolute;
      left: -10px;
      top: 22px;
      width: 0;
      height: 0;
      border-top: 9px solid transparent;
      border-bottom: 9px solid transparent;
      border-right: 10px solid #fff;
    }

    .event.left .event-content::before {
      content: '';
      position: absolute;
      right: -10px;
      top: 22px;
      width: 0;
      height: 0;
      border-top: 9px solid transparent;
      border-bottom: 9px solid transparent;
      border-left: 10px solid #fff;
    }

    /* Dot */
    .event-dot {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      top: 18px;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: var(--white);
      border: 3px solid var(--gold);
      z-index: 2;
    }

    .event-dot.highlight {
      background: var(--gold);
      width: 22px;
      height: 22px;
      border-color: var(--brand);
      top: 16px;
    }

    .event-month {
      font-size: 12px;
      color: var(--gold);
      font-weight: 700;
      font-family: 'Inter', sans-serif;
      letter-spacing: 1px;
      margin-bottom: 6px;
      text-transform: uppercase;
    }

    .event-title {
      font-size: 15px;
      font-weight: 700;
      color: var(--brand);
      margin-bottom: 6px;
      line-height: 1.4;
    }

    .event-desc {
      font-size: 13.5px;
      color: var(--text-muted);
      line-height: 1.7;
    }

    .event-tag {
      display: inline-block;
      padding: 2px 9px;
      border-radius: 12px;
      font-size: 11.5px;
      font-weight: 600;
      margin-top: 8px;
    }

    .tag-milestone {
      background: rgba(201, 168, 76, .18);
      color: #8a6a1a;
    }

    .tag-product {
      background: rgba(27, 46, 94, .1);
      color: var(--brand);
    }

    .tag-award {
      background: rgba(22, 163, 74, .1);
      color: #166534;
    }

    /* Mobile: single column */
    @media(max-width:680px) {
      .timeline::before {
        left: 20px;
      }

      .event,
      .event.left,
      .event.right {
        flex-direction: column;
        padding-left: 52px;
      }

      .event-content {
        width: 100%;
        margin: 0 0 24px 0 !important;
      }

      .event.right .event-content::before,
      .event.left .event-content::before {
        left: -10px;
        right: auto;
        border-left: none;
        border-right: 10px solid #fff;
      }

      .event-dot {
        left: 20px;
      }
    }

    footer {
      background: var(--brand-dark);
      color: rgba(255, 255, 255, .7);
      padding: 36px 32px;
      text-align: center;
      font-size: 13.5px;
    }
  </style>
</head>

<body>


  <div class="d-top">
    <a href="member.html"><i class="fa fa-user-circle"></i> 會員中心</a>
    <span>|</span>
    <a href="login.html"><i class="fa fa-sign-out-alt"></i> 登出</a>
  </div>
  <nav class="d-nav">
    <div class="lb">B</div>
    <span class="brand">品牌名稱</span>
    <div class="links">
      <a href="news-list.html">最新消息</a>
      <a href="products-list.html">產品介紹</a>
      <a href="milestone.html" class="active">大事記</a>
      <a href="about.html">關於我們</a>
      <a href="member.html">會員中心</a>
    </div>
    <a href="cart.html" class="cart">
      <i class="fa fa-shopping-cart"></i> 購物車
      <span class="cart-badge">3</span>
    </a>
  </nav>

  <div class="page-hero">
    <div class="container" style="max-width:960px">
      <h1><i class="fa fa-history" style="color:var(--gold);margin-right:10px"></i>大事記</h1>
      <div class="bc">
        <a href="index.html">首頁</a>
        <i class="fa fa-chevron-right" style="font-size:10px"></i>
        大事記
      </div>
    </div>
  </div>

  <div class="section">
    <div class="container">
      <div class="timeline">
        @php
        $pos = ""; // 設定左右的初始值為空的
        $cnt = 0; // 計算資料筆數用
        @endphp
        {{-- // $year as $data:將每一筆年份資料以$data表示 --}}
        @foreach($years as $data)


        <div class="year-marker">
          <div class="year-pill">{{$data}}</div>
        </div>
        @foreach($list as $data2)
        @continue($data2->years != $data)
        @php
        $cnt++;
        $pos = ($cnt % 2 == 1) ? "right" : "left";
        // %取餘數
        @endphp


        <div class="event {{ $pos }}">
          <div class="event-dot {{ $data2->highLight == 'Y' ? 'hightlight' : '' }}"></div>
          <div class="event-content">
            <div class="event-month">{{ $data2->months }} 月</div>
            <div class="event-title">{{ $data2->title }}</div>
            <div class="event-desc">{{ $data2->content }}</div>
            <span class="event-tag tag-{{ $data2->color }}">
            @if (!empty($data2->icon))
             <i class="fa {{ $data2->icon }}"></i> 
            @endif
            {{ $data2->typeName }}</span>
          </div>
        </div>
        @endforeach
        @endforeach

        <div class="event left">
          <div class="event-dot"></div>
          <div class="event-content">
            <div class="event-month">08 月</div>
            <div class="event-title">全新秋冬系列產品正式發佈</div>
            <div class="event-desc">以「自然共生」為設計理念，推出12款環保材質新品。</div>
            <span class="event-tag tag-product"><i class="fa fa-box-open"></i> 產品</span>
          </div>
        </div>

        <div class="event right">
          <div class="event-dot"></div>
          <div class="event-content">
            <div class="event-month">03 月</div>
            <div class="event-title">榮獲年度最佳品質獎</div>
            <div class="event-desc">由台灣優良商品協會評選，連續三年獲此殊榮，再次印證品質承諾。</div>
            <span class="event-tag tag-award"><i class="fa fa-trophy"></i> 獲獎</span>
          </div>
        </div>

        <!-- ===== 2024 ===== -->
        <div class="year-marker">
          <div class="year-pill">2024</div>
        </div>

        <div class="event left">
          <div class="event-dot"></div>
          <div class="event-content">
            <div class="event-month">10 月</div>
            <div class="event-title">電商平台正式上線</div>
            <div class="event-desc">全新官方購物平台正式啟用，提供更便捷的網路購物體驗，首月訂單逾千筆。</div>
            <span class="event-tag tag-milestone"><i class="fa fa-globe"></i> 里程碑</span>
          </div>
        </div>

        <div class="event right">
          <div class="event-dot"></div>
          <div class="event-content">
            <div class="event-month">05 月</div>
            <div class="event-title">進駐台中全新旗艦店</div>
            <div class="event-desc">台中旗艦展示中心盛大開幕，佔地300坪，提供全系列產品完整體驗。</div>
            <span class="event-tag tag-milestone"></i> 展店</span>
          </div>
        </div>

        <div class="event left">
          <div class="event-dot"></div>
          <div class="event-content">
            <div class="event-month">01 月</div>
            <div class="event-title">ISO 9001 品質認證通過</div>
            <div class="event-desc">歷時半年的審核程序圓滿完成，取得國際品質管理系統認證。</div>
            <span class="event-tag tag-award"><i class="fa fa-certificate"></i> 認證</span>
          </div>
        </div>

        <!-- ===== 2023 ===== -->
        <div class="year-marker">
          <div class="year-pill">2023</div>
        </div>

        <div class="event right">
          <div class="event-dot"></div>
          <div class="event-content">
            <div class="event-month">09 月</div>
            <div class="event-title">海外市場首次拓展至日本</div>
            <div class="event-desc">與日本代理商簽訂合作協議，正式踏入亞洲國際市場，開啟品牌國際化新篇章。</div>
            <span class="event-tag tag-milestone"><i class="fa fa-flag"></i> 里程碑</span>
          </div>
        </div>

        <div class="event left">
          <div class="event-dot"></div>
          <div class="event-content">
            <div class="event-month">03 月</div>
            <div class="event-title">第二代旗艦產品系列問世</div>
            <div class="event-desc">歷時兩年研發，全新旗艦系列導入專利製程，質感與功能大幅提升。</div>
            <span class="event-tag tag-product"><i class="fa fa-box-open"></i> 產品</span>
          </div>
        </div>

        <!-- ===== 2020 ===== -->
        <div class="year-marker">
          <div class="year-pill">2020</div>
        </div>

        <div class="event right">
          <div class="event-dot highlight"></div>
          <div class="event-content">
            <div class="event-month">01 月</div>
            <div class="event-title">公司正式創立</div>
            <div class="event-desc">由一群對品質充滿熱忱的創業者共同創辦，以「讓每個人都能擁有優質生活」為核心使命，踏出品牌第一步。</div>
            <span class="event-tag tag-milestone"><i class="fa fa-flag-checkered"></i> 創立</span>
          </div>
        </div>


      </div>
    </div>
  </div>

  <footer>&copy; 2025 品牌名稱. All rights reserved.</footer>

</body>

</html>