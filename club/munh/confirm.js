
function exit_() {
    var check = confirm("Are you sure you want to exit?");
    if(check){
        window.location("../saruul/login.php?delete=yes");
        alert("exit");
    }else{
        window.location("before_user_football.php?delete=no");
        alert("cancel");
    }
  }