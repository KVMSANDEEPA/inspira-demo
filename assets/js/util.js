
// Send suspicious actions to log.php
function logAction(action) {
  fetch("../../log.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "action=" + encodeURIComponent(action)
  });
}

// Disable right-click
document.addEventListener("contextmenu", function (e) {
  e.preventDefault();
  alert("Right-click is disabled!");
  logAction("Right Click Attempt");
});

// Disable inspect shortcuts
document.onkeydown = function (e) {
  if (e.key === "F12" || 
      (e.ctrlKey && e.shiftKey && ["i","j","c"].includes(e.key.toLowerCase())) || 
      (e.ctrlKey && e.key.toLowerCase() === "u")) {
    e.preventDefault();
    alert("Inspect is disabled!");
    logAction("Tried Inspect Shortcut: " + e.key);
    return false;
  }
};