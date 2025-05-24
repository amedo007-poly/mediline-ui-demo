<?php // Simple Chatbot UI and logic (MVP) ?>
<!-- AI Chatbot UI -->
<div class="container mt-4">
    <h2>Your AI consulting</h2>
    <div id="response" class="chat-container" style="min-height:120px;background:#f8fafc;padding:1em;border-radius:6px;margin-bottom:1em;"></div>
    <div class="input-group" style="display:flex;gap:0.5em;">
        <input type="text" class="form-control" id="userInput" placeholder="Enter your question" style="flex:1;padding:0.5em;border-radius:4px;border:1px solid #ccc;">
        <button class="btn btn-success" onclick="sendMessage()">Ask!</button>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
async function sendMessage() {
    const input = document.getElementById('userInput').value;
    const responseDiv = document.getElementById('response');
    if (!input) {
        responseDiv.innerHTML = 'Please enter a message.';
        return;
    }
    responseDiv.innerHTML = 'Thinking...';
    try {
        const response = await fetch(
            'https://openrouter.ai/api/v1/chat/completions',
            {
                method: 'POST',
                headers: {
                    Authorization: 'Bearer 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',
                    'HTTP-Referer': 'https://www.sitename.com',
                    'X-Title': 'SiteName',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    model: 'deepseek/deepseek-r1:free',
                    messages: [{ role: 'user', content: input }],
                }),
            }
        );
        const data = await response.json();
        const markdownText =
            data.choices?.[0]?.message?.content || 'No response received.';
        responseDiv.innerHTML = window.marked ? marked.parse(markdownText) : markdownText;
    } catch (error) {
        responseDiv.innerHTML = 'Error: ' + error.message;
    }
}
</script>
