<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillsBridge Clone</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
        .search-container {
            display: flex;
            align-items: center;
            background: white;
            width: 240px;
            padding: 5px; 
            border-radius: 25px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }
        .search-input {
            border: none;
            outline: none;
            padding: 8px;
            width: 200px;
            border-radius: 25px;
        }
        .search-button {
            background: #007bff;
            border: none;
            padding: 8px 8px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .search-button img {
            width: 16px;
            height: 16px;
        }
        .swiper-container {
            width: 100%;
            max-width: 1500px; /* Đảm bảo slider nằm trong khung nhất định */
            margin: auto;
            padding: 20px 0;
        }
        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .course-card {
            background: #000;
            color: #fff;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            width: 250px;
            height: 350px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .course-card img {
            width: 100%;
            border-radius: 10px;
        }
        .grid-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      width: 100%;
      max-width: 1000px;
      margin: auto;
    }

    .grid-item img {
      width: 100%;
      height: auto;
      display: block;
      border-radius: 8px;
      object-fit: cover;
    }
    .grid-item a:-webkit-any-link {
    color: -webkit-link;
    cursor: pointer;
    text-decoration: none;
    }
   

    /* Định dạng cho ngày tháng */
    .post-date {
      font-size: 0.9em;
      color: #666;
    }

    /* Định dạng cho đoạn văn */
    p {
      margin: 1em 0;
    }

    /* Định dạng cho hình ảnh */
    .post-image {
      width: 100%;
      height: auto;
      margin: 20px 0;
    }

    /* Định dạng cho chữ ký */
    .signature {
      font-style: italic;
      text-align: right;
      margin-top: 20px;
    }
    .chat-button {
      position: fixed;
      bottom: 40px;
      right: 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      font-size: 24px;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      z-index: 1001;
    }

    .chat-box {
      position: fixed;
      bottom: 40px;
      right: 90px;
      width: 300px;
      max-height: 400px;
      background: white;
      border: 1px solid #ccc;
      border-radius: 10px;
      display: none;
      flex-direction: column;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      z-index: 1000;
    }

    .chat-header {
      padding: 10px;
      background-color: #007bff;
      color: white;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      font-weight: bold;
    }

    .chat-body {
      padding: 10px;
      height: 200px;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .chat-footer {
      padding: 10px;
      border-top: 1px solid #ddd;
    }

    .chat-footer input {
      width: 94%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .message {
      max-width: 80%;
      padding: 6px 10px;
      border-radius: 10px;
      display: inline-block;
      word-wrap: break-word;
    }

    .user-message {
      background-color: #e1f5fe;
      align-self: flex-end;
      text-align: right;
    }

    .bot-message {
      background-color: #f1f1f1;
      align-self: flex-start;
      text-align: left;
    }
  </style>
    </style>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <div class="container">
            <h1 style="margin-left: -100%">Articles World</h1>
            <div class="navbar">
                <a href="/">Trang chủ</a>
                <div class="dropdown">
                    <button class="dropbtn">Bài viết
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <svg style= "width: 15px; margin-left: -12px;" aria-hidden="true" focusable="false" role="presentation" class="icon icon-caret" viewBox="0 0 10 6">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.354.646a.5.5 0 00-.708 0L5 4.293 1.354.646a.5.5 0 00-.708.708l4 4a.5.5 0 00.708 0l4-4a.5.5 0 000-.708z" fill="currentColor">
                      </path></svg>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
                <a href="/about">Giới thiệu</a>
                <a href="/contact">Liên hệ</a>
                <div class="search-container">
                    <input type="text" class="search-input" id="search-box" placeholder="Nhập từ khóa...">
                    <button class="search-button" onclick="searchFunction()">
                        <img src="https://cdn-icons-png.flaticon.com/512/622/622669.png" alt="Tìm kiếm">
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© 2025 SkillsBridge Clone. All rights reserved.</p>
    </footer>
</body>
</html>
