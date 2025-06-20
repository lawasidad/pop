<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Modern Attendance</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f9fafb;
      color: #111;
      padding: 20px;
    }
    h2 {
      text-align: center;
      color: #14532d;
    }
    .card {
      background: white;
      padding: 16px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      margin-bottom: 20px;
    }
    input, button {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
    }
    button {
      background: #14532d;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s ease;
    }
    button:hover {
      background: #0d3a1e;
    }
    video, img {
      width: 100%;
      border-radius: 10px;
      margin: 10px 0;
    }
    .log {
      font-size: 14px;
      line-height: 1.6;
      margin-top: 10px;
      border-top: 1px solid #eee;
      padding-top: 10px;
    }
    .log img {
      width: 70px;
      border-radius: 6px;
    }
  </style>
</head>
<body>

  <h2>📍 Attendance</h2>

  <div class="card">
    <input type="text" id="name" placeholder="Enter your name" />
    <button onclick="startCamera()">Start Camera</button>
    <video id="video" autoplay playsinline style="display:none;"></video>
    <button id="snapBtn" style="display:none;" onclick="takeSelfie()">📸 Take Selfie</button>
    <img id="preview" style="display:none;" />
    <button onclick="markIn()">✅ IN</button>
    <button onclick="markOut()">🚪 OUT</button>
  </div>

  <div class="card">
    <h3>Today’s Logs</h3>
    <div id="logList" class="log"></div>
  </div>

  <canvas id="canvas" style="display:none;"></canvas>

  <script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const preview = document.getElementById('preview');
    let selfieData = "";

    function startCamera() {
      navigator.mediaDevices.getUserMedia({ video: { facingMode: "user" } })
        .then(stream => {
          video.srcObject = stream;
          video.style.display = "block";
          document.getElementById("snapBtn").style.display = "block";
        })
        .catch(err => alert("Camera error: " + err));
    }

    function takeSelfie() {
      canvas.width = video.videoWidth;
      canvas.height = video.videoHeight;
      canvas.getContext("2d").drawImage(video, 0, 0);
      selfieData = canvas.toDataURL("image/png");
      preview.src = selfieData;
      preview.style.display = "block";
      stopCamera();
    }

    function stopCamera() {
      let stream = video.srcObject;
      stream && stream.getTracks().forEach(track => track.stop());
      video.style.display = "none";
      document.getElementById("snapBtn").style.display = "none";
    }

    function getLocation() {
      return new Promise((resolve, reject) => {
        navigator.geolocation.getCurrentPosition(
          pos => resolve(`https://maps.google.com?q=${pos.coords.latitude},${pos.coords.longitude}`),
          err => reject("Location error: " + err.message),
          { enableHighAccuracy: true, timeout: 10000, maximumAge: 60000 }
        );
      });
    }

    function getTime() {
      return new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    }

    function getDate() {
      return new Date().toISOString().split("T")[0];
    }

    async function markIn() {
      const name = document.getElementById("name").value.trim();
      if (!name || !selfieData) return alert("Please fill name and take selfie.");
      try {
        const location = await getLocation();
        const logs = JSON.parse(localStorage.getItem("attendance") || "[]");
        logs.push({ name, date: getDate(), in: getTime(), out: "", selfieIn: selfieData, selfieOut: "", locationIn: location, locationOut: "" });
        localStorage.setItem("attendance", JSON.stringify(logs));
        selfieData = "";
        alert("IN marked");
        loadLogs();
      } catch (err) {
        alert(err);
      }
    }

    async function markOut() {
      const name = document.getElementById("name").value.trim();
      if (!name || !selfieData) return alert("Please fill name and take selfie.");
      try {
        const location = await getLocation();
        const logs = JSON.parse(localStorage.getItem("attendance") || "[]");
        const lastIndex = logs.map(e => e.name).lastIndexOf(name);
        if (lastIndex === -1 || logs[lastIndex].out) return alert("No IN record found.");
        logs[lastIndex].out = getTime();
        logs[lastIndex].selfieOut = selfieData;
        logs[lastIndex].locationOut = location;
        localStorage.setItem("attendance", JSON.stringify(logs));
        selfieData = "";
        alert("OUT marked");
        loadLogs();
      } catch (err) {
        alert(err);
      }
    }

    function loadLogs() {
      const logs = JSON.parse(localStorage.getItem("attendance") || "[]");
      const logList = document.getElementById("logList");
      logList.innerHTML = logs.reverse().map(log => `
        <div><b>${log.name}</b> (${log.date})<br>
        IN: ${log.in} - <a href="${log.locationIn}" target="_blank">Map</a><br>
        OUT: ${log.out || "—"} - ${log.locationOut ? `<a href="${log.locationOut}" target="_blank">Map</a>` : ""}<br>
        <img src="${log.selfieIn}" /> ${log.selfieOut ? `<img src="${log.selfieOut}" />` : ""}</div><hr/>
      `).join('');
    }

    loadLogs();
  </script>

</body>
</html>
