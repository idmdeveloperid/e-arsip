	<!-- js -->
	<script src="vendors/scripts/script.js"></script>
	<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.12.1/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.12.1/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyBdEMJPDZoCvpFS6s6mfLrWIO0Akp0YsFE",
    authDomain: "webpush-notifikasi.firebaseapp.com",
    projectId: "webpush-notifikasi",
    storageBucket: "webpush-notifikasi.appspot.com",
    messagingSenderId: "819984668964",
    appId: "1:819984668964:web:f289819c5af52e1ca37bb1",
    measurementId: "G-2XM3TX5BS1"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>