document.getElementById("loginForm").addEventListener("submit", async function (event) {
  event.preventDefault();
  
  const formData = new FormData(this);
  const data = {
      name: formData.get('name'),
      password: formData.get('password')
  };

  const response = await fetch("https://finflexx.vercel.app/api/login", {
      method: "POST",
      headers: {
          "Content-Type": "application/json"
      },
      body: JSON.stringify(data)
  });

  const result = await response.json();
  const loginMessage = document.getElementById("loginMessage");
  
  if (result.success) {
      loginMessage.textContent = "Login successful!";
      loginMessage.style.color = "green";
      window.location.href = "../index2.html";
  } else {
      loginMessage.textContent = result.message;
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

  const response = await fetch("https://finflexx.vercel.app/api/signin", {
      method: "POST",
      headers: {
          "Content-Type": "application/json"
      },
      body: JSON.stringify(data)
  });

  const result = await response.json();
  const signinMessage = document.getElementById("signinMessage");

  if (result.success) {
      signinMessage.textContent = "Sign in successful!";
      signinMessage.style.color = "green";
      window.location.href = "../index2.html";
  } else {
      signinMessage.textContent = result.message;
      signinMessage.style.color = "red";
  }
});
