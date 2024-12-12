/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const empForm = document.getElementById("employeur_chat");
const empID = document.getElementById('empID');
const chat_box_body = document.getElementById('chatBody');
let owner = true;
if(empForm.length){
    empForm.addEventListener('submit', function(event){
        event.preventDefault();
        const form = new FormData(empForm);
        owner = form.get('owner');
        console.log(owner);
        axios.post('/broadcast/chat',{
            owner: form.get('owner'),
            code_employeur: form.get('code_employeur'),
            content: form.get('content'),
            id: empID.value
        }).then(response => {
            document.getElementById('MsgInput').value='';
        })
    });
}
if(empID){
    const channel =  Echo.channel('public.chatmessage.'+empID.value);
    channel.subscribed(()=>{
        console.log('subscribed!!!')
    }).listen('.chat-message', (event)=>{
        // <div class="chat_box_body_self msg">{{ $ticket->content }}</div>
        let cn = owner == 1 ? 'self' : 'other';
        let template = `<div class="chat_box_body_${cn} msg">${event.message}</div>`;
        chat_box_body.innerHTML += (template);
        let chatBody = document.getElementById("chatBody");
        chatBody.scrollTop = chatBody.scrollHeight;
        console.log(event);
    })
}
