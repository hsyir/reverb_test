<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Reverb Demo</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <h1>📨 پیام‌های زنده</h1>
    <ul id="messages"></ul>

    <form id="notifyForm">
        <input type="text" id="msgInput" placeholder="پیام..." />
        <button type="submit">ارسال</button>
    </form>

    <script>
        document.getElementById('notifyForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const msg = document.getElementById('msgInput').value.trim();
            if (!msg) return;
            fetch('/api/notify', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                body: JSON.stringify({ message: msg })
            }).then(res => res.json()).then(console.log);
            document.getElementById('msgInput').value = '';
        });
    </script>
</body>
</html>
