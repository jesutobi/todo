// function intialize() {}
let username = document.querySelector("#username");
let email = document.querySelector("#email");
let password = document.querySelector("#password");
let confirmpassword = document.querySelector("#confirmpassword");

let error = {
  username: "Enter your username ",
  email: "Enter you email address",
  password: "Enter your password",
  confirmpassword: "Password doesn't match",
};
let success = {
  username: "username is okay",
  email: "email is okay",
  password: "password is okay",
  confirmpassword: "password is okay",
};

function submit() {
  fetch("../api/api-registeration-todo.php", {
    method: "POST",
    body: JSON.stringify({
      username: username.value,
      email: email.value,
      password: password.value,
      confirmpassword: confirmpassword.value,
      submit: true,
    }),
    headers: {
      Accept: "application/json",
    },
  }).then((response) => {
    response.json().then((json) => {
      // console.log(json);
      // console.log(json.success);

      // username*************
      if (json.message) {
        console.log(json.message);
        if (json.errors.usernameEr) {
          document.querySelector("#userNameAlert").innerHTML =
            json.errors.usernameEr;
          document
            .querySelector("#userNameAlert")
            .setAttribute("class", "text-red-600 text-sm");
        } else {
          document.querySelector("#userNameAlert").innerHTML =
            json.success.usernamesu;
          document
            .querySelector("#userNameAlert")
            .setAttribute("class", "text-green-600 text-sm");
        }

        // email ******************
        if (json.errors.email_addressEr) {
          document.querySelector("#emailAlert").innerHTML =
            json.errors.email_addressEr;
          document
            .querySelector("#emailAlert")
            .setAttribute("class", "text-red-600 text-sm");
        } else if (json.success.email_addresssu) {
          document.querySelector("#emailAlert").innerHTML =
            json.success.email_addresssu;
          document
            .querySelector("#emailAlert")
            .setAttribute("class", "text-green-600 text-sm");
        }

        // password ****************
        if (json.errors.passwordEr) {
          document.querySelector("#passwordAlert").innerHTML =
            json.errors.passwordEr;
          document
            .querySelector("#passwordAlert")
            .setAttribute("class", "text-red-600 text-sm");
        } else if (json.success.passwordsu) {
          document.querySelector("#passwordAlert").innerHTML =
            json.success.passwordsu;
          document
            .querySelector("#passwordAlert")
            .setAttribute("class", "text-green-600 text-sm");
        }

        // confirm password ****************
        if (json.errors.passwordRepeatEr) {
          document.querySelector("#confirmpasswordAlert").innerHTML =
            json.errors.passwordRepeatEr;
          document
            .querySelector("#confirmpasswordAlert")
            .setAttribute("class", "text-red-600 text-sm");
        } else if (json.success.passwordRepeatsu) {
          document.querySelector("#confirmpasswordAlert").innerHTML =
            json.success.passwordRepeatsu;
          document
            .querySelector("#confirmpasswordAlert")
            .setAttribute("class", "text-green-600 text-sm");
        }
      }
      if (json.success != "") {
        alert("Registeration successful");
        location.assign("http://localhost/todo/authentication/login.php");
      }
    });
  });
}
