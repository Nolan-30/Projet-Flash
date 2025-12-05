document.addEventListener("DOMContentLoaded", function () {
  const passwordInput = document.querySelector('input[name="password"]');

  if (!passwordInput) return;

  const container = document.createElement("div");
  container.style.marginTop = "10px";
  container.style.marginBottom = "15px";

  const backgroundBar = document.createElement("div");
  backgroundBar.style.width = "100%";
  backgroundBar.style.height = "5px";
  backgroundBar.style.backgroundColor = "#e0e0e0";
  backgroundBar.style.borderRadius = "3px";
  backgroundBar.style.position = "relative";
  backgroundBar.style.overflow = "hidden";

  const fillerBar = document.createElement("div");
  fillerBar.style.height = "100%";
  fillerBar.style.width = "0%";
  fillerBar.style.backgroundColor = "transparent";
  fillerBar.style.transition = "width 0.3s, background-color 0.3s";
  fillerBar.style.borderRadius = "3px";

  const textLabel = document.createElement("p");
  textLabel.style.fontSize = "12px";
  textLabel.style.textAlign = "right";
  textLabel.style.marginTop = "5px";
  textLabel.style.fontWeight = "bold";
  textLabel.style.fontFamily = "Arial, sans-serif";
  textLabel.style.color = "#ccc";
  textLabel.innerText = "";

  backgroundBar.appendChild(fillerBar);
  container.appendChild(backgroundBar);
  container.appendChild(textLabel);

  passwordInput.parentNode.insertBefore(container, passwordInput.nextSibling);

  passwordInput.addEventListener("input", function () {
    const val = passwordInput.value;

    const hasLength = val.length >= 8;
    const hasUpper = /[A-Z]/.test(val);
    const hasNumber = /[0-9]/.test(val);
    const hasSpecial = /[^A-Za-z0-9]/.test(val);

    let score = 0;
    if (hasLength) score++;
    if (hasUpper) score++;
    if (hasNumber) score++;
    if (hasSpecial) score++;

    if (val.length === 0) {
      fillerBar.style.width = "0%";
      fillerBar.style.backgroundColor = "transparent";
      textLabel.innerText = "";
    } else if (score < 2) {
      fillerBar.style.width = "33%";
      fillerBar.style.backgroundColor = "red";
      textLabel.innerText = "Weak";
      textLabel.style.color = "red";
    } else if (score >= 2 && score < 4) {
      fillerBar.style.width = "66%";
      fillerBar.style.backgroundColor = "orange";
      textLabel.innerText = "Medium";
      textLabel.style.color = "orange";
    } else if (score === 4) {
      fillerBar.style.width = "100%";
      fillerBar.style.backgroundColor = "#4caf50";
      textLabel.innerText = "Strong";
      textLabel.style.color = "#4caf50";
    }
  });
});
