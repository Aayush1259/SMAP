document.getElementById("loginForm").addEventListener("submit", async function (event) {
  event.preventDefault();
  
  const formData = new FormData(this);
  const data = {
      name: formData.get('name'),
      password: formData.get('password')
  };

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
      const loginMessage = document.getElementById("loginMessage");
      loginMessage.textContent = "An error occurred during login.";
      loginMessage.style.color = "red";
  }
});
