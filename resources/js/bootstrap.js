import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST || window.location.hostname,
    wsPort: import.meta.env.VITE_REVERB_PORT || 8080,
    wssPort: import.meta.env.VITE_REVERB_PORT || 8080,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME || 'http') === 'https',
    enabledTransports: ['ws', 'wss'],
});

// window.Echo.channel('chat')
//     .listen('App\\Events\\MessageSent', (e) => {
//         console.log('✅ پیام جدید از سرور:', e.message);

//         const messages = document.getElementById('messages');
//         if (messages) {
//             const li = document.createElement('li');
//             li.textContent = e.message;
//             messages.appendChild(li);
//         }
//     });


window.Echo.channel('chat').listen('.message.sent', (e) => {
    
    console.log('پیام جدید:', e.message);

    // اضافه کردن به صفحه
    // const messages = document.getElementById('msgInput');
    // if (messages) {
    //     const li = document.createElement('li');
    //     li.textContent = e.message;
    //     messages.appendChild(li);
    // }
});



// import './echo';
