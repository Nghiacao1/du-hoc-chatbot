@extends('layouts.app')

@section('content')

<!-- Banner -->
<section class="banner">
    <div style="width: 100%; margin-top: -100px" class="container">
        <img style="width: 100%" src={{asset('/img/BlogBanner.png')}} alt="">
        <a href="/courses" class="btn">Khám phá ngay</a>
    </div>
</section>

<!-- Khóa học nổi bật -->
<section style="margin-top: -70px" class="featured-courses">
    <div class="container">
        <h2>Bài viết nổi bật</h2>
        <div class="swiper-container">
            <div class="grid-container">
                <div class="grid-item"><a href="/blog1"><img src ="https://i2.wp.com/riolamwritings.com/wp-content/uploads/2018/11/45626316_562416297520072_5302531130031865856_n.jpg?w=960&ssl=1"><p>“Nhớ khi nào lúc ra đi…”</p></a></div>
                <div class="grid-item"><img src ="https://i0.wp.com/riolamwritings.com/wp-content/uploads/2018/08/u23.jpg?w=1200&ssl=1"><p>Để tôi nói cho các ông nghe về lòng yêu nước</p></div>
                <div class="grid-item"><img src ="https://i2.wp.com/riolamwritings.com/wp-content/uploads/2017/02/nadef7yjb_q-luis-del-rio-camacho.jpg?w=2000"><p>Con Đường Bỏ Lại | The Road Not Taken – Robert Frost</p></div>
                <div class="grid-item"><img src ="https://i0.wp.com/riolamwritings.com/wp-content/uploads/2012/04/pexels-photo-large-1.jpeg?w=890&ssl=1"><p>Với tay không chạm thấy gì</p></div>
                <div class="grid-item"><img src ="https://i2.wp.com/riolamwritings.com/wp-content/uploads/2017/02/nadef7yjb_q-luis-del-rio-camacho.jpg?w=2000"><p>Con Đường Bỏ Lại | The Road Not Taken – Robert Frost</p></div>
                <div class="grid-item"><img src ="https://i0.wp.com/riolamwritings.com/wp-content/uploads/2012/04/pexels-photo-large-1.jpeg?w=890&ssl=1"><p>Với tay không chạm thấy gì</p></div>
              </div>
            
            <div class="swiper-pagination"></div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper('.swiper-container', {
                loop: true, // Cho phép lặp lại vô hạn
                autoplay: {
                    delay: 3000, // Tự động chuyển slide sau 3 giây
                    disableOnInteraction: false, // Tiếp tục chạy ngay cả khi người dùng tương tác
                },
                pagination: { 
                    el: '.swiper-pagination', 
                    clickable: true 
                },
                navigation: { 
                    nextEl: '.swiper-button-next', 
                    prevEl: '.swiper-button-prev' 
                },
                slidesPerView: 4, // Hiển thị 3 slide mỗi lần
                spaceBetween: 10, // Khoảng cách giữa các slide
                centeredSlides: false, // Đảm bảo slide luôn căn giữa
                loopFillGroupWithBlank: true, // Điền các khoảng trống nếu không đủ slide
                breakpoints: {
                    1024: { slidesPerView: 4 }, // Trên màn hình lớn hiển thị 4 slide
                    768: { slidesPerView: 2 }, // Trên màn hình nhỏ hơn 768px, hiển thị 2 slide
                    480: { slidesPerView: 1 } // Trên màn hình nhỏ hơn 480px, hiển thị 1 slide
                }
            });
        </script>
        <div class="courses">
            @foreach ($featuredCourses as $course)
                <div class="course">
                    <img src="{{ $course->image ?? 'https://via.placeholder.com/300' }}" alt="{{ $course->title }}">
                    <h3>{{ $course->title }}</h3>
                    <p>{{ $course->description }}</p>
                    <p>Giá: {{ number_format($course->price) }} VNĐ</p>
                    <a href="/courses/{{ $course->id }}" class="btn">Xem chi tiết</a>
                </div>
            @endforeach
        </div>
    </div>
 <!-- Nút bấm icon chat -->
 <button class="chat-button" onclick="toggleChat()">💬</button>

<div class="chat-box" id="chatBox">
  <div class="chat-header">Hỗ trợ</div>
  <div class="chat-body" id="chatBody">
    <div class="message bot-message">Chào bạn! Tôi là trợ lý tư vấn du học Song Nguyên.</div>
<div class="message bot-message">
  Tôi có thể hỗ trợ bạn trực tiếp hoặc bạn có thể chọn các nội dung:
  <br>1️⃣ Nước du học
  <br>2️⃣ Ngành học
  <br>3️⃣ Nguồn học bổng
</div>
  </div>
  <div class="chat-footer">
    <input type="text" id="userInput" placeholder="Nhập tin nhắn..." onkeydown="handleInput(event)">
  </div>
