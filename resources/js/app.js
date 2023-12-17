import './bootstrap';

Echo.channel('message')
        .listen('MessageEvent',(e)=>{
            console.log(e);
            let html=`<br>
            <b>`+e.username+`</b>
            <span>`+e.message+`</span>`;
            $('#chat-container').append(html);
        })
        