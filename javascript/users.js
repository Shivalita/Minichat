let usersDiv = document.querySelector('.users');
let allUsers = document.querySelectorAll('.user');
let usersHtmlStart = '<p class="text_list user">';
let usersHtmlEnd = '</p>'; 
let lastUser = '';
let usersList = [];
let userFlag = false;

function setUsers(users) {
    for (let i = 0; i < users.length; i++) {
        let userNickname = users[i]['nickname'];       
        let fullUser = usersHtmlStart +  userNickname + usersHtmlEnd;

        if (i == 0) {
            lastUser = userNickname;
        }

        usersList.push(fullUser);  
    }
    return usersList;
}

function displayUsers(usersList) {
    usersList.forEach(user => {
        usersDiv.innerHTML += user; 
    });            
}

function checkUsers(users) {   
    let usersList = setUsers(users);

    if (!userFlag) {
        displayUsers(usersList);
        userFlag = true;
    }

    allUsers = document.querySelectorAll('.user');

    if (lastUser != allUsers[0].innerHTML) {
        let newUser = usersHtmlStart + lastUser + usersHtmlEnd;
        usersDiv.innerHTML = newUser + usersDiv.innerHTML; 
        allUsers = document.querySelectorAll('.user');
    }    
}

function refreshUsers() {  
    fetch('./partials/users.php')
    .then(function(response) {
        if (response.ok) {
            return response.json();
        } else {
                console.log('Error : response not ok');
        }   
    })
    .then(function(users) { 
        checkUsers(users);       
    })
    .catch(function(error) {
        console.error(error);
    })
    
    setTimeout(refreshUsers, 1000);
}

refreshUsers();