<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://kit.fontawesome.com/e390cab89c.css">
<script src="https://kit.fontawesome.com/e390cab89c.js" crossorigin="anonymous"></script>
</head>
<body>

<button class="open-button-chat" onclick="openForm()" style="width: 100px; height: 50px;"><i class="fa-solid fa-comment"></i> </button>

<div class="chat-popup" id="myForm">
  <form  class="form-container">
    <a href="javascript:void(0)" class="closbtn-chat" onclick="closeForm()">&times;</a>  
    

    <iframe
    allow="microphone;"
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/683afdc7-5bda-44ae-9ff8-3090b259a312">
</iframe>
      
  
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<style>
.open-button-chat {
    background-color: #F27144;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    position: fixed;
    bottom: 23px;
    right: 28px;
    border-radius: 35px 35px;
    max-width: 150px;
    max-height: 100px;
    z-index: 4;
  }
  
  .open-button-chat:hover {
    color:white;
    background-color: #3AB9C0;
  }
  
  .closbtn-chat {
    position: absolute;
    font-size: 20px;
    right: 25px;
    color: rgb(255, 255, 255);
    border-bottom: 0px;
  }
  
  .chat-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 50px;
    border: none;
    z-index: 9;
  }
  
  .form-container {
    max-width: 400px;
    padding: 10px;
    background-color: white;
  }
  
  /* Responsive adjustments */
  @media screen and (max-width: 768px) {
    .open-button-chat {
        bottom: 10px;
        right: 10px;
        max-width: 100px;
        max-height: 80px;
        font-size: 12px;
        padding: 10px;
    }
  
    .closbtn-chat {
        font-size: 24px;
        right: 10px;
    }
  
    .chat-popup {
        right: 10px;
    }
  
    .form-container {
        max-width: 300px;
        padding: 5px;
    }
  }
  </style>
</body>
</html>