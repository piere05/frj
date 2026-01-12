const input = document.getElementById("password");
const toggle = document.getElementById("togglePassword");
toggle.addEventListener("click", () => {
  const isPassword = input.type === "password";
  input.type = isPassword ? "text" : "password";
  toggle.className = isPassword
    ? "fas fa-eye toggle-password"
    : "fas fa-eye-slash toggle-password";
});




