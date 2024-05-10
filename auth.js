
function login() {

    var username = document.getElementById("username").value; 
    var password = document.getElementById("password").value;
    
    if (username == "admin" && password == "admin" ) { 
        alert("Selamat Anda Berhasil login");
        window.location = "index.php"; // Redirecting to other page.
        return false;
    
    } else if (username == "admin" || password === "admin") {
        alert ("username & password tidak boleh kosong") 
        return false;
     }
     else {
        alert('Username & password yang anda masukan salah')
     }
    }
