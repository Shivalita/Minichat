//------------------ FORM -----------------------

let form = document.querySelector('#form');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);
            
    fetch('./app/store.php', {
        method: 'POST',
        body: formData
    })
    .then(function(response) {
        if (response.ok) {
            return response.text();
        } else {
                console.log('Error : response not ok');
        }   
    })
    .then(function() {
        console.log('registered in database');
    })
    .catch(function(error) {
        console.error(error);
    })
});

//------------------- MESSAGES -------------------

let messagesDiv = document.querySelector('.messages');
let allMessages = document.querySelectorAll('p');
let htmlStart = '<p class="text_list">';
let htmlEnd = '</p>'; 
let lastMessage = '';
let messagesList = [];
let MessagesFlag = false;

function setMessages(messages) {
    for (let i = 0; i < messages.length; i++) {
        let messageDate = messages[i]['created_at'];
        let messageUser = messages[i]['nickname'];
        let messageText = messages[i]['message'];
        
        let fullMessage = htmlStart +  messageDate + ' - ' + messageUser + ' : ' + messageText + htmlEnd;
        
        if (i == 0) {
            lastMessage = messageDate + ' - ' + messageUser + ' : ' + messageText;
        }

        messagesList.push(fullMessage);  
       
    }
    return messagesList;
}

function displayMessages(messagesList) {
    messagesList.forEach(message => {
        messagesDiv.innerHTML += message; 
    });            
}

function checkMessages(messages) {   
    let messagesList = setMessages(messages);

    if (!MessagesFlag) {
        displayMessages(messagesList);
        MessagesFlag = true;
    }

    allMessages = document.querySelectorAll('p'); 

    if (lastMessage != allMessages[0].innerHTML) {
        let newMessage = htmlStart + lastMessage + htmlEnd;
        messagesDiv.innerHTML = newMessage + messagesDiv.innerHTML; 
        allMessages = document.querySelectorAll('p'); 
    }    
}

function refreshMessages() {  
    fetch('./partials/messages.php')
    .then(function(response) {
        if (response.ok) {
            return response.json();
        } else {
                console.log('Error : response not ok');
        }   
    })
    .then(function(messages) { 
        checkMessages(messages);       
    })
    .catch(function(error) {
        console.error(error);
    })
    
    setTimeout(refreshMessages, 1000);
}

refreshMessages();