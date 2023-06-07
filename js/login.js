let email = document.querySelector("#email");
let password = document.querySelector("#password");

function login() {
  const token = localStorage.getItem("token");
  console.log(token);
  fetch("../api/api-login-todo.php", {
    method: "POST",
    body: JSON.stringify({
      email: email.value,
      password: password.value,
      login: true,
    }),

    headers: {
      Accept: "application/json",
      Authorization: "Bearer " + token,
    },
  }).then((response) => {
    response.json().then((json) => {
      // console.log(json.errors.email_addressEr_login);
      // console.log(json.data);
      // email ******************
      // if (json.errors.email_addressEr_login) {
      //   document.querySelector("#emailerrorAlert").innerHTML =
      //     json.errors.email_addressEr_login;
      //   document.querySelector("#emailsuccessAlert").innerHTML = "";
      //   document
      //     .querySelector("#emailerrorAlert")
      //     .setAttribute("class", "text-red-600 text-sm");
      // }
      // else if (json.success.email_addressSu_login) {
      //   document.querySelector("#emailsuccessAlert").innerHTML =
      //     json.success.email_addressSu_login;
      //   document.querySelector("#emailerrorAlert").innerHTML = "";
      //   document
      //     .querySelector("#emailsuccessAlert")
      //     .setAttribute("class", "text-green-600 text-sm");
      // }

      // // password ****************
      // if (json.errors.passwordEr_login) {
      //   document.querySelector("#passworderrorAlert").innerHTML =
      //     json.errors.passwordEr_login;
      //   document
      //     .querySelector("#passworderrorAlert")
      //     .setAttribute("class", "text-red-600 text-sm");
      // } else if (json.success.passwordSu_login) {
      //   document.querySelector("#passworderrorAlert").innerHTML =
      //     json.success.passwordSu_login;
      //   document
      //     .querySelector("#passworderrorAlert")
      //     .setAttribute("class", "text-green-600 text-sm");
      // }
      if (json.data) {
        console.log(json.token);
        localStorage.setItem("token", json.token);
        localStorage.setItem("userId", json.id);
        location.assign("http://localhost/todo");
      }
    });
  });
}
