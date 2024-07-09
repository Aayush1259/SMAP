document.getElementById("loginForm").addEventListener("submit", async function (event) {
  event.preventDefault();
  
  const formData = new FormData(this);
  const data = {
      name: formData.get('name'),
      password: formData.get('password')
  };

  console.log("Login form data:", data);

  try {
    const response = await fetch("https://finflexx.vercel.app/api/login", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    });

    if (!response.ok) {
        throw new Error('Network response was not ok.');
    }

    const result = await response.json();
    console.log("Login result:", result);

    const loginMessage = document.getElementById("loginMessage");
    
    if (result.success) {
        loginMessage.textContent = "Login successful!";
        loginMessage.style.color = "green";
        window.location.href = "../index2.html";
    } else {
        loginMessage.textContent = result.message || "Login failed.";
        loginMessage.style.color = "red";
    }
  } catch (error) {
    console.error('Error during login fetch:', error);
    loginMessage.textContent = "An error occurred during login.";
    loginMessage.style.color = "red";
  }
});

document.getElementById("signinForm").addEventListener("submit", async function (event) {
  event.preventDefault();

  const formData = new FormData(this);
  const data = {
      name: formData.get('name'),
      email: formData.get('email'),
      password: formData.get('password')
  };

  console.log("Sign-in form data:", data);

  try {
    const response = await fetch("https://finflexx.vercel.app/api/signin", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    });

    if (!response.ok) {
        throw new Error('Network response was not ok.');
    }

    const result = await response.json();
    console.log("Sign-in result:", result);

    const signinMessage = document.getElementById("signinMessage");

    if (result.success) {
        signinMessage.textContent = "Sign in successful!";
        signinMessage.style.color = "green";
        window.location.href = "../index2.html";
    } else {
        signinMessage.textContent = result.message || "Sign in failed.";
        signinMessage.style.color = "red";
    }
  } catch (error) {
    console.error('Error during sign-in fetch:', error);
    signinMessage.textContent = "An error occurred during sign in.";
    signinMessage.style.color = "red";
  }
});
