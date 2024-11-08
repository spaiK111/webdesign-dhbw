document.addEventListener("DOMContentLoaded", async () => {
  const login = document.getElementById("login");
  const password = document.getElementById("password");
  const submit = document.getElementById("submit");
  const error = document.getElementById("error");

  const savedLogin = getCookie("login");
  const savedPassword = getCookie("password");

  if (savedLogin && savedPassword) {
    const checkAdmin = await fetch(
      `http://localhost:5000/api/posts/checkAdmin?login=${savedLogin}`
    );
    const checkAdminData = await checkAdmin.json();

    if (checkAdminData.admin == false) {
      window.location.href = `http://localhost:3000/View/userPage.php?login=${savedLogin}&hashedPassword=${savedPassword}`;

      return;
    } else {
      // Leite den Benutzer zur admin.php weiter
      window.location.href = `http://localhost:3000/View/admin.php?login=${savedLogin}&hashedPassword=${savedPassword}`;
      return;
    }
  }

  submit.addEventListener("click", async () => {
    const login = document.getElementById("login").value;
    const password = document.getElementById("password").value;

    if (!login || !password) {
      // Sind alle Felder ausgefüllt?
      alert("Bitte füllen Sie alle Felder aus.");
      return;
    }

    const savedLogin = getCookie("login");
    const savedPassword = getCookie("password");
    const hashedPassword = CryptoJS.SHA256(password).toString();
    if (savedLogin && savedPassword) {
      if (login === savedLogin && hashedPassword === savedPassword) {
        alert("Login erfolgreich (aus Cookies)");
        return;
      }
    }

    try {
      // ist der benuzter gesperrt?
      const checkUser = await fetch(
        `http://localhost:5000/api/posts/checkRestriction?login=${login}`
      );
      const checkUserRestrictuion = await checkUser.json();

      if (checkUserRestrictuion.restricted == true) {
        alert(
          "Der Benutzer ist gesperrt, bitte wenden Sie sich an den Adminsitrator!"
        );
        return;
      }
    } catch (err) {
      console.error("Fehler beim Login - im checkUser-Bereich:", err);
    }
    // SPÄTER EINKOMMENTIEREN
    try {
      // ist der benuzter gesperrt?
      const checkUserVerification = await fetch(
        `http://localhost:5000/api/posts/checkVerification?login=${login}`
      );
      const userVerification = await checkUserVerification.json();

      if (userVerification.verified != true) {
        alert(
          "Der Benutzer ist nicht verifiziert! Bitte per E-Mail verifizieren!"
        );
        return;
      }
    } catch (err) {
      console.error("Fehler beim Login - Verifizierung:", err);
    }

    try {
      // verusche Login und behandle fehlgeschlagenen Login
      const response = await fetch(
        `http://localhost:5000/api/posts/loginUser?login=${login}&hashedPassword=${hashedPassword}`,
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
        }
      );

      const data = await response.json();

      if (response.status === 200) {
        setCookie("login", login, 7);
        setCookie("password", hashedPassword, 7);

        const checkAdmin = await fetch(
          `http://localhost:5000/api/posts/checkAdmin?login=${savedLogin}`
        );
        const checkAdminData = await checkAdmin.json();

        if (checkAdminData.admin == false) {
          window.location.href = `http://localhost:3000/View/userPage.php?login=${login}&hashedPassword=${hashedPassword}`;
          return;
        } else {
          // Leite den Benutzer zur admin.php weiter
          window.location.href = `http://localhost:3000/View/admin.php?login=${login}&hashedPassword=${hashedPassword}`;
          return;
        }
      } else {
        // Login fehlgeschlagen
        await handleFailedLogin(login);
      }
    } catch (err) {
      console.error("Fehler beim Login:", err);
      alert(
        "Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut."
      );
    }

    async function handleFailedLogin(login) {
      try {
        const decreaseAttempt = await fetch(
          `http://localhost:5000/api/posts/decreaseLoginAttempt?login=${login}`,
          {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
          }
        );

        const data = await decreaseAttempt.json();
        console.log("Login-Versuche:", data.login_attempts);

        if (data.login_attempts > 3) {
          const restrictUser = await fetch(
            `http://localhost:5000/api/posts/restrictUser?login=${login}`,
            {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
            }
          );

          if (restrictUser.status === 201) {
            alert(
              "Ihr Konto wurde gesperrt. Bitte wenden Sie sich an den Administrator."
            );
            return;
          }
        }

        alert("Invalides Login oder Passwort");
      } catch (err) {
        console.error(
          "Fehler beim Verarbeiten des fehlgeschlagenen Logins:",
          err
        );
        alert(
          "Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut."
        );
      }
    }
  });

  function setCookie(name, value, days) {
    const d = new Date();
    d.setTime(d.getTime() + days * 24 * 60 * 60 * 1000);
    const expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
  }

  function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(";").shift();
  }

  function emptyCookie(name) {
    document.cookie =
      name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  }
});
