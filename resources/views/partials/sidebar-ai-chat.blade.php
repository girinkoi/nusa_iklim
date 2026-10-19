{{-- 
    Nusa Iklim - Sidebar AI Chat Component (Compact & Smooth Accordion)
    Designed for 240px Sidebar Width
    Stack: Laravel 13, Bootstrap 5 & Bootstrap Icons, Vanilla JS
--}}

<div class="sidebar-ai-chat" id="sidebarAiChat">
    <!-- Header: Clickable to expand/collapse smoothly -->
    <div class="ai-chat-header d-flex align-items-center justify-content-between" id="aiChatHeader" title="Klik untuk perkecil / perbesar chat">
        <div class="d-flex align-items-center gap-2">
            <span class="ai-status-dot" title="Nusa AI Online"></span>
            <i class="bi bi-stars text-warning fs-6"></i>
            <span class="ai-chat-title">Nusa AI</span>
            <span class="badge ai-badge">Beta</span>
        </div>
        <button type="button" class="btn p-0 ai-collapse-btn" id="aiChatCollapseBtn" aria-label="Toggle chat accordion">
            <i class="bi bi-chevron-down ai-collapse-icon" id="aiCollapseIcon"></i>
        </button>
    </div>

    <!-- Collapsible Chat Wrapper (Smooth Slide-Up / Accordion Effect) -->
    <div class="ai-chat-collapse-wrap" id="aiChatCollapseWrap">
        <!-- Scrollable Message History Area -->
        <div class="ai-chat-body" id="aiChatBody">
            <div class="ai-msg ai-msg-assistant">
                <div class="ai-msg-bubble">
                    Halo! Ada yang bisa dibantu seputar prakiraan cuaca atau iklim Nusantara? 🌤️
                    <span class="ai-msg-time">Sekarang</span>
                </div>
            </div>
        </div>

        <!-- Chat Input Form -->
        <form class="ai-chat-form" id="aiChatForm" onsubmit="return false;">
            <div class="input-group input-group-sm">
                <input 
                    type="text" 
                    id="aiChatInput" 
                    class="form-control ai-chat-input" 
                    placeholder="Tanya cuaca..." 
                    aria-label="Tanya Nusa AI" 
                    autocomplete="off"
                    maxlength="200"
                >
                <button type="submit" class="btn ai-chat-send-btn" id="aiChatSendBtn" title="Kirim Pesan">
                    <i class="bi bi-send-fill"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* ==========================================================
       NUSA IKLIM - SIDEBAR AI CHAT STYLES (SMOOTH ACCORDION)
       ========================================================== */
    .sidebar-ai-chat {
        margin: 8px 12px 10px 12px;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255, 255, 255, 0.22);
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        flex-shrink: 0;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .sidebar-ai-chat:hover {
        border-color: rgba(255, 255, 255, 0.32);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    /* Header Bar */
    .ai-chat-header {
        padding: 8px 12px;
        background: rgba(0, 0, 0, 0.16);
        cursor: pointer;
        user-select: none;
        transition: background 0.25s ease;
    }

    .ai-chat-header:hover {
        background: rgba(0, 0, 0, 0.26);
    }

    .ai-chat-title {
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.3px;
        color: #ffffff;
    }

    .ai-badge {
        font-size: 0.58rem;
        font-weight: 600;
        background: rgba(255, 255, 255, 0.2);
        color: #e0f2fe;
        border-radius: 4px;
        padding: 2px 5px;
    }

    /* Pulsing Green Online Indicator */
    .ai-status-dot {
        width: 7px;
        height: 7px;
        background-color: #22c55e;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 0 6px #22c55e;
        animation: aiPulse 2s infinite ease-in-out;
    }

    @keyframes aiPulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.45; transform: scale(0.85); }
    }

    /* Chevron Toggle Icon with Smooth 180deg Rotation */
    .ai-collapse-btn {
        color: rgba(255, 255, 255, 0.85);
        border: none;
        background: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 22px;
        height: 22px;
        border-radius: 4px;
    }

    .ai-collapse-icon {
        font-size: 0.72rem;
        display: inline-block;
        transform-origin: center center;
        transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Rotates chevron when collapsed */
    .sidebar-ai-chat.is-collapsed .ai-collapse-icon {
        transform: rotate(180deg);
    }

    /* ==========================================================
       SMOOTH SLIDE-UP / ACCORDION TRANSITION
       ========================================================== */
    .ai-chat-collapse-wrap {
        max-height: 220px; /* Predictable height to enable smooth CSS interpolation */
        opacity: 1;
        overflow: hidden;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        transform: translateY(0);
        transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                    opacity 0.25s ease,
                    transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        will-change: max-height, opacity, transform;
    }

    .sidebar-ai-chat.is-collapsed .ai-chat-collapse-wrap {
        max-height: 0;
        opacity: 0;
        border-top: 1px solid transparent;
        transform: translateY(-4px);
        pointer-events: none;
    }

    /* Messages History Area */
    .ai-chat-body {
        height: 125px; /* Locked fixed height prevents internal layout recalculation */
        overflow-y: auto;
        padding: 8px 10px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        scroll-behavior: smooth;
    }

    /* Slim Elegant Scrollbar */
    .ai-chat-body::-webkit-scrollbar {
        width: 3px;
    }
    .ai-chat-body::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.05);
    }
    .ai-chat-body::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 3px;
    }
    .ai-chat-body::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.5);
    }

    /* Message Bubbles */
    .ai-msg {
        display: flex;
        flex-direction: column;
        animation: aiFadeSlide 0.22s ease-out;
    }

    @keyframes aiFadeSlide {
        from {
            opacity: 0;
            transform: translateY(4px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .ai-msg-bubble {
        max-width: 90%;
        padding: 6px 9px;
        font-size: 0.72rem;
        line-height: 1.35;
        word-wrap: break-word;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
    }

    /* Assistant Message (Left aligned) */
    .ai-msg-assistant {
        align-items: flex-start;
    }
    .ai-msg-assistant .ai-msg-bubble {
        background: rgba(15, 23, 42, 0.42);
        color: #f1f5f9;
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 10px 10px 10px 2px;
    }

    /* User Message (Right aligned) */
    .ai-msg-user {
        align-items: flex-end;
    }
    .ai-msg-user .ai-msg-bubble {
        background: rgba(255, 255, 255, 0.28);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.35);
        border-radius: 10px 10px 2px 10px;
    }

    /* Timestamp */
    .ai-msg-time {
        display: block;
        font-size: 0.6rem;
        color: rgba(255, 255, 255, 0.65);
        margin-top: 3px;
        text-align: right;
    }

    /* Typing Dots Animation */
    .ai-typing-indicator {
        display: inline-flex;
        gap: 3px;
        align-items: center;
        padding: 2px 4px;
    }
    .ai-typing-dot {
        width: 4px;
        height: 4px;
        background-color: #e2e8f0;
        border-radius: 50%;
        animation: aiBounce 1.2s infinite ease-in-out;
    }
    .ai-typing-dot:nth-child(2) { animation-delay: 0.2s; }
    .ai-typing-dot:nth-child(3) { animation-delay: 0.4s; }

    @keyframes aiBounce {
        0%, 80%, 100% { transform: translateY(0); opacity: 0.5; }
        40% { transform: translateY(-3px); opacity: 1; }
    }

    /* Input Form Area */
    .ai-chat-form {
        padding: 7px 8px;
        background: rgba(0, 0, 0, 0.18);
        border-top: 1px solid rgba(255, 255, 255, 0.08);
    }

    .ai-chat-input {
        background: rgba(255, 255, 255, 0.15) !important;
        border: 1px solid rgba(255, 255, 255, 0.25) !important;
        border-right: none !important;
        color: #ffffff !important;
        font-size: 0.73rem !important;
        border-radius: 20px 0 0 20px !important;
        padding-left: 10px;
    }

    .ai-chat-input::placeholder {
        color: rgba(255, 255, 255, 0.65) !important;
        font-size: 0.72rem;
    }

    .ai-chat-input:focus {
        background: rgba(255, 255, 255, 0.25) !important;
        border-color: rgba(255, 255, 255, 0.5) !important;
        box-shadow: none !important;
        color: #fff !important;
    }

    .ai-chat-send-btn {
        background: #2563eb !important;
        border: 1px solid rgba(255, 255, 255, 0.25) !important;
        border-left: none !important;
        border-radius: 0 20px 20px 0 !important;
        color: #ffffff !important;
        padding: 0 10px !important;
        font-size: 0.7rem !important;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.2s ease, transform 0.1s ease;
    }

    .ai-chat-send-btn:hover {
        background: #1d4ed8 !important;
        color: #fff !important;
    }

    .ai-chat-send-btn:active {
        transform: scale(0.95);
    }
</style>

<script>
    /**
     * Nusa Iklim - Sidebar AI Chat Module
     * Lightweight Vanilla JS with Smooth Slide-Up Accordion
     */
    document.addEventListener('DOMContentLoaded', function () {
        const chatContainer = document.getElementById('sidebarAiChat');
        const chatHeader = document.getElementById('aiChatHeader');
        const collapseBtn = document.getElementById('aiChatCollapseBtn');
        const chatForm = document.getElementById('aiChatForm');
        const chatInput = document.getElementById('aiChatInput');
        const chatBody = document.getElementById('aiChatBody');

        if (!chatContainer || !chatForm || !chatInput || !chatBody) return;

        /**
         * Helper: Current formatted time (HH:mm)
         */
        function getCurrentTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            return `${hours}:${minutes}`;
        }

        /**
         * Helper: Escape HTML to prevent XSS
         */
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        /**
         * Auto-scroll message history to the bottom
         */
        function scrollToBottom() {
            chatBody.scrollTop = chatBody.scrollHeight;
        }

        /**
         * Toggle accordion slide-up/down
         */
        function toggleAccordion() {
            const isNowCollapsed = chatContainer.classList.toggle('is-collapsed');
            
            if (chatHeader) {
                chatHeader.setAttribute('title', isNowCollapsed ? 'Klik untuk membuka chat' : 'Klik untuk memperkecil chat');
            }

            if (!isNowCollapsed) {
                // When reopening, ensure scroll is pinned to bottom and focus input
                setTimeout(scrollToBottom, 50);
                setTimeout(() => chatInput.focus(), 250);
            }
        }

        // Header click toggles accordion
        if (chatHeader) {
            chatHeader.addEventListener('click', function (e) {
                toggleAccordion();
            });
        }

        // Prevent double event if user directly clicks button
        if (collapseBtn) {
            collapseBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                toggleAccordion();
            });
        }

        /**
         * Append message bubble into chat history
         * @param {'user' | 'assistant'} sender
         * @param {string} text
         * @param {string} [timeStr]
         */
        function appendMessage(sender, text, timeStr = null) {
            const time = timeStr || getCurrentTime();
            const isUser = sender === 'user';

            const msgDiv = document.createElement('div');
            msgDiv.className = `ai-msg ${isUser ? 'ai-msg-user' : 'ai-msg-assistant'}`;

            msgDiv.innerHTML = `
                <div class="ai-msg-bubble">
                    ${escapeHtml(text)}
                    <span class="ai-msg-time">${time}</span>
                </div>
            `;

            chatBody.appendChild(msgDiv);
            scrollToBottom();
        }

        /**
         * Simulated AI response with typing animation
         */
        function simulateAiResponse(userQuery) {
            const typingDiv = document.createElement('div');
            typingDiv.className = 'ai-msg ai-msg-assistant';
            typingDiv.id = 'aiTypingIndicator';
            typingDiv.innerHTML = `
                <div class="ai-msg-bubble">
                    <span class="ai-typing-indicator">
                        <span class="ai-typing-dot"></span>
                        <span class="ai-typing-dot"></span>
                        <span class="ai-typing-dot"></span>
                    </span>
                </div>
            `;
            chatBody.appendChild(typingDiv);
            scrollToBottom();

            setTimeout(() => {
                const indicator = document.getElementById('aiTypingIndicator');
                if (indicator) indicator.remove();

                const responses = [
                    'Data stasiun cuaca menunjukkan kondisi stabil di wilayah Anda hari ini. ☀️',
                    'Potensi curah hujan terpantau sedang. Jangan lupa cek peta anomali iklim! 🌧️',
                    'Indeks kualitas udara (AQI) hari ini berada dalam kategori baik. 🍃',
                    'Informasi iklim telah diperbarui sesuai sensor maritim BMKG terkini. 🌊'
                ];
                const randomReply = responses[Math.floor(Math.random() * responses.length)];

                appendMessage('assistant', randomReply);
            }, 750);
        }

        /**
         * Handle send message
         */
        function handleSendMessage() {
            const message = chatInput.value.trim();
            if (!message) return;

            // 1. Instantly append message locally
            appendMessage('user', message);

            // 2. Clear input & maintain focus
            chatInput.value = '';
            chatInput.focus();

            // 3. Simulated response (Ready to be swapped with fetch() / Gemini API)
            simulateAiResponse(message);
        }

        // Form Submit Event (Enter key or click Send)
        chatForm.addEventListener('submit', function (e) {
            e.preventDefault();
            handleSendMessage();
        });

        // Keydown Event on Input (Enter to send)
        chatInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                handleSendMessage();
            }
        });
    });
</script>
