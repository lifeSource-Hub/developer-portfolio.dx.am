function domOutput(msg = "", color = "#000000", fontSize = "16px", fontFamily = "Arial")
{
  var out = document.getElementById("output");

  var p = document.createElement("p");
  p.innerHTML = msg + "<br>";
  p.style.color = color;
  p.style.fontSize = fontSize;
  p.style.fontFamily = fontFamily;
  out.appendChild(p);
}

function redirectAlert(text = "Redirecting")
{
  alert(text);
}