var firebaseConfig = {
  apiKey: "AIzaSyAWtBGqdU82SwgVp_QVevN8BFCFZ6Jzyrc",
  authDomain: "bilecoapp-637a3.firebaseapp.com",
  databaseURL: "https://bilecoapp-637a3.firebaseio.com",
  projectId: "bilecoapp-637a3",
  storageBucket: "bilecoapp-637a3.appspot.com",
  messagingSenderId: "217032753003",
  appId: "1:217032753003:web:9975f48281bc0bfe09162e",
  measurementId: "G-XR9MTDL15V"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();

var auth = firebase.auth();
var db = firebase.firestore();
