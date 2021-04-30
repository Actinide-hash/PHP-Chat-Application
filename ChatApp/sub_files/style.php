html, body {
    height: 100%;
    overflow: hidden;
    padding: 0;
    margin: 0;
}

a, p{
    font-size: 12px;
    font-family: helvetica;
}

#container {
    box-shadow: 2px 2px 10px black;
    width: 1200px;
    height: 85%;
    margin: 3% auto;
    border-radius: 5px;
    overflow: hidden;
}

#menu {
    background: rgb(56,56,56);
    color: whitesmoke;
    padding: 10px;
    font-size: 20pt;
}

#left-col, #right-col {
    position: relative;
    float: left;
    height: 95%;
}

#left-col {
    width: 30%;
}

#right-col {
    width: 69.5%;
    border: 1px solid rgb(56,56,56);
    border-top: none;
    background-color: rgb(56,56,56);
}

#left-col-container, #right-col-container {
    width: 100%;
    height: 100%;
    margin: 0 auto;
    overflow-y: auto;
}

.grey-bg {
    background-color: lightgrey;
    height: 70px;
    width: 100%;
    padding: 8px;
    border-bottom: 0.1px solid grey;
    overflow: auto;
}

.profile-image {
    float: left; 
    width: 60px; 
    height: 60px; 
    border-radius: 50%; 
    margin-right: 16px;
}

#messages-container {
    height: 70%;
    width: 98.5%;
    background: whitesmoke;
    overflow-y: auto;
    padding: 8px;
}

.textarea {
    width: 80%;
    height: 15px;
    padding: 12px;
    margin: 10px;
    border-radius: 30px;
    border: none;
    resize: none;
}

.my-message{
    text-align: right;
    background: lightblue;
    width: 96%;
    height: auto;
    overflow: none;
    padding: 10px;
    border-radius: 10px;
    color: white;
    margin: 5px;
}

.my-message p, .my-message a, .their-message p, .their-message a{
    font-size: 12pt;
}

.their-message {
    text-align: left;
    background: grey;
    width: 96%;
    height: auto;
    overflow: none;
    padding: 10px;
    border-radius: 10px;
    color: white;
    margin: 5px;
}

#send-btn{
    color: white;
    background: lightblue;
    float: right;
    border: none;
    border-radius: 20px;
    margin: 15px;
    width: 90px;
    height: 30px;
}

#add-chat-btn{
    color: white;
    background: lightblue;
    border: none;
    border-radius: 5px;
    width: 90px;
    height: 20px;
}

#new-message {
    display: none;
    box-shadow: 2px 10px 30px black;
    width: 500px;
    position: fixed;
    top: 20%;
    background: white;
    z-index: 2;
    left: 50%;
    transform: translate(-50%, 0);
    border-radius: 5px;
    overflow: auto;
}

.m-header, .m-footer {
    background: rgb(56,56,56);
    color: whitesmoke;
    margin: 0px;
    padding: 5px;
}

.m-header{
    font-size: 16pt;
    text-align: center;
}

.m-body{
    padding: 5px;
}

.message-input {
    width: 96%;
}

#reciever-name {
    position: fized; 
    background: grey; 
    width: 100%; 
    text-align: center; 
    color: whitesmoke; 
    font-family: helvetica;
    padding: 5px;
}