</div>
<script>
 function showMainMenu() {
  const chatBody = document.getElementById('chatBody');
  if (!chatBody) return;

  const menuDiv = document.createElement('div');
  menuDiv.className = "message bot-message";
  menuDiv.innerHTML = `
    Tôi có thể hỗ trợ bạn trực tiếp hoặc bạn có thể chọn các nội dung:
    <br>1️⃣ Nước du học
    <br>2️⃣ Ngành học
    <br>3️⃣ Nguồn học bổng
  `;

  chatBody.appendChild(menuDiv);
  chatBody.scrollTop = chatBody.scrollHeight;
}
</script>
<script>
  function toggleChat() {
    const chat = document.getElementById('chatBox');
    chat.style.display = chat.style.display === 'flex' ? 'none' : 'flex';
  }

  function handleInput(event) {
    if (event.key === "Enter") {
      const input = document.getElementById('userInput');
      const message = input.value.trim();
      if (message) {
        appendMessage("user", message);
        input.value = "";
        sendToBot(message);
      }
    }
  }

  function appendMessage(sender, message) {
    const chatBody = document.getElementById('chatBody');
    const msg = document.createElement('div');
    msg.className = `message ${sender === "user" ? "user-message" : "bot-message"}`;

  // Nếu là bot, tự động chuyển xuống dòng cho các dấu gạch đầu dòng
  if (sender === "bot") {
    message = message
      .replace(/\n/g, "<br>")                      // Xuống dòng theo lệnh \n           
  }

  msg.innerHTML = message;
  chatBody.appendChild(msg);
  chatBody.scrollTop = chatBody.scrollHeight;

  }
 
  async function sendToBot(message) {
    if (!chatBody) return;

  // Kiểm tra các lựa chọn đơn giản trước khi gọi API
  const trimmed = message.trim();
  if (["1", "2", "3"].includes(trimmed)) {
    let reply = "";
    if (trimmed === "1") reply = "Bạn muốn tìm hiểu về du học ở châu lục hoặc quốc gia nào? Ví dụ: Châu lục: Châu Âu, Châu Mỹ; Quốc gia: Mỹ, Canada...";
    if (trimmed === "2") reply = "Bạn quan tâm đến ngành học nào? Ví dụ: Công nghệ thông tin, Kinh doanh, Y khoa...";
    if (trimmed === "3") reply = "Bạn muốn tìm hiểu học bổng từ chính phủ, trường đại học hay tổ chức nào?";
    appendMessage("bot", reply);
    return;
  }
    // 👉 Nếu người dùng gõ "menu" → hiện lại menu
    if (trimmed.toLowerCase() === "menu") {
    showMainMenu();
    return;
  }

    const loadingMsg = document.createElement('div');
    loadingMsg.className = "message bot-message";
    loadingMsg.textContent = "🤖 Đang xử lý...";
    loadingMsg.id = "loading-message";
    chatBody.appendChild(loadingMsg);
    chatBody.scrollTop = chatBody.scrollHeight;

    try {
      const response = await fetch("https://openrouter.ai/api/v1/chat/completions", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Authorization": "Bearer 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",
          "HTTP-Referer": "http://localhost",
          "X-Title": "Test Chatbot"
        },
        body: JSON.stringify({
          model: "openai/gpt-3.5-turbo",
          // max_tokens: 500,
          messages: [
            {
        role: "system",
        content: "Bạn là chuyên gia tư vấn du học. Chỉ trả lời các câu hỏi liên quan đến du học. QUY TẮC TRẢ LỜI:- Trả lời ngắn gọn, rõ ràng, không vượt quá 4-5 ý mỗi lần.- Trình bày từng ý bằng dấu gạch đầu dòng (-) hoặc số thứ tự (1., 2., 3.)- Không đưa ra quá nhiều thông tin một lúc. Nếu câu trả lời dài, chỉ trả lời phần đầu và gợi ý người dùng hỏi tiếp.- Tránh lặp lại, tránh văn bản dài liền mạch quá 5 dòng.- Nếu người dùng hỏi rộng, hãy chia nhỏ câu hỏi và hỏi lại họ muốn biết phần nào trước."
          },
          { role: "user", content: message }]
        })
      });
      const data = await response.json();

    console.log("🔥 Phản hồi từ OpenRouter:", data); // Debug xem có gì trả về

    const loadingElem = document.getElementById("loading-message");
    if (loadingElem) loadingElem.remove();

    if (response.ok && data.choices && data.choices.length > 0 && data.choices[0].message?.content) {
      const reply = data.choices[0].message.content;
      appendMessage("bot", reply);
    } else {
      appendMessage("bot", "🤖 Xin lỗi, hiện tại tôi chưa có phản hồi phù hợp.");
    }
  } catch (error) {
    const loadingElem = document.getElementById("loading-message");
    if (loadingElem) loadingElem.remove();
    appendMessage("bot", "⚠️ Có lỗi khi kết nối với chatbot.");
    console.error("❌ Lỗi fetch:", error);
  }
  const reply = data.choices?.[0]?.message?.content || "Không có phản hồi.";

// Cắt đoạn quá dài (ví dụ: 1000 ký tự)
const maxLength = 700;
const finalReply = reply.length > maxLength ? reply.slice(0, maxLength) + "...\n✂️ Trả lời quá dài, bạn muốn xem tiếp không?" : reply;

appendMessage("bot", finalReply);

  }

  </script>
</section>

<!-- Giới thiệu -->
<section class="about">
    <div class="container">
        <h2>Về chúng tôi</h2>
        <p>SkillsBridge giúp bạn tiếp cận các khóa học chất lượng cao từ giảng viên chuyên nghiệp, nâng cao kỹ năng và phát triển sự nghiệp.</p>
        <a href="/about" class="btn">Tìm hiểu thêm</a>
    </div>
</section>

@endsection
