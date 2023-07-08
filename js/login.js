let email = document.querySelector("#email");
let password = document.querySelector("#password");

function login() {
  // const token = localStorage.getItem("token");
  // console.log(token);
  fetch("../api/api-login-todo.php", {
    method: "POST",
    body: JSON.stringify({
      email: email.value,
      password: password.value,
      login: true,
    }),

    headers: {
      Accept: "application/json",
      // Authorization: "Bearer " + token,
    },
  }).then((response) => {
    response.json().then((json) => {
      if (json.data) {
        // settin to localstorage
        localStorage.setItem("token", json.token);
        localStorage.setItem("userId", json.id);
        localStorage.setItem("email", json.email);
        localStorage.setItem("username", json.username);
        location.assign("/todo");
      }
      if (json.success != "") {
        // variable
        emailSuccess = json.success.email_addressSu_login;
        passwordSuccess = json.success.passwordSu_login;

        // email validation
        document.querySelector("#emailsuccessAlert").innerHTML = emailSuccess;
        document.querySelector("#emailerrorAlert").innerHTML = "";
        document.querySelector("#emailsuccessAlert").style.fontSize = "0.7rem";
        document
          .querySelector("#emailsuccessAlert")
          .setAttribute("class", "text-green-600 text-sm");

        // password validation
        document.querySelector("#passwordSu_login").innerHTML = passwordSuccess;
        document.querySelector("#passworderrorAlert").innerHTML = "";
        document.querySelector("#passwordSu_login").style.fontSize = "0.7rem";
        document
          .querySelector("#passwordSu_login")
          .setAttribute("class", "text-green-600 text-sm");
      }
      if (json.errors != "") {
        var emailerr = json.errors.email_addressEr_login;
        var passworderr = json.errors.passwordEr_login;
        console.log(passworderr);

        if (emailerr) {
          document.querySelector("#emailerrorAlert").innerHTML = emailerr;
          document.querySelector("#emailsuccessAlert").innerHTML = "";
          document.querySelector("#emailerrorAlert").style.fontSize = "0.7rem";
          document
            .querySelector("#emailerrorAlert")
            .setAttribute("class", "text-red-600 text-sm");
        }
        if (passworderr) {
          document.querySelector("#passworderrorAlert").innerHTML = passworderr;
          document.querySelector("#passwordSu_login").innerHTML = "";
          document.querySelector("#passworderrorAlert").style.fontSize =
            "0.7rem";
          document
            .querySelector("#passworderrorAlert")
            .setAttribute("class", "text-red-600 text-sm");
        }
      }
      // else if (json.success) {
      //   console.log(json.success);
      // }
    });
  });
}
