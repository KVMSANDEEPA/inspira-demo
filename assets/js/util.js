function logAction(action) {
  const payload = [
    `action=${encodeURIComponent(action)}`,
    `page=${encodeURIComponent(window.location.href)}`,
    `referrer=${encodeURIComponent(document.referrer || 'Unknown')}`,
    `screen=${encodeURIComponent(window.innerWidth + 'x' + window.innerHeight)}`,
    `coords=${encodeURIComponent(window.scrollX + ',' + window.scrollY)}`
  ].join('&');

  fetch("log.php", {
    method: "POST",
    headers: {"Content-Type": "application/x-www-form-urlencoded"},
    body: payload
  });
}

document.addEventListener("contextmenu", e => {
  e.preventDefault();
  logAction("Right Click Attempt");
});

document.addEventListener("keydown", e => {
  if (
    e.key === "F12" ||
    (e.ctrlKey && e.shiftKey && ["i","j","c"].includes(e.key.toLowerCase())) ||
    (e.ctrlKey && e.key.toLowerCase() === "u")
  ) {
    e.preventDefault();
    logAction(`Inspect Shortcut: ${e.key}`);
  }
});

let devtoolsOpen = false;
const threshold = 160;
setInterval(() => {
  const opened = window.outerWidth - window.innerWidth > threshold || window.outerHeight - window.innerHeight > threshold;
  if (opened && !devtoolsOpen) {
    devtoolsOpen = true;
    logAction("DevTools Opened");
  } else if (!opened) {
    devtoolsOpen = false;
  }
}, 1000);